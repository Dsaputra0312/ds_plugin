<?php
// Menu list data rsvp di admin dashboard
function data_rsvp() {
    $data_rsvp = get_all_rsvp();
    include TEMP_DIR_VIEWS . 'rsvp/index.php';
}

// Register Widget Elementor RSVP
function register_widget_rsvp( $widgets_manager ) {
    require_once TEMP_DIR . '/widgets/rsvp.php';
	$widgets_manager->register( new \Elementor_oEmbed_Widget() );
}
add_action( 'elementor/widgets/register', 'register_widget_rsvp' );

// Register Shortcode Form RSVP
add_shortcode('form-rsvp', 'shortcode_form_rsvp');
function shortcode_form_rsvp() {
    include TEMP_DIR_VIEWS . 'shortcode/form_rsvp.php';

    $post_id = get_the_ID();
    $nama = isset($_POST['nama']) ? $_POST['nama'] : '';
    $kehadiran = isset($_POST['kehadiran']) ? $_POST['kehadiran'] : '';
    $ucapan = isset($_POST['ucapan']) ? $_POST['ucapan'] : '';

    $data = array(
        'post_id' => $post_id,
        'nama' => $nama,
        'kehadiran' => $kehadiran,
        'ucapan' => $ucapan
    );

    if (isset($_POST['submit'])) {
        post_rsvp($data);
    }
}