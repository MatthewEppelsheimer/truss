<?php
/**
 * The main template file.
 *
 * @package truss
 */

// Build layout: A primary column and a right-hand sidebar
// This is what this is intended to ultimately look like
/*
add_action( 'truss', 'truss_main_column' );
add_action( 'truss', 'truss_right_sidebar', 300 );

// Strong as steel.
truss();
*/

add_action( 'truss', 'truss_main', 200 );
add_action( 'truss', 'get_sidebar', 300 );

truss();
