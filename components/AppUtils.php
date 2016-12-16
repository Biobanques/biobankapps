<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace app\components;

use app\models\Software;
use app\models\UserSoftwareFollow;
use Yii;
use app\models\User;

/**
 * Description of AppUtils
 *
 * @author matthieu
 */
class AppUtils {
  public function sendMailToFollowers($software_id, $typeAdded,$action){

        
        $USFS = UserSoftwareFollow::findAll(['software_id'=>$software_id]);
        $software = Software::findOne(['id'=>$software_id]);
        $messages=[];
        foreach($USFS as $USF){

            $follower = User::findOne($USF->user_id);
          $message = Yii::$app->mailer->compose("follow/$action",[
              'typeAdded'=>$typeAdded,
              'software'=>$software,
              'follower'=>$follower,
                  'action'=>$action
                  ]);
          $message->setFrom(CommonProperties::$SMTP_SENDER_FROM_EMAIL);
          $message->setTo($follower->email);
          $message->setSubject("New $typeAdded for $software->name added on biobankapps.com");
         
          $messages[]=$message;
        }
        Yii::$app->mailer->sendMultiple($messages);
    }
}
