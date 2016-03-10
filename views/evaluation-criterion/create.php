<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\EvaluationCriterion */

$this->title = 'Create Evaluation Criterion';
$this->params['breadcrumbs'][] = ['label' => 'Evaluation Criterions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evaluation-criterion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
