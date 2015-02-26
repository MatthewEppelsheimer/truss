<?php
/**
 * Components hooked to truss_header
 *
 * @package truss
 */

add_action( 'truss_header', 'truss_site_title', 100 );
add_action( 'truss_header', 'truss_site_description', 200 );
add_action( 'truss_header', 'truss_primary_nav', 300 );

/**
 * Site Title
 *
 * Output h1 site title
 *
 * @package truss
 * @since 1.0.0
 */
function truss_site_title() { ?>
	<h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
<?php }

/**
 * Site Description
 *
 * Output h2 site description, aka tagline or slogan.
 *
 * @package truss
 * @since 1.0.0
 */
function truss_site_description() { ?>
	<h2 class="site-description"><?php bloginfo( 'description' ) ?></h2>
<?php }

/**
 * Primary Navigation
 *
 * Output primary-nav menu
 *
 * @package truss
 * @since 1.0.0
 */
function truss_primary_nav() { ?>
	<nav id="primary-nav" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
		<div class="menu-button"><span><?php echo get_theme_mod( 'neat_mobile_nav_label' ); ?></span></div>
		<?php 	wp_nav_menu( array(
			    'theme_location' => 'primary-navigation',
			    'menu_class' => 'flexnav', //Adding the class for FlexNav
			    'items_wrap' => '<ul data-breakpoint=" '.  get_theme_mod( 'neat_mobile_min_width' ) .' " id="%1$s" class="%2$s">%3$s</ul>', // Adding data-breakpoint for FlexNav
			    ));
		?>

	</nav><!-- #site-navigation -->
<?php }
