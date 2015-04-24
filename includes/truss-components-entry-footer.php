<?php
/**
 * Components hooked to `truss_entry_footer_inside`
 *
 * @package truss
 */

add_action( 'truss_entry_footer_inside', 'truss_entry_footer_categories', 100 );
add_action( 'truss_entry_footer_inside', 'truss_entry_footer_tags', 200 );
add_action( 'truss_entry_footer_inside', 'truss_entry_footer_comment_link', 300 );
add_action( 'truss_entry_footer_inside', 'truss_entry_footer_edit_link', 400 );


/**
 * Display categories in post entry footer
 *
 * Render a post's category list. Intended to be hooked to `truss_entry_footer_inside`,
 * to run inside a <footer> element in The Loop.
 *
 * @todo filter printf label
 * @todo review and reconsider `truss_categorized_blog()`
 *
 * @package truss
 */

function truss_entry_footer_categories() {
	// Display only for posts
	if ( 'post' != get_post_type() ) {
		return;
	}

	/* translators: used between list items, there is a space after the comma */
	$categories_list = get_the_category_list( __( ', ', 'truss' ) );
	if ( $categories_list && truss_categorized_blog() ) { ?>
		<span class="<?php echo apply_filters( 'truss_class_cat-links', 'cat-links' ); ?>">
			<?php printf( __( 'Posted in %1$s', 'truss' ), $categories_list ); ?>
		</span>
	<?php }
}

/**
 * Display tags in post entry footer
 *
 * Render a post's tag list. Intended to be hooked to `truss_entry_footer_inside`,
 * to run inside a <footer> element in The Loop.
 *
 * @todo filter printf label
 *
 * @package truss
 */
function truss_entry_footer_tags() {
	// Display only for posts
	if ( 'post' != get_post_type() ) {
		return;
	}

	/* translators: used between list items, there is a space after the comma */
	$tags_list = get_the_tag_list( '', __( ', ', 'truss' ) );
	if ( $tags_list ) { ?>
		<span class="<?php echo apply_filters( 'truss_class_tags-links', 'tags-links' ); ?>">
			<?php printf( __( 'Tagged %1$s', 'truss' ), $tags_list ); ?>
		</span>
	<?php };
}

/**
 * Display link to comments in post entry footer
 *
 * Render a link to the post's comments. Intended to be hooked to
 * `truss_entry_footer_inside`, to run inside a <footer> element in
 * The Loop.
 *
 * @todo filter printf label
 *
 * @package truss
 */
function truss_entry_footer_comment_link() {
	if (
		! post_password_required() &&
	    ( comments_open() || '0' != get_comments_number() )
	) { ?>
		<span class="<?php echo apply_filters( 'truss_class_comments-link', 'comments-link' ); ?>" itemprop="comment" ><?php comments_popup_link( __( 'Leave a comment', 'truss' ), __( '1 Comment', 'truss' ), __( '% Comments', 'truss' ) ); ?></span>
	<?php }
}

/**
 * Display edit post link in post entry footer
 *
 * Render a post edit link for editors. Intended to be hooked to
 * `truss_entry_footer_inside`, to run inside a <footer> element in
 * The Loop.
 *
 * @todo filter link label
 *
 * @package truss
 */
function truss_entry_footer_edit_link() {
	edit_post_link( __( 'Edit', 'truss' ), '<span class="' . apply_filters( 'truss_class_edit-link', 'edit-link' ) . '">', '</span>' );
}
