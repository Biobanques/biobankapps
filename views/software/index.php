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
    <?php //        echo Html::a('Create Software', ['create'], ['class' => 'btn btn-success']) ?>
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
                    //  'id',
                    'nom',
                    'societe',
                    'url_societe:url',
                    'url_logiciel:url',
                    'licence',
                    ['label' => 'prix',
                        'type' => 'html',
                        'value' => $model->prix . '€ '], //'logo',
//                    'descriptif_en',
//                    'keywords_en',
//                    ['label' => 'Contact',
//                        'type' => 'html',
//                        'value' => $model->contact_nom . ' ' . $model->contact_prenom,],
//                    'contact_email:email',
//                    'contact_phone',
//                    ['label' => 'langue_en',
//                        'type' => 'html',
//                        'value' => BBAConstants::getYesNo($model->langue_en),]
//                    ,
//                    ['label' => 'langue_fr',
//                        'type' => 'html',
//                        'value' => BBAConstants::getYesNo($model->langue_fr),]
//                    ,
//                    ['label' => 'langue_autres',
//                        'type' => 'html',
//                        'value' => BBAConstants::getYesNo($model->langue_autres),]
                ]
    ]);
},
    ])
    ?>

</div>
