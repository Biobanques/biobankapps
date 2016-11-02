<?php

use yii\helpers\Html;
/* diffrenence with add review because this one youwill choose the softwrae inside the form */

/* @var $this yii\web\View */
/* @var $model app\models\Review */

$this->title = 'Write Review';
?>
<div class="review-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form_write_review', [
        'model' => $model,
    ]) ?>

</div>
