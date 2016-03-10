<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "evaluation".
 *
 * @property integer $id
 * @property integer $author_id
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
            [['id', 'author_id', 'date_evaluation', 'grade'], 'required'],
            [['id', 'author_id', 'grade'], 'integer'],
            [['date_evaluation'], 'safe']
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'author_id' => 'Author ID',
            'date_evaluation' => 'Date Evaluation',
            'grade' => 'Grade',
        ];
    }
}
