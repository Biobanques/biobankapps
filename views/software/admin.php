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
?>
<div class="software-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <div class="panel panel-info">
        <div class="panel-heading">
            <h3 class="panel-title">About this page</h3>
        </div>
        <div class="panel-body">
            This software list is managed by BBMRI members. <br>
            Software providers can add their own softwares, if they are related to the biobanking activies.
            Biobankers can add softwares they know if it's missing.<br>
            To add a software, you only need an account, it's free.<br>

            <li><b>Users reviews</b><br>
                Users reviews are provided by public users. If you want to add a review, you only need an account.<br>
            <li><b>Expert User Quick Analysis</b><br>
                Expert User Quick Analysis are provided by BBMRI expert members. If you are in the BBMRI network, and you have a good experience of a software, you can ask to have an account with rights on analysis.
                Quick Analysis is an analysis with predefined questions. You need to know well the software before to fill in the questionnaire.<br>
            <li><b>Expert User Detailed Analysis</b><br>
                Expert User Detailed Analysis are provided by BBMRI expert members. If you are in the BBMRI network, and you have a good experience of a software, you can ask to have an account with rights on analysis.
                Detailed Analysis is an analysis with deep questions on the software. You need to use really the software before to fill in this questionnaire. Only real users with experience on the software can fill a report.
                Informations on detailed analysis are only available to a BBMRI-Member.
            <li><b>Bibbox Integration</b><br>
                A software can be integrated to the bibbox project if its' compliant to the guidelines of the Bibbox Framework. If a software is integrated, we provide the link to the bibbox page and you can find here a tick indicating that the software is integrated into the bibbox project. Please refer to the bibbox page for more informations : <a href="http://bibbox.org">bibbox.org</a>.

        </div>
    </div>



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
        'columns' => [
                ['attribute' => 'logo',
                'format' => 'html',
                'value' => function ($data) {
                    return "<a href=\"/software/view?id=" . $data->id . "\">" . Html::img($data->getLogoPicture() . "</a>", ['class' => "img-responsive", "width" => "60", "height" => "60"]);
                }],
                ['attribute' => 'name',
                'format' => 'html',
                'value' => function ($data) {
                    return "<a href=\"/software/view?id=" . $data->id . "\">" . $data->name . "</a>";
                }],
                ['attribute' => 'Company',
                'format' => 'html',
                'value' => function($data) {
                    return strlen($data->company) > 20 ? substr($data->company, 0, 20) . "..." : $data->company;
                }
            ],
                ['attribute' => 'Users Reviews', 'format' => 'html', 'value' => function ($data) {
                    return $data->hasReviews() ? Html::tag('span', "", ['class' => 'glyphicon glyphicon-ok']) . " " . $data->getCountReviews() . " reviews" : "";
                }],
                ['attribute' => 'Expert user quick analysis', 'format' => 'html', 'value' => function ($data) {
                    return $data->hasQuickAnalysis() ? Html::tag('span', "", ['class' => 'glyphicon glyphicon-ok']) . " " . $data->getCountQuickAnalysis() . " quick analysis" : "";
                }],
                ['attribute' => 'Expert user detailed analysis', 'format' => 'html', 'value' => function ($data) {
                    return $data->hasDetailedAnalysis() ? Html::tag('span', "", ['class' => 'glyphicon glyphicon-ok']) . " " . $data->getCountDetailedAnalysis() . " detailed analysis" : "";
                }],
                ['attribute' => 'Bibbox Integration', 'format' => 'html', 'value' => function ($data) {
                    return $data->isIntegratedIntoBibbox() ? Html::tag('span', "", ['class' => 'glyphicon glyphicon-ok']) : "";
                }],
                ['attribute' => 'evaluation',
                'format' => 'html',
                'visible' => !Yii::$app->user->isGuest && Yii::$app->user->identity->isBBMRIMember(),
                'value' => function ($data) {
                    return $data->getEvaluation() == 'not available' && !Yii::$app->user->isGuest && Yii::$app->user->identity->isBBMRIMember() ? Html::a('Create<br>Evaluation', ['evaluation/create', 'id' => $data->id], ['class' => 'btn btn-success']) : $data->getEvaluation();
                }],
            'url_company:url',
            'url_software:url',
                ['class' => 'yii\grid\ActionColumn', 'template' => ' {view} {update}', 'buttons' => [
                    'update' => function ($url, $data) {
                        return Html::a(
                                        '<span class="glyphicon glyphicon-pencil"></span>', $url, [
                                    'title' => 'Update',
                                    'data-pjax' => '0',
                                    'style' => $data->user_id != Yii::$app->user->id ? 'display:none' : ''
                                        ]
                        );
                    },
                ]],
        ],
    ]);
    ?>
    <?php \yii\widgets\Pjax::end(); ?>
</div>
