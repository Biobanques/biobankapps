<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Criterion */

$this->title = 'Create Criterion';
$this->params['breadcrumbs'][] = ['label' => 'Criterions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="criterion-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
