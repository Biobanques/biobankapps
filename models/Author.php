<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "author".
 *
 * @property integer $id
 * @property string $name
 * @property string $firstname
 * @property string $email
 */
class Author extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'author';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'name', 'firstname', 'email'], 'required'],
            [['id'], 'integer'],
            
        // the email attribute should be a valid email address
        ['email', 'email'],
            [['name', 'firstname', 'email'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'firstname' => 'Firstname',
            'email' => 'Email',
        ];
    }
}
