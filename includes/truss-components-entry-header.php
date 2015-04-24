<?php
/**
 * Components hooked to `truss_entry_header_inside`
 *
 * @package truss
 */

add_action( 'truss_entry_header_inside', 'truss_entry_header_title', 100 );
add_action( 'truss_entry_header_inside', 'truss_entry_header_meta', 500 );

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
function truss_entry_header_title() {
	<h1 class="<?php echo apply_filters( 'truss_class_entry-title', 'entry-title' ); ?>" itemprop="name" >
		// Wrapping post title in a permalink is a filterable default
		<?php if ( apply_filters( 'truss_wrap_entry-title_in_permalink', true ) ) { ?>
			<a href="<?php the_permalink(); ?>" rel="bookmark"><?php the_title(); ?></a>
		<?php } else { the_title(); } ?>
	</h1>
<?php
}

/**
 * Display post title
 *
 * Render a post's title in an <h1>. Intended to be hooked to
 * `truss_entry_header_inside`, to run inside a <header> tag in The Loop.
 *
 * @todo migrate inner contents of the div into its own component action hook
 * @todo make class filterable
 * @todo reconsider the contional wrapper for when this should run
 *
 * @package truss
 * @since 1.0
 */
function truss_entry_header_meta() {
	if ( 'post' == get_post_type() ) { ?>
		<div class="entry-header-meta">
			<span class="genericon genericon-time"></span> <?php truss_posted_on(); ?>
			<span itemprop="dateModified" style="display:none;">Last modified: <?php the_modified_date(); ?></span>
		</div>
	<?php }
}
