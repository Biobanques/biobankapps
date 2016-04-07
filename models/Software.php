<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "software".
 *
 */
class Software extends \yii\db\ActiveRecord 
{

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
            [['name', 'company', 'url_company', 'url_software', 'license', 'contact_login', 'contact_password'], 'required'],
            [['price', 'language_en', 'language_others'], 'integer'],
            [['name', 'company', 'url_company', 'url_software', 'license'], 'string', 'max' => 200],
            [['description'], 'string', 'max' => 500],
            [['screenshot_1', 'screenshot_2', 'screenshot_3', 'screenshot_4', 'screenshot_5', 'logo'], 'string', 'max' => 50],
            [['keywords', 'contact_name', 'contact_firstname', 'contact_login', 'contact_password'], 'string', 'max' => 100],
            [['contact_email'], 'string', 'max' => 128],
            [['contact_phone'], 'string', 'max' => 20],
            [['contact_login'], 'unique']
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
            'contact_name' => 'Contact Name',
            'contact_firstname' => 'Contact Firstname',
            'contact_login' => 'Contact Login',
            'contact_password' => 'Contact Password',
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


    
    




}