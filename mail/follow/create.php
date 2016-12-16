<?php

use yii\helpers\Html;
use yii\helpers\Url;


/*
 * Mail template for created <?= $typeAdded ?>s, send to followers of the software
 */
$this->title = "New <?= $typeAdded ?> on biobankapps";


?>
<div style="background-color: #f8f8f8;
     border-color: #e7e7e7 ;	
     font-family: Source Sans Pro,sans-serif;
     color: #777;
     font-size: 24px;
     border-bottom: 1px solid #d7d7d7  ;
     height: 3em;
     padding-top: 1em;
     margin-bottom: 1em;
     
">
    New <?= $typeAdded ?> for software <?= "$software->name"?> on <?= Html::a("BiobankApps.com", Url::to(['site/index'])) ?></div>
<div style="font-size: 24px;">Dear <?= $follower->username?>,</div><br>A new <?= $typeAdded ?> was added for the software you follow. You can see this <?= $typeAdded ?> at the detailled view of the software : 
<div style='width: 100%;text-align:center; font-weight: bold'>
    <h3> <?= Html::a(ucFirst($typeAdded) ." of $software->name", Url::to(['software/view','id'=>$software->id])) ?></h3>
</div> 
<div style='padding-bottom: 25px'>
You received this message because you choosed to follow this software. To unfollow it, just click on this link :
<div style='width: 100%;text-align:center;'>
    <?= Html::a("Unfollow $software->name", Url::to(['user-software-follow/unfollow-from-mail','idSoftware'=>$software->id,'idUser'=>$follower->id]),['style'=>'width: 100%;text-align:center']) ?>
</div>
</div>
<?php ?>

<?= ""?>
