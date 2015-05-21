<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1><?php echo Yii::t('common','home').' <i>'.CHtml::encode(Yii::app()->name); ?></i></h1>
<?php echo Yii::t('common','homepage'); ?>
<br>
<?php 
//affichage des 10 derniers applications
$models = Logiciel::model()->findAll(array(
    //"order" => "rand()",
    "limit" => 20,
));
foreach($models as $model){
	echo "<div style=\"float:left;padding-left:10px;padding-right:15px;height:120px;width:120px;max-width:120px;max-height:120px;text-align:center;\" >";
	$style="max-height:100%;max-width:100%;height:auto;width:auto";
        $imgurl=Yii::app()->request->baseUrl."/images/nologo.png";// class=\"logo-logiciel\" ".$style."/>";
	if($model->logo!=null){
		$imgurl=Yii::app()->request->baseUrl.'/photos/'.$model->logo;
	}
        echo CHtml::link(CHtml::image($imgurl,'logo',$htmlOptions=array ("style"=>$style,"class"=>"logo-logiciel")),array('logiciel/view', 'id'=>$model->id)); 
	echo "</div>";
	echo "<div style=\"float:left;width:70%;padding-left:10px;\">";
	$this->widget('zii.widgets.CDetailView', array(
			'data'=>$model,
			'attributes'=>array(
                            array(
							'name'=>'nom',
							'type'=>'html',
							'value'=>CHtml::link(CHtml::encode($model->nom), array('logiciel/view', 'id'=>$model->id))
					),
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