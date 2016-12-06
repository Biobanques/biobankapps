<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\EvaluationCriterion */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evaluation-criterion-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'id')->textInput() ?>

    <?= $form->field($model, 'evaluation_id')->textInput() ?>

    <?= $form->field($model, 'score')->textInput() ?>

    <?= $form->field($model, 'criterion_id')->textInput() ?>
    
    <p>Explain here how to evalute this criteria, with a  score from 0 to 4, only an integer value</p>
    <?= $form->field($model, 'evaluation_method')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
