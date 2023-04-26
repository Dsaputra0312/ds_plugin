<?php
if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly.
}

/**
 * Elementor oEmbed Widget.
 *
 * Elementor widget that inserts an embbedable content into the page, from any given URL.
 *
 * @since 1.0.0
 */
class Music_Player extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'Music Player';
    }

    public function get_title()
    {
        return esc_html__('Music_Player', 'music-player');
    }

    public function get_icon()
    {
        return 'eicon-code';
    }

    public function get_custom_help_url()
    {
        return 'https://alivestori.com/';
    }

    public function get_categories()
    {
        return ['general'];
    }

    public function get_keywords()
    {
        return ['music', 'player', 'musik'];
    }

    /**
     * Register oEmbed widget controls.
     *
     * Add input fields to allow the user to customize the widget settings.
     *
     * @since 1.0.0
     * @access protected
     */
    protected function register_controls()
    {

        $this->start_controls_section(
            'content_section',
            [
                'label' => esc_html__('Music Player', 'ds-toolkit'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'link_music',
            [
                'label' => esc_html__('Link', 'elementor'),
                'type' => \Elementor\Controls_Manager::URL,
                'default' => [
                    'url' => 'https://www.soundhelix.com/examples/mp3/SoundHelix-Song-1.mp3',
                ],
                'options' => false,
            ]
        );

        $this->add_control(
            'play_image',
            [
                'label' => esc_html__('Image Play', 'elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->add_control(
            'pause_image',
            [
                'label' => esc_html__('Image Pause', 'elementor'),
                'type' => \Elementor\Controls_Manager::MEDIA,
                'dynamic' => [
                    'active' => true,
                ],
                'default' => [
                    'url' => \Elementor\Utils::get_placeholder_image_src(),
                ],
            ]
        );

        $this->end_controls_section();

    }

    /**
     * Render oEmbed widget output on the frontend.
     *
     * Written in PHP and used to generate the final HTML.
     *
     * @since 1.0.0
     * @access protected
     */

    protected function render()
    {
        $settings = $this->get_settings_for_display();
        wp_enqueue_style('custom_style');
        wp_enqueue_script('jquery_3.6.4');
        wp_enqueue_script('custom_script');
        $play_image = $settings['play_image'];
        $pause_image = $settings['pause_image'];
        $music_url = $settings['link_music']['url'];
        ?>

        <div id="play" class="player_music"><img src="<?= $play_image['url'] ?>"></div>
        <div id="pause" class="player_music"><img src="<?= $pause_image['url'] ?>"></div>
        <script>const audio = new Audio("<?= $music_url ?>");</script>
        <?php
    }
}