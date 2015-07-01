<?php
/**
 * Components hooked to truss_footer
 *
 * @package truss
 */

add_action( 'truss_footer', 'truss_credits_wrapper', 500 );


/**
 * Website credits wrapper
 *
 * Div wrapper for credits such as "Proudly powered by WordPress".
 *
 * @package truss
 * @since 1.0
 */
function truss_credits_wrapper(){ ?>
    <div class="<?php echo apply_filters( 'truss_class_site-credits', 'site-credits' ); ?>">
	    <?php do_action( 'truss_credits' ); ?>
    </div>
<?php }
