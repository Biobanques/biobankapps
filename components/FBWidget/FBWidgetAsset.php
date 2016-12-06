<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components\FBWidget;

/**
 * Description of FBWidgetAsset
 *
 * @author matthieu
 */
class FBWidgetAsset extends \yii\web\AssetBundle{
    //put your code here
    public $js = [
        'js/USFAjaxFonctions.js'
    ];

    public $css = [
       'css/USFclasses.css'
        
//        'css/votewidget.css'
    ];

    public $depends = [
        'yii\web\JqueryAsset'
    ];

    public function init()
    {
        // Tell AssetBundle where the assets files are
        $this->sourcePath = __DIR__ . "/assets";
        parent::init();
    }
       public $publishOptions = [
        'forceCopy'=>true,
      ];
}
