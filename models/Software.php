<?php

namespace app\models;

use Yii;
use yii\db\Query;

/**
 * This is the model class for table "software".
 *
 */
class Software extends \yii\db\ActiveRecord {

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'software';
    }

    public $tags = [];

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
                [['name', 'company', 'url_company', 'url_software', 'license', 'user_id'], 'required'],
                [['price', 'language_en', 'language_others'], 'integer'],
                [['name', 'company', 'url_company', 'url_software', 'license'], 'string', 'max' => 200],
                [['description'], 'string', 'max' => 500],
                [['screenshot_1', 'screenshot_2', 'screenshot_3', 'screenshot_4', 'screenshot_5', 'logo'], 'string', 'max' => 50],
                [['keywords'], 'string', 'max' => 100],
                [['contact_email'], 'string', 'max' => 128],
                [['contact_phone'], 'string', 'max' => 20],
            /** Usage rights:  Values are integer : 
             * 0 : not set
             * 1 : open source & free to use
             * 2 : free to use
             * 3 : freemium
             * 4 : commercial */
                [['usage_rights'], 'integer'],
                [['tags'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'company' => 'Company',
            'url_company' => 'Url Company',
            'url_software' => 'Url Software',
            'license' => 'License',
            'price' => 'Price',
            'description' => 'Description',
            'screenshot_1' => 'Screenshot 1',
            'screenshot_2' => 'Screenshot 2',
            'screenshot_3' => 'Screenshot 3',
            'screenshot_4' => 'Screenshot 4',
            'screenshot_5' => 'Screenshot 5',
            'logo' => 'Logo',
            'keywords' => 'Keywords',
            'user_id' => 'User',
            'contact_email' => 'Contact Email',
            'contact_phone' => 'Contact Phone',
            'language_en' => 'Language En',
            'language_others' => 'Others Languages',
            'usage_rights' => 'Usage rights'
        ];
    }

    /**
     * save the given tags if not already saved.
     * delete the tags registered if not present in the array given
     * @param array $tags Darray of tags given by teh post method
     */
    public function saveTags($tags) {
        //get the existing tags
        $exTags = $this->getTags();
        //check if tags are ticked
        Yii::trace('tags analyze');
        if (isset($tags) && is_array($tags) && count($tags) > 0) {
            Yii::trace('tags not null' . count($this->tags));
            foreach ($tags as $tagId) {
                //if not already existing we insert the tag
                $existing = false;
                foreach ($exTags as $exTag) {
                    if ($exTag->id == $tagId) {
                        $existing = true;
                    }
                }
                if ($existing == false) {
                    $ts = new TagSoftware();
                    $ts->software_id = $this->id;
                    $ts->tag_id = $tagId;
                    $ts->save();
                    Yii::trace('tag insert:' . $tagId);
                }
            }
            Yii::trace('end foreach atgs');
        }
        //FIXME use a method to compare array instead of this ugly code
        //remove old tags not in the current selection
        foreach ($exTags as $exTag) {
            $existing = false;
            if (isset($tags) && is_array($tags) && count($tags) > 0)
                foreach ($tags as $tagId) {
                    if ($exTag->id == $tagId) {
                        $existing = true;
                    }
                }
            //if not existing, delete the tag
            if ($existing == false) {
                (new Query)->createCommand()->delete('tag_software', ['software_id' => $this->id, 'tag_id' => $exTag->id])->execute();
            }
        }
    }

    public function getLogoPicture($default = true) {
        if ($default)
            $imgurl = Yii::$app->request->baseUrl . "/images/picture_empty.png";
        else {
            $imgurl = null;
        }
        // $imgurl = "/web/images/picture_empty.png";
        if ($this->logo != null) {
            $imgurl = Yii::$app->request->baseUrl . '/photos/' . $this->logo;
        }
        return $imgurl;
    }

    public function getListPictures() {
        $listPictures = [];
        for ($i = 1; $i < 6; $i++) {
            $name = 'screenshot_' . $i;
            if ($this->$name != null) {
                $listPictures[] = \yii\helpers\Html::img(Yii::$app->request->baseUrl . '/photos/' . $this->$name, ['style' => 'height:375px;width:500px']);
            }
        }
        return $listPictures;
    }

    /**
     * display tags in a cool way.
     */
    public function displayTags() {
        $result = "";
        $tags = $this->getTags();
        if ($tags != null && is_array($tags) && count($tags) > 0)
            foreach ($tags as $tag) {
                $result .= "<i class=\"glyphicon glyphicon-pushpin\" style=\"padding-left:10px;padding-right:5px;\"></i>" . $tag->name;
            }
        return $result;
    }

    /**
     * display the html code to show the picture carousel
     */
    public function displayCarousel() {
        $head = "<div id=\"carousel-example-generic\" class=\"carousel slide\" data-ride=\"carousel\">
  <ol class=\"carousel-indicators\">";
        $body = " <div class=\"carousel-inner\">";
        $i = 0;
        foreach ($this->getListPictures() as $picture) {
            $class = "";
            $classItem = "";
            if ($i == 0) {
                $class = "class=\"active\"";
                $classItem = "active";
            }
            $head .= "<li data-target=\"#carousel-example-generic\" data-slide-to=\"" . $i . "\" " . $class . "></li>";
            $body .= "<div class=\"item " . $classItem . "\">" . $picture . "</div>";
            $i++;
        }
        $head .= "</ol>";
        $body .= "</div>
 
        <a class=\"left carousel-control\" href=\"#carousel-example-generic\" role=\"button\" data-slide=\"prev\">
          <span class=\"glyphicon glyphicon-chevron-left\"></span>
        </a>
        <a class=\"right carousel-control\" href=\"#carousel-example-generic\" role=\"button\" data-slide=\"next\">
          <span class=\"glyphicon glyphicon-chevron-right\"></span>
        </a>
      </div>";
        return $head . $body;
    }

    public function getListPicturesResized() {
        $listPictures = [];
        for ($i = 1; $i < 6; $i++) {
            $name = 'screenshot_' . $i;
            if ($this->$name != null) {
                $listPictures[$i] = \yii\helpers\Html::img(Yii::$app->request->baseUrl . '/photos/' . $this->$name, ['class' => 'img-thumbnail', 'style' => 'height:90px;width:160px']);
            }
        }
        return $listPictures;
    }

    /**
     * get the reviews for this software
     * @return type
     */
    public function getReviews() {
        return $this->hasMany(Review::className(), ['software_id' => 'id'])->all();
    }

    /**
     * get the evaluations for this software
     * @return type
     */
    public function getDetailedAnalysis() {
        return $this->hasMany(Evaluation::className(), ['software_id' => 'id'])->all();
    }

    /**
     * get the evaluations for this software
     * @return type
     */
    public function getQuickAnalysis() {
        return $this->hasMany(QuickAnalysis::className(), ['software_id' => 'id'])->all();
    }

    /**
     * 
     * @return an ActiveQuery of Tags
     */
    public function getTags() {
        return $this->hasMany(Tag::className(), ['id' => 'tag_id'])
                        ->viaTable('tag_software', ['software_id' => 'id'])->all();
    }

    /**
     * get the evaluations and make an average if many evaluations are presents
     */
    public function getEvaluation() {
        $result = "not available";
        //get the evaluations if not null
        $evaluations = $this->getDetailedAnalysis();
        if ($evaluations != null) {
            if (count($evaluations) == 1) {
                $result = $evaluations[0]->grade;
            } else {
                //make the average of evaluations
                $result = $this->getAverageEvaluation($evaluations);
            }
        }
        return "$result";
    }

    /**
     * true if the software has almost one quick analysis
     */
    public function hasReviews() {
        $result = false;
        $ana = $this->getReviews();
        if ($ana != null && count($ana) > 0) {
            $result = true;
        }
        return $result;
    }

    /**
     * return the number of reviews
     */
    public function getCountReviews() {
        $result = 0;
        $ana = $this->getReviews();
        if ($ana != null && count($ana) > 0) {
            $result = count($ana);
        }
        return $result;
    }

    /**
     * true if the software has almost one quick analysis
     */
    public function hasQuickAnalysis() {
        $result = false;
        $ana = $this->getQuickAnalysis();
        if ($ana != null && count($ana) > 0) {
            $result = true;
        }
        return $result;
    }

    /**
     * return the count of quick analysis
     */
    public function getCountQuickAnalysis() {
        $result = 0;
        $ana = $this->getQuickAnalysis();
        if ($ana != null && count($ana) > 0) {
            $result = count($ana);
        }
        return $result;
    }

    /**
     * true if the software has almost one quick analysis
     */
    public function hasDetailedAnalysis() {
        $result = false;
        $ana = $this->getDetailedAnalysis();
        if ($ana != null && count($ana) > 0) {
            $result = true;
        }
        return $result;
    }

    /**
     * return the count of detiled analysis
     */
    public function getCountDetailedAnalysis() {
        $result = 0;
        $ana = $this->getDetailedAnalysis();
        if ($ana != null && count($ana) > 0) {
            $result = count($ana);
        }
        return $result;
    }

    /**
     * calculate the average of evaluations.
     * @param type $evaluations
     * @return string
     */
    public function getAverageEvaluation($evaluations) {
        $result = "E";
        $count = 0;
        foreach ($evaluations as $eval) {
            switch ($eval->grade) {
                case "A": $count += 4;
                    break;
                case "B": $count += 3;
                    break;
                case "C": $count += 2;
                    break;
                case "D": $count += 1;
                    break;
                case "E": $count += 0;
                    break;
            }
        }
        //calcul the average
        $average = $count / count($evaluations);
        if ($average > 0.5)
            $result = "D";
        if ($average > 1.5)
            $result = "C";
        if ($average > 2.5)
            $result = "B";
        if ($average > 3.5)
            $result = "A";
        return $result;
    }

    public function getAverageReviews() {
        $count = 0;
        $average = null;
        $reviews = $this->getReviews();
        if (count($reviews) > 0) {
            foreach ($reviews as $review) {
                $count += $review->rating;
            }
            //calcul the average
            $average = $count / count($reviews);
        }
        return $average;
    }

    const USAGE_RIGHTS_NOT_SET = 0;
    const USAGE_RIGHTS_OPEN_SOURCE_FREE = 1;
    const USAGE_RIGHTS_FREE_USE = 2;
    const USAGE_RIGHTS_FREEMIUM = 3;
    const USAGE_RIGHTS_COMMERCIAL = 4;

    public $usageRightsValues = array(self::USAGE_RIGHTS_NOT_SET => 'not set', self::USAGE_RIGHTS_OPEN_SOURCE_FREE => 'open source & free to use', self::USAGE_RIGHTS_FREE_USE => 'free to use', self::USAGE_RIGHTS_FREEMIUM => 'freemium', self::USAGE_RIGHTS_COMMERCIAL => 'commercial');

}
