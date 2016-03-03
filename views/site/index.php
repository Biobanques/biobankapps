<?php
use yii\helpers\Html;

/* @var $this SiteController */
$this->title = Yii::$app->name;
?>
<div class="page-header">
    <div >
        <h1><?php echo Yii::t('common', 'home') . ' <i>' . Html::encode(Yii::$app->name); ?></i></h1>
        <p>
            <?php echo Yii::t('common', 'homepage'); ?>

        </p>
    </div>
    <div style="float:right;">
        <a href="./index.php?lang=fr"><?php echo Html::img(Yii::$app->request->baseUrl . '/images/fr.png'); ?></a>
        <a style="padding-left: 10px;" href="./index.php?lang=en"><?php echo Html::img(Yii::$app->request->baseUrl . '/images/gb.png'); ?></a>
    </div>
</div>
<br>

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
                <br><br>
                If you have question or suggestion, feel free to contact us : <?php echo Html::a(Yii::t('common', 'contact'), array('site/contact')); ?>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="panel panel-default">
            <div class="panel-heading"><h3 class="panel-title">If you are a software publisher</h3></div>
            <div class="panel-body">
                You can add your softwares related to the biobing activities with this form <?php echo Html::a(Yii::t('common', 'add_software'), array('software/create')); ?>
                <br> <br>
                Publishing your software on this list is free.
                <br>
                You can update directly your informations for each software.
                <br>
                This website is maintained by the Biobanques-IT Team, in collaboration with the BBMRI-IT node.
                <br><br>
                If you have question or suggestion, feel free to contact us : <?php echo Html::a(Yii::t('common', 'contact'), array('site/contact')); ?>
            </div>
        </div>
    </div>
</div>

