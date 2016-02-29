<?php

namespace app\models;

use Yii;
use yii\base\Model;

/**
 * LoginForm is the model behind the login form.
 */
class FichierForm extends Model
{
    public $fichier;

    /**
     * @return array the validation rules.
     */
    public function rules() {
        return [


            [['fichier'], 'file', 'extensions' => 'png, jpg,jpeg'],
        ];
    }

}