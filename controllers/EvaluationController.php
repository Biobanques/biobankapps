<?php

namespace app\controllers;

use Yii;
use yii\base\Model;
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
        $model = $this->findModel($id);
        $evaluationCriteria = EvaluationCriterion::find()->where(['evaluation_id' => $model->id])
                ->orderBy('id')
                ->all();
        return $this->render('view', [
                    'model' => $model, 'evaluationCriteria' => $evaluationCriteria
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
//get current criteria
        $criteria = Criterion::find()->all();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $crits = [];
            $crits[] = new Criterion();
            if (Model::loadMultiple($crits, Yii::$app->request->post())) {
                $criterions = Yii::$app->request->post('Criterion');
                foreach ($criterions as $i => $crit) {
                    $id = $crit['id'];
                    $score = $crit['score'];
                    echo $id . "=>" . $score;
                    if ($score != null && $id != null) {
                        $criterion = Criterion::findOne($id);
                        $evalCriterion = new EvaluationCriterion();
                        $evalCriterion->evaluation_id = $model->id;
                        $evalCriterion->criterion_id = $id;
                        $evalCriterion->name = $criterion->name;
                        $evalCriterion->question = $criterion->question;
                        $evalCriterion->weight = $criterion->weight;
                        $evalCriterion->score=$score;
                        if (!$evalCriterion->save()) {
                            Yii::error("error saving model:" . print_r($evalCriterion->errors), __METHOD__);
                        }
                    } else {
                        Yii::error("error null value for criterion id:" . $criterion->id, __METHOD__);
                    }
                }
                $evaluationCriteria = EvaluationCriterion::find()->where(['evaluation_id' => $model->id])
                        ->orderBy('id')
                        ->all();
                return $this->redirect(['view', 'id' => $model->id, 'evaluationCriteria' => $evaluationCriteria]);
            }
        } else {
            $model->author_id = 1;
            $model->date_evaluation = date("Y-m-d H:m:s");
            return $this->render('create', [
                        'model' => $model, 'criteria' => $criteria
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
            return $this->redirect(['view', 'id' => $model->id, 'evaluationCriteria' => $evaluationCriteria]);
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
