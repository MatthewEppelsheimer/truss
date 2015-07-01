<?php
/**
 * Components hooked to `truss_entry_header_meta_inside`
 *
 * @package truss
 */

add_action( 'truss_entry_header_meta_inside', 'truss_entry_header_meta_time_posted', 100 );
add_action( 'truss_entry_header_meta_inside', 'truss_entry_header_meta_date_modified', 500 );

/**
 * Display time a post was published.
 *
 * Includes Genericon's time icon by default through filterable classes.
 * Intended to be hooked to `truss_entry_header_meta_inside`, to run
 * inside a <div> tag, inside The Loop.
 *
 * @todo `review truss_posted_on()` function
 * @uses `truss_posted_on()`
 *
 * @package truss
 */
function truss_entry_header_meta_time_posted() { ?>
	<?php
	// Include time Genericon by filterable default
	// Also allow exact icon to be filtered
	if ( apply_filters( 'truss_header_meta_time_use_genericon', true ) ) { ?>
		<span class="genericon genericon-<?php echo apply_filters( 'truss_header_meta_time_genericon_icon', 'time' ); ?>"></span>
	<?php }
	truss_posted_on();
}

/**
 * Render hidden meta for time a post was modified.
 *
 * The benefit is schema.org markup. This is visibly hidden with
 * inline CSS by filterable default. Intended to be hooked to
 * `truss_entry_header_meta_inside`, to run inside a <div> tag,
 * inside The Loop.
 *
 * @package truss
 */
function truss_entry_header_meta_date_modified() {
	// Make this invisible by filterable default. ?>
	<span itemprop="dateModified"<?php if ( apply_filters( 'truss_entry_header_meta_date_hide', true ) ) echo ' style="display:none;"'; ?>>Last modified: <?php the_modified_date(); ?></span>
<?php
}
