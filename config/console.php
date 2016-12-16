<?php

use app\components\CommonProperties;

Yii::setAlias('@tests', dirname(__DIR__) . '/tests/codeception');

$params = require(__DIR__ . '/params.php');
$db = require(__DIR__ . '/db.php');

$config = [
    'id' => 'basic-console',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log'],
    'controllerNamespace' => 'app\commands',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'log' => [
            'targets' => [
                    [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
// 'useFileTransport' to false and configure a transport
// for the mailer to send real emails.

            /*
              'useFileTransport' => true,
              'fileTransportPath'=>'@runtime/mail',
             * 
             * 
             */
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => CommonProperties::$SMTP_SENDER_HOST,
                'username' => CommonProperties::$SMTP_SENDER_USERNAME,
                'password' => CommonProperties::$SMTP_SENDER_PASSWORD,
                'port' => '25',
            /* Activate if port = 587 */
            //   'encryption' => 'tls', 
            ],
            'htmlLayout' => '@app/mail/layouts/html.php'
        ],
        'urlManager' => [
            'baseUrl' => CommonProperties::$DEV_MODE?'http://biobankapps.local':"http://biobankapps.com",
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                    ['class' => 'yii\rest\UrlRule', 'controller' => 'api'],],
        ],
    ],
    'params' => $params,
        /*
          'controllerMap' => [
          'fixture' => [ // Fixture generation command line.
          'class' => 'yii\faker\FixtureController',
          ],
          ],
         */
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
