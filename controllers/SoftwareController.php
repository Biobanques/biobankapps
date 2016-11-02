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
use app\models\TagSoftware;

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
                        'actions' => ['update', 'add-photo', 'delete-photo', 'add-logo', 'delete-logo','addreview'],
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
            $model->user_id = Yii::$app->user->id;
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
        } else {
            Yii::$app->session->setFlash('warning', 'Update not allowed');
            return $this->redirect(['software/admin']);
        }
    }
    
     /**
     * Add a review
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionAddreview($id) {
        $mreview = null;
        $saved=false;
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
                    $saved=true;
                } else {
                    //message error
                }
            } else {
                $mreview->user_id = null;
            }
        }

        if ($saved) {
            return $this->redirect(['view', 'id' => $id]);
        } else {
            return $this->render('create_review', [
                'model' => $mreview,
            ]);
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
                    Yii::$app->session->setFlash('danger', 'The picture has not been saved.');
                } return $this->redirect(array('update', 'id' => $model->id));
            }
        }
        return $this->render('add_software_picture', array(
                    'model' => $fileForm,
        ));
    }

    /**
     * delete a picture.
     * @param get param i = picture id
     * @return type
     */
    public function actionDeletePhoto($id) {
        if (isset($_GET['i'])) {
            $idpicture = $_GET['i'];
            if (isset(Yii::$app->user->id)) {
                //get the software id
                $model = $this->findModel($id);
                //reconstruct the name of the attribute
                $name = "screenshot_" . $idpicture;
                //suppression du fichier physique
                $pathfile = Yii::$app->basePath . BBAConstants::PATH_PHOTOS . $model->$name;
                if (file_exists($pathfile) && !is_dir($pathfile)) {
                    unlink($pathfile);
                } else {
                    // Yii::log("file inexist cannot delete:" . $pathfile, "error");
                }
                //set an empty value for the screenshot attribute
                $model->$name = null;
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'The picture has been deleted.');
                    return $this->render('update', ['model' => $model]);
                } else
                    Yii::$app->session->setFlash('danger', 'The picture has not been deleted.');
            }
        }else {
            Yii::$app->session->setFlash('danger', 'The picture has not been deleted.');
            // return $this->render('update', array(
            // 'model' => $model,
            //    ));
        }
    }

    /**
     * add a logo picture to the software
     * @param type $id
     * @return type
     */
    public function actionAddLogo($id) {
        $model = $this->findModel($id);
        $fileForm = new FileForm;
        if ($fileForm->load(Yii::$app->request->post()) && $fileForm->validate()) {
            $uploadedFile = UploadedFile::getInstance($fileForm, 'file');
            $suffix = $uploadedFile->extension;
            $name = "logo_" . $id . "." . $suffix;
            $model->logo = $name;
            if ($model->save()) {
                //copie du fichier dans le repo adapate
                $uploadedFile->saveAs(Yii::$app->basePath . BBAConstants::PATH_PHOTOS . $name);
                //redirection sur la vue
                 return $this->render('update', ['model' => $model]);
            }
        }
        return $this->render('add_software_logo', array(
                    'model' => $fileForm,
        ));
    }

    /**
     * delete logo
     * @param id = software id ( onlyone logo per software)
     */
    public function actionDeleteLogo($id) {
        if (isset(Yii::$app->user->id)) {
            $model = $this->findModel($id);
            //suppression du fichier physique
            $pathfile = Yii::$app->basePath . BBAConstants::PATH_PHOTOS . $model->logo;
            if (file_exists($pathfile) && !is_dir($pathfile)) {
                unlink($pathfile);
            }
            $model->logo = null;
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'The logo picture has been deleted with success.');
            }else{
                Yii::$app->session->setFlash('danger', 'The logo has not been deleted!');
            }
            return $this->render('update', ['model' => $model]);
        }
    }
}
