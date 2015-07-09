<?php
/**
 * Components hooked to `truss`
 *
 * `truss` is the highest-level action in the framework, used
 * to quickly build and change page layout on the fly.
 *
 * By default, WordPress' `get_header` is hooked at priority 1
 * because it is the first component to display, and `get_footer`
 * is hooked at priority 100 because it is the final component to
 * display. Individual page templates (and plugins) may insert
 * other layout components in any order they choose.
 *
 *
 *
 * @package truss
 */

// Defined by WordPress
add_action( 'truss', 'get_header', 1 );
add_action( 'truss', 'truss_footer', 1000 );
