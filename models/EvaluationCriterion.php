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
    public static function tableName()
    {
        return 'evaluation_criterion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'evaluation_id', 'score', 'criterion_id'], 'required'],
            [['id', 'evaluation_id', 'score', 'criterion_id'], 'integer']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'evaluation_id' => 'Evaluation ID',
            'score' => 'Score',
            'criterion_id' => 'Criterion ID',
        ];
    }
}
