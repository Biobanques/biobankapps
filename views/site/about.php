<?php

use yii\helpers\Html;

$this->title = Yii::$app->name . ' - ' . Yii::t('common', 'about');
?>
<div class="page-header">
    <h1>About</h1>
    <div>
        <p>
            Biobankapps.com is a website to help biobankers to find softwares related to their activities.
            <br>
            This website is free and was initially developed with the french infrastructure for biobanking, Biobanques <a href="http://biobanques.eu">biobanques.eu</a><br>
            Now, this project is maintained by the european infrastructure related to the biobanking,<a href="http://bbmri-eric.eu/">BBMRI-ERIC.eu</a></p>
        <p>
    </div>
</div>
<div class="row">
    <div class="col-md-3">
<?php echo Html::img(Yii::$app->request->baseUrl . '/images/bbmri_eric.png'); ?>            
    </div>
    <div class="col-md-3">
<?php echo Html::img(Yii::$app->request->baseUrl . '/images/logobb.png'); ?>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <h3>The team</h3>
        <ul><li>Nicolas Malservet ( Biobanques, BBMRI-FR)
            <li>Heimo Muller ( Medical Univesity of Graz, BBMRI-AT)
            <li>Matthieu Penicaud ( Biobanques, BBMRI-FR)
                
        </ul>
    </div>
</div>
