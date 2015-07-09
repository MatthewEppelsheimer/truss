<?php
/**
 * Components hooked to truss_footer
 *
 * @package truss
 */

add_action( 'truss_footer', 'site_footer', 200 );
add_action( 'truss_footer', 'truss_credits_wrapper', 500 );
add_action( 'trus_footer', 'truss_end_body', 1000 );


/**
 * The visible site footer
 *
 * Create footer.site-footer as a wrapper for the
 * truss_site_footer hook, and support Theme Hook
 * Alliance footer functions.
 *
 * @uses tha_footer_before()
 * @uses tha_footer_top()
 * @uses tha_footer_bottom()
 * @uses tha_footer_after()
 *
 * @package truss
 */
function site_footer() {
	tha_footer_before(); ?>
	<footer class="site-footer" role="contentinfo" itemscope="itemscope" itemtype="http://schema.org/WPFooter">
		<?php tha_footer_top(); ?>
		<?php truss( 'site_footer' ); ?>
		<?php tha_footer_bottom(); ?>
	</footer>
	<?php tha_footer_after();
}

/**
* Website credits wrapper
*
* Div wrapper for credits such as "Proudly powered by WordPress".
*
* @package truss
*/
function truss_credits_wrapper(){ ?>
	<div class="<?php echo apply_filters( 'truss_class_site-credits', 'site-credits' ); ?>">
		<?php truss( 'credits' ); ?>
	</div>
<?php
}

/**
 * Close the body and html elements
 *
 * Close <body> and <html>. Support THA tha_body_bottom().
 *
 * @uses tha_body_bottom()
 * @uses wp_footer
 * @package truss
 */
function truss_end_body() {
		tha_body_bottom();
		wp_footer(); ?>
	</body>
	</html>
<?php
}
