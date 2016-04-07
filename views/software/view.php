<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\BBAConstants;

$this->registerJs("$(document).ready(function() {
$('.carousel').carousel();
});");
/* @var $this yii\web\View */
/* @var $model app\models\Software */

$this->title = "$model->company - $model->name";
?>
<div class="software-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        echo Html::tag('p', Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary', 'style' => 'margin:5px;']) .
                Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'style' => 'margin:5px;',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ]
                ])
                ,
//                $model->id != Yii::$app->user->id ? [] : ['style' => 'display:none']);
                $model->id == Yii::$app->user->id ? [] : ['style' => 'display:none']);
        ?>
    </p>
    <p>
        <?= Html::img($model->getLogoPicture(), ['class' => "img-responsive", "width" => "150", "height" => "150"]); ?>
    </p><?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            //  'id',
            'name',
            'company',
            'url_company:url',
            'url_software:url',
            'license',
            ['label' => 'price',
                'type' => 'html',
                'value' => $model->price . '€ '],
            //'logo',
            'description',
            'keywords',
            ['label' => 'Contact',
                'type' => 'html',
                'value' => $model->contact_name . ' ' . $model->contact_firstname,],
            'contact_email:email',
            'contact_phone',
            ['label' => 'language_en',
                'type' => 'html',
                'value' => BBAConstants::getYesNo($model->language_en),]
            ,
            ['label' => 'language_others',
                'type' => 'html',
                'value' => BBAConstants::getYesNo($model->language_others),]
        ],
    ])
    ?>
    <?= \yii\bootstrap\Carousel::widget(['items' => $model->getListPictures(), 'options' => ['style' => 'width:750px']]);
    ?>
    <!-- display evaluations -->
    <h3>Evaluations</h3>
    <?php
    $evaluations = $model->evaluations;
    if ($evaluations != null) {
        //display the evaluations
        foreach ($evaluations as $evaluation) {
            ?>

            <?=
            DetailView::widget([
                'model' => $evaluation,
                'attributes' => [
                    'user.name',
                    'software_version',
                    'date_evaluation',
                    'grade',
                ],
            ])
            ?>
            <table id="deail-view" class="table table-striped table-bordered detail-view">
                <tbody>
                    <tr><th>Domain</th><th>Question</th><th>Score</th></tr>
                    <?php
                    $evaluationCriteria= $evaluation->evaluationcriteria;
                    //display criteria and answers
                    if ($evaluationCriteria != null && is_array($evaluationCriteria)) {
                        $values = array(1, 2, 3, 4);
                        //for each criterion display an input
                        foreach ($evaluationCriteria as $i => $evalCriterion) {
                            echo "<tr><th>" . $evalCriterion->name . "</th><th>" . $evalCriterion->question . "</th>";
                            echo "<td>" . $evalCriterion->score . "</td>";
                            echo "</tr>";
                        }
                    }
                    ?>
                </tbody>
            </table>
            <?php
        }
    }else{
        ?>
    <h4>No evaluation available</h4>
    <?php
    }
    ?>
</div>
