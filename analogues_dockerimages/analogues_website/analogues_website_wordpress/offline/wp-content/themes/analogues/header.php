<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8" />
  <meta content="width=device-width, initial-scale=1, shrink-to-fit=no" name="viewport" />
  <link href="<?php bloginfo('stylesheet_url');?>" rel="stylesheet" />
  <!-- Bootstrap CSS -->
  <link crossorigin="anonymous" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ"
    rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:400italic,400,300,700|Open+Sans+Condensed:300" rel="stylesheet" type="text/css" />
<!--   <link href="https://fonts.googleapis.com/css?family=PT+Sans+Narrow:400,700|PT+Sans:400,400i,700,700i|PT+Serif:400,400i,700,700i"
    rel="stylesheet" type="text/css" /> -->
  <script type="text/javascript" src="//code.jquery.com/jquery-latest.min.js"></script>
  <!-- Sticky menu -->
  <script type="text/javascript" src="<?php echo get_template_directory_uri();?>/js/sticky_menu.js"></script>
  <!-- Scripts for map invoced from community page /js/community.js -->
  <link rel="stylesheet" href="http://cdn.leafletjs.com/leaflet/v1.0.0-rc.1/leaflet.css" />
  <script src="http://cdn.leafletjs.com/leaflet/v1.0.0-rc.1/leaflet.js"></script>
  <!-- Cointain banner svg -->
  <?php include(TEMPLATEPATH. '/banner.php'); ?>
  <script async src="https://www.googletagmanager.com/gtag/js?id=UA-27375162-2"></script>
  <script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments);}
    gtag('js', new Date());
  
    gtag('config', 'UA-27375162-2');
  </script>
</head>

<body>
  <header>
    <div class="container">
      <div class="d-sm-flex justify-content-sm-end">
        <div id="search-form" class="p-2">
          <?php get_search_form();?>
        </div>
      </div>
      <div class="d-sm-flex flex-sm-row justify-content-sm-between">
        <div class="p-2" id="logo-ccafs">
        </div>
        <div class="p-2">
          <div class="d-sm-flex flex-sm-row">
            <div class="p-2">
              <h1 class="main-title">
                <?php bloginfo( 'name' ); ?> 
              </h1>
            </div>
          </div>
          <div class="d-sm-flex flex-sm-row">
            <div class="p-0" id="about-menu">
              <?php
                  wp_nav_menu(array(
                    'menu'       => 'About Menu',
                    'menu_class' => 'nav',
                  ));
                ?>
            </div>
          </div>
        </div>
      </div>
    </div>
    <nav class="container-fluid" id="top-menu">
      <div class="container">
        <div class="d-sm-flex flex-sm-row">
          <div class="p-0">
            <?php
                wp_nav_menu(array(
                  'menu'       => 'Top Menu',
                  'menu_class' => 'nav',
                ));
              ?>
          </div>
        </div>
      </div>
    </nav>
  </header>
