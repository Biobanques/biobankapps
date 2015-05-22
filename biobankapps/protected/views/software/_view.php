<?php
/* @var $this LogicielController */
/* @var $data Logiciel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nom')); ?>:</b>
	<?php echo CHtml::link($data->nom,array('logiciel/view')) ; ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('societe')); ?>:</b>
	<?php echo CHtml::encode($data->societe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url_societe')); ?>:</b>
	<?php echo CHtml::encode($data->url_societe); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url_logiciel')); ?>:</b>
	<?php echo CHtml::encode($data->url_logiciel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('licence')); ?>:</b>
	<?php echo CHtml::encode($data->licence); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('prix')); ?>:</b>
	<?php echo CHtml::encode($data->prix); ?>
	<br />

</div>