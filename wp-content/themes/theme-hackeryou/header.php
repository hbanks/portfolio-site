<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<?php // Load Meta ?>
  <meta charset="<?php bloginfo( 'charset' ); ?>" />

  <?php // viewport tag for mobile ?>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">

  <?php //favicon ?>
  <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/favicon-32x32.png" />

  <title><?php  wp_title('|', true, 'right'); ?></title>
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />

  <?php // Load our CSS ?>
  <link rel="stylesheet" type="text/css" href="<?php bloginfo( 'stylesheet_url' ); ?>" />

  <?php // Load in Google Fonts ?>
  <link href="https://fonts.googleapis.com/css?family=Lato:300,400|Oswald:400,700" rel="stylesheet">

  <?php // Load in Font Awesome ?>
  <script src="https://use.fontawesome.com/825ce333f7.js"></script>
  
  <?php wp_head(); ?>
</head>


<body <?php body_class(); ?>>

<header>
  <div class="container">
    
    <div class="mainNav">
    <a href="#" class="mobileNavIcon"><i class="fa fa-bars"></i></a>
    <?php wp_nav_menu( array(
      'container' => false,
      'theme_locations' => 'primary'
    )); ?>
    </div>
  </div> <!-- /.container -->
</header><!--/.header-->

