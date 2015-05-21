<?php
/* @var $this LogicielController */
/* @var $model Logiciel */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'logiciel-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note"><?php echo Yii::t('common','ChampsObligatoires');  ?></p>

	<?php echo $form->errorSummary($model); ?>

	<div style="background-color:lightgrey;"><b><?php echo Yii::t('common','informations_logiciels'); ?> :</b></div>
	<div class="row" style="float:left;">
		<?php echo $form->labelEx($model,'nom'); ?>
		<?php echo $form->textField($model,'nom',array('size'=>20,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'nom'); ?>
	</div>
	<div class="row" style="float:left;padding-left:10px;">
		<?php echo $form->labelEx($model,'url_logiciel'); ?>
		<?php echo $form->textField($model,'url_logiciel',array('size'=>20,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'url_logiciel'); ?>
	</div>
	<div class="row" style="clear:both;float:left;">
		<?php echo $form->labelEx($model,'licence'); ?>
		<?php echo $form->textField($model,'licence',array('size'=>20,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'licence'); ?>
	</div>
	<div class="row" style="float:left;padding-left:10px;">
		<?php echo $form->labelEx($model,'prix'); ?>
		<?php echo $form->textField($model,'prix',array('size'=>7,'maxlength'=>7)); ?> €
		<?php echo $form->error($model,'prix'); ?>
	</div>

	<div class="row" style="clear:both;">
		<?php echo $form->labelEx($model,'descriptif_fr'); ?>
		<?php echo $form->textArea($model,'descriptif_fr',array('maxlength'=>500, 'rows' => 5, 'cols' => 50)); ?>
		<?php echo $form->error($model,'descriptif_fr'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descriptif_en'); ?>
		<?php echo $form->textArea($model,'descriptif_en',array('maxlength'=>500, 'rows' => 5, 'cols' => 50)); ?>
		<?php echo $form->error($model,'descriptif_en'); ?>
	</div>

	<div class="row" style="float:left;">
		<?php echo $form->labelEx($model,'keywords_fr'); ?>
		<?php echo $form->textField($model,'keywords_fr',array('size'=>20,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'keywords_fr'); ?>
	</div>

	<div class="row" style="float:left;padding-left:10px;">
		<?php echo $form->labelEx($model,'keywords_en'); ?>
		<?php echo $form->textField($model,'keywords_en',array('size'=>20,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'keywords_en'); ?>
	</div>
		<div style="clear:both;background-color:lightgrey;"><b><?php echo Yii::t('common','support_langues'); ?> :</b></div>
	<div class="row" style="clear:both;float:left;">
		<?php echo $form->labelEx($model,'langue_fr'); ?>
		<?php echo $form->checkbox($model,'langue_fr'); ?>
		<?php echo $form->error($model,'langue_fr'); ?>
	</div>

	<div class="row" style="float:left;padding-left:20px;">
		<?php echo $form->labelEx($model,'langue_en');echo  $form->checkbox($model,'langue_en');?>
		<?php echo $form->error($model,'langue_en'); ?>
	</div>

	<div class="row" style="float:left;padding-left:20px;">
		<?php echo $form->labelEx($model,'langue_autres'); ?>
		<?php echo $form->checkbox($model,'langue_autres'); ?>
		<?php echo $form->error($model,'langue_autres'); ?>
	</div>
	
	<div style="clear:both;background-color:lightgrey;"><b><?php echo Yii::t('common','informations_societe'); ?> :</b></div>
	
	<div class="row" style="clear:both;float:left;">
		<?php echo $form->labelEx($model,'societe'); ?>
		<?php echo $form->textField($model,'societe',array('size'=>20,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'societe'); ?>
	</div>

	<div class="row" style="float:left;padding-left:10px;">
		<?php echo $form->labelEx($model,'url_societe'); ?>
		<?php echo $form->textField($model,'url_societe',array('size'=>20,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'url_societe'); ?>
	</div>
	
	<div style="clear:both;background-color:lightgrey;"><b><?php echo Yii::t('common','informations_contact'); ?> :</b></div>

	<div class="row" style="float:left;">
		<?php echo $form->labelEx($model,'contact_nom'); ?>
		<?php echo $form->textField($model,'contact_nom',array('size'=>20,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'contact_nom'); ?>
	</div>

	<div class="row" style="float:left;padding-left:10px;">
		<?php echo $form->labelEx($model,'contact_prenom'); ?>
		<?php echo $form->textField($model,'contact_prenom',array('size'=>20,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'contact_prenom'); ?>
	</div>
	<div class="row" style="clear:both;float:left;">
		<?php echo $form->labelEx($model,'contact_login'); ?>
		<?php echo $form->textField($model,'contact_login',array('size'=>20,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'contact_login'); ?>
	</div>

	<div class="row" style="float:left;padding-left:10px;">
		<?php echo $form->labelEx($model,'contact_password'); ?>
		<?php echo $form->textField($model,'contact_password',array('size'=>20,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'contact_password'); ?>
	</div>

	<div class="row" style="clear:both;float:left;">
		<?php echo $form->labelEx($model,'contact_email'); ?>
		<?php echo $form->textField($model,'contact_email',array('size'=>20,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'contact_email'); ?>
	</div>

	<div class="row" style="float:left;padding-left:10px;">
		<?php echo $form->labelEx($model,'contact_phone'); ?>
		<?php echo $form->textField($model,'contact_phone',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'contact_phone'); ?>
	</div>
	


	<div class="row buttons" style="clear:both;">
		<?php echo CHtml::submitButton($model->isNewRecord ? Yii::t('common','Create') : Yii::t('common','Save')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->