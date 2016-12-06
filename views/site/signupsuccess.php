<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = 'User :' .$model->username;
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
    <div class="alert alert-success" role="alert"><strong>Congratulations!</strong> Your account is registered.
        You can now publish a software, review softwares and view some analysis.</div>
        
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'username',
            'email:email',
            'name',
            'firstname',
        ],
    ]) ?>

</div>


