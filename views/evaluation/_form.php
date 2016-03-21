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

    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->all(), 'id', 'name')) ?>

    <p> Date into mysql format </p>
    <?= $form->field($model, 'date_evaluation')->textInput() ?>

    <table id="deail-view" class="table table-striped table-bordered detail-view">
        <tbody>
            <tr><th>Domain</th><th>Question</th><th>Score</th></tr>
    <?php
    if ($criteria != null && is_array($criteria)) {
       $values = array(1=>1, 2=>2, 3=>3, 4=>4);
        //for each criterion display an input
        foreach ($criteria as $i=> $criterion) {
            echo "<th>".$criterion->name."</th><th>".$criterion->question."</th>";
            echo "<td>".$form->field($criterion,"[$i]score")->dropDownList($values)->label(false);
            echo $form->field($criterion,"[$i]id")->hiddenInput()->label(false)."</td></tr>";
        }
    }
    ?>
        </tbody></table>
    <div class="col-lg-8">
    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>
    </div>




    <?php ActiveForm::end(); ?>

</div>
