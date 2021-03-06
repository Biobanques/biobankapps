<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evaluation_criterion".
 *
 * @property integer $id
 * @property integer $evaluation_id
 * @property integer $score
 * @property integer $criterion_id
 */
class EvaluationCriterion extends \yii\db\ActiveRecord
{

    /**
     * @inheritdoc
     */
    public static function tableName() {
        return 'evaluation_criterion';
    }

    /**
     * @inheritdoc
     */
    public function rules() {
        return [
            [['evaluation_id', 'criterion_id', 'name', 'question', 'weight','evaluation_method'], 'required'],
            [['id', 'evaluation_id', 'score', 'criterion_id'], 'integer'],
            [['weight'], 'integer'],
            [['name'], 'string', 'max' => 25],
            [['question'], 'string', 'max' => 300],
            [['evaluation_method'], 'string', 'max' => 500]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'evaluation_id' => 'Evaluation ID',
            'score' => 'Score',
            'criterion_id' => 'Criterion ID',
            'evaluation_method'=>'Evaluation method'
        ];
    }

    /**
     * relation with table evaluation
     * @return type
     * @since 2.0.2
     */
    public function getEvaluation() {
        return $this->hasOne(Evaluation::className(), ['id' => 'evaluation_id']);
    }

}