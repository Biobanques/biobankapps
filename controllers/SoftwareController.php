<?php

namespace app\controllers;

use Yii;
use app\models\Software;
use app\models\SofwareSearch;
use app\models\Review;
use app\models\QuickAnalysis;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\FileForm;
//use app\extensions\uploadedImage\EUploadedImage;
use yii\web\UploadedFile;
use app\components\BBAConstants;
use yii\filters\AccessControl;

/**
 * SoftwareController implements the CRUD actions for Software model.
 */
class SoftwareController extends Controller {

    public function behaviors() {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index', 'view', 'admin', 'create'],
                        'allow' => true,
                    ],
                    [
                        'actions' => ['update', 'add-photo', 'delete-photo', 'add-logo', 'delete-logo'],
                        'allow' => true,
                        'roles' => ['@'],
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

    /**
     * Lists all Software models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SofwareSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    public function actionAdmin() {
        $searchModel = new SofwareSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('admin', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
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
     * Creates a new Software model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        //if not logged, redirect to a explicit page
        if (Yii::$app->user->isGuest) {
            return $this->render('account_needed');
        } else {
            $model = new Software();

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                Yii::$app->session->setFlash('success', 'Your software is recorded, you can now add logo and screenshots from the update view.');
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('create', [
                            'model' => $model,
                ]);
            }
        }
    }

    /**
     * Updates an existing Software model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id) {
        $model = $this->findModel($id);
        if ($model->user_id == Yii::$app->user->id) {
            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view', 'id' => $model->id]);
            } else {
                return $this->render('update', [
                            'model' => $model,
                ]);
            }
        } else {
            Yii::$app->session->setFlash('warning', 'Update not allowed');
            return $this->redirect(['software/admin']);
        }
    }

    /**
     * Deletes an existing Software model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id) {
        $this->findModel($id)->delete();

        return $this->redirect(['admin']);
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

    public function actionAddPhoto($id) {
        $model = $this->findModel($id);
        $fileForm = new FileForm;
        if ($fileForm->load(Yii::$app->request->post())) {
            if ($fileForm->validate()) {
                $uploadedFile = UploadedFile::getInstance($fileForm, 'file');
//                $uploadedFile->maxWidth = 800;
//                $uploadedFile->maxHeight = 600;
//                $uploadedFile->thumb = array(
//                    'maxWidth' => 100,
//                    'maxHeight' => 100,
//                    'dir' => 'tn',
//                    'prefix' => '',
//                );
                //selon les valeurs dans le model, renommage du nom en id+x.suffix
                $prefix = "sc_";
                $name = $id . "_1";
                $suffix = $uploadedFile->extension;
                if ($model->screenshot_1 != null) {
                    $name = $id . "_2";
                    if ($model->screenshot_2 != null) {
                        $name = $id . "_3";
                        if ($model->screenshot_3 != null) {
                            $name = $id . "_4";
                            if ($model->screenshot_4 != null) {
                                $name = $id . "_5";
                                $model->screenshot_5 = $prefix . $name . "." . $suffix;
                            } else {
                                $model->screenshot_4 = $prefix . $name . "." . $suffix;
                            }
                        } else {
                            $model->screenshot_3 = $prefix . $name . "." . $suffix;
                        }
                    } else {
                        $model->screenshot_2 = $prefix . $name . "." . $suffix;
                    }
                } else {
                    $model->screenshot_1 = $prefix . $name . "." . $suffix;
                }
            }
            if ($model->save()) {

                //copie du fichier dans le repo adapate
                if ($uploadedFile->saveAs(Yii::$app->basePath . BBAConstants::PATH_PHOTOS . $prefix . $name . "." . $suffix)) {
                    Yii::$app->session->setFlash('success', 'The picture has been saved.');
                    return $this->redirect(array('update', 'id' => $model->id));
                } else {
                    Yii::$app->session->setFlash('error', 'The picture has not been saved.');
                } return $this->redirect(array('update', 'id' => $model->id));
            }
        }
        return $this->render('add_software_picture', array(
                    'model' => $fileForm,
        ));
    }

    public function actionDeletePhoto() {
        if (isset($_GET['i'])) {
            $i = $_GET['i'];

            if (isset(Yii::$app->user->id)) {
                $model = $this->findModel(Yii::$app->user->id);
                $name = "screenshot_" . $i;
                //suppression du fichier physique
                $pathfile = Yii::$app->basePath . BBAConstants::PATH_PHOTOS . $model->$name;
                if (file_exists($pathfile) && !is_dir($pathfile)) {
                    unlink($pathfile);
                } else {
                    // Yii::log("file inexist cannot delete:" . $pathfile, "error");
                }

                $model->$name = null;
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'The picture has been deleted.');

                    return $this->render('update', ['model' => $model]);
                } else
                    Yii::$app->session->setFlash('error', 'The picture has not been deleted.');
            }
        }else {
            Yii::$app->session->setFlash('error', 'The picture has not been deleted.');
            // return $this->render('update', array(
            // 'model' => $model,
            //    ));
        }
    }

    public function actionAddLogo($id) {
        $model = $this->findModel($id);
        $fichierForm = new FichierForm;
        if ($fichierForm->load(Yii::$app->request->post()) && $fichierForm->validate()) {

            $uploadedFile = UploadedFile::getInstance($fichierForm, 'fichier');
            $suffix = $uploadedFile->extension;
            $name = "logo_" . $id . "." . $suffix;
            $model->logo = $name;
            if ($model->save()) {
                //copie du fichier dans le repo adapate
                $uploadedFile->saveAs(Yii::$app->basePath . BBAConstants::PATH_PHOTOS . $name);
                //redirection sur la vue
                return $this->redirect(array('update', 'model' => $model));
            }
        }
        return $this->render('add_software_logo', array(
                    'model' => $fichierForm,
        ));
    }

    /**
     */
    public function actionDeleteLogo() {
        if (isset(Yii::$app->user->id)) {
            $model = $this->findModel(Yii::$app->user->id);
            //suppression du fichier physique
            $pathfile = Yii::$app->basePath . BBAConstants::PATH_PHOTOS . $model->logo;
            if (file_exists($pathfile) && !is_dir($pathfile)) {
                unlink($pathfile);
            }
//            else {
//                Yii::$app->log->("file inexists, cannot delete:" . $pathfile, "error");
//            }
            $model->logo = null;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'The logo picture has been deleted with success.');
            }
            return $this->render('update', ['model' => $model]);
        }
    }

//    public function actionTest() {
//        return $this->render('view', ['id' => 15]);
//    }
}
