<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_software_follow".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $software_id
 */
class UserSoftwareFollow extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_software_follow';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'software_id'], 'required'],
            [['user_id', 'software_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'software_id' => 'Software ID',
        ];
    }
}
