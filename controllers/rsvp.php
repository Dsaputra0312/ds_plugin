<?php
// Menu list data rsvp di admin dashboard
function data_rsvp()
{
    $data_rsvp = get_all_rsvp();
    include TEMP_DIR_VIEWS . 'rsvp/index.php';
}

// Register Widget Elementor RSVP
function register_widget_rsvp($widgets_manager)
{
    require_once TEMP_DIR . '/widgets/rsvp.php';
    require_once TEMP_DIR . '/widgets/rsvp_form.php';
    require_once TEMP_DIR . '/widgets/player_music.php';
    require_once TEMP_DIR . '/widgets/copy_text.php';
    $widgets_manager->register(new \Elementor_oEmbed_Widget());
    $widgets_manager->register(new \Widget_Form_RSVP());
    $widgets_manager->register(new \Music_Player());
    $widgets_manager->register(new \Copy_Text());
}
add_action('elementor/widgets/register', 'register_widget_rsvp');