<?php

namespace app\controllers;

use Yii;
use app\models\Software;
use app\models\SofwareSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use app\models\Review;
use app\models\QuickAnalysis;

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
                        'actions' => ['softwares','index','view'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['update',],
                        'allow' => true,
                        'matchCallback' => function ($rule, $action) {
                    return Yii::$app->user->identity->isAdmin();
                }
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
    
        /**
     * Displays a single Software model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        //display review available if connected
        $mreview = null;
        if (!Yii::$app->user->isGuest) {
            $mreview = new Review();
            $mreview->software_id = $id;
            if (isset(Yii::$app->user->identity->id)) {
                $mreview->user_id = Yii::$app->user->identity->id;
                //get the review of the user if existing
                $mreviewOld = Review::find()->where(['user_id' => Yii::$app->user->identity->id, 'software_id' => $id])->one();
                if ($mreviewOld != null)
                    $mreview = $mreviewOld;
                $mreview->date_review = date("Y-m-d H:m:s");
                if ($mreview->load(Yii::$app->request->post()) && $mreview->save()) {
                    //message validation
                } else {
                    //message error
                }
            } else {
                $mreview->user_id = null;
            }
        }
        //quick analysis
        $quickanalysis = QuickAnalysis::find()->where(['software_id' => $id])->orderBy('id')->all();

        return $this->render('view', [
                    'model' => $this->findModel($id), 'mreview' => $mreview, 'quickanalysis' => $quickanalysis
        ]);
    }
    
        /**
     * Updates an existing Software model.
     * If update is successful, the browser will be redirected to the 'view' page.
         * This action is only available for admin user here, and software editor in the common part of teh application
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
            if ($model->load(Yii::$app->request->post()) ) {
                $tags=$model->tags;
                $model->save();
                $model->saveTags($tags);
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                            'model' => $model,
                ]);
            }
        
    }

        /**
     * Finds the Software model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Software the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Software::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}