<?php 
use kartik\sidenav\SideNav;
    // OR if this package is installed separately, you can use
    // use kartik\sidenav\SideNav;
    use yii\helpers\Url;/* @var $this Controller */ ?>
<?php $this->beginContent('@app/views/layouts/main.php'); ?>
<div class="container">
    <div class="col-lg-3">
          <?php 
    echo SideNav::widget([
        'type' => SideNav::TYPE_DEFAULT,
        'encodeLabels' => false,
        'heading' => 'Administration',
        'items' => [
            // Important: you need to specify url as 'controller/action',
            ['label' => 'Softwares', 'icon' => 'book', 'url' => Url::to(['/administration/softwares' ])],
            ['label' => 'Users', 'icon' => 'user', 'url' => Url::to(['/user/index'])],
            ['label' => 'Criteria', 'icon' => 'tag', 'url' => Url::to(['/criterion/index'])],
            ['label' => 'Evaluations', 'icon' => 'list-alt', 'url' => Url::to(['/evaluation/index'])],
            ['label' => 'Reviews', 'icon' => 'list-alt', 'url' => Url::to(['/review/index'])],
            ['label' => 'Quick analysis', 'icon' => 'list-alt', 'url' => Url::to(['/quick-analysis/index'])],
            ['label' => 'Tags', 'icon' => 'list-alt', 'url' => Url::to(['/tag/index'])],
        ],
    ]);   
    ?>
    </div>
    <div class="col-lg-9">
        <?php echo $content; ?>
    </div>
</div>
<?php $this->endContent(); ?>