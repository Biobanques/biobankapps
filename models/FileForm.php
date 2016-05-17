<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * FichierForm is the model behind the add picture form.
 */
class FileForm extends Model
{
    public $file;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [


            [['file'], 'file', 'extensions' => 'png, jpg,jpeg'],
        ];
    }

}