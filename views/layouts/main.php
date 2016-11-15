<?php
/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use app\assets\AppAsset;
use kartik\icons\Icon;
use app\components\CommonProperties;
//ensure that content is not hidden by navbar 
$this->registerJs(' 
$("nav + .container").css("padding-top",(($("nav").height())+10)+"px")        
');
AppAsset::register($this);
//enable icons library
Icon::map($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <link rel="stylesheet" href="/css/font-awesome-4.5.0/css/font-awesome.css">
      
 <?php 
 //if production, include stats tracker prod
 if(!CommonProperties::$DEV_MODE){
     echo $this->render("stats_tracker_prod");
 }
 
 $this->head() ?>
        <style>
  .carousel-inner > .item > img,
  .carousel-inner > .item > a > img {
      width: 70%;
      margin: auto;
  }
  </style>
   <!-- integration of the rubicon-bootstrap theme -->
       <link rel="stylesheet" href="/css/rubicon-bootstrap/bbmri-eric-website/style.css">
          <!-- fix some problems after integrtaion ( spaces etc.) -->
       <link rel="stylesheet" href="/css/fix_style.css">
    </head>
    <body>
        <?php $this->beginBody() ?>
        <div class="wrap">
            <?php
            NavBar::begin([
                'brandLabel' => 'BiobankApps.com',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-default navbar-fixed-top',
                ],
            ]);
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                    'encodeLabels' => false,
                'items' => [
                    ['label' => Icon::show('home') .'Home', 'url' => ['/site/index']],
                    ['label' => Icon::show('book') .Yii::t('common', 'software_list'), 'url' => array('/software/admin')],
                    ['label' => Icon::show('plus') .Yii::t('common', 'add_software'), 'url' => array('/software/create')],
                    ['label' => Icon::show('phone').Yii::t('common', 'contact'), 'url' => array('/site/contact')],
                    ['label' => Icon::show('info').Yii::t('common', 'about'), 'url' => array('/site/about')],
                    !Yii::$app->user->isGuest ? (Yii::$app->user->identity->isAdmin()?(['label' => Icon::show('wrench').'Administration', 'url' => array('/administration/index')]):('')):(''),
                    Yii::$app->user->isGuest ? (
                            ['label' => 'Login'.Icon::show('arrow-right'), 'url' => ['/site/login']]
                            ) : (
                            '<li>'
                            . Html::beginForm(['/site/logout'], 'post')
                            . Html::submitButton(
                                    'Logout (' . Yii::$app->user->identity->username . ')', ['class' => 'btn btn-link', 'style' => 'height:50px']
                            )
                            . Html::endForm()
                            . '</li>'
                            )
                ],
            ]);
            NavBar::end();
            ?>
            
            <div class="container">
                <?php
                $flashMessages = Yii::$app->session->getAllFlashes();
                if ($flashMessages) {
                    foreach ($flashMessages as $key => $message) {
                        echo '<br><div class="alert alert-' . $key . '">' . $message . "</div>";
                    }
                }
                ?>
                
                
                <?= $content ?>
                
            </div>
        </div>
        <footer class="footer">
            <div class="container">
                <div style="float:left;padding-left:10px;">
                    <?php echo Html::img(Yii::$app->request->baseUrl . '/images/logobb.png', array('height' => 75, 'width' => 100)); ?>
                </div>
                <div style="float:left;padding-left:200px;">Version <?=file_get_contents('version.html') ?> Copyright &copy; <?php echo date('Y'); ?> by BBMRI-ERIC.<br/>
                    Project BBMRI-ERIC IT <a href="http://bbmri-eric.eu">www.bbmri-eric.eu</a><br/>
                    All Rights Reserved.<br/></div>
                <div style="float:left;padding-left:200px;">
                    <?php echo Html::img(Yii::$app->request->baseUrl . '/images/bbmri_eric.png', array('height' => 60, 'width' => 150)); ?>
                </div>
            </div>
        </footer>

        <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>
