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
class Widget_Form_RSVP extends \Elementor\Widget_Base
{

    public function get_name()
    {
        return 'Form RSVP';
    }

    public function get_title()
    {
        return esc_html__('Form RSVP', 'widget-form-rsvp');
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
        return ['rsvp', 'form', 'kehadiran'];
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
                'label' => esc_html__('Form RSVP', 'ds-toolkit'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'card_style',
            [
                'label' => esc_html__('Select Style', 'ds-toolkit'),
                'type' => \Elementor\Controls_Manager::SELECT,
                'options' => [
                    '1' => __('Style One', 'ds-toolkit'),
                    '2' => __('Style Two', 'ds-toolkit'),
                ],
                'default' => '1',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'button_section',
            [
                'label' => esc_html__('Button', 'ds-toolkit'),
                'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
            ]
        );

        $this->add_control(
            'text-botton',
            [
                'label' => esc_html__('Text', 'ds-toolkit'),
                'type' => \Elementor\Controls_Manager::TEXT,
                'default' => 'Kirim',
            ]
        );

        $this->add_responsive_control(
            'align-button',
            [
                'label' => esc_html__('Alignment', 'elementor'),
                'type' => \Elementor\Controls_Manager::CHOOSE,
                'options' => [
                    'elementor-align-left' => [
                        'title' => esc_html__('Left', 'elementor'),
                        'icon' => 'eicon-text-align-left',
                    ],
                    'elementor-align-center' => [
                        'title' => esc_html__('Center', 'elementor'),
                        'icon' => 'eicon-text-align-center',
                    ],
                    'elementor-align-right' => [
                        'title' => esc_html__('Right', 'elementor'),
                        'icon' => 'eicon-text-align-right',
                    ],
                ],
            ]
        );

        $this->end_controls_section();

        // Tab Style
        $this->start_controls_section(
            'section_style_form',
            [
                'label' => esc_html__('Form', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Typography::get_type(),
            [
                'name' => 'form-typography',
                'label' => __('Form Typography', 'textdomain'),
                'selector' => '{{WRAPPER}} .container-form',
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'form_background',
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} .container-form .form-control',
                'fields_options' => [
                    'background' => [
                        'default' => 'classic',
                    ],
                    'color' => [
                        'global' => [
                            'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_ACCENT,
                        ],
                    ],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border-form',
                'selector' => '{{WRAPPER}} .container-form .form-control',
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'border_radius_form',
            [
                'label' => esc_html__('Border Radius', 'elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .container-form .form-control' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'form_box_shadow',
                'selector' => '{{WRAPPER}} .container-form .form-control',
            ]
        );

        $this->add_responsive_control(
            'form_text_padding',
            [
                'label' => esc_html__('Padding', 'elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} .container-form .form-control' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
            ]
        );

        $this->end_controls_section();

        $this->start_controls_section(
            'section_style_button',
            [
                'label' => esc_html__('Button', 'textdomain'),
                'tab' => \Elementor\Controls_Manager::TAB_STYLE,
            ]
        );

        $this->add_control(
            'button_text_color',
            [
                'label' => esc_html__('Text Color', 'elementor'),
                'type' => \Elementor\Controls_Manager::COLOR,
                'default' => '',
                'selectors' => [
                    '{{WRAPPER}} #btn-form' => 'fill: {{VALUE}}; color: {{VALUE}};',
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Background::get_type(),
            [
                'name' => 'button_background',
                'types' => ['classic', 'gradient'],
                'exclude' => ['image'],
                'selector' => '{{WRAPPER}} #btn-form',
                'fields_options' => [
                    'background' => [
                        'default' => 'classic',
                    ],
                    'color' => [
                        'global' => [
                            'default' => \Elementor\Core\Kits\Documents\Tabs\Global_Colors::COLOR_ACCENT,
                        ],
                    ],
                ],
            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Border::get_type(),
            [
                'name' => 'border-btn',
                'selector' => '{{WRAPPER}} #btn-form',
                'separator' => 'before',
            ]
        );

        $this->add_responsive_control(
            'button_border_radius',
            [
                'label' => esc_html__('Border Radius', 'elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} #btn-form' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],

            ]
        );

        $this->add_group_control(
            \Elementor\Group_Control_Box_Shadow::get_type(),
            [
                'name' => 'button_box_shadow',
                'selector' => '{{WRAPPER}} #btn-form',
            ]
        );

        $this->add_responsive_control(
            'button_text_padding',
            [
                'label' => esc_html__('Padding', 'elementor'),
                'type' => \Elementor\Controls_Manager::DIMENSIONS,
                'size_units' => ['px', '%', 'em', 'rem', 'vw', 'custom'],
                'selectors' => [
                    '{{WRAPPER}} #btn-form' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                ],
                'separator' => 'before',
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
        wp_enqueue_style('bootstrap_5');
        wp_enqueue_style('custom_style');
        wp_enqueue_script('bootstrap_5');

        post_rsvp();

        if ($settings['card_style'] == '1'): ?>
            <div class="container-form">
                <form method="POST" action="">
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" name="nama" placeholder="Nama" required>
                    </div>
                    <div class="form-group mb-3">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kehadiran" value="Hadir" checked>
                            <label class="form-check-label" for="flexRadioDefault1">
                                Hadir
                            </label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="kehadiran" value="Tidak Hadir">
                            <label class="form-check-label" for="flexRadioDefault2">
                                Tidak bisa hadir
                            </label>
                        </div>
                    </div>
                    <div class="form-group mb-3">
                        <textarea class="form-control" name="ucapan" cols="30" rows="3" placeholder="Beri Ucapan"></textarea>
                    </div>
                    <div class="custom_btn <?= $settings['align-button']; ?>">
                        <button id="btn-form" type="submit">
                            <?= $settings['text-botton']; ?>
                        </button>
                    </div>
                </form>
            </div>
        <?php endif; ?>
        <?php if ($settings['card_style'] == '2'): ?>
            <h1>Comming Soon GESSSS....</h1>
        <?php endif;
    }
}