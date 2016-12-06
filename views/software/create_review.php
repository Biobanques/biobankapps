<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Review */

$this->title = 'Create Review';
?>
<div class="review-create">

    <h1><?= Html::encode($this->title) ?> for the software : <?= $model->software->name?></h1>

    <?= $this->render('_form_review', [
        'model' => $model,
    ]) ?>

</div>
