<?php
/**
 * Components hooked to truss_main_content
 *
 * @notice This file majorly revises the new hook load sequence for Truss, based on learnings from the US Chess build (where it is used). It needs refactoring (see below) but shouldn't change the major load order of anything.
 *
 * @todo Refactor for file organization
 * @todo update inline docs
 * @todo update trussdoc docs map
 * @package truss
 */

add_action( 'truss_main_content', 'truss_primary_column_with_sidebar', 100 );


/**
 * Main section default: primary column with a sidebar following
 *
 * @todo refactor to organize section-constructing elements like this.
 */
function truss_primary_column_with_sidebar() { ?>
	<section class="<?php echo apply_filters( 'truss_primary_column_class_name', 'primary-column-with-sidebar'); ?>">
		<div>
			<div>
				<?php truss( 'primary_column_content' ); ?>
			</div>
			<div>
				<?php truss( 'secondary_column_content' ); ?>
			</div>
		</div>
	</section>
<?php
}

/**
 * Default Main Content
 *
 * Fire `truss_loop`
 *
 * @package truss
 */
function truss_default_primary_content() {
	truss( 'loop' );
}
add_action( 'truss_primary_column_content', 'truss_default_primary_content', 100 );

/**
 * Default Secondary Content
 *
 * Fire `truss_sidebar`
 *
 * @package truss
 */
function truss_default_secondary_column_content() {
	truss( 'sidebar' );
}
add_action( 'truss_secondary_column_content', 'truss_default_secondary_column_content', 100 );

/**
 * Default SidebarContent
 *
 * @uses get_sidebar()
 *
 * @package truss
 */
function truss_default_sidebar_content() {
	get_sidebar();
}
add_action( 'truss_sidebar', 'truss_default_sidebar_content', 100 );
