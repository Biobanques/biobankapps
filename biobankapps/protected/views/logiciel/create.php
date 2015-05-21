<?php
/* @var $this LogicielController */
/* @var $model Logiciel */

$this->breadcrumbs=array(
	'Logiciels'=>array('admin'),
	'Create',
);
?>

<h1><?php echo Yii::t('common','add_software');  ?></h1>
<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>