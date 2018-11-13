<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Cassandra
 */
?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">
<?php    
wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<div id="page" class="site">
	<a class="skip-link screen-reader-text" href="#content"><?php esc_html_e( 'Skip to content','cassandra-lite' ); ?></a>
	<header> 
	  <nav class="navbar navbar-default">
	    <div class="container">   
	      <div class="col-lg-3 col-md-3 col-sm-2">
	        <div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1"> 
					<span class="sr-only"><?php esc_html_e('Toggle navigation','cassandra-lite') ?></span> <span class="icon-bar"></span> <span class="icon-bar"></span> <span class="icon-bar"></span> 
				</button>
				<div class="logo-area"> 
					<?php cassandra_lite_headerLogo(); ?> 
				</div> 
		    </div>
	      </div> 
	      <div class="col-lg-9 col-md-9 col-sm-10">
	      	<?php $logo = get_custom_logo(); ?>
	        <div class="collapse navbar-collapse <?php echo ($logo) ? 'mt-13': ''; ?>" id="bs-example-navbar-collapse-1">
	          <?php cassandra_lite_main_menu(); ?>
	        </div>
	      </div>   
	    </div> 
	  </nav>
	</header>
	<?php get_template_part('header/banner'); ?>
	<div id="content" class="site-content">
