<?php
/* @var $this LogicielController */
/* @var $model Logiciel */

$this->breadcrumbs=array(
	'Logiciels'=>array('admin'),
	$model->nom,
);
if(Yii::app()->user->id==$model->id){
	$this->menu=array(
		array('label'=>Yii::t('common','update_software'), 'url'=>array('update', 'id'=>$model->id,'visible'=>Yii::app()->user->id==$model->id)),
		array('label'=>Yii::t('common','add_screenshot'), 'url'=>array('addPhoto', 'id'=>$model->id,'visible'=>Yii::app()->user->id==$model->id)),
		array('label'=>Yii::t('common','add_logo'), 'url'=>array('addLogo', 'id'=>$model->id,'visible'=>Yii::app()->user->id==$model->id)),
		array('label'=>Yii::t('common','delete_logo'), 'url'=>array('deleteLogo','visible'=>Yii::app()->user->id==$model->id)),
	);
}
?>
<h1><?php echo Yii::t('common','view_logiciel')." <i>".$model->nom."</i> par <i>".$model->societe."</i>"; ?></h1>
<?php 


$nbEmplacementsVides=5;
$images="";
$imagesgallery=array();
for($i=1;$i<6;$i++){
	$name="screenshot_".$i;
	if($model->$name!=null){
		///echo CHtml::image();
		$images.="<div style=\"float:left;\">";
		$src=Yii::app()->request->baseUrl.'/photos/'.$model->$name;
		$images.="<img id=\"".$name."\" name=\"".$name."\" src=\"".$src."\" style=\"padding-left:10px;width:100px;height:100px;\" onmouseover=\"onmouseoverimage('".$name."')\" onmouseout=\"onmouseoutimage('".$name."')\" class=\"screenshot\" alt=\"\" />";
		$imagesgallery[]=$src;
		//echo "<img id=\"".$name."\" name=\"".$name."\" src=\"".$src." />";
		//si le user ets l admin affichage du lien pour supprimer al screenshot
		if($model->id==Yii::app()->user->id){
			$images.="<br>".CHtml::link('Supprimer',"#", array("submit"=>array('logiciel/deletePhoto', 'i'=>$i), 'confirm' => 'Êtes vous sûr de vouloir supprimer cette photo?'));
			$images.="</div>";
		}
		$nbEmplacementsVides--;
	}
}
if(Yii::app()->user->id==$model->id){
	if($nbEmplacementsVides>0){
		echo "<br><div class=\"flash-notice\"><b>Vous pouvez encore ajouter ".$nbEmplacementsVides." images pour votre logiciel</b></div>";
		echo "<br>";
	}
}
echo "<div style=\"float:left;\">";
if($model->logo!=null){
	$src=Yii::app()->request->baseUrl.'/photos/'.$model->logo;
	echo "<img id=\"logo_".$model->id."\" src=\"".$src."\" style=\"padding-left:10px;width:100px;height:100px;\"  />";
}else{
	echo "No logo";
}
echo "</div>";
echo "<div style=\"float:center;\">";
//echo "<div style=\"color:blue;font-weight:bold;\">".Yii::t('common','description')."</div>";
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'nom',
		'societe',
		'url_societe',
		'url_logiciel',
		'licence',
		array(
					'name'=>'Prix',
					'type'=>'html',
					'value'=>$model->prix.'€ ',
		),
		'descriptif_fr',
		'descriptif_en',
		'keywords_fr',
		'keywords_en',
		array(
				'name'=>'Contact',
				'type'=>'html',
				'value'=>$model->contact_nom.' '.$model->contact_prenom,
		),
		'contact_email',
		'contact_phone',
			array(
					'name'=>'langue_fr',
					'type'=>'html',
					'value'=>BBAConstants::getYesNo($model->langue_fr),
			),
			array(
					'name'=>'langue_en',
					'type'=>'html',
					'value'=>BBAConstants::getYesNo($model->langue_en),
			),
			array(
					'name'=>'langue_autres',
					'type'=>'html',
					'value'=>BBAConstants::getYesNo($model->langue_autres),
			),
	),
)); 
echo "</div>";
?>
<!-- affichage des screenshots avec liens si connecté-->
<?php

echo "<div style=\"clear:both;\"></div>";
echo "<br><div style=\"color:blue;font-weight:bold;\">".Yii::t('common','screenshots')."</div><br>";
if(Yii::app()->user->id==$model->id){
	echo $images;
}
//echo "<div style=\"clear:both;\"/>";

$this->widget('ext.adGallery.AdGallery',
        array(
			'agWidth' => 650, //450 px wide main image
			'agHeight' => 600, //200 px wide main image
			'agThumbHeight' => 75, //75px tall thumb images
			'agEffect' => 'slide-vert', //vertically slide between images
			'agSlideShowAutoStart' => 'true', //Automatically start a slide show
            'imageList' => $imagesgallery
        )
    );?>
