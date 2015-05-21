<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1><?php echo Yii::t('common','home').' <i>'.CHtml::encode(Yii::app()->name); ?></i></h1>
<?php echo Yii::t('common','homepage'); ?>

<div style="font-weight:bold;color:blue;">Les dernières applications ajoutées:</div>
<br>
<?php 
//affichage des 10 derniers applications
$models = Logiciel::model()->findAll(array(
    "order" => "rand()",
    "limit" => 20,
));
foreach($models as $model){
	echo "<div style=\"float:left;padding-left:10px;padding-right:15px;height:120px;width:120px;max-width:120px;max-height:120px;text-align:center;\" >";
	$style="style=\"max-height:100%;max-width:100%;height:auto;width:auto;\"";
	if($model->logo!=null){
		$src=Yii::app()->request->baseUrl.'/photos/'.$model->logo;
		echo "<img id=\"logo_".$model->id."\" src=\"".$src."\" class=\"logo-logiciel\" ".$style." />";
	}else{
		echo "<img id=\"nologo\" src=\"".Yii::app()->request->baseUrl."/images/nologo.png\" class=\"logo-logiciel\" ".$style."/>";
	}
	echo "</div>";
	echo "<div style=\"float:left;width:70%;padding-left:10px;\">";
	$this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
					'nom',
					'societe',
					array(
							'name'=>'Prix & Licence',
							'type'=>'html',
							'value'=>	$model->prix.'€ sous licence <i>'.$model->licence.'</i>',
					),
					array(
							'name'=>'Mots-clés',
							'type'=>'html',
							'value'=>$model->keywords_fr.' '.$model->keywords_en
					),		
			),
	));
	echo "</div>";
	echo "<div style=\"border-bottom:1px solid #D788F1;clear:both;margin-bottom:5px;\"></div>";
}

?>