<?php

return \yii\helpers\ArrayHelper::merge(require(__DIR__ . "/web.php"), [
            'components' => [
                'db' => [
                    'class' => 'yii\db\Connection',
                    'dsn' => 'mysql:host=127.0.0.1;dbname=circle_test',
                    'username' => 'ubuntu',
                    'password' => '',
                    'charset' => 'utf8',
                ],
            ]
        ]);
/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

