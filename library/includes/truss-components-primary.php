<?php
/**
 * Components intended to be hooked to `truss_primary`
 *
 * @package truss
 */

add_action( 'truss_primary', 'truss_primary_before', 100 );
add_action( 'truss_primary', 'truss_primary_content', 200 );
add_action( 'truss_primary', 'truss_primary_after', 300 );


