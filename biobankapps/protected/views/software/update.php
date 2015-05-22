<?php
/* @var $this LogicielController */
/* @var $model Logiciel */

$this->breadcrumbs=array(
	'Logiciels'=>array('admin'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);
$this->menu=array(
		array('label'=>Yii::t('common','view_file_software'), 'url'=>array('view', 'id'=>$model->id)),
		array('label'=>Yii::t('common','add_screenshot'), 'url'=>array('addPhoto', 'id'=>$model->id,'visible'=>Yii::app()->user->id==$model->id)),
);
?>

<h1><?php echo Yii::t('common','update_software');  ?> <b><?php echo $model->nom; ?></b></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>