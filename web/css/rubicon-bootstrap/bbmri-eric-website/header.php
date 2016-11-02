<!DOCTYPE html>
<html class="no-js">

<head>
  <!-- Meta Tags -->
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- CSS -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700,900" rel="stylesheet">
   
   
   
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/bootstrap/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="<?php bloginfo('template_directory'); ?>/style.css">
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,600,700,900" rel="stylesheet">

  <!-- Javascript -->
  <script src="<?php bloginfo('template_directory'); ?>/js/jquery-3.1.0.min.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/bootstrap/dist/js/bootstrap.min.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/base.js"></script>
  <script src="<?php bloginfo('template_directory'); ?>/js/dropdown.js"></script>
</head>

<body>

  <div class="container-fluid">


    <!-- -----------------------  Navbar Meta Menu ---------------------------- -->
    
    <nav class="navbar meta row">
      <form class="form-inline pull-xs-left search">
        <input class="form-control" type="text" placeholder="Search...">
      </form>
      <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#metaCollapsingNavbar" aria-controls="metaCollapsingNavbar"
        aria-expanded="false" aria-label="Toggle navigation">
        &#9776;
       </button>
      <div class="collapse navbar-toggleable-md" id="metaCollapsingNavbar">
        <ul class="nav navbar-nav accessibility">
          <li class="nav-item">
            <span>Fonts:</span>
            <a class="nav-link" href="#">A</a>
            <a class="nav-link" href="#">A</a>
          </li>
          <li class="nav-item">
            <span>Contrast:</span>
            <a class="nav-link" href="#">A</a>
            <a class="nav-link" href="#">A</a>
          </li>
        </ul>
        <ul class="nav navbar-nav right">
          <li class="nav-item active">
            <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">News & Events</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Publications</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">FAQ</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">National Nodes</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#">Contact</a>
          </li>
          <li class="nav-item social-btn">
            <a class="nav-link" href="#">
              <img src="<?php bloginfo('template_directory'); ?>/images/linkedin-icon.png" alt="LinkedIn" />
            </a>
          </li>
          <li class="nav-item social-btn">
            <a class="nav-link" href="#">
              <img src="<?php bloginfo('template_directory'); ?>/images/twitter-icon.png" alt="LinkedIn" />
            </a>
          </li>
        </ul>
      </div>
    </nav>


    <!-- -----------------------  Navbar Main Menu ---------------------------- -->
    
    <nav class="navbar main row">
      <a class="navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>">
        <img src="<?php bloginfo('template_directory'); ?>/images/logo.svg" alt="BBMRI-ERIC" />
      </a>

      <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#mainCollapsingNavbar" aria-controls="mainCollapsingNavbar"
        aria-expanded="false" aria-label="Toggle navigation">
        &#9776;
      </button>
      <div class="collapse navbar-toggleable-md" id="mainCollapsingNavbar">
        <ul class="nav navbar-nav right">
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="Preview">
              <a class="dropdown-item" href="#">Dropdown Link 1</a>
              <a class="dropdown-item" href="#">Dropdown Link 2</a>
              <a class="dropdown-item" href="#">Dropdown Link 3</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="Preview">
              <a class="dropdown-item" href="#">Dropdown Link 1</a>
              <a class="dropdown-item" href="#">Dropdown Link 2</a>
              <a class="dropdown-item" href="#">Dropdown Link 3</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="Preview">
              <a class="dropdown-item" href="#">Dropdown Link 1</a>
              <a class="dropdown-item" href="#">Dropdown Link 2</a>
              <a class="dropdown-item" href="#">Dropdown Link 3</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="Preview">
              <a class="dropdown-item" href="#">Dropdown Link 1</a>
              <a class="dropdown-item" href="#">Dropdown Link 2</a>
              <a class="dropdown-item" href="#">Dropdown Link 3</a>
            </div>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
            Dropdown
            </a>
            <div class="dropdown-menu" aria-labelledby="Preview">
              <a class="dropdown-item" href="#">Dropdown Link 1</a>
              <a class="dropdown-item" href="#">Dropdown Link 2</a>
              <a class="dropdown-item" href="#">Dropdown Link 3</a>
            </div>
          </li>
        </ul>
      </div>
    </nav>
    
    <!-- -----------------------  Carousel ---------------------------- -->
    <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
      <ol class="carousel-indicators">
        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
      </ol>
      <div class="carousel-inner" role="listbox">
        <div class="carousel-item active">
          <img src="<?php bloginfo('template_directory'); ?>/images/slide1.jpg" alt="First slide">
          <div class="carousel-caption">
            <h3>A GATEWAY FOR HEALTH</h3>
            <p>For the Benefit of Society</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="<?php bloginfo('template_directory'); ?>/images/slide2.jpg" alt="Second slide">
          <div class="carousel-caption">
            <h3>A GATEWAY FOR HEALTH</h3>
            <p>For the Benefit of Society</p>
          </div>
        </div>
        <div class="carousel-item">
          <img src="<?php bloginfo('template_directory'); ?>/images/slide3.jpg" alt="Third lide">
          <div class="carousel-caption">
            <h3>A GATEWAY FOR HEALTH</h3>
            <p>For the Benefit of Society</p>
          </div>
        </div>
      </div>
    </div>

    <!-- -----------------------  Breadcrumbs  ---------------------------- -->
    <section class="breadcrumbs">
      <nav class="breadcrumb">
        <a class="breadcrumb-item" href="#">Home</a>
        <a class="breadcrumb-item" href="#">Library</a>
        <a class="breadcrumb-item" href="#">Data</a>
        <span class="breadcrumb-item active">Bootstrap</span>
      </nav>
    </section>

