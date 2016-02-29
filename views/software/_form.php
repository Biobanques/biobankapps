<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Software */
/* @var $form yii\widgets\ActiveForm */
?>



<?php
$form = ActiveForm::begin([
            //  'layout' => 'horizontal',
            'fieldConfig' => [
                'template' => "{label}\n{beginWrapper}\n{input}\n{hint}\n{error}\n{endWrapper}",
                'horizontalCssClasses' => [
                    'label' => 'col-sm-2',
                    'offset' => 'col-sm-offset-4',
                    'wrapper' => 'col-sm-2 form-group',
                    'error' => '',
                    'hint' => '',
                ],
            ],
        ]);
?>
<div class="col-md-12 bg-primary "><h4><?= Yii::t('common', 'informations_logiciels') ?></h4></div>
<?=
$form->field($model, 'nom', ['options' => ['class' => "col-sm-6"]])->textInput(['maxlength' => true])
?>
<?=
$form->field($model, 'url_logiciel', ['options' => ['class' => "col-sm-6"]])->textInput(['maxlength' => true])
?>
<?=
$form->field($model, 'licence', ['options' => ['class' => "col-sm-6"]])->textInput(['maxlength' => true])
?>

<?=
$form->field($model, 'prix', ['options' => ['class' => "col-sm-6"]])->textInput()
?>






<?=
$form->field($model, 'descriptif_fr', ['options' => ['class' => "col-sm-6"]])->textarea(['maxlength' => true])
?>

<?=
$form->field($model, 'descriptif_en', ['options' => ['class' => "col-sm-6"]])->textarea(['maxlength' => true])
?>
<?=
$form->field($model, 'keywords_fr', ['options' => ['class' => "col-sm-6"]])->textInput(['maxlength' => true])
?>

<?=
$form->field($model, 'keywords_en', ['options' => ['class' => "col-sm-6"]])->textInput(['maxlength' => true])
?>

<div class="col-md-12 bg-primary "><h4><?= Yii::t('common', 'support_langues') ?></h4></div>
<?=
$form->field($model, 'langue_fr', ['options' => ['class' => "col-sm-2"]])->checkbox()
?>

<?=
$form->field($model, 'langue_en', ['options' => ['class' => "col-sm-2"]])->checkbox()
?>

<?=
$form->field($model, 'langue_autres', ['options' => ['class' => "col-sm-2"]])->checkbox()
?>
<div class="col-md-12 bg-primary "><h4><?= Yii::t('common', 'informations_societe') ?></h4></div>
<?=
$form->field($model, 'societe', ['options' => ['class' => "col-sm-6"]])->textInput(['maxlength' => true])
?>


<?=
$form->field($model, 'url_societe', ['options' => ['class' => "col-sm-6"]])->textInput(['maxlength' => true])
?>
<div class="col-md-12 bg-primary "><h4><?= Yii::t('common', 'informations_contact') ?></h4></div>
<?=
$form->field($model, 'contact_nom', ['options' => ['class' => "col-sm-6"]])->textInput(['maxlength' => true])
?>

<?=
$form->field($model, 'contact_prenom', ['options' => ['class' => "col-sm-6"]])->textInput(['maxlength' => true])
?>

<?=
$form->field($model, 'contact_login', ['options' => ['class' => "col-sm-6"]])->textInput(['maxlength' => true])
?>

<?=
$form->field($model, 'contact_password', ['options' => ['class' => "col-sm-6"]])->textInput(['maxlength' => true])
?>

<?=
$form->field($model, 'contact_email', ['options' => ['class' => "col-sm-6"]])->textInput(['maxlength' => true])
?>

<?=
$form->field($model, 'contact_phone', ['options' => ['class' => "col-sm-6"]])->textInput(['maxlength' => true])
?>



<div class="form-group col-sm-8">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

