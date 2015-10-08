<?php

/**
 * Navbar class file.
 * @author Nicolas Malservet
 * @copyright Copyright &copy; Nicolas Malservet 2015
 * @license lgpl v3
 * @package bootstrap3
 * @since 0.1
 */

/**
 * Bootstrap navigation bar widget for bootrsap 3
 */
class Navbar extends CWidget {

    /**
     * @var array navigation items.
     * @since 0.1
     */
    public $items = array();

    /**
     * Initializes the widget.
     */
    public function init() {
        
    }

    /**
     * Runs the widget.
     */
    public function run() {

        echo '<nav class="navbar navbar-default">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="#">' . Yii::app()->name . '</a>
    </div>';

        echo '<!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">';
        //display links
        //get the current link 
        $currentLink = '/'.Yii::app()->getController()->getAction()->controller->id;
        $currentLink .= '/' . Yii::app()->getController()->getAction()->controller->action->id;
        foreach ($this->items as $item) {
            $active = '';
            //         echo '<li class="active"><a href="#">Link1 <span class="sr-only">(current)</span></a></li>';
            if (isset($item['visible'])) {
                if ($item['visible']) {
                    echo '<li>' . CHtml::link($item['label'], $item['url']) . '</li>';
                }
            } else {
                //if same than the url then display active
                if ($currentLink == $item['url'][0])
                    $active = 'class="active"';
                echo '<li ' . $active . '>'. CHtml::link($item['label'], $item['url']) . '</li>';
            }
        }
        echo '</ul>
    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>';
    }

}
