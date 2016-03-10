<?php

namespace app\controllers;

use Yii;
use app\models\Software;
use app\models\SofwareSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\FichierForm;
//use app\extensions\uploadedImage\EUploadedImage;
use yii\web\UploadedFile;
use app\components\BBAConstants;
use yii\filters\AccessControl;

/**
 * AdministrationController .
 */
class AdministrationController extends Controller
{
   /**
    * set the layout for the left menu
    */
   public $layout = 'administration';
   

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['softwares','index'],
                        'allow' => true,
                        //'roles' => ['@'],
                    ],
                    
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    public function actionSoftwares() {
        $searchModel = new SofwareSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('softwares', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

        
    public function actionIndex() {
        return $this->render('index');
    }

}