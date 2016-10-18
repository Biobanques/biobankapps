<?php
use yii\helpers\Html;
?>
<div class="alert alert-warning" role="alert">You need an account to add a software.<br></div>
<div>An account is free and allow you to do these followg tasks:
    <ul><li>Publish softwares<li>Add reviews for softwares<li>Add quick and detailed analysis for softwares</ul></div>
    <div>
        If you want to create an account, click on the button below :
        <?= Html::a('Sign up', ['/site/signup'], ['class' => 'btn btn-primary']) ?>
    </div>
</div>
