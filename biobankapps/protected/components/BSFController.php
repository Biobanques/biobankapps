<?php

/**
 * surcharge du controller pour gerer les langues
 * @author nmalservet
 *
 */
class BSFController extends Controller {

    function init() {
        parent::init();
        if (isset($_GET['lang']))
            Yii::app()->session['lang'] = $_GET['lang'];
        if (isset(Yii::app()->session['lang']))
            Yii::app()->language = Yii::app()->session['lang'];
    }

}

?>