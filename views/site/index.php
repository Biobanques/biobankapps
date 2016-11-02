<?php

use yii\helpers\Html;

/* @var $this SiteController */
$this->title = Yii::$app->name;
?>
<div class="page-header">
    <h1><?php echo Yii::t('common', 'home') . ' <i>' . Html::encode(Yii::$app->name).'</i>'; ?></h1>
    <div>
        <p>
            <?php echo Yii::t('common', 'homepage'); ?>
        </p>
    </div>
</div>

<!-- Example row of columns -->
<div class="row">
    <div class="col-md-6">
        <div class=" panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">If you are a biobanker</h3></div>
            <div class="panel-body">
                You can search softwares related to your activities into the <?php echo Html::a(Yii::t('common', 'software_list'), array('software/admin')); ?>
                <br><br>
                If you are interested by some softwares, contact informations are provided into each detailled view of each software.<br>
                Software publishers are free to publish their own softwares on this website.<br>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">If you are a software publisher</h3></div>
            <div class="panel-body">
                You can add your softwares related to the biobing activities with this form <?php echo Html::a(Yii::t('common', 'add_software'), array('software/create')); ?>
                <br>
                Publishing your software on this list is free.
                <br>
                You can update directly your informations for each software.
                <br>
                This website is developed by the BBMRI-ERIC commin service IT.
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-6">
        <div class=" panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">If you are a BBMRI-ERIC Member</h3></div>
            <div class="panel-body">
                You can review softwares and leave some comments.<br>
                You can add short and detailed analysis.<br>
                You can view short and detailed analysis.<br>      
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">If you are a community member</h3></div>
            <div class="panel-body">
                You can review softwares and leave some comments.<br>
                You can view short analysis.<br>
                You can't edit short analysis and view detailed analysis.<br>      
            </div>
        </div>
    </div>
</div>
<div>
    If you want to create an account, to publish a software, or review softwares, click on the button below :
    <?= Html::a('Sign up', ['/site/signup'], ['class' => 'btn btn-primary']) ?>
</div>

<br><br>
If you have question or suggestion, feel free to contact us : <?php echo Html::a(Yii::t('common', 'contact'), array('site/contact')); ?>
            