<?php
/**
 * Components intended to be hooked to `truss_sidebar_primary_static`
 *
 * @todo add hooks for each widget: before, inside top, inside bottom, and after
 *
 * @package truss
 */

add_action( 'truss_sidebar_primary_static', 'truss_default_widget_search', 100 );
add_action( 'truss_sidebar_primary_static', 'truss_default_widget_archives', 200 );
add_action( 'truss_sidebar_primary_static', 'truss_default_widget_meta', 300 );

/**
 * Output search widget in default static sidebar
 *
 * Intended to be hooked to `truss_default_sidebar_primary_static`
 *
 * @package truss
 */
function truss_default_widget_search() { ?>
	<aside class="widget<?php echo apply_filters( 'truss_class_widget-search', ' widget-search' ); ?>">
		<?php get_search_form(); ?>
	</aside>
<?php
}

/**
 * Output archives widget in default static sidebar
 *
 * Intended to be hooked to `truss_default_sidebar_primary_static`
 *
 * @package truss
 */
function truss_default_widget_archives() { ?>
	<aside class="widget<?php echo apply_filters( 'truss_class_widget-archives', ' widget-archives' ); ?>">
		<h4 class="<?php echo apply_filters( 'truss_class_widget-title', 'widget-title' ); ?>"><?php _e( 'Archives', 'truss' ); ?></h4>
		<ul>
			<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
		</ul>
	</aside>
<?php
}

/**
 * Output meta widget in default static sidebar
 *
 * Intended to be hooked to `truss_default_sidebar_primary_static`
 *
 * @package truss
 */
function truss_default_widget_meta() { ?>
	<aside class="widget<?php echo apply_filters( 'truss_class_widget-meta', ' widget-meta' ); ?>">
		<h4 class="<?php echo apply_filters( 'truss_class_widget-title', 'widget-title' ); ?>"><?php _e( 'Meta', 'truss' ); ?></h4>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta(); ?>
		</ul>
	</aside>
<?php
}
