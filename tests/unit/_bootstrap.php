<?php

require('components/CommonProperties.php');

require('vendor/autoload.php');
require('vendor/yiisoft/yii2/Yii.php');

$config = require('config/tests.php');

(new yii\web\Application($config));