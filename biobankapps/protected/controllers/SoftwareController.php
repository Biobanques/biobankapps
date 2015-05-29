<?php

/**
 * class to manage software. Extends the main controller to add lang support.
 */
class SoftwareController extends BSFController {

    /**
     * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
     * using two-column layout. See 'protected/views/layouts/column2.php'.
     */
    public $layout = '//layouts/column2';

    /**
     * @return array action filters
     */
    public function filters() {
        return array(
            'accessControl', // perform access control for CRUD operations
            'postOnly + delete', // we only allow deletion via POST request
        );
    }

    /**
     * Specifies the access control rules.
     * This method is used by the 'accessControl' filter.
     * @return array access control rules
     */
    public function accessRules() {
        return array(
            array('allow', // allow all users to perform 'index' and 'view' actions
                'actions' => array('index', 'view', 'admin', 'create'),
                'users' => array('*'),
            ),
            array('allow', // allow authenticated user to perform 'create' and 'update' actions
                'actions' => array('update', 'addPhoto', 'deletePhoto', 'addLogo', 'deleteLogo'),
                'users' => array('@'),
            ),
            array('allow', // allow admin user to perform 'admin' and 'delete' actions
                'actions' => array('delete'),
                'users' => array('admin'),
            ),
            array('deny', // deny all users
                'users' => array('*'),
            ),
        );
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionView($id) {
        $this->render('view', array(
            'model' => $this->loadModel($id),
        ));
    }

    /**
     * Creates a new model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     */
    public function actionCreate() {
        $model = new Software;
        if (isset($_POST['Software'])) {
            $model->attributes = $_POST['Software'];
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Your software file has been added with sucess.');
                $this->redirect(array('view', 'id' => $model->id));
            }
        }

        $this->render('create', array(
            'model' => $model,
        ));
    }

    /**
     * Updates a particular model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id the ID of the model to be updated
     */
    public function actionUpdate($id) {
        $model = $this->loadModel($id);
        if (isset($_POST['Software'])) {
            $model->attributes = $_POST['Software'];
            if ($model->save())
                $this->redirect(array('view', 'id' => $model->id));
        }

        $this->render('update', array(
            'model' => $model,
        ));
    }

    /**
     * Deletes a particular model.
     * If deletion is successful, the browser will be redirected to the 'admin' page.
     * @param integer $id the ID of the model to be deleted
     */
    public function actionDelete($id) {
        $this->loadModel($id)->delete();

        // if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
        if (!isset($_GET['ajax']))
            $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
    }

    /**
     * Lists all models.
     */
    public function actionIndex() {
        $dataProvider = new CActiveDataProvider('Software');
        $this->render('index', array(
            'dataProvider' => $dataProvider,
        ));
    }

    /**
     * Manages all models.
     */
    public function actionAdmin() {
        $model = new Software('search');
        $model->unsetAttributes();  // clear any default values
        if (isset($_GET['Software']))
            $model->attributes = $_GET['Software'];
        $this->render('admin', array(
            'model' => $model,
        ));
       
    }

    /**
     * ajout de photo a un logiciel.
     * @param unknown $id = idlogiciel
     */
    public function actionAddPhoto($id) {
        $model = $this->loadModel($id);
        $fichierForm = new FichierForm;
        if (isset($_POST['FichierForm'])) {
            $fichierForm->attributes = $_POST['FichierForm'];
            $uploadedFile = CUploadedFile::getInstance($fichierForm, 'fichier');
            //selon les valeurs dans le model, renommage du nom en id+x.suffix
            $prefix = "sc_";
            $name = $id . "_1";
            $suffix = $uploadedFile->extensionName;
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

            if ($model->save()) {
                //copie du fichier dans le repo adapate
                $uploadedFile->saveAs(Yii::app()->basePath . BBAConstants::PATH_PHOTOS . $prefix . $name . "." . $suffix);
                //redirection sur la vue
                $this->redirect(array('view', 'id' => $model->id));
            }
        }
        $this->render('ajouter_photo_logiciel', array(
            'model' => $fichierForm,
        ));
    }

    public function actionDeletePhoto($i) {
        if (isset(Yii::app()->user->id)) {
            $model = $this->loadModel(Yii::app()->user->id);
            $name = "screenshot_" . $i;
            //suppression du fichier physique
            $pathfile = Yii::app()->basePath . BBAConstants::PATH_PHOTOS . $model->$name;
            if (file_exists($pathfile)) {
                unlink($pathfile);
            } else {
                Yii::log("file inexist cannot delete:" . $pathfile, "error");
            }

            $model->$name = null;
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'L\'image a été supprimée avec succès.');
            }
            $this->redirect(array('view', 'id' => $model->id));
        }
    }

    /**
     * ajout de logo a un logiciel.
     * @param unknown $id = idlogiciel
     */
    public function actionAddLogo($id) {
        $model = $this->loadModel($id);
        $fichierForm = new FichierForm;
        if (isset($_POST['FichierForm'])) {
            $fichierForm->attributes = $_POST['FichierForm'];
            $uploadedFile = CUploadedFile::getInstance($fichierForm, 'fichier');
            $suffix = $uploadedFile->extensionName;
            $name = "logo_" . $id . "." . $suffix;
            $model->logo = $name;
            if ($model->save()) {
                //copie du fichier dans le repo adapate
                $uploadedFile->saveAs(Yii::app()->basePath . BBAConstants::PATH_PHOTOS . $name);
                //redirection sur la vue
                $this->redirect(array('view', 'id' => $model->id));
            }
        }
        $this->render('ajouter_logo_logiciel', array(
            'model' => $fichierForm,
        ));
    }

    /**
     */
    public function actionDeleteLogo() {
        if (isset(Yii::app()->user->id)) {
            $model = $this->loadModel(Yii::app()->user->id);
            //suppression du fichier physique
            $pathfile = Yii::app()->basePath . BBAConstants::PATH_PHOTOS . $model->logo;
            if (file_exists($pathfile)) {
                unlink($pathfile);
            } else {
                Yii::log("file inesits cannot delete:" . $pathfile, "error");
            }
            $model->logo = null;
            if ($model->save()) {
                Yii::app()->user->setFlash('success', 'Le logo a été supprimée avec succès.');
            }
            $this->redirect(array('view', 'id' => $model->id));
        }
    }

    /**
     * Returns the data model based on the primary key given in the GET variable.
     * If the data model is not found, an HTTP exception will be raised.
     * @param integer $id the ID of the model to be loaded
     * @return Logiciel the loaded model
     * @throws CHttpException
     */
    public function loadModel($id) {
        $model = Software::model()->findByPk($id);
        if ($model === null)
            throw new CHttpException(404, 'The requested page does not exist.');
        return $model;
    }

    /**
     * Performs the AJAX validation.
     * @param Logiciel $model the model to be validated
     */
    protected function performAjaxValidation($model) {
        if (isset($_POST['ajax']) && $_POST['ajax'] === 'software-form') {
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
    }

}
