<?php

namespace app\controllers;

use app\components\FBWidget\FollowButtonWidget;
use app\models\UserSoftwareFollow;
use yii\web\Controller;

class UserSoftwareFollowController extends Controller
{
    public function actionFollow()
    {
        $idUser=$_POST['idUser'];
        $idSoftware=$_POST['idSoftware'];
        $USF = new UserSoftwareFollow();
        $USF->user_id=$idUser;
        $USF->software_id=$idSoftware;
        $entry = UserSoftwareFollow::findOne(['user_id'=>$USF->user_id,'software_id'=>$USF->software_id]);
        if ($entry==null&&$USF->save()) {
            return FollowButtonWidget::widget(['action' => 'unfollow', 'user_id' => $idUser, 'software_id' => $idSoftware]);
        } else {
            return FollowButtonWidget::widget(['action' => 'follow', 'user_id' => $idUser, 'software_id' => $idSoftware]);
        }
    }

//    public function actionIndex()
//    {
//        return $this->render('index');
//    }

    public function actionUnfollow()
    {
                $idUser=$_POST['idUser'];
        $idSoftware=$_POST['idSoftware'];
        
        $entry = UserSoftwareFollow::findOne(['user_id'=>$idUser,'software_id'=>$idSoftware]);
        if($entry!=null){
            $entry->delete();
        }            
        return  FollowButtonWidget::widget(['action'=>'follow','user_id'=>$idUser,'software_id'=>$idSoftware]);
;
    }

}
