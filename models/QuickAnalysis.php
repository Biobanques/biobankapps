<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "quick_analysis".
 *
 * @property integer $id
 * @property integer $user_id
 * @property integer $software_id
 * @property string $goals
 * @property string $main_features
 * @property string $helpful_tool
 * @property string $value_added
 * @property string $date_update
 */
class QuickAnalysis extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'quick_analysis';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'software_id'], 'required'],
            [['user_id', 'software_id'], 'integer'],
            [['goals', 'main_features', 'helpful_tool', 'value_added'], 'string'],
            [['date_update'], 'safe'],
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
            'goals' => 'What are the goals of the tool?',
            'main_features' => 'What are the main features?',
            'helpful_tool' => 'How can it be helpful for a biobanker?',
            'value_added' => 'What is the value added value of this tool',
            'date_update' => 'Date Update',
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
