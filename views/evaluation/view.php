<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Evaluation */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Evaluations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evaluation-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'author_id',
            'date_evaluation',
            'grade',
        ],
    ]) ?>
    <?php
    //display criteria and answers
    if ($evaluationCriteria != null && is_array($evaluationCriteria)) {
       $values = array(1, 2, 3, 4);
        //for each criterion display an input
        foreach ($evaluationCriteria as $i => $evalCriterion) {
            echo "<div><div class=\"col-lg-4\"><b>".$evalCriterion->name.":".$evalCriterion->question."</b></div>";
            echo "<div class=\"col-lg-2\">score : ".$evalCriterion->score."</div>";
            echo "</div>";
        }
    }
    ?>

</div>
