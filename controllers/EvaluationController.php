<?php

namespace app\controllers;

use Yii;
use app\models\Evaluation;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\Criterion;
use app\models\EvaluationCriterion;

/**
 * EvaluationController implements the CRUD actions for Evaluation model.
 */
class EvaluationController extends Controller {

    public $layout = 'administration';

    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Evaluation models.
     * @return mixed
     */
    public function actionIndex() {
        $dataProvider = new ActiveDataProvider([
            'query' => Evaluation::find(),
        ]);

        return $this->render('index', [
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Evaluation model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id) {
        return $this->render('view', [
                    'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Evaluation model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        //Yii::trace('here');
        $model = new Evaluation();
        $model->author_id = 1;
        $model->date_evaluation = date("Y-m-d H:m:s");
        if (!$model->save()) {
            // validation failed: $errors is an array containing error messages
            Yii::error("error saving model:" . print_r($model->errors), __METHOD__);
        }
        //create EvaluationCriterion with criterion
        $criteria = Criterion::find()->all();
        foreach ($criteria as $criterion) {
            $evalCriterion = new EvaluationCriterion();
            $evalCriterion->evaluation_id = $model->id;
            $evalCriterion->criterion_id = $criterion->id;
            $evalCriterion->name = $criterion->name;
            $evalCriterion->question = $criterion->question;
            $evalCriterion->weight = $criterion->weight;
            if (!$evalCriterion->save()) {
                // validation failed: $errors is an array containing error messages
                Yii::error("error saving model:" . print_r($evalCriterion->errors), __METHOD__);
            }
        }

        //$evaluationCriteria = array();
        try {
            $evaluationCriteria = EvaluationCriterion::find()->where(['evaluation_id' => $model->id])
                    ->orderBy('id')
                    ->all();
        } catch (Exception $ex) {
            Yii::error("error findall:" . $ex, __METHOD__);
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {

            return $this->render('create', [
                        'model' => $model, 'evaluationCriteria' => $evaluationCriteria
            ]);
        }
    }

    /**
     * Updates an existing Evaluation model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Evaluation model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Evaluation model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Evaluation the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id) {
        if (($model = Evaluation::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
