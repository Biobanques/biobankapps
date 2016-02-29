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

    <?php // echo $form->field($model, 'id') ?>

    <?= $form->field($model, 'nom') ?>

    <?= $form->field($model, 'societe') ?>

    <?php // echo $form->field($model, 'url_societe') ?>

    <?php // echo $form->field($model, 'url_logiciel') ?>

    <?php echo $form->field($model, 'licence') ?>

    <?php // echo $form->field($model, 'prix')  ?>

    <?php // echo $form->field($model, 'descriptif_fr')  ?>

    <?php // echo $form->field($model, 'descriptif_en')  ?>

    <?php // echo $form->field($model, 'screenshot_1')  ?>

    <?php // echo $form->field($model, 'screenshot_2')  ?>

    <?php // echo $form->field($model, 'screenshot_3')  ?>

    <?php // echo $form->field($model, 'screenshot_4')  ?>

    <?php // echo $form->field($model, 'screenshot_5')  ?>

    <?php // echo $form->field($model, 'logo')  ?>

    <?php echo $form->field($model, 'global_keywords') ?>

    <?php // echo $form->field($model, 'keywords_en')  ?>

    <?php // echo $form->field($model, 'contact_nom')  ?>

    <?php // echo $form->field($model, 'contact_prenom')  ?>

    <?php // echo $form->field($model, 'contact_login')  ?>

    <?php // echo $form->field($model, 'contact_password')  ?>

    <?php // echo $form->field($model, 'contact_email')  ?>

    <?php // echo $form->field($model, 'contact_phone')  ?>

    <?php // echo $form->field($model, 'langue_fr')  ?>

    <?php // echo $form->field($model, 'langue_en')  ?>

    <?php // echo $form->field($model, 'langue_autres')  ?>

    <div class="form-group" >
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php yii\widgets\Pjax::end() ?>

</div>
