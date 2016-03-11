<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Author;

/* @var $this yii\web\View */
/* @var $model app\models\Evaluation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evaluation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'author_id')->dropDownList(ArrayHelper::map(Author::find()->all(), 'id', 'name')) ?>

    <p> Date into mysql format </p>
    <?= $form->field($model, 'date_evaluation')->textInput() ?>
    
    <?php
    //generate form with criterion
    $criteria=Criterion::find()->all();
    $values=array(1,2,3,4);
    //for each criterion display an input
    foreach ($criteria as $criterion){
        echo $form->field($criterion,"[$i]name")->dropDownList($values);
    }
    ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    
    
    
    <?php ActiveForm::end(); ?>

</div>
