<?php
/* @var $this LogicielController */
/* @var $data Logiciel */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('nom')); ?>:</b>
	<?php echo CHtml::encode($data->nom); ?>
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

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('descriptif_fr')); ?>:</b>
	<?php echo CHtml::encode($data->descriptif_fr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('descriptif_en')); ?>:</b>
	<?php echo CHtml::encode($data->descriptif_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screenshot_1')); ?>:</b>
	<?php echo CHtml::encode($data->screenshot_1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screenshot_2')); ?>:</b>
	<?php echo CHtml::encode($data->screenshot_2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screenshot_3')); ?>:</b>
	<?php echo CHtml::encode($data->screenshot_3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screenshot_4')); ?>:</b>
	<?php echo CHtml::encode($data->screenshot_4); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('screenshot_5')); ?>:</b>
	<?php echo CHtml::encode($data->screenshot_5); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('logo_logiciel')); ?>:</b>
	<?php echo CHtml::encode($data->logo_logiciel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keywords_fr')); ?>:</b>
	<?php echo CHtml::encode($data->keywords_fr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('keywords_en')); ?>:</b>
	<?php echo CHtml::encode($data->keywords_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_nom')); ?>:</b>
	<?php echo CHtml::encode($data->contact_nom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_prenom')); ?>:</b>
	<?php echo CHtml::encode($data->contact_prenom); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_login')); ?>:</b>
	<?php echo CHtml::encode($data->contact_login); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_password')); ?>:</b>
	<?php echo CHtml::encode($data->contact_password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_email')); ?>:</b>
	<?php echo CHtml::encode($data->contact_email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('contact_phone')); ?>:</b>
	<?php echo CHtml::encode($data->contact_phone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('langue_fr')); ?>:</b>
	<?php echo CHtml::encode($data->langue_fr); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('langue_en')); ?>:</b>
	<?php echo CHtml::encode($data->langue_en); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('langue_autres')); ?>:</b>
	<?php echo CHtml::encode($data->langue_autres); ?>
	<br />

	*/ ?>

</div>