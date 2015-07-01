<?php
/**
 * Components hooked to `truss_entry_header_inside`
 *
 * @package truss
 */

add_action( 'truss_entry_header', 'truss_entry_header_title', 100 );
add_action( 'truss_entry_header', 'truss_entry_header_meta', 500 );

/**
 * Display post title
 *
 * Render a post's title in an <h1> with a permalink. The permalink wrapper
 * is filterable. This is intended to be hooked to `truss_entry_header_inside`,
 * to run inside a <header> tag in The Loop.
 *
 * @todo Make the conditional permalink wrapping work in a single post context
 *
 * @package truss
 * @since 1.0
 */
function truss_entry_header_title() { ?>
	<h1 class="<?php echo apply_filters( 'truss_class_entry-title', 'entry-title' ); ?>" itemprop="name" >
		<?php
		// Wrapping post title in a permalink is a filterable default
		if ( apply_filters( 'truss_wrap_entry-title_in_permalink', true ) ) { ?>
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		<?php } else {
			the_title();
		} ?>
	</h1>
<?php
}

/**
 * Display post header meta info
 *
 * Create a wrapper div and call the `truss_entry_header_meta_inside`
 * action. Don't display if this isn't a post, or if its contents will be
 * empty. Intended to be hooked to `truss_entry_header_inside`, to run
 * inside a <header> tag in The Loop.
 *
 * @todo reconsider the get_post_type conditional
 *
 * @package truss
 * @since 1.0
 */
function truss_entry_header_meta() {
	// Only display div for posts
	// Don't display div if its contents will be empty
	if ( 'post' == get_post_type() && has_filter( 'truss_entry_header_meta' ) ) { ?>
		<div class="<?php echo apply_filters( 'truss_class_entry-header-meta', 'entry-header-meta' ); ?>">
			<?php truss( 'entry_header_meta' ); ?>
		</div>
	<?php }
}
