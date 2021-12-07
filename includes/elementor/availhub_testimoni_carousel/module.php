<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Availhub_Testimoni_Carousel extends Widget_Base {

    public function __construct( $data = [], $args = null ) {
		parent::__construct( $data, $args );

		wp_register_script( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js', [ 'elementor-frontend' ], '1.8.1', true );
		wp_register_script( 'availhub-testimoni-carousel', get_stylesheet_directory_uri() . '/includes/elementor/availhub_testimoni_carousel/js/script.js', array( 'jquery' ), _S_VERSION, true );

		wp_register_style( 'slick', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.css' );
		wp_register_style( 'slick-theme', 'https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css' );
	}

    public function get_script_depends() {
		return [ 'slick', 'availhub-testimoni-carousel' ];
	}

	public function get_style_depends() {
		return [ 'slick', 'slick-theme' ];
	}

	public function get_name() {
		return 'availhub_testimoni_carousel';
	}

	public function get_title() {
		return __( 'Availhub Testimoni Carousel', 'availhub' );
	}

	public function get_icon() {
		return 'eicon-testimonial-carousel';
	}

	public function get_categories() {
		return [ 'availhub-widget' ];
	}

    protected function _register_controls() {

        $this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Content', 'availhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

            $repeater = new \Elementor\Repeater();

            $repeater->add_control(
                'list_image',
                [
                    'label' => __( 'Choose Image', 'availhub' ),
                    'type' => \Elementor\Controls_Manager::MEDIA,
                    'default' => [
                        'url' => \Elementor\Utils::get_placeholder_image_src(),
                    ],
                ]
            );

            $repeater->add_control(
                'list_content', [
                    'label' => __( 'Content', 'availhub' ),
                    'type' => \Elementor\Controls_Manager::WYSIWYG,
                    'default' => __( 'List Content' , 'availhub' ),
                    'show_label' => false,
                ]
            );

            $repeater->add_control(
                'list_name', [
                    'label' => __( 'Name', 'availhub' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'List Name' , 'availhub' ),
                    'label_block' => true,
                ]
            );
    
            $repeater->add_control(
                'list_position', [
                    'label' => __( 'Position', 'availhub' ),
                    'type' => \Elementor\Controls_Manager::TEXT,
                    'default' => __( 'List Position' , 'availhub' ),
                    'label_block' => true,
                ]
            );

            $this->add_control(
                'list',
                [
                    'label' => __( 'Carousel Content', 'availhub' ),
                    'type' => \Elementor\Controls_Manager::REPEATER,
                    'fields' => $repeater->get_controls(),
                    'default' => [
                        [
                            'list_title' => __( 'Title #1', 'availhub' ),
                            'list_content' => __( 'Item content. Click the edit button to change this text.', 'availhub' ),
                        ],
                        [
                            'list_title' => __( 'Title #2', 'availhub' ),
                            'list_content' => __( 'Item content. Click the edit button to change this text.', 'availhub' ),
                        ],
                    ],
                    'title_field' => '{{{ list_title }}}',
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'box_style_section',
			[
				'label' => __( 'Box', 'availhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_control(
                'box_spacing',
                [
                    'label' => __( 'Spacing', 'availhub' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 100,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 10,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-testimonial-item' => 'margin-left: {{SIZE}}{{UNIT}}; margin-right: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'box_padding',
                [
                    'label' => __( 'Padding', 'availhub' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-testimonial-item' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'box_border_radius',
                [
                    'label' => __( 'Border Radius', 'availhub' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-testimonial-item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'background_color',
                [
                    'label' => __( 'Background Color', 'availhub' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Core\Schemes\Color::get_type(),
                        'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-testimonial-item' => 'background-color: {{VALUE}}',
                    ],
                    'default' => '#fff'
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'box_shadow',
                    'label' => __( 'Box Shadow', 'availhub' ),
                    'selector' => '{{WRAPPER}} .avb-testimonial-item',
                ]
            );

            $this->add_control(
                'box_text_align',
                [
                    'label' => __( 'Alignment', 'availhub' ),
                    'type' => \Elementor\Controls_Manager::CHOOSE,
                    'options' => [
                        'left' => [
                            'title' => __( 'Left', 'availhub' ),
                            'icon' => 'fa fa-align-left',
                        ],
                        'center' => [
                            'title' => __( 'Center', 'availhub' ),
                            'icon' => 'fa fa-align-center',
                        ],
                        'right' => [
                            'title' => __( 'Right', 'availhub' ),
                            'icon' => 'fa fa-align-right',
                        ],
                    ],
                    'default' => 'center',
                    'toggle' => true,
                    'selectors' => [
                        '{{WRAPPER}} .avb-testimonial-item' => 'text-align: {{VALUE}}',
                    ],
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'image_style_section',
			[
				'label' => __( 'Image', 'availhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_control(
                'width_image',
                [
                    'label' => __( 'Width', 'availhub' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 100,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-testimonial-image' => 'width: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'height_image',
                [
                    'label' => __( 'Height', 'availhub' ),
                    'type' => Controls_Manager::SLIDER,
                    'size_units' => [ 'px' ],
                    'range' => [
                        'px' => [
                            'min' => 0,
                            'max' => 1000,
                            'step' => 1,
                        ],
                    ],
                    'default' => [
                        'unit' => 'px',
                        'size' => 100,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-testimonial-image' => 'height: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'object_fit',
                [
                    'label' => __( 'Object Fit', 'availhub' ),
                    'type' => \Elementor\Controls_Manager::SELECT,
                    'default' => '',
                    'options' => [
                        ''  => __( 'Default', 'availhub' ),
                        'fill' => __( 'Fill', 'availhub' ),
                        'cover' => __( 'Cover', 'availhub' ),
                        'contain' => __( 'Contain', 'availhub' ),
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-testimonial-image' => 'object-fit: {{VALUE}};',
                    ],
                ]
            );

            $this->add_control(
                'image_border_radius',
                [
                    'label' => __( 'Border Radius', 'availhub' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-testimonial-image' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'name_style_section',
			[
				'label' => __( 'Name', 'availhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_control(
                'name_color',
                [
                    'label' => __( 'Text Color', 'availhub' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Core\Schemes\Color::get_type(),
                        'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-testimonial-name' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'text_typography',
                    'label' => __( 'Typography', 'availhub' ),
                    'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .avb-testimonial-name',
                ]
            );

            $this->add_control(
                'name_margin',
                [
                    'label' => __( 'Margin', 'availhub' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-testimonial-name' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );


        $this->end_controls_section();

        $this->start_controls_section(
			'position_style_section',
			[
				'label' => __( 'Position', 'availhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_control(
                'position_color',
                [
                    'label' => __( 'Text Color', 'availhub' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Core\Schemes\Color::get_type(),
                        'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-testimonial-position' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'position_typography',
                    'label' => __( 'Typography', 'availhub' ),
                    'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .avb-testimonial-position',
                ]
            );

        $this->end_controls_section();

        $this->start_controls_section(
			'content_style_section',
			[
				'label' => __( 'Content', 'availhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_control(
                'content_color',
                [
                    'label' => __( 'Text Color', 'availhub' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Core\Schemes\Color::get_type(),
                        'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-testimonial-content' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'content_typography',
                    'label' => __( 'Typography', 'availhub' ),
                    'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .avb-testimonial-content',
                ]
            );

            $this->add_control(
                'content_margin',
                [
                    'label' => __( 'Margin', 'availhub' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-testimonial-content' => 'margin: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );


        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();

        if ( $settings['list'] ) {

			echo '<div class="avb-testimonial-wrapper">';
			foreach (  $settings['list'] as $item ) {
                echo sprintf( '
                    <div class="avb-testimonial-item elementor-repeater-item-%s">
                        <div class="avb-testimonial-top">
                            <img src="%s" class="avb-testimonial-image">
							<div class="avb-testimonial-author">
								<h3 class="avb-testimonial-name">%s</h3>
								<div class="avb-testimonial-position">%s</div>
							</div>
                        </div>
                        <div class="avb-testimonial-content">%s</div>
                    </div>
                ', $item['_id'], $item['list_image']['url'], $item['list_name'], $item['list_position'], $item['list_content'] );
			}
			echo '</div>';

		}

    }

}