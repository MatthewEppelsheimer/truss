<?php
/**
 * Functions hooked to Truss filters
 */
 
add_filter( 'truss_content_article_html_params', 'truss_article_schemadotorg' );
/**
 * Schema.org Article markup
 *
 * Prepare blog post schema.org parameters for <article> elements
 *
 * @package truss
 * @param   string $input  pre-existing contents of the filter
 * @return  string $output schema.org markup appended to input
 */
function truss_article_schemadotorg( $input ) {
	$output = $input;
	$output .= ' itemscope itemType="http://schema.org/BlogPosting"';
	return $output;
}
