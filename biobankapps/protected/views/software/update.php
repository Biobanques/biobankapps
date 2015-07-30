<?php
/* @var $this LogicielController */
/* @var $model Logiciel */

$this->breadcrumbs = array(
    'Logiciels' => array('admin'),
    $model->id => array('view', 'id' => $model->id),
    'Update',
);


$this->menu = array(
    array('label' => Yii::t('common', 'view_file_software'), 'url' => array('view', 'id' => $model->id)),
    array('label' => Yii::t('common', 'add_screenshot'), 'url' => array('addPhoto', 'id' => $model->id, 'visible' => Yii::app()->user->id == $model->id)),
);

$nbEmplacementsVides = 5;
$images = "";
for ($i = 1; $i < 6; $i++) {
    $name = "screenshot_" . $i;
    if ($model->$name != null) {
        $images.="<div style=\"float:left;\">";
        $src = Yii::app()->request->baseUrl . '/photos/' . $model->$name;
        $tnSrc = Yii::app()->request->baseUrl . '/photos/tn/' . $model->$name;
        $images.="<img id=\"" . $name . "\" name=\"" . $name . "\" src=\"" . $src . "\" style=\"margin-left:5px;width:75px;height:75px;\" onmouseover=\"onmouseoverimage('" . $name . "')\" onmouseout=\"onmouseoutimage('" . $name . "')\" class=\"screenshot\" alt=\"\" />";
        $images.="<br>" . CHtml::ajaxLink('Supprimer', Yii::app()->createUrl('software/deletePhoto', array('i' => $i, 'ajax' => 'ajax')), array('success' => "function(data){"
                    . "$('#toBeUpdated').load('" . Yii::app()->createUrl('software/update', array('id' => $model->id)) . " #toBeUpdated');"
                    . "}"));
        $images.="</div>";
        $nbEmplacementsVides--;
    }
}
//$images.="<div style=\"float:left;\">";
//$images.="<a href='#'><img id='addPicture'  name='addPicture' src='" . Yii::app()->request->baseUrl . "/images/add.png'style='margin-left:5px;width:75px;' class='screenshot' onclick='window.open(\"" . Yii::app()->createAbsoluteUrl('software/addPhoto', array('id' => $model->id)) . "\",\"AddScreenshots\",\"width:600\");return false;'/></a>";
//$images.="<a href='" . Yii::app()->createAbsoluteUrl('software/addPhoto', array('id' => $model->id)) . "'><img id='addPicture'  name='addPicture' src='" . Yii::app()->request->baseUrl . "/images/add.png' style='margin-left:5px;width:75px;' class='screenshot'/></a>";
//$images.="</div>";
?>

<h1><?php echo Yii::t('common', 'update_software'); ?> <b><?php echo $model->nom; ?></b></h1>

<?php
echo $this->renderPartial('_form', array('model' => $model));

echo "<div id='toBeUpdated' style='display:inline-block;width:9000px'>";
echo $images;
echo "</div>";
?>
