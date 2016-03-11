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
            ['label' => 'Authors', 'icon' => 'pencil', 'url' => Url::to(['/author/index'])],
            ['label' => 'Evaluation', 'icon' => 'list-alt', 'url' => Url::to(['/evaluation/index'])],
            /*['label' => '<span class="pull-right badge">3</span> Categories', 'icon' => 'tags', 'items' => [
                ['label' => 'Fiction', 'url' => Url::to(['/site/fiction'])],
                ['label' => 'Historical', 'url' => Url::to(['/site/historical'])],
                ['label' => '<span class="pull-right badge">2</span> Announcements', 'icon' => 'bullhorn', 'items' => [
                    ['label' => 'Event 1', 'url' => Url::to(['/site/event-1'])],
                    ['label' => 'Event 2', 'url' => Url::to(['/site/event-2'])]
                ]],
            ]],*/
            
        ],
    ]);   
    ?>
    </div>
    <div class="col-lg-9">
        <?php echo $content; ?>
    </div>
</div>
<?php $this->endContent(); ?>