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
 * Render a post's <footer>. Intended to be hooked to `truss_entry`,
 * to run inside an <article> tag in The Loop.
 *
 * @todo add filters
 *
 * @uses truss_entry_footer_inside()
 * @package truss
 * @since 1.0
 */
function truss_entry_footer() {
	// Only display the <footer> if it will not be empty
	if ( has_filter( 'truss_entry_footer_inside' ) ) { ?>
		<footer class="entry-meta" itemprop="keywords">
			<?php truss_entry_footer_inside(); ?>
		</footer>
	<?php }
}
