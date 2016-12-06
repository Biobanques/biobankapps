<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "review".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $software_id
 * @property integer $rating
 * @property string $title
 * @property string $comment
 */
class Review extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'review';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'software_id', 'rating','date_review'], 'required'],
            [['user_id', 'software_id', 'rating'], 'integer'],
            [['comment'], 'string'],
            [['title'], 'string', 'max' => 255],
            [['date_review'], 'safe'],
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
            'rating' => 'Rating',
            'title' => 'Title',
            'comment' => 'Comment',
        ];
    }
    
    /**
     * relation with table software.
     * @return type
     * @since 2.0.4
     */
     public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
    /**
     * relation with table software.
     * @return type
     * @since 2.0.4
     */
     public function getSoftware()
    {
        return $this->hasOne(Software::className(), ['id' => 'software_id']);
    }
}
