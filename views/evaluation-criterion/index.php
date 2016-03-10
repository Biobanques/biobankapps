<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Evaluation Criterions';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="evaluation-criterion-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Evaluation Criterion', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'evaluation_id',
            'score',
            'criterion_id',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
