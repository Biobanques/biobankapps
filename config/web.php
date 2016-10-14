<?php

use app\components\CommonProperties;

$basePath = dirname(__DIR__);
$params = require(__DIR__ . '/params.php');

$config = [
    'id' => 'basic',
    'basePath' => $basePath,
    'bootstrap' => ['log'],
    'language' => 'en',
    'components' => [
        'request' => [
// !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => 'ON51dgbOPNH6541utGjG4562FTY4CZ5J',
            'parsers' => [
                'application/json' => 'yii\web\JsonParser',
            ],
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
// 'useFileTransport' to false and configure a transport
// for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
//'traceLevel' => YII_DEBUG ? 3 : 0,
//traceLevel=3 enable file name and file number displaying into log 
            'traceLevel' => 0,
            'flushInterval' => 1,
            'targets' => [
                'file' => [
                    'class' => 'yii\log\FileTarget',
                    'logFile' => '@runtime/logs/application.log',
                    'levels'=>['trace']
                ],
                /* 'file' => [
                  'class' => 'yii\log\FileTarget',
                  'categories' => ['yii\web\HttpException:404'],
                  'levels' => ['error', 'warning'],
                  'logFile' => '@runtime/logs/404.log',
                  ], */
                /*
                 * custom error log to only have errors in a straight way
                 */
                'errorFile' => [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error'],
                    'logVars' => [], //no vars ( too verbose)
                    'logFile' => '@runtime/logs/errors.log',
                ],
            /* 'email' => [
              'class' => 'yii\log\EmailTarget',
              'except' => ['yii\web\HttpException:404'],
              'levels' => ['error', 'warning'],
              'message' => ['from' => 'nicolas@malservet.eu', 'to' => 'nicolas@malservet.eu'],
              ], */
            ],
        ],
        'db' => require(__DIR__ . '/db.php'),
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'enableStrictParsing' => false,
            'rules' => [
                ['class' => 'yii\rest\UrlRule', 'controller' => 'api'],],
        ],
        'i18n' => [
            'translations' => [
                'common*' => [
                    'class' => 'yii\i18n\PhpMessageSource',
//                    'basePath' => '@app/messages',
//    'sourceLanguage' => 'en-US',
                    'fileMap' => [
                        'common' => 'common.php',
//                    'app/error' => 'error.php',
                    ],
                ],
            ],
        ],
        'user' => [
            'identityClass' => 'app\models\User',
        ],
    ],
    'params' => $params,
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    /* $config['bootstrap'][] = 'debug';
      $config['modules']['debug'] = [
      'class' => 'yii\debug\Module',
      ]; */

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
    ];
}

return $config;
