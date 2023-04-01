<?php 
// Create Table RSVP
function create_table_rsvp() {
    global $wpdb;
    $table_name = $wpdb->prefix . 'rsvp';
    
    $charset_collate = $wpdb->get_charset_collate();
    
    $sql = "CREATE TABLE $table_name (
        id mediumint(9) NOT NULL AUTO_INCREMENT,
        post_id mediumint(9) NOT NULL,
        nama varchar(55) NOT NULL,
        kehadiran varchar(55) NOT NULL,
        ucapan varchar(150) NOT NULL,
        PRIMARY KEY (id)
    ) $charset_collate;";

    require_once ABSPATH . 'wp-admin/includes/upgrade.php';
    dbDelta( $sql );
}