<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\SofwareSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="software-search" style = 'display:none'>
    <?php yii\widgets\Pjax::begin(['id' => 'search-form']) ?>

    <?php
    $form = ActiveForm::begin([
                'action' => ['admin'],
                'method' => 'get',
                'options' => ['data-pjax' => true]
    ]);
    ?>


    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'company') ?>


    <?php echo $form->field($model, 'license') ?>


    <?php echo $form->field($model, 'global_keywords') ?>


    <div class="form-group" >
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php yii\widgets\Pjax::end() ?>

</div>
