<?php
/**
 * Fire a Truss event hook.
 *
 * This is a convenience wrapper for do_action(). Typically after page templates set up their layout, calling `truss()` is the last thing they do. It optionally accepts a truss action hook name with the 'truss_' prefix omitted.
 *
 * @package truss
 * @todo detect if "truss_*" is passed as a variable and issue a PHP Notice or something.
 *
 * @param   (string) $truss_action_hook The truss action hook to run.
 *                   If it is not 'truss', omit the 'truss_' prefix.
 *                   (default: 'truss')
 *
 * @return  void
 */
function truss( $truss_action_hook = 'truss' ) {
	if ( $truss_action_hook != 'truss' ) {
		$truss_action_hook = 'truss_' . $truss_action_hook;
	}
	do_action( $truss_action_hook );
}
