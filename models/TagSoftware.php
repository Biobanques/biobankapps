<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tag_software".
 *
 * @property integer $software_id
 * @property integer $tag_id
 */
class TagSoftware extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'tag_software';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['software_id', 'tag_id'], 'required'],
            [['software_id', 'tag_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'software_id' => 'Software ID',
            'tag_id' => 'Tag ID',
        ];
    }
}
