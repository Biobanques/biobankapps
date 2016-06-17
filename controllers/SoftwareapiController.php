<?php

namespace app\controllers;

use yii\rest\ActiveController;

/**
 * class to expose fields to the API.
 * expose software fields, but with limited view.
 * 
 * How to use it:
 * get it with a url : http://biobankapps.local/softwareapi
 * if you want one object, give his ID : http://biobankapps.local/softwareapis/1
 * if you want a json type, give the special header attribute Accept : application/json
 * Exemple : curl -i -H "Accept:application/json" "http://biobankapps.local/softwareapi"
 */
class SoftwareapiController extends ActiveController
{
    public $modelClass = 'app\models\SoftwareApi';
    
}
