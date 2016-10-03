<?php

namespace app\models\api;

use Yii;

/**
 * This is the model class for table "software", that expose attributes to the API.
 * use it to control fields that need to be exposed.
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
            [['contact_phone'], 'string', 'max' => 20],
            /** Usage rights:  Values are integer : 
             * 0 : not set
             * 1 : open source & free to use
             * 2 : free to use
             * 3 : freemium
             * 4 : commercial */
            [['usage_rights'], 'integer'],
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
            'logo' => 'Logo',
            'keywords' => 'Keywords',
            'user_id' => 'User',
            'contact_email' => 'Contact Email',
            'contact_phone' => 'Contact Phone',
            'language_en' => 'Language En',
            'language_others' => 'Others Languages',
        ];
    }

    // filter out some fields, best used when you want to inherit the parent implementation
// and blacklist some sensitive fields.
    public function fields() {
        $fields = parent::fields();

        // remove fields that contain sensitive information or obsolete fields
        unset($fields['user_id'], $fields['descriptif_fr'], $fields['keywords_fr'], $fields['screenshot_1'], $fields['screenshot_2'], $fields['screenshot_3'], $fields['screenshot_4'], $fields['screenshot_5']);

        return $fields;
    }

    /**
     * convert a software from model package to a software api
     * @param type $software
     */
    public static function convert($software) {
        $model = new Software;
        $model->id=$software->id;
        $model->name=$software->name;
        $model->company=$software->company;
        $model->url_company=$software->url_company;
        $model->url_software=$software->url_software;
        $model->price=$software->price;
        $model->contact_email=$software->contact_email;
        $model->contact_phone=$software->contact_phone;
        $model->keywords=$software->keywords;
        $model->description=$software->description;
        $model->license=$software->license;
        $model->usage_rights=$software->usageRightsValues[$software->usage_rights];
        return $model;
    }

}
