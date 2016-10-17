<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\bootstrap\ActiveForm;
use app\models\User;
use app\models\Tag;

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

<?= $form->field($model, 'usage_rights', ['options' => ['class' => "col-sm-6"]])->dropDownList($model->usageRightsValues) ?>
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

<div class="col-md-12 bg-primary "><h4>Tags</h4></div>
<div class="col-md-12 row" > 
    <p>tick the tags compatible with the domain of this software</p>
    <?php
    $tags = Tag::find()->all();
    $tagsArray = [];
    foreach ($tags as $tag) {
        $tagArray[$tag->id] = $tag->name;
    }
    //checked tags
    $model->tags=$model->getTags();
    echo $form->field($model, 'tags')->inline(true)->checkboxList($tagArray);
    ?>
</div>

<div class="form-group col-sm-8">
<?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
</div>

<?php ActiveForm::end(); ?>

