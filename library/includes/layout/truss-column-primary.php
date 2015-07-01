<?php
/**
 * Layout component: Primary Column
 *
 * Creates div.truss-column-primary that wraps a call to `truss( 'main' )`.
 * Intended to be hooked to the `truss` action by page templates.
 *
 * @package truss
 */
function truss_column_primary() { ?>
	<div class="column-primary">
		<?php truss( 'column_primary' ); ?>
	</div>
<?php }
