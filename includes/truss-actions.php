<?php
/**
 * Template functions that fire Truss actions
 *
 * @todo These are template tags. Rename and/or move this file and its contents accordingly.
 */

/**
 *
 * This function is the final thing a typical page template
 * calls, after setting up layout.
 *
 * @package truss
 * @since 1.0.0
 */
function truss() {
	do_action( 'truss' );
}

/**
 * Output <head> components
 *
 * @package truss
 * @since 1.0.0
 */
function truss_head(){
	do_action( 'truss_head' );
}

/**
 * Output main <header> components
 *
 * @package truss
 * @since 1.0.0
 */
function truss_header(){
	do_action( 'truss_header' );
}

/**
 * Output main <footer> components
 *
 * @package truss
 * @since 1.0.0
 */
function truss_footer(){
    do_action( 'truss_footer' );
}

/**
 * Output The Loop
 *
 * @package truss
 * @since 1.0.0
 */
function truss_loop() {
	do_action( 'truss_loop' );
}

/**
 * Output entry contents inside <article> wrapper
 *
 * @package truss
 * @since 1.0.0
 */
function truss_entry() {
	do_action( 'truss_entry' );
}

/**
 * Output entry header contents.
 *
 * Use inside a pre-existing wrapper (typically <header>)
 *
 * @package truss
 * @since 1.0.0
 */
function truss_entry_header_inside() {
	do_action( 'truss_entry_header_inside' );
}

/**
 * Output entry header meta contents.
 *
 * Use inside a pre-existing wrapper (typically <div>).
 *
 * @package truss
 */
function truss_entry_header_meta_inside() {
	do_action( 'truss_entry_header_meta_inside' );
}

/**
 * Output entry footer contents.
 *
 * Use inside a pre-existing wrapper (typically <footer>).
 *
 * @package truss
 */

function truss_entry_footer_inside() {
	do_action( 'truss_entry_footer_inside' );
}
