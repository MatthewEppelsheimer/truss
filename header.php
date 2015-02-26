<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @package truss
 */
?><!DOCTYPE html>
<?php tha_html_before(); ?>
<html <?php language_attributes(); ?>>
<head>
	<?php tha_head_top(); ?>
	<?php truss_head(); ?>
	<?php wp_head(); ?>
	<?php tha_head_bottom(); ?>
</head>

<body <?php body_class(); ?>>
<?php tha_body_top(); ?>
<div id="page" class="hfeed site">
	<div class="wrap">
		<?php tha_header_before(); ?>
		<header id="masthead" class="site-header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
			<?php tha_header_top(); ?>
			<div class="site-branding">
				<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
				<h2 class="site-description"><?php bloginfo( 'description' ) ?></h2>
			</div>

			<nav id="primary-nav" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
			<div class="menu-button"><span><?php echo get_theme_mod( 'neat_mobile_nav_label' ); ?></span></div>
			<?php 	wp_nav_menu( array(
				    'theme_location' => 'primary-navigation',
				    'menu_class' => 'flexnav', //Adding the class for FlexNav
				    'items_wrap' => '<ul data-breakpoint=" '.  get_theme_mod( 'neat_mobile_min_width' ) .' " id="%1$s" class="%2$s">%3$s</ul>', // Adding data-breakpoint for FlexNav
				    ));
			?>

			</nav><!-- #site-navigation -->
			<?php tha_header_bottom(); ?>

		</header><!-- #masthead -->
		<?php tha_header_after(); ?>

		<?php tha_content_before(); ?>
		<div id="content" class="site-content">
			<?php tha_content_top(); ?>
