<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package truss
 */

add_action( 'content_page', 'content_page_header', 100 );
add_action( 'content_page', 'content_page_content', 200 );
add_action( 'content_page', 'content_page_footer', 300 );

/**
 * Page Header
 *
 * Output opening article tag and page title.
 *
 * @package truss
 * @since 1.0
 */
function content_page_header() {
	tha_entry_before();
	?>
	<article id="post-<?php the_ID(); ?>" <?php post_class(); ?> itemscope itemType="http://schema.org/WebPage">
	<?php
	tha_entry_top();
	?>

	<header class="entry-header">

		<h1 class="entry-title" itemprop="name"><?php the_title(); ?></h1>

	</header><!-- .entry-header -->
	<?php
}

/**
 * Page Content
 *
 * Output the page content.
 *
 * @package truss
 * @since 1.0
 */
function content_page_content() {
	?>

	<div class="entry-content" itemprop="mainContentOfPage">

		<?php the_content(); ?>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . __( 'Pages:', 'truss' ),
				'after'  => '</div>',
			) );
		?>

	</div><!-- .entry-content -->
	<?php edit_post_link( __( 'Edit', 'truss' ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>

	<?php
}

/**
 * Page Footer
 *
 * Output page footer and article close.
 *
 * @package truss
 * @since 1.0
 */
function content_page_footer() {
	tha_entry_bottom();
	?>
	</article><!-- #post-## -->
	<?php tha_entry_after();
}

// Do the action that all the previous functions are attached to.
do_action('content_page');
