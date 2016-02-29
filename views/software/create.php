<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Software */

$this->title = 'Create Software';
$this->params['breadcrumbs'][] = ['label' => 'Softwares', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="software-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
