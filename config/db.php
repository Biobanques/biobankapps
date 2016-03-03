<?php

use app\components\CommonProperties;

return [
    'class' => 'yii\db\Connection',
    'dsn' => CommonProperties::$CONNECTION_STRING,
    'username' => CommonProperties::$CONNECTION_LOGIN,
    'password' => CommonProperties::$CONNECTION_PASSWORD,
    'charset' => 'utf8',
];
