<?php
$this->menu=array(
	array('label'=>Yii::t('common','list_printable_logiciels'), 'url'=>array('index')),
	array('label'=>Yii::t('common','add_software'), 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#software-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1><?php echo Yii::t('common','software_list');?></h1>

<p>
<?php echo Yii::t('common','search_tip');?>
</p>

<?php echo CHtml::link(Yii::t('common','advanced_search'),'#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php
 $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'software-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		'nom',
		'societe',
		'licence',
		'prix',
		array(
			'class'=>'CButtonColumn',
			'template'=>'{view}{update}',
			'buttons'=>array
					(
							'update' => array
							(
									'label'=>'Update',
									'visible'=>'$data->id==Yii::app()->user->id',
									'imageUrl'=>Yii::app()->request->baseUrl.'/images/pencil.png',
									'url'=>'Yii::app()->createUrl("software/update", array("id"=>$data->id))',
							),
					),
				),
	),
)); ?>
