<?php
/**
 * This file contains helper functions.
 */

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

// $manifest, $canvas
function ubl_ah_iframe() {
    ?><div id="viewer"></div>
    <?php
}

add_action('ubl_ah_mirador_viewer', 'ubl_ah_iframe');