<?php
use yii\helpers\Html;
use yii\grid\GridView;

$this->registerJs(
        '$("document").ready(function(){
        $("#search-form").on("pjax:end", function() {
            $.pjax.reload({container:"#gridData"});  //Reload GridView
        });
    });
    $(".search-button").click(function(){
	$(".software-search").toggle();
	return false;
});'
);


/* @var $this yii\web\View */
/* @var $searchModel app\models\SofwareSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Softwares';
//$this->params['breadcrumbs'][] = $this->title;
?>
<div class="software-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
        <?=
        Html::a('<span class="glyphicon glyphicon-search"></span> ' . Yii::t('common', 'advanced_search'), '#', ['class' => 'btn btn-primary btn-lg search-button']) .
        '';
//
        ?>
        <?=
        Html::a('<span class="glyphicon glyphicon-print"></span> ' . Yii::t('common', 'list_printable_logiciels'), ['software/index'], ['class' => 'btn btn-success btn-lg']) .
        '';
        ?>
    </p>


    <?php echo $this->render('_search', ['model' => $searchModel]); ?>




    <?php
    \yii\widgets\Pjax::begin(['id' => 'gridData']);
    ?>

    <?=
    GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            //    ['class' => 'yii\grid\SerialColumn'],
            //  'id',
            ['attribute' => 'logo',
                'format' => 'html',
                'value' => function ($data) {
                    return Html::img($data->getLogoPicture(), ['class' => "img-responsive", "width" => "60", "height" => "60"]);
                    // return $data->getLogoPicture();
                }],
                    'nom',
                    'societe',
                    'url_societe:url',
                    'url_logiciel:url',
                    // 'licence',
                    // 'prix',
                    // 'descriptif_fr',
                    // 'descriptif_en',
                    // 'screenshot_1',
                    // 'screenshot_2',
                    // 'screenshot_3',
                    // 'screenshot_4',
                    // 'screenshot_5',
                    // 'keywords_fr',
                    // 'keywords_en',
                    // 'contact_nom',
                    // 'contact_prenom',
                    // 'contact_login',
                    // 'contact_password',
                    // 'contact_email:email',
                    // 'contact_phone',
                    // 'langue_fr',
                    // 'langue_en',
                    // 'langue_autres',
                    ['class' => 'yii\grid\ActionColumn', 'template' => ' {view} {update}', 'buttons' => [
                            'update' => function ($url, $data) {
                                return Html::a(
                                                '<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                            'title' => 'Update',
                                            'data-pjax' => '0',
                                            'style' => $data->id != Yii::$app->user->id ? 'display:none' : ''
                                                ]
                                );
                            },
                                ]],
                        ],
                    ]);
                    ?>
                    <?php \yii\widgets\Pjax::end(); ?>
</div>
