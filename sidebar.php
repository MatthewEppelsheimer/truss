<?php
/**
 * Default WordPress sidebar partial
 *
 * This is included for WordPress convention, but it is recommended
 * to hook truss_sidebar_primary() to the `truss` action for
 * consistency, instead of using this partial.
 *
 * @notice Instead of calling get_sidebar() or including this partial,
 *         hook truss_sidebar_primary() to `truss`.
 * @uses   truss_sidebar_primary()
 *
 * @package truss
 */

truss_sidebar_primary();
