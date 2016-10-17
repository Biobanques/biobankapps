<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Tag;

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


    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'company') ?>


    <?php echo $form->field($model, 'license') ?>


    <?php echo $form->field($model, 'global_keywords') ?>
    
    <div class="col-md-12 bg-primary "><h4>Tags</h4></div>
<div class="col-md-12 row" > 
    <p>Tags are used to classify the software with their usage domains. Each software can contain multiple tags. </p>
    <?php
    $tags = Tag::find()->all();
    $tagsArray = [];
    foreach ($tags as $tag) {
        $tagArray[$tag->id] = $tag->name;
    }
    echo $form->field($model, 'tags')->checkboxList($tagArray);
    ?>
</div>


    <div class="form-group" >
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>
    <?php yii\widgets\Pjax::end() ?>

</div>
