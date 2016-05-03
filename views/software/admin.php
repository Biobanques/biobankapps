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
        Html::a('<span class="glyphicon glyphicon-print"></span> ' . Yii::t('common', 'list_printable_softwares'), ['software/index'], ['class' => 'btn btn-success btn-lg']) .
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
                    'name',
                    'company',
                    ['attribute' => 'evaluation',
                        'format' => 'html',
                        'visible'=>Yii::$app->user->identity->isBBMRIMember,
                        'value' => function ($data) {
                            return $data->getEvaluation() == 'not available' && Yii::$app->user->identity->isBBMRIMember ? Html::a('Create<br>Evaluation', ['evaluation/create', 'id' => $data->id], ['class' => 'btn btn-success']) : $data->getEvaluation();
                        }],
                            'url_company:url',
                            'url_software:url',
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
