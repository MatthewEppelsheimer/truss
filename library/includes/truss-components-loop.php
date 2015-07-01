<?php
/**
 * Components hooked to `truss_loop`
 *
 * @package truss
 */

add_action( 'truss_loop', 'truss_standard_loop', 100 );


/**
 * Output The Loop.
 *
 * Performs "if posts { while posts { the post } }". Outputs each entry's
 * <article> wrapper.
 *
 * Action hooks fired:
 *   - truss_before_loop
 *   - truss_before_while
 *   - tha_entry_before
 *   - tha_entry_top
 *   - truss_entry
 *   - tha_entry_bottom
 *   - tha_entry_after
 *   - truss_after_while
 *   - truss_after_loop
 *
 * @package truss
 */
function truss_standard_loop() {
	do_action( 'truss_before_loop' );
	if ( have_posts() ) {

		do_action( 'truss_before_while' );
		while ( have_posts() ) {
			the_post();
			tha_entry_before();

			/* @todo remove this when no longer useful for reference */
			/* Include the Post-Format-specific template for the content.
			 * If you want to override this in a child theme, then include a file
			 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
			 */
			// get_template_part( 'page-templates/partials-to-refactor/content', get_post_format() ); ?>

			<article id="post-<?php the_ID(); ?>" <?php post_class(); echo apply_filters( 'truss_content_article_html_params', '' ); ?>>
				<?php tha_entry_top(); ?>
				<?php truss_entry(); ?>
				<?php tha_entry_bottom(); ?>
			</article>

			<?php tha_entry_after();
		}
		do_action( 'truss_after_while' );

	} else {
		/* @todo refactor what happens when there are no posts. */
		get_template_part( 'page-templates/partials-to-refactor/content', 'none' );

	}
	do_action( 'truss_after_loop' );
}
