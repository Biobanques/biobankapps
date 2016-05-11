<?php
use yii\helpers\Html;
?>
<div class="alert alert-warning" role="alert">You need an account to add a software.<br>
    <div>
        If you want to create an account, to publish a software, or review softwares, click on the button below :
        <?= Html::a('Sign up', ['/site/signup'], ['class' => 'btn btn-primary']) ?>
    </div></div>
