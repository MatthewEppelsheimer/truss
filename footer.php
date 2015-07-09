<?php
/**
 * Default WordPress footer partial
 *
 * This is included for consistency with WordPress convention,
 * and ensure that get_footer() will not break things. For consistency
 * with Truss, rather than using this file, hook truss_footer()
 * to the `truss` action.
 *
 * @notice Instead of calling get_footer() or including this partial,
 *         hook truss_footer() to `truss`.
 * @uses   truss_footer()
 *
 * @package truss
 */

truss ( 'footer' );
