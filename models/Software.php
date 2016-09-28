<?php

namespace app\models;

use Yii;

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
            [['contact_phone'], 'string', 'max' => 20]
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
        ];
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
                $listPictures[] = \yii\helpers\Html::img(Yii::$app->request->baseUrl . '/photos/' . $this->$name);
            }
        }
        return $listPictures;
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
                case "A": $count+=4;
                    break;
                case "B": $count+=3;
                    break;
                case "C": $count+=2;
                    break;
                case "D": $count+=1;
                    break;
                case "E": $count+=0;
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
                $count+=$review->rating;
            }
            //calcul the average
            $average = $count / count($reviews);
        }
        return $average;
    }

}
