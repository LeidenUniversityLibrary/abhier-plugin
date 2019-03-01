<?php
/*
Plugin Name: Abnormal Hieratic functions
Plugin URI: https://github.com/LeidenUniversityLibrary/abhier-plugin
Description: Provide functionality for the Abnormal Hieratic Global Portal
Version: 0.5.3
Author: bencomp
Author URI: https://ben.companjen.name
License: GPLv2 Copyright (c) 2019 Leiden University Libraries
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Register login button text update
 */
add_filter('openid-connect-generic-login-button-text', function( $text ) {
    $text = __('Login with ORCID');
    
    return $text;
});

/**
 * Register papyrus post type
 */
function register_papyrus_type() {
    register_post_type('ubl_ah_papyrus',
                       array(
                           'labels'=> array(
                               'name'=> __('Papyri'),
                               'singular_name'=> __('Papyrus')
                           ),
                           'description' => 'Abnormal Hieratic papyri',
                           'public' => true,
                           'has_archive' => true,
                           'rewrite' => array('slug' => 'papyri'),
                           'show_in_rest' => true,
                           'rest_base' => 'papyri',
                           'supports' => array(
                               'title',
                               'editor',
                               'comments',
                               'revisions',
                               'trackbacks'
                           ),
                           'register_meta_box_cb' => 'add_papyrus_meta_box'
                        )
                    );
}

add_action('init', 'register_papyrus_type');

/**
 * Register meta box for papyrus
 */
function add_papyrus_meta_box() {
    add_meta_box('ubl_ah_meta_box','Papyrus information','papyrus_meta_box_html','ubl_ah_papyrus');
}

/**
 * Echo meta box form elements for papyrus
 */
function papyrus_meta_box_html($post) {
    // Get current post_meta
    // $post_meta = get_post_meta($post->ID);
    // $manifest = $post_meta['ubl_ah_manifest_uri'];
    ?>
    <label for="ubl_ah_manifest">IIIF Manifest URI</label>
    <input name="ubl_ah_manifest" id="ubl_ah_manifest" type="text" value="<?php echo esc_url($post->ubl_ah_manifest_uri); ?>">
    <label for="ubl_ah_canvas">IIIF Canvas URI (optional)</label>
    <input name="ubl_ah_canvas" id="ubl_ah_canvas" type="text" value="<?php echo esc_url($post->ubl_ah_canvas_uri); ?>">
    <label for="ubl_ah_tm_id">Trismegistos TM ID</label>
    <input name="ubl_ah_tm_id" id="ubl_ah_tm_id" type="text" value="<?php echo $post->ubl_ah_tm_id; ?>">
    <?php
}

/**
 * Save meta box form values
 */
function ubl_ah_save_postdata($post_id) {
    if (array_key_exists('ubl_ah_manifest', $_POST)) {
        update_post_meta(
            $post_id,
            'ubl_ah_manifest_uri',
            $_POST['ubl_ah_manifest']
        );
    }
    if (array_key_exists('ubl_ah_tm_id', $_POST)) {
        update_post_meta(
            $post_id,
            'ubl_ah_tm_id',
            $_POST['ubl_ah_tm_id']
        );
    }
    if (array_key_exists('ubl_ah_canvas', $_POST)) {
        update_post_meta(
            $post_id,
            'ubl_ah_canvas_uri',
            $_POST['ubl_ah_canvas']
        );
    }
}

add_action('save_post', 'ubl_ah_save_postdata');
?>