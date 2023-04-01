<?php

/**
 * Assalamualikum Wr. Wb
 * Plugin Name: Plugin Alivestori
 * Description: Percobaan plugin
 * Plugin URI: https://dicky.com
 * Author: Dicky Saputra
 * Version: 1.0.0
 * Author URI: #
 */

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

// Define Folder
define('TEMP_DIR', plugin_dir_path(__FILE__));
define('TEMP_DIR_ASSETS', plugin_dir_path(__FILE__) . '/assets/');
define('TEMP_DIR_CONTROLLERS', plugin_dir_path(__FILE__) . '/controllers/');
define('TEMP_DIR_MODELS', plugin_dir_path(__FILE__) . '/models/');
define('TEMP_DIR_VIEWS', plugin_dir_path(__FILE__) . '/views/');

require_once( TEMP_DIR . 'admin.php' );
require_once( TEMP_DIR_CONTROLLERS . 'rsvp.php' );
require_once(TEMP_DIR_MODELS . 'model_rsvp.php' );

// Create Table RSVP
require_once(TEMP_DIR_MODELS . 'create_table.php' );
register_activation_hook(__FILE__,'create_table_rsvp');

// Load CSS
add_action( 'wp_enqueue_scripts', 'my_plugin_assets' );
function my_plugin_assets() {
    wp_register_style( 'bootstrap_5', '//cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css');
    wp_register_script( 'bootstrap_5', '//cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js');

    wp_enqueue_style( 'bootstrap_5' );
    wp_enqueue_script( 'bootstrap_5' );
}