<?php
/**
 * Default WordPress sidebar partial
 *
 * This is included for consistency with WordPress convention,
 * and ensure that get_sidebar() will not break. For consistency with
 * Truss, rather than using this file, hook truss_column_secondary()
 * to the `truss`action for.
 *
 * @notice Instead of calling get_sidebar() or including this partial,
 *         hook truss_column_secondary() to `truss`.
 * @uses   truss_column_secondary()
 *
 * @package truss
 */

truss_column_secondary();
