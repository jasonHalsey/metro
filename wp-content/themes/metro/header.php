<?php
/*
 * @package WordPress
 * @subpackage Metro

 */
?><!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8) ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
<head>
  <meta charset="<?php bloginfo( 'charset' ); ?>">
  <meta name="viewport" content="width=device-width">
  <title><?php wp_title( '|', true, 'right' ); ?>Metro Self Storage</title>
  <link rel="profile" href="http://gmpg.org/xfn/11">
  <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
  <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700' rel='stylesheet' type='text/css'>
  <!--[if lt IE 9]>
  <script src="<?php echo get_template_directory_uri(); ?>/js/html5.js"></script>
  <![endif]-->
  <?php wp_head(); ?>
</head>

<?php get_template_part( 'inc/cust-metro'); ?>

<!-- <header class="navigation" role="banner">
  <div class="action-bar">
    <ul class="btn-phone-wrapper">
      <li class="payonline-btn"><a href="<?php echo $GLOBALS['paylink_url'] ?>">pay online</a></li>
      <li class="number"><?php echo $GLOBALS['phone_number'] ?></li>
    </ul>
  </div>
  <div class="navigation-container">
    <div class="navigation-wrapper">
      <a href="<?php echo bloginfo('url'); ?>" class="logo">
        <img src="<?php echo $GLOBALS['logo_url'] ?>" alt="Logo Image">
      </a>
      <a href="javascript:void(0)" class="navigation-menu-button" id="js-mobile-menu"><img src="<?php echo bloginfo('url'); ?>/wp-content/themes/lmc_new/images/menu-open-large.png" /></a>


      <nav role="navigation">
        <?php wp_nav_menu( array( 'menu_id' => 'js-navigation-menu', 'theme_location' => 'primary', 'menu_class' => 'navigation-menu show' ) ); ?>
      </nav>    




    </div>
  </div>

</header> -->

<header class="navigation" role="banner">
<div class="action-bar">
    <ul class="btn-phone-wrapper">
      <li class="payonline-btn"><a href="<?php echo $GLOBALS['paylink_url'] ?>">pay online</a></li>
      <li class="number"><?php echo $GLOBALS['phone_number'] ?></li>
    </ul>
  </div>
  <div class="navigation-container">
    <div class="navigation-wrapper">
      <a href="<?php echo bloginfo('url'); ?>" class="logo">
        <img src="<?php echo $GLOBALS['logo_url'] ?>" alt="Logo Image">
      </a>
      <a href="javascript:void(0)" class="navigation-menu-button" id="js-mobile-menu">MENU</a>
      <nav role="navigation">
        <?php wp_nav_menu( array( 'menu_id' => 'js-navigation-menu', 'theme_location' => 'primary', 'menu_class' => 'navigation-menu show', 'container' => false ) ); ?>
      </nav>
    </div>
  </div>
</header>




<div id="header">
    <img id="headerimg" src="<?php header_image(); ?>" width="100%" height="auto" alt="Header image alt text" />
</div>



