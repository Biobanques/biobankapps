<?php
use yii\helpers\Html;
use app\models\Tag;
use yii\bootstrap\ActiveForm;

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

    <div class="col-md-12 bg-primary "><h4><?= Yii::t('common', 'screenshots') ?></h4>

    </div>
    <?php
    foreach ($model->getListPicturesResized() as $i => $screenshot) {
        ?> <div class="col-md-3 row" style="height: 150px"> <?=
        $screenshot;
        ?></div>

        <?php
    } yii\widgets\Pjax::end();
    ?>
    <div class="col-md-12 bg-primary "><h4><?= Yii::t('common', 'logo') ?></h4>

    </div>
    <div class="col-md-4 row" > <?= Html::img($model->getLogoPicture(false), ['class' => 'img-thumbnail', 'style' => 'width:240px']) ?></div>


   
</div>