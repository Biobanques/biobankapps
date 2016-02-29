<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\BBAConstants;

$this->registerJs("$(document).ready(function() {
$('.carousel').carousel();
});");
/* @var $this yii\web\View */
/* @var $model app\models\Software */

$this->title = "$model->societe - $model->nom";
//$this->params['breadcrumbs'][] = ['label' => 'Softwares', 'url' => ['index']];
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="software-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?php
        echo Html::tag('p', Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary', 'style' => 'margin:5px;']) .
                Html::a('Delete', ['delete', 'id' => $model->id], [
                    'class' => 'btn btn-danger',
                    'style' => 'margin:5px;',
                    'data' => [
                        'confirm' => 'Are you sure you want to delete this item?',
                        'method' => 'post',
                    ]
                ])
                ,
//                $model->id != Yii::$app->user->id ? [] : ['style' => 'display:none']);
                $model->id == Yii::$app->user->id ? [] : ['style' => 'display:none']);
        ?>
    </p>
    <p>
        <?= Html::img($model->getLogoPicture(), ['class' => "img-responsive", "width" => "150", "height" => "150"]); ?>
    </p><?=
    DetailView::widget([
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
                'value' => $model->prix . '€ '],
            //'logo',
            'descriptif_en',
            'keywords_en',
            ['label' => 'Contact',
                'type' => 'html',
                'value' => $model->contact_nom . ' ' . $model->contact_prenom,],
            'contact_email:email',
            'contact_phone',
            ['label' => 'langue_en',
                'type' => 'html',
                'value' => BBAConstants::getYesNo($model->langue_en),]
            ,
            ['label' => 'langue_fr',
                'type' => 'html',
                'value' => BBAConstants::getYesNo($model->langue_fr),]
            ,
            ['label' => 'langue_autres',
                'type' => 'html',
                'value' => BBAConstants::getYesNo($model->langue_autres),]
        ],
    ])
    ?>
    <?= \yii\bootstrap\Carousel::widget(['items' => $model->getListPictures(), 'options' => ['style' => 'width:750px']]);
    ?>
</div>
