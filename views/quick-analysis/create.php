<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\QuickAnalysis */

$this->title = 'Create Quick Analysis';
$this->params['breadcrumbs'][] = ['label' => 'Quick Analyses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quick-analysis-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
