<?php

namespace app\controllers;

use yii\rest\ActiveController;
use app\models\Software;
use app\models\SoftwareApi;

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
    
    /**
     *  method to allow overriding actions in this API class
     * @return type
     */
    public function actions()
    {
        $actions = parent::actions();
        unset($actions['index']);
        return $actions;
    }
    
    /**
     * return all the softwares
     * 
     */
    public function actionIndex(){
        $softwares = Software::find()->all();
        //format result to expose only useful attributes
        $result = array();
        foreach($softwares as $software){
            $result[]=SoftwareApi::convert($software);
        }
        return $result;
    }
}
