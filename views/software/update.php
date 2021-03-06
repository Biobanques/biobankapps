<?php
use yii\helpers\Html;

//$this->registerJs(
//        '$("document").ready(function(){
//        $(".deletePictures").on("pjax:end", function() {
//            $.pjax.reload({container:"#Pictures"});  //Reload GridView
//        });
//    });
//    ');
/* @var $this yii\web\View */
/* @var $model app\models\Software */

$this->title = 'Update Software: ' . ' ' . "$model->company - $model->name";

?>
<div class="software-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?=
    $this->render('_form', [
        'model' => $model,
    ]);

    yii\widgets\Pjax::begin();
    ?>

    <div class="col-md-12 bg-primary "><h4><?= Yii::t('common', 'screenshots') ?>   <?php
            //if number of screenshot set =5 no more link add screenshot
    if(!(isset($model->screenshot_1)&&isset($model->screenshot_2)&&isset($model->screenshot_3)&&isset($model->screenshot_4)&&isset($model->screenshot_5))){
        echo Html::a('<span class="glyphicon glyphicon-download"></span> ' . Yii::t('common', 'add_screenshot'), ['add-photo', 'id' => $model->id], ['class' => 'btn btn-success']);
    }
    ?></h4>

    </div>
    <?php
    foreach ($model->getListPicturesResized() as $i => $screenshot) {
        ?> <div class="col-md-3 row" style="height: 150px"> <?=
        $screenshot;
        ?><?= Html::a('<span class="glyphicon glyphicon-remove"></span> ' . Yii::t('common', 'remove'), ['delete-photo', 'id'=>$model->id,'i' => $i], ['class' => 'btn btn-danger', 'style' => 'margin :10px']) ?></div>

        <?php
    } yii\widgets\Pjax::end();
    ?>
    <div class="col-md-12 bg-primary "><h4><?= Yii::t('common', 'logo') ?>   <?php
         //if logo is not set print link to add log   
    if(!isset($model->logo)){
        echo Html::a('<span class="glyphicon glyphicon-download"></span> ' . Yii::t('common', 'add_logo'), ['add-logo', 'id' => $model->id], ['class' => 'btn btn-success']);
    }
    ?></h4>

    </div>
    <div class="col-md-4 row" > <?= Html::img($model->getLogoPicture(false), ['class' => 'img-thumbnail', 'style' => 'width:240px']) ?><?php echo $model->getLogoPicture(false) != null ? Html::a('<span class="glyphicon glyphicon-remove"></span> ' . Yii::t('common', 'remove'), ['delete-logo', 'id' => $model->id], ['class' => 'btn btn-danger', 'style' => 'margin :10px']) : null ?></div>


</div>