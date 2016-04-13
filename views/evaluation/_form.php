<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\User;
use app\models\Software;
use kartik\rating\StarRating;
use yii\web\JsExpression;

/* @var $this yii\web\View */
/* @var $model app\models\Evaluation */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="evaluation-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'user_id')->dropDownList(ArrayHelper::map(User::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'software_id')->dropDownList(ArrayHelper::map(Software::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'software_version')->textInput() ?>

    <p> Date into mysql format </p>
    <?= $form->field($model, 'date_evaluation')->textInput() ?>

    <table id="deail-view" class="table table-striped table-bordered detail-view">
        <tbody>
            <tr><th>Domain</th><th>Question</th><th>Score</th></tr>
            <?php
            if ($criteria != null && is_array($criteria)) {
                $values = array(1 => 1, 2 => 2, 3 => 3, 4 => 4);
                //for each criterion display an input
                foreach ($criteria as $i => $criterion) {
                    echo "<th>" . $criterion->name . "</th><th>" . $criterion->question . "</th>";
                    //   echo "<td>" . $form->field($criterion, "[$i]score")->dropDownList($values)->label(false);
                    echo "<td>" . $form->field($criterion, "[$i]score")->widget(StarRating::classname(), [
                        'name' => 'rating_21',
                        'pluginOptions' => [
                            'animate' => false,
                            'stars' => 4,
                            'min' => 0,
                            'max' => 4,
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
                    ])->label(false) . "</td></tr>";

                    echo $form->field($criterion, "[$i]id")->hiddenInput()->label(false) . "</td></tr>";
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
