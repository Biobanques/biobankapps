<?php
$nbEmplacementsVides = 5;
if (Yii::app()->user->id == $model->id) {
    $this->menu = array(
        array('label' => Yii::t('common', 'update_software'), 'url' => array('update', 'id' => $model->id, 'visible' => Yii::app()->user->id == $model->id)),
        array('label' => Yii::t('common', 'add_screenshot'), 'url' => array('addPhoto', 'id' => $model->id, 'visible' => Yii::app()->user->id == $model->id)),
        array('label' => Yii::t('common', 'add_logo'), 'url' => array('addLogo', 'id' => $model->id, 'visible' => Yii::app()->user->id == $model->id)),
        array('label' => Yii::t('common', 'delete_logo'), 'url' => array('deleteLogo', 'visible' => Yii::app()->user->id == $model->id)),
    );
}
?>
<h1><?php echo Yii::t('common', 'view_logiciel') . " <i>" . $model->nom . "</i> par <i>" . $model->societe . "</i>"; ?></h1>
<?php
$imagesgallery = array();
for ($i = 1; $i < 6; $i++) {
    $name = "screenshot_" . $i;
    if ($model->$name != null) {
        $src = Yii::app()->request->baseUrl . '/photos/' . $model->$name;
        $tnSrc = Yii::app()->request->baseUrl . '/photos/tn/' . $model->$name;
        $imagesgallery[] = array('image_url' => $src, 'thumb_url' => $tnSrc);
    }
}

echo "<div style=\"float:left;\">";
if ($model->logo != null) {
    $src = Yii::app()->request->baseUrl . '/photos/' . $model->logo;
    echo "<img id=\"logo_" . $model->id . "\" src=\"" . $src . "\" style=\"padding-left:10px;width:100px;height:100px;\"  />";
} else {
    echo "No logo";
}
echo "</div>";
echo "<div style=\"float:center;\">";

$this->widget('zii.widgets.CDetailView', array(
    'data' => $model,
    'attributes' => array(
        'nom',
        'societe',
        'url_societe',
        'url_logiciel',
        'licence',
        array(
            'name' => 'Price',
            'type' => 'html',
            'value' => $model->prix . '€ ',
        ),
        'descriptif_en',
        'keywords_en',
        array(
            'name' => 'Contact',
            'type' => 'html',
            'value' => $model->contact_nom . ' ' . $model->contact_prenom,
        ),
        'contact_email',
        'contact_phone',
        array(
            'name' => 'langue_fr',
            'type' => 'html',
            'value' => BBAConstants::getYesNo($model->langue_fr),
        ),
        array(
            'name' => 'langue_en',
            'type' => 'html',
            'value' => BBAConstants::getYesNo($model->langue_en),
        ),
        array(
            'name' => 'langue_autres',
            'type' => 'html',
            'value' => BBAConstants::getYesNo($model->langue_autres),
        ),
    ),
));
echo "</div>";
?>
<!-- affichage des screenshots avec liens si connecté-->
<?php
echo "<div style=\"clear:both;\"></div>";

echo "<br><div style=\"color:blue;font-weight:bold;\">" . Yii::t('common', 'screenshots') . "</div><br>";


echo "<div style=\"clear:both;\"/>";

$this->widget('ext.adGallery.AdGallery', array(
    'agThumbOpacity' => '0.7',
    'agWidth' => 600, //450 px wide main image
    'agHeight' => 450, //200 px wide main image
    'agThumbWidth' => 100, //75px tall thumb images
    'agEffect' => 'slide-hori', //vertically slide between images
    // 'agSlideShowAutoStart' => 'true', //Automatically start a slide show
    'imageList' => $imagesgallery
        )
);




echo '</div>';
?>
