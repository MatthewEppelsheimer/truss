<?php
/**
 * Components hooked to site_footer
 *
 * @package truss
 */

add_action( 'truss_site_footer', 'truss_credits_wrapper', 500 );

/**
 * Website credits wrapper
 *
 * Div wrapper for credits such as "Proudly powered by WordPress".
 *
 * @package truss
 */
function truss_credits_wrapper(){ ?>
	<div class="<?php echo apply_filters( 'truss_class_site-credits', 'site-credits' ); ?>">
		<?php truss( 'site_credits' ); ?>
	</div>
<?php
}
