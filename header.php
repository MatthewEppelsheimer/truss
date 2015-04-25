<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content">
 *
 * @todo What is hfeed for?; Should div.site have .hfeed re-added?
 * @package truss
 * @since 1.0.0
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
<div class="site">
	<div class="wrap">
		<?php tha_header_before(); ?>
		<header class="site-header" role="banner" itemscope="itemscope" itemtype="http://schema.org/WPHeader">
			<?php tha_header_top(); ?>
			<?php truss_header(); ?>
			<?php tha_header_bottom(); ?>
		</header>
		<?php tha_header_after(); ?>
