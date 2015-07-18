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
	<h1 class="<?php echo apply_filters( 'truss_class_site-title', 'site-title' ); ?>"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
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
	<h2 class="<?php echo apply_filters( 'truss_class_site-description', 'site-description' ); ?>"><?php bloginfo( 'description' ) ?></h2>
<?php }

/**
 * Primary Navigation
 *
 * Output primary-nav menu
 *
 * @todo (Flexnav) consider filtering menu-button class
 *
 * @package truss
 * @since 1.0.0
 */
function truss_primary_nav() { ?>
	<nav class="<?php echo apply_filters( 'truss_class_primary-nav', 'primary-nav' ); ?>" role="navigation" itemscope="itemscope" itemtype="http://schema.org/SiteNavigationElement">
		<div class="menu-button"><span><?php echo apply_filters( 'truss_class_menu-button', 'Menu' ); ?></span></div>
		<?php 	wp_nav_menu( array(
			    'theme_location' => 'primary-navigation',
			    'menu_class' => 'flexnav', //Add the class for FlexNav
			    'items_wrap' => '<ul data-breakpoint="'.  apply_filters( 'truss_class_data-breakpoint', '800' ) .'" id="%1$s" class="%2$s">%3$s</ul>', // Add data-breakpoint for FlexNav
			    ));
		?>
	</nav>
<?php }
