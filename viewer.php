<?php
/**
 * This file contains helper functions.
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// $manifest, $canvas
function ubl_ah_iframe() {
    ?><div>Testing, 1, 2.</div>
    <?php
}

add_action('ubl_ah_mirador_viewer', 'ubl_ah_iframe');