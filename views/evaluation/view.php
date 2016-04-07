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
        <?=
        Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ])
        ?>
    </p>

    <?=
    DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'software_id',
            'software.name',
            'software_version',
            'user_id',
            'date_evaluation',
            'grade',
        ],
    ])
    ?>
    <table id="deail-view" class="table table-striped table-bordered detail-view">
        <tbody>
            <tr><th>Domain</th><th>Question</th><th>Score</th></tr>
            <?php
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
</div>
