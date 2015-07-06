<?php
/**
 * Components hooked to truss_main_content
 *
 * @package truss
 */

add_action( 'truss_main_content', 'truss_default_main_content', 100 );

/**
 * Default Main Content
 *
 * Fire `truss_loop`
 *
 * @package truss
 */
function truss_default_main_content() {
	truss( 'loop' );
}
