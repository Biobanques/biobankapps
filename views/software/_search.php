<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Tag;

/* @var $this yii\web\View */
/* @var $model app\models\SofwareSearch */
/* @var $form yii\widgets\ActiveForm */
?>


<div class="software-search" style = 'display:none'>
    <hr>
    <div class="row">
            <?php yii\widgets\Pjax::begin(['id' => 'search-form']) ?>

            <?php
            $form = ActiveForm::begin([
                        'action' => ['admin'],
                        'method' => 'get',
                        'options' => ['data-pjax' => true]
            ]);
            ?>

            <div class="col-lg-6">
                <i>Name of the software</i>
                <?= $form->field($model, 'name') ?>
            </div>
            <div class="col-lg-6">
                <<i>Name of the company providing the software.</i>
                <?= $form->field($model, 'company') ?>
            </div>
            <div class="col-lg-6">
                <p><i>License is free text, type here some words</i></p>
                <?= $form->field($model, 'license') ?>
            </div>
            <div class="col-lg-6">
                <i>Usage rights display options on the rights to use the software.<br>It categorize the software in more understandable way than the license.</i>
                <?= $form->field($model, 'usage_rights')->dropDownList($model->usageRightsValues, array('prompt' => '')) ?> 
            </div>
            <div class="col-lg-6">
                <i>Keywords are used to describe the software. It's a free text.<br> Software providers can add their own keywords.</i>
                <?= $form->field($model, 'global_keywords') ?>
            </diV>

            <div class="col-lg-6" > 
                <i>Tags are used to classify the software with their usage domains.<br> Each software can contain multiple tags. Tags are pre-defined.</i>
                <?php
                $tags = Tag::find()->all();
                $tagsArray = [];
                foreach ($tags as $tag) {
                    $tagArray[$tag->id] = $tag->name;
                }
                echo $form->field($model, 'tags')->checkboxList($tagArray);
                ?>
            </div>

            <div class="col-lg-12">
                <div class="form-group" >
                    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
                    <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
                </div>
            </div>

            <?php ActiveForm::end(); ?>
            <?php yii\widgets\Pjax::end() ?>
    </div>
    <hr>
</div>
