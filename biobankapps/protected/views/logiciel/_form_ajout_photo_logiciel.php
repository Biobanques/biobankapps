<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'fichier-form',
	'enableAjaxValidation'=>false,
		'htmlOptions' => array(
				'enctype' => 'multipart/form-data',
		),
)); ?>

	<?php echo $form->errorSummary($model); ?>
	
		<div class="row">
	        <?php echo $form->labelEx($model,'fichier'); ?>
	        <?php echo CHtml::activeFileField($model, 'fichier'); ?> 
	        <?php echo $form->error($model,'fichier'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Charger'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->