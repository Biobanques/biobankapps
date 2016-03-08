<?php

use yii\helpers\Html;
use yii\widgets\ListView;
use yii\widgets\DetailView;
use app\components\BBAConstants;

$this->registerCss("th { width:15%; }");
/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Softwares';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="software-index">

    <h1><?= Html::encode($this->title) ?></h1>

<!--    <p>
    <?php //        echo Html::a('Create Software', ['create'], ['class' => 'btn btn-success'])  ?>
    </p>-->
    <?php $dataProvider->setPagination(FALSE);
    ?>
    <?=
    ListView::widget([
        'dataProvider' => $dataProvider,
        'itemOptions' => ['class' => 'row borders'],
        'itemView' => function ($model) {
    return DetailView::widget([
                'model' => $model,
                'attributes' => [
                    'name',
                    'company',
                    'url_company:url',
                    'url_software:url',
                    'license',
                    ['label' => 'price',
                        'type' => 'html',
                        'value' => $model->price . '€ '],
                ]
    ]);
},
    ])
    ?>

</div>
