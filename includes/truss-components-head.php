<?php
/**
 * Components hooked to truss_head
 *
 * @package truss
 */

add_action( 'truss_head', 'truss_meta_charset', 10 );
add_action( 'truss_head', 'truss_meta_viewport', 20 );
add_action( 'truss_head', 'truss_title', 30 );
add_action( 'truss_head', 'truss_meta_profile', 40 );
add_action( 'truss_head', 'truss_meta_pingback', 50 );

/**
 * Charset Meta
 *
 * Output charset meta tag.
 *
 * @package truss
 * @since 1.0
 */
function truss_meta_charset(){ ?>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
<?php }

/**
 * Viewport Meta
 *
 * Output viewport meta tag.
 *
 * @package truss
 * @since 1.0
 */
function truss_meta_viewport(){ ?>
	<meta name="viewport" content="width=device-width, initial-scale=1">
<?php }

/**
 * HTML Title
 *
 * Output title tag.
 *
 * @todo update for compatibility with WP 4.1 `add_theme_support( 'title' )`
 *
 * @package truss
 * @since 1.0
 */
function truss_title(){ ?>
	<title><?php wp_title( '|', true, 'right' ); ?></title>
<?php }

/**
 * Profile Meta
 *
 * Output profile meta tag.
 *
 * @package truss
 * @since 1.0
 */
function truss_meta_profile(){ ?>
	<link rel="profile" href="http://gmpg.org/xfn/11">
<?php }

/**
 * Pingback Meta
 *
 * Output pingback meta tag.
 *
 * @package truss
 * @since 1.0
 */
function truss_meta_pingback(){ ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
<?php }
