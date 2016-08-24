<?php
use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\User;

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
<?= $form->errorSummary($model); ?>
<div class="col-md-12 bg-primary "><h4><?= Yii::t('common', 'informations_software') ?></h4></div>
<?=
$form->field($model, 'name', ['options' => ['class' => "col-sm-6"]])->textInput(['maxlength' => true])
?>
<?=
$form->field($model, 'url_software', ['options' => ['class' => "col-sm-6"]])->textInput(['maxlength' => true])
?>
<?=
$form->field($model, 'license', ['options' => ['class' => "col-sm-6"]])->textInput(['maxlength' => true])
?>

<?=
$form->field($model, 'price', ['options' => ['class' => "col-sm-6"]])->textInput()
?>






<?=
$form->field($model, 'description', ['options' => ['class' => "col-sm-6"]])->textarea(['maxlength' => true])
?>

<?=
$form->field($model, 'keywords', ['options' => ['class' => "col-sm-6"]])->textInput(['maxlength' => true])
?>

<div class="col-md-12 bg-primary "><h4><?= Yii::t('common', 'support_languages') ?></h4></div>

<?=
$form->field($model, 'language_en', ['options' => ['class' => "col-sm-2"]])->checkbox()
?>

<?=
$form->field($model, 'language_others', ['options' => ['class' => "col-sm-2"]])->checkbox()
?>
<div class="col-md-12 bg-primary "><h4><?= Yii::t('common', 'informations_company') ?></h4></div>
<?=
$form->field($model, 'company', ['options' => ['class' => "col-sm-6"]])->textInput(['maxlength' => true])
?>


<?=
$form->field($model, 'url_company', ['options' => ['class' => "col-sm-6"]])->textInput(['maxlength' => true])
?>
<div class="col-md-12 bg-primary "><h4><?= Yii::t('common', 'informations_contact') ?></h4></div>

<?=
$form->field($model, 'contact_email', ['options' => ['class' => "col-sm-6"]])->textInput(['maxlength' => true])
?>

<?=
$form->field($model, 'contact_phone', ['options' => ['class' => "col-sm-6"]])->textInput(['maxlength' => true])
?>

<div class="col-md-12 bg-primary "><h4>User responsible of this software</h4></div>
<?php
$items = ArrayHelper::map(User::find()->all(), 'id', 'name');
echo $form->field($model, 'user_id')->dropDownList($items);
?>

<div class="form-group col-sm-8">
    <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

