<?php

namespace app\components;

use Yii;

//require(__DIR__ . '/../vendor/yiisoft/yii2/Yii.php');

/**
 * surcharge du controller pour gerer les langues
 * @author nmalservet
 *
 */
class BSFController extends CustomController
{

    function init() {
        parent::init();
        if (isset($_GET['lang']))
            Yii::$app->session['lang'] = $_GET['lang'];
        if (isset(Yii::$app->session['lang']))
            Yii::$app->language = Yii::$app->session['lang'];
        Yii::$app->name = 'BiobankApps';
    }

}
?>