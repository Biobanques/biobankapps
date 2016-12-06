<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components\FBWidget;

use yii\base\Widget;

/**
 * Description of FollowButtonWidget
 *
 * @author matthieu
 */
class FollowButtonWidget extends Widget {
public $action;
    public $user_id;
    public $software_id;

//Override init method
    public function init() {
        parent::init();
    }

    public function getViewPath() {
        return __DIR__ . '/views/';
    }

//    Overrides run method
    public function run() {
        if($this->action=='follow'){
        FBWidgetAsset::register($this->getView());
        if ($this->software_id != null && $this->user_id != null) {
            return $this->render('_follow', ['user_id' => $this->user_id,
                        'software_id' => $this->software_id
                            ]
            );
        } else {
            return null;
        }
    }else{
        FBWidgetAsset::register($this->getView());
        if ($this->software_id != null && $this->user_id != null) {
            return $this->render('_unfollow', ['user_id' => $this->user_id,
                        'software_id' => $this->software_id
                            ]
            );
        } else {
            return null;
        }        
    }

}
}