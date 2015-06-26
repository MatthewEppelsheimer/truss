<?php
/**
 * Components intended to be hooked to `truss_sidebar_primary`
 *
 * @package truss
 */

add_action( 'truss_sidebar_primary', 'truss_layout_sidebar_primary', 100 );

/**
 * The Primary Sidebar, containing main widget areas.
 *
 * Hooks fired:
 *   - tha_sidebars_before
 *   - tha_sidebar_top
 *   - truss_sidebar_primary_static
 *   - tha_sidebar_bottom
 *   - tha_sidebars_after
 *
 * @package truss
 */
function truss_layout_sidebar_primary() {
	tha_sidebars_before(); ?>
	<section class="<?php echo apply_filters( 'truss_class_sidebar_primary', 'widget-area secondary' ); ?>" role="complementary">
		<?php
		tha_sidebar_top();

		if ( ! dynamic_sidebar( 'sidebar-1' ) ) {
			truss_sidebar_primary_static();
		}

		tha_sidebar_bottom(); ?>
	</section>
<?php tha_sidebars_after();
}
