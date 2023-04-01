<?php 
include TEMP_DIR_CONTROLLERS . 'rsvp.php';

function list_menu() {
    // parent Menu
    add_menu_page(
        'DSP',
        'DSP',
        'manage_options',
        'dsp',
        'data_rsvp',
        'dashicons-admin-generic',
        6
    );
}

add_action('admin_menu', 'list_menu');