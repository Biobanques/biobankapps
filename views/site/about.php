<?php
use yii\helpers\Html;

$this->title = Yii::$app->name . ' - ' . Yii::t('common', 'about');
?>
<div class="col-lg-9">
    <h1>About</h1>
    <div class="col-lg-9"><p>
            Biobankapps.com is a website to help biobankers to find softwares related to their activities.
            <br>
            This website is free and was initially developed with the french infrastructure for biobanking, Biobanques <a href="http://biobanques.eu">biobanques.eu</a><br>
            Now, this project is maintained by the european infrastructure related to the biobanking,<a href="http://bbmri-eric.eu/">BBMRI-ERIC.eu</a></p>
        <p>
    </div>
    <div class="col-lg-3">
        <?php echo Html::img(Yii::$app->request->baseUrl . '/images/logobb.png', array('height' => 75, 'width' => 100)); ?>
        <br><br><?php echo Html::img(Yii::$app->request->baseUrl . '/images/bbmri_eric.png', array('height' => 60, 'width' => 150)); ?>            
    </div>
    <div style="clear:both;">
        <h3>The team</h3>
        <ul><li>Nicolas Malservet
            <li>Heimo Muller
            <li>Matthieu Penicaud
            
        </ul></p>
    </div>

</div>
