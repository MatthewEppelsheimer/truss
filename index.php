<?php
/**
 * The main template file.
 *
 * @package truss
 */

// Layout: A primary column and a right-hand sidebar column
add_action( 'truss', 'truss_column_primary', 200 );
add_action( 'truss', 'truss_sidebar_primary', 300 );

// Strong as steel.
truss();
