<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "criterion".
 *
 * @property integer $id
 * @property string $name
 * @property string $question
 * @property integer $weight
 */
class Criterion extends \yii\db\ActiveRecord
{
    /**
     * property to enable displaying in dynamic view evaluation/create
     * @var type 
     */
    public $score;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'criterion';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'question', 'weight'], 'required'],
            [['weight'], 'integer'],
            [['name'], 'string', 'max' => 25],
            [['question'], 'string', 'max' => 300]
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
            'question' => 'Question',
            'weight' => 'Weight',
            'score' => 'Score',
        ];
    }
}
