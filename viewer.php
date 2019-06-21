<?php
/**
 * This file contains helper functions.
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

function ubl_ah_iframe($manifest, $canvas) {
    ?><div>Testing, 1, 2.</div>
    <?php
}

add_action('ubl_ah_mirador_viewer', 'ubl_ah_iframe');