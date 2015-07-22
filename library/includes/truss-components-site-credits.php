<?php
/**
 * Components hooked to truss_credits
 *
 * @package truss
 */

add_action( 'truss_site_credits', 'truss_credits', 500 );


/**
 * Website credits
 *
 * Credits such as "Powered by WordPress" and site author, etc.
 *
 * @package truss
 * @since 1.0
 */
function truss_credits(){ ?>
    <a href="http://wordpress.org/" rel="generator"><?php printf( __( 'Proudly powered by <span class="genericon genericon-wordpress"></span> %s', 'truss' ), 'WordPress' ); ?></a>
<?php }
