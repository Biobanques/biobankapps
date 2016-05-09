<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;
use app\models\Software;

/* @var $this yii\web\View */
/* @var $model app\models\QuickAnalysis */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="quick-analysis-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'software_id')->dropDownList(ArrayHelper::map(Software::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'goals')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'main_features')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'helpful_tool')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'value_added')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
