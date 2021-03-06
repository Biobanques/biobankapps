<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Criterion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="criterion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'question')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'weight')->textInput() ?>
    
    <p>Explain here how to evalute this criteria, with a  score from 0 to 4, only an integer value</p>
    <?= $form->field($model, 'evaluation_method')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
