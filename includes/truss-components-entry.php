<?php
/**
 * Components hooked to `truss_entry`
 *
 * @package truss
 */

add_action( 'truss_entry', 'truss_entry_header', 100 );
add_action( 'truss_entry', 'truss_entry_summary', 200 );
add_action( 'truss_entry', 'truss_entry_content', 300 );
add_action( 'truss_entry', 'truss_entry_pagination', 400 );
add_action( 'truss_entry', 'truss_entry_footer', 500 );


/**
 * Entry header
 *
 * Render a post's <header> and its contents. Intended to be
 * hooked to `truss_entry`, to run inside an <article> tag in The Loop.
 *
 * @package truss
 * @since 1.0
 */
function truss_entry_header(){ ?>
	<header class="<?php echo apply_filters( 'truss_class_entry-header', 'entry-header' ); ?>">
		<?php truss_entry_header_inside(); ?>
	</header>
<?php }

/**
 * Display post excerpt.
 *
 * Render a post's excerpt if looping through search results.
 * Conditions for displaying excerpts can be filtered with
 * `truss_show_entry_summary`. Intended to be hooked to
 * `truss_entry`, to run inside an <article> tag.
 *
 * @todo add filters
 * @todo document filters
 *
 * @package truss
 * @since 1.0
 */
function truss_entry_summary() {
	// By filterable default, display excerpts only for search results
	if ( ! apply_filters( 'truss_show_entry_summary', is_search() ) ) {
		return;
	} ?>

	<div class="entry-summary" itemprop="description">
		<?php the_excerpt(); ?>
	</div>
<?php
}

/**
 * Entry Content
 *
 * Render a post's content. Intended to be hooked to `truss_entry`,
 * to run inside an <article> tag in The Loop.
 *
 * @todo add filters
 *
 * @package truss
 * @since 1.0
 */
function truss_entry_content() {
	// By filterable default, display full text unless we display excerpts
	// (which by default is only for search results).
	// Avoid using `truss_show_entry_full_content` if it is just the
	// opposite of `truss_show_entry_summary`.
	if ( ! apply_filters(
			'truss_show_entry_full_content',
			! apply_filters(
				'truss_show_entry_summary',
				is_search()
			)
	) ) {
		return;
	} ?>

	<div class="entry-content" itemprop="articleBody">
		<?php
		the_content(
			apply_filters(
				'truss_entry_more_link_text',
				__( 'Continue reading <span class="meta-nav">&rarr;</span>', 'truss' )
			)
		);
		?>
	</div>
<?php
}

/**
 * Display page links for paginated posts
 *
 * Intended to be hooked to `truss_entry`, to run inside
 * an <article> tag in The Loop.
 *
 * @uses wp_link_pages()
 *
 * @package truss
 * @since 1.0
 */
function truss_entry_pagination() {
	wp_link_pages( array(
		'before' => '<div class="page-links">' . __( 'Pages:', 'truss' ),
		'after'  => '</div>',
	) );
}
	/**
 * Entry Footer
 *
 * Render a post's <footer> and contents. Intended to be hooked to `truss_entry`,
 * to run inside an <article> tag in The Loop.
 *
 * @todo make everything inside of the <footer> its own action hook
 * @todo audit and finalize markup
 * @todo add filters
 * @todo document filters
 *
 * @package truss
 * @since 1.0
 */
function truss_entry_footer() { ?>
	<footer class="entry-meta" itemprop="keywords">
	<?php if ( 'post' == get_post_type() ) : // Hide category and tag text for pages on Search ?>
		<?php
		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', 'truss' ) );
		if ( $categories_list && truss_categorized_blog() ) :
			?>
			<span class="cat-links">
				<?php printf( __( 'Posted in %1$s', 'truss' ), $categories_list ); ?>
			</span>
		<?php endif; // End if categories ?>

		<?php
		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', 'truss' ) );
		if ( $tags_list ) :
			?>
			<span class="tags-links">
				<?php printf( __( 'Tagged %1$s', 'truss' ), $tags_list ); ?>
			</span>
		<?php endif; // End if $tags_list ?>
	<?php endif; // End if 'post' == get_post_type() ?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="comments-link" itemprop="comment" ><?php comments_popup_link( __( 'Leave a comment', 'truss' ), __( '1 Comment', 'truss' ), __( '% Comments', 'truss' ) ); ?></span>
	<?php endif; ?>

		<?php edit_post_link( __( 'Edit', 'truss' ), '<span class="edit-link">', '</span>' ); ?>
	</footer>
<?php
}
