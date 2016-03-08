<?php
use yii\helpers\Html;
use yii\widgets\DetailView;
use app\components\BBAConstants;

$this->registerJs("$(document).ready(function() {
$('.carousel').carousel();
});");
/* @var $this yii\web\View */
/* @var $model app\models\Software */

$this->title = "$model->company - $model->name";
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
            'name',
            'company',
            'url_company:url',
            'url_software:url',
            'license',
            ['label' => 'price',
                'type' => 'html',
                'value' => $model->price . '€ '],
            //'logo',
            'description',
            'keywords',
            ['label' => 'Contact',
                'type' => 'html',
                'value' => $model->contact_name . ' ' . $model->contact_firstname,],
            'contact_email:email',
            'contact_phone',
            ['label' => 'language_en',
                'type' => 'html',
                'value' => BBAConstants::getYesNo($model->language_en),]
            ,
            ['label' => 'language_others',
                'type' => 'html',
                'value' => BBAConstants::getYesNo($model->language_others),]
        ],
    ])
    ?>
    <?= \yii\bootstrap\Carousel::widget(['items' => $model->getListPictures(), 'options' => ['style' => 'width:750px']]);
    ?>
</div>
