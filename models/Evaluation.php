<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evaluation".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $date_evaluation
 * @property integer $grade
 */
class Evaluation extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'evaluation';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[ 'user_id', 'date_evaluation'], 'required'],
            [['id', 'user_id'], 'integer'],
            [['software_id'], 'integer'],
            [['software_version'], 'string', 'max' => 50],
            [['grade'], 'string', 'max' => 3],
            [['date_evaluation'], 'safe'],
            //['date_evaluation', 'date', 'format' => 'Y-m-d H:m:s']
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
            'software_version' => 'Software Version',
            'date_evaluation' => 'Date Evaluation',
            'grade' => 'Grade',
        ];
    }
    
    /**
     * relation with table software.
     * @return type
     * @since 2.0.1
     */
     public function getSoftware()
    {
        return $this->hasOne(Software::className(), ['id' => 'software_id']);
    }
    
    /**
     * get the criteria for this evaluation
     * @return type
     * @since 2.0.2
     */
    public function getEvaluationcriteria() {
        return $this->hasMany(EvaluationCriterion::className(), ['evaluation_id' => 'id']);
    }
    
    /**
     * relation with table software.
     * @return type
     * @since 2.0.1
     */
     public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }
}
