<?php
/**
 * The `truss_column_primary` component — the main column on any given page.
 *
 * @package truss
 */

add_action( 'truss_column_primary', 'truss_component_main', 100 );

/**
 * The webpage's main section
 *
 * Outputs <main>, triggers The Loop, and fires several hooks.
 *
 * Hooks fired:
 *   - tha_content_before
 *   - tha_content_top
 *   - tha_content_bottom
 *   - tha_content_after
 *
 * @package truss
 */
function truss_component_main() {
	tha_content_before(); ?>
	<main class="<?php echo apply_filters( 'truss_class_site-main', 'site-main' ); ?>" role="main">

		<?php
		tha_content_top();
		truss( 'main_content' );
		tha_content_bottom();
		?>

	</main>
	<?php tha_content_after();
}
