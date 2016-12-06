<?php

use yii\helpers\Url;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//$this->registerCss(".follow {color:blue;font-size:1.5em}");
?>


<a href='<?= Url::to(['user-software-follow/follow'])?>'  ><span class="glyphicon glyphicon-link follow" data-sid="<?=$software_id?>" data-uid="<?=$user_id?>"></span></a>
