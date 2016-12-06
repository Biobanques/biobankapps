<?php

use yii\helpers\Url;

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */?>
<a href='<?= Url::to(['user-software-follow/unfollow'])?>'  ><span class="glyphicon glyphicon-link unfollow" data-sid="<?=$software_id?>" data-uid="<?=$user_id?>"></span></a>
