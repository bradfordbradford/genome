<?php
/**
 * The Header for our theme
 *
 * Displays all of the <head> section and everything up till <div id="main">
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?><!DOCTYPE html>
<!--[if lt IE 7]><html class="no-js lt-ie9 lt-ie8 lt-ie7" lang="en"> <![endif]-->
<!--[if IE 7]><html class="no-js lt-ie9 lt-ie8" lang="en"> <![endif]-->
<!--[if IE 8]><html class="no-js lt-ie9" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<html class='no-js' lang='en'>
<head>
    <meta charset='utf-8' content='text/html' http-equiv='Content-Type'>
    <title>
    	<?php wp_title( '|', true, 'right' ); ?>
    </title>
    <meta content='Genome Magazine' property='og:title'>
    <meta content='Website' property='og:type'>
    <meta content='<?php echo get_stylesheet_directory_uri(); ?>/img/icons/og-facebook.jpg' property='og:image'>
    <meta content='/' property='og:url'>
    <meta content='Genome Magazine' property='og:site_name'>
    <meta content='Genome Magazine' property='og:author'>
    <meta content='' property='og:description'>
    <meta content='' name='description'>
    <meta content='' name='keywords'>
    <meta content='' name='author'>        
    <meta content='width=device-width, initial-scale=1, minimum-scale=1, user-scalable=no' name='viewport'>
    <meta content='IE=edge,chrome=1' http-equiv='X-UA-Compatible'>
    <link href='<?php echo get_stylesheet_directory_uri(); ?>/img/icons/favicon-152.png' rel='apple-touch-icon-precomposed' sizes='152x152'>
    <link href='<?php echo get_stylesheet_directory_uri(); ?>/img/icons/favicon-alt-32.png' rel='apple-touch-icon-precomposed' sizes='32x32'>
    <link href='<?php echo get_stylesheet_directory_uri(); ?>/img/icons/favicon-alt-16.png' rel='icon'>
    <script src='//use.typekit.net/gzy0ghu.js'></script>
    <script>
      try{Typekit.load();}catch(e){}
    </script>
    <script src='<?php echo get_stylesheet_directory_uri(); ?>/js/min/modernizr.min.js'></script>
    <link href='<?php echo get_stylesheet_directory_uri(); ?>/css/genome-main.css' rel='stylesheet'>
    <!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="<?php echo get_stylesheet_directory_uri(); ?>/css/ie8.css" /><script src='<?php echo get_stylesheet_directory_uri(); ?>/js/min/ie.min.js'></script><![endif]-->
	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div id="page" class="hfeed site">
	<?php if ( get_header_image() ) : ?>
	<div id="site-header">
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home">
			<img src="<?php header_image(); ?>" width="<?php echo get_custom_header()->width; ?>" height="<?php echo get_custom_header()->height; ?>" alt="">
		</a>
	</div>
	<?php endif; ?>

	<header id="masthead" class="site-header" role="banner">
		<div class="header-main">
			<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>

			<div class="search-toggle">
				<a href="#search-container" class="screen-reader-text"><?php _e( 'Search', 'twentyfourteen' ); ?></a>
			</div>

			<nav id="primary-navigation" class="site-navigation primary-navigation" role="navigation">
				<h1 class="menu-toggle"><?php _e( 'Primary Menu', 'twentyfourteen' ); ?></h1>
				<a class="screen-reader-text skip-link" href="#content"><?php _e( 'Skip to content', 'twentyfourteen' ); ?></a>
				<?php wp_nav_menu( array( 'theme_location' => 'primary', 'menu_class' => 'nav-menu' ) ); ?>
			</nav>
		</div>

		<div id="search-container" class="search-box-wrapper hide">
			<div class="search-box">
				<?php get_search_form(); ?>
			</div>
		</div>
	</header><!-- #masthead -->

	<div id="main" class="site-main">
