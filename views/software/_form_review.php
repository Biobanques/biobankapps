<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use kartik\rating\StarRating;

/* @var $this yii\web\View */
/* @var $model app\models\Review */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="review-form">

    <?php $form = ActiveForm::begin(); ?>

    <label>Rating</label> 
<?= $form->field($model, 'rating')->widget(StarRating::classname(), [
                        'name' => 'rating',
                        'pluginOptions' => [
                            'animate' => false,
                            'stars' => 5,
                            'min' => 0,
                            'max' => 5,
                            'step' => 1,
                            'size' => 'xs',
                            'showCaption' => false,
                            'showClear' => false,
//                            'starCaptions' => [
//                                1 => 'Extremely Poor',
//                                2 => 'Very Poor',
//                                3 => 'Poor',
//                                4 => 'Ok',
//                            ],
//                            'starCaptionClasses' => [
//
//                                1 => 'text-warning',
//                                2 => 'text-info',
//                                3 => 'text-primary',
//                                4 => 'text-success',
//                            ],
                        ],
                    ])->label(false)
        ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'comment')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
