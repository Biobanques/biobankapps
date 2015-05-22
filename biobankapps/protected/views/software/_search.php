<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>


	<div class="row" >
		<?php echo $form->label($model,'nom'); ?>
		<?php echo $form->textField($model,'nom',array('size'=>20,'maxlength'=>200)); ?>
	</div>

	<div class="row" >
		<?php echo $form->label($model,'societe'); ?>
		<?php echo $form->textField($model,'societe',array('size'=>20,'maxlength'=>200)); ?>
	</div>

	<div class="row" >
		<?php echo $form->label($model,'licence'); ?>
		<?php echo $form->textField($model,'licence',array('size'=>20,'maxlength'=>200)); ?>
	</div>

	<div class="row" >
		<?php echo $form->label($model,'keywords_en'); ?>
		<?php echo $form->textField($model,'keywords_en',array('size'=>20,'maxlength'=>100)); ?>
	</div>

	<div class="row" >
		<?php echo $form->label($model,'langue_fr'); ?>
		<?php echo $form->checkbox($model,'langue_fr'); ?>
	</div>

	<div class="row" >
		<?php echo $form->label($model,'langue_en'); ?>
		<?php echo $form->checkbox($model,'langue_en'); ?>
	</div>

	<div class="row" >
		<?php echo $form->label($model,'langue_autres'); ?>
		<?php echo $form->checkbox($model,'langue_autres'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->