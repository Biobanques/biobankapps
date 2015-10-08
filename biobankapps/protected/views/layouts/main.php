<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <meta name="language" content="en" />

        <!-- blueprint CSS framework -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        <!--[if lt IE 8]>
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
        <![endif]-->

        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

        <!-- Bootstrap -->
        <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-3.3.5-dist/css/bootstrap.min.css" />
        <script src="//ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

        <!-- custom js -->
        <script src='js/script.js'></script>
        <!-- bootstrap -->
        <script src='js/bootstrap-3.3.5-dist/js/bootstrap.min.js'></script>
        <!-- inclusion google analytics -->
        <script type="text/javascript">

            var _gaq = _gaq || [];
            _gaq.push(['_setAccount', 'UA-40385773-1']);
            _gaq.push(['_trackPageview']);

            (function() {
                var ga = document.createElement('script');
                ga.type = 'text/javascript';
                ga.async = true;
                ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
                var s = document.getElementsByTagName('script')[0];
                s.parentNode.insertBefore(ga, s);
            })();

        </script>
        <title>biobankapps.com</title>
    </head>
    <body>
        <div class="container" id="page">
            <div style="margin-top:0px;">
                <?php
                $this->widget('ext.bootstrap3.Navbar', array(
                    'items' => array(
                        array('label' => Yii::t('common', 'home'), 'url' => array('/site/index')),
                        array('label' => Yii::t('common', 'software_list'), 'url' => array('/software/admin')),
                        array('label' => Yii::t('common', 'add_software'), 'url' => array('/software/create')),
                        array('label' => Yii::t('common', 'contact'), 'url' => array('/site/contact')),
                        array('label' => Yii::t('common', 'about'), 'url' => array('/site/page', 'view' => 'about')),
                        array('label' => Yii::t('common', 'login'), 'url' => array('/site/login'), 'visible' => Yii::app()->user->isGuest),
                        array('label' => Yii::t('common', 'logout') . ' (' . Yii::app()->user->name . ')', 'url' => array('/site/logout'), 'visible' => !Yii::app()->user->isGuest)
                    ),
                ));
                ?>
            </div>


            <!-- header -->
            <?php
            $flashMessages = Yii::app()->user->getFlashes();
            if ($flashMessages) {
                foreach ($flashMessages as $key => $message) {
                    echo '<br><div class="flash-' . $key . '">' . $message . "</div>";
                }
            }
            ?>
            <?php echo $content; ?>
            <div class="clear"></div>
            <div style="height:60px;"/>
            <nav class="navbar navbar-default navbar-fixed-bottom" role="navigation">
                <div class="container">
                    <div style="float:left;">
                        <?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/logobb.png', 'logo', array('height' => 75, 'width' => 100)); ?>
                    </div>
                    <div style="float:left;padding-left:200px;">Version 1.1  Copyright &copy; <?php echo date('Y'); ?> by Biobanques.<br/>
                        Project Biobanques <a href="http://www.biobanques.eu">www.biobanques.eu</a><br/>
                        All Rights Reserved.<br/></div>
                    <div style="float:left;padding-left:200px;">
                        <?php echo CHtml::image(Yii::app()->request->baseUrl . '/images/bbmri_eric.png', 'logo', array('height' => 60, 'width' => 150)); ?>
                    </div>

                </div>
            </nav>
        </div><!-- page -->

    </body>
</html>
