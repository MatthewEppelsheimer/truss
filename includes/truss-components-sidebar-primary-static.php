<?php
/**
 * Components intended to be hooked to `truss_sidebar_primary_static`
 *
 * @todo break widget contents into functions and hook to their internal actions
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
 * Fires hooks:
 *   - truss_default_widget_search_before
 *   - truss_default_widget_search_top
 *   - truss_default_widget_search_bottom
 *   - truss_default_widget_search_after
 *
 * @package truss
 */
function truss_default_widget_search() {
	do_action( 'truss_default_widget_search_before' ); ?>
	<aside class="widget<?php echo apply_filters( 'truss_class_widget-search', ' widget-search' ); ?>">

		<?php
		do_action( 'truss_default_widget_search_top' );
		get_search_form();
		do_action( 'truss_default_widget_search_bottom' );
		?>

	</aside>
	<?php do_action( 'truss_default_widget_search_after' );
}

/**
 * Output archives widget in default static sidebar
 *
 * Intended to be hooked to `truss_default_sidebar_primary_static`
 *
 * Fires hooks:
 *   - truss_default_widget_archives_before
 *   - truss_default_widget_archives_top
 *   - truss_default_widget_archives_bottom
 *   - truss_default_widget_archives_after
 *
 * @package truss
 */
function truss_default_widget_archives() {
	do_action( 'truss_default_widget_archives_before' ); ?>
	<aside class="widget<?php echo apply_filters( 'truss_class_widget-archives', ' widget-archives' ); ?>">
		<?php do_action( 'truss_default_widget_archives_top' ); ?>

		<h4 class="<?php echo apply_filters( 'truss_class_widget-title', 'widget-title' ); ?>"><?php _e( 'Archives', 'truss' ); ?></h4>
		<ul>
			<?php wp_get_archives( array( 'type' => 'monthly' ) ); ?>
		</ul>

		<?php do_action( 'truss_default_widget_archives_bottom' ); ?>
	</aside>
	<?php do_action( 'truss_default_widget_archives_after' );
}

/**
 * Output meta widget in default static sidebar
 *
 * Intended to be hooked to `truss_default_sidebar_primary_static`
 *
 * Fires hooks:
 *   - truss_default_widget_meta_before
 *   - truss_default_widget_meta_top
 *   - truss_default_widget_meta_bottom
 *   - truss_default_widget_meta_after
 *
 * @package truss
 */
function truss_default_widget_meta() {
	do_action( 'truss_default_widget_meta_before' );?>
	<aside class="widget<?php echo apply_filters( 'truss_class_widget-meta', ' widget-meta' ); ?>">

		<?php do_action( 'truss_default_widget_meta_top' ); ?>
		<h4 class="<?php echo apply_filters( 'truss_class_widget-title', 'widget-title' ); ?>"><?php _e( 'Meta', 'truss' ); ?></h4>
		<ul>
			<?php wp_register(); ?>
			<li><?php wp_loginout(); ?></li>
			<?php wp_meta();

			do_action( 'truss_default_widget_meta_bottom' ); ?>
		</ul>
	</aside>
	<?php do_action( 'truss_default_widget_meta_after' );
}
