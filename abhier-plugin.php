<?php
/*
Plugin Name: Abnormal Hieratic functions
Plugin URI: https://github.com/LeidenUniversityLibrary/abhier-plugin
Description: Provide functionality for the Abnormal Hieratic Global Portal
Version: 0.1
Author: bencomp
Author URI: https://ben.companjen.name
License: GPLv2 Copyright (c) 2018 Leiden University Libraries
*/

defined( 'ABSPATH' ) or die( 'No script kiddies please!' );

/**
 * Register login button text update
 */
add_filter('openid-connect-generic-login-button-text', function( $text ) {
    $text = __('Login with ORCID');
    
    return $text;
});
