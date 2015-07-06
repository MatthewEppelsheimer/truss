<?php
/**
 * The main template file.
 *
 * A main column, plus a right sidebar.
 *
 * @package truss
 */

// Layout: A primary column and a right-hand sidebar column
add_action( 'truss', 'truss_column_primary', 200 );
add_action( 'truss', 'truss_column_secondary', 300 );

// Strong as steel.
truss();
