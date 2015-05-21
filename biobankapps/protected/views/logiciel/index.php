<?php
/* @var $this LogicielController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Logiciels'=>array('admin'),
	Yii::t('common','list_printable_logiciels'),
);
?>

<h1>Logiciels</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
