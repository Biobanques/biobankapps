<?php

/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace app\commands;

use app\components\CommonProperties;
use app\models\api\Software;
use app\models\User;
use Yii;
use yii\console\Controller;

/**
 * This command echoes the first argument that you have entered.
 *
 * This command is provided as an example for you to learn how to create console commands.
 *
 * @author Qiang Xue <qiang.xue@gmail.com>
 * @since 2.0
 */
class TestSendmailController extends Controller {

    /**
     * This command echoes what you have entered as the message.
     * @param string $message the message to be echoed.
     */
    public function actionNewreview() {
        $message = Yii::$app->mailer->compose('follow/create', 
                [
                    'software' => Software::findOne(5), 
                    'follower'=> User::findOne(87),
                    'typeAdded'=>'review'
                    ]);
        
        $message->setFrom(CommonProperties::$SMTP_SENDER_FROM_EMAIL);
        $message->setTo('matthieu.penicaud@gmail.com');
        $message->setSubject('test');
        
        if ($message->send())
            echo 'test reussi'."\n";
    }
    
    

}
