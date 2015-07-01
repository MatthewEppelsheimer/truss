<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * @package truss
 */

add_action( 'page', 'page_before', 100 );
add_action( 'page', 'page_content', 200 );
add_action( 'page', 'page_after', 300 );

/**
 * Output page header
 *
 * @package truss
 * @since 1.0.0
 */
function page_before() {
	get_header();
	?>
	<main class="site-main" role="main">
	<?php
}

/**
 * Output page loop
 *
 * @package truss
 * @since 1.0.0
 */
function page_content() {
	while ( have_posts() ) : the_post();
		get_template_part( 'page-templates/partials-to-refactor/content', 'page' );
	endwhile; // end of the loop.
}

/**
 * Output page sidebar and footer
 *
 * @package truss
 * @since 1.0.0
 */
function page_after() {
	?>
	</main>
	<?php
	get_sidebar();
	get_footer();

}

truss_page();