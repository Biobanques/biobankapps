<?php /* @var $this Controller */ ?>
<?php $this->beginContent('//layouts/main'); ?>
<div class="container">
    <div class="col-lg-9">
    <?php echo $content; ?>
    </div>
    <div class="col-lg-3">
        <div id="sidebar">
            <?php
            $this->beginWidget('zii.widgets.CPortlet', array(
                'title' => 'Operations',
            ));
            $this->widget('zii.widgets.CMenu', array(
                'items' => $this->menu,
                'htmlOptions' => array('class' => 'operations'),
            ));
            $this->endWidget();
            ?>
        </div><!-- sidebar -->
    </div>
</div>
<?php $this->endContent(); ?>