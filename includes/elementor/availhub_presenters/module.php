<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Availhub_Presenters extends Widget_Base {

	public function get_name() {
		return 'availhub_presenters';
	}

	public function get_title() {
		return __( 'Availhub Presenters', 'availhub' );
	}

	public function get_icon() {
		return 'eicon-post-content';
	}

	public function get_categories() {
		return [ 'availhub-widget' ];
	}

    protected function _register_controls() {

        $this->start_controls_section(
			'content_section',
			[
				'label' => __( 'Query', 'availhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_CONTENT,
			]
		);

            $this->add_control(
                'source',
                [
                    'label' => __( 'Source', 'availhub' ),
                    'type' => Controls_Manager::SELECT,
                    'options' => [
                        'latest' => __( 'Latest', 'availhub' ),
                        // 'page_query' => __( 'Page Query', 'availhub' ),
                    ],
                    'default' => 'latest',
                    'save_default' => true,
                ]
            );

            $this->add_control(
                'posts_per_page',
                [
                    'label' => __( 'Posts Per Page', 'availhub' ),
                    'type' => \Elementor\Controls_Manager::NUMBER,
                    'min' => -1,
                    'max' => 100,
                    'step' => 1,
                    'default' => 5,
                ]
            );

            $this->add_control(
                'load_more_link',
                [
                    'label' => __( 'Button Load More Link', 'availhub' ),
                    'type' => \Elementor\Controls_Manager::URL,
                    'placeholder' => __( 'https://your-link.com', 'availhub' ),
                    'show_external' => true,
                    'default' => [
                        'url' => '',
                        'is_external' => true,
                        'nofollow' => true,
                    ],
                ]
            );

        $this->end_controls_section();
        
        // Box Styles
        $this->start_controls_section(
			'box_style_section',
			[
				'label' => __( 'Box', 'availhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_control(
                'box_padding',
                [
                    'label' => __( 'Padding', 'availhub' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-presenter-listing-wrapper__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .avb-presenters-listing-wrapper__item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .avb-presenters-listing-wrapper__item' => 'background-color: {{VALUE}}',
                    ],
                    'default' => '#FFFFFF00'
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'box_shadow',
                    'label' => __( 'Box Shadow', 'availhub' ),
                    'selector' => '{{WRAPPER}} .avb-presenters-listing-wrapper__item',
                ]
            );


        $this->end_controls_section();
        
        
        
        // Title Style
        $this->start_controls_section(
			'title_style_section',
			[
				'label' => __( 'Title', 'availhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_control(
                'title_color',
                [
                    'label' => __( 'Title Color', 'availhub' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Core\Schemes\Color::get_type(),
                        'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-presenter-listing__title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Typography', 'availhub' ),
                    'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .avb-presenter-listing__title',
                ]
            );

            $this->add_control(
                'title_spacing',
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
                        'size' => 5,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-presenter-listing__title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );


        $this->end_controls_section();

        

        

        // Job Style
        $this->start_controls_section(
			'price_style_section',
			[
				'label' => __( 'Job', 'availhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_control(
                'job_color',
                [
                    'label' => __( 'Job Color', 'availhub' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Core\Schemes\Color::get_type(),
                        'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-presenter-listing__job' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'job_typography',
                    'label' => __( 'Typography', 'availhub' ),
                    'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .avb-presenter-listing__job',
                ]
            );

        $this->end_controls_section();

        // Load More Button Style
        $this->start_controls_section(
			'load_more_style_section',
			[
				'label' => __( 'Load More', 'availhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'load_more_typography',
                    'label' => __( 'Typography', 'availhub' ),
                    'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .avb-presenters-load-more__wrapper a',
                ]
            );

            $this->start_controls_tabs(
                'load_more_style_tabs'
            );

                $this->start_controls_tab(
                    'load_more_normal_tab',
                    [
                        'label' => __( 'Normal', 'availhub' ),
                    ]
                );

                    $this->add_control(
                        'load_more_normal_color',
                        [
                            'label' => __( 'Load More Color', 'availhub' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => \Elementor\Core\Schemes\Color::get_type(),
                                'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .avb-presenters-load-more__wrapper a' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_control(
                        'load_more_normal_background_color',
                        [
                            'label' => __( 'Background Color', 'availhub' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => \Elementor\Core\Schemes\Color::get_type(),
                                'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .avb-presenters-load-more__wrapper a' => 'background-color: {{VALUE}}',
                            ],
                            
                        ]
                    );

                $this->end_controls_tab();

                $this->start_controls_tab(
                    'load_more_hover_tab',
                    [
                        'label' => __( 'Hover', 'availhub' ),
                    ]
                );

                    $this->add_control(
                        'load_more_hover_color',
                        [
                            'label' => __( 'Load More Color', 'availhub' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => \Elementor\Core\Schemes\Color::get_type(),
                                'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .avb-presenters-load-more__wrapper a:hover' => 'color: {{VALUE}}',
                            ],
                        ]
                    );

                    $this->add_control(
                        'load_more_hover_background_color',
                        [
                            'label' => __( 'Background Color', 'availhub' ),
                            'type' => \Elementor\Controls_Manager::COLOR,
                            'scheme' => [
                                'type' => \Elementor\Core\Schemes\Color::get_type(),
                                'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                            ],
                            'selectors' => [
                                '{{WRAPPER}} .avb-presenters-load-more__wrapper a:hover' => 'background-color: {{VALUE}} !important',
                            ],
                            
                        ]
                    );

                $this->end_controls_tab();

            $this->end_controls_tabs();

            $this->add_responsive_control(
                'load_more_padding',
                [
                    'label' => __( 'Text Padding', 'availhub' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-presenters-load-more__wrapper a' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'load_more_border_radius',
                [
                    'label' => __( 'Border Radius', 'availhub' ),
                    'type' => Controls_Manager::DIMENSIONS,
                    'size_units' => [ 'px', '%', 'em' ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-presenters-load-more__wrapper a' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();
		$source	= $settings['source'];
        $posts_per_page	= $settings['posts_per_page'];
        $load_more_link = $settings['load_more_link']['url'];


        if( $source == "latest" ) {

            $args = array(
                'post_type' => 'presenter',
                'post_status' => 'publish',
                'posts_per_page' => $posts_per_page,
                'order' => 'DESC',
            );

        }

        $posts = new \WP_Query( $args );

        if( $posts->have_posts() ) { ?>
        <div class="avb-presenters-listing-wrapper__all">
            <div class="avb-presenters-listing-wrapper" data-ppg="<?php echo $posts_per_page; ?>" data-paged="1" data-pages="<?php echo $posts->max_num_pages; ?>" data-query='<?php echo json_encode( $posts->query_vars ); ?>'>


                <div class="avb-presenters-listing-wrapper__item">
                
                    <?php
                     
                    while( $posts->have_posts() ) {
                        $posts->the_post();

                            get_template_part( 'template-parts/presenters', 'loop' );

                    } wp_reset_postdata();
                    ?>
                </div>

                <div class="avb-presenters-load-more__wrapper">
                    <?php
                        if($posts_per_page != -1):
                    ?>

                    <a href="<?php echo $load_more_link; ?>">View More</a>
                    <?php endif; ?>
                </div>
                
            </div>
        </div>
        
        
        <?php } else {

            echo __( 'No Presenter(s) found.', 'availhub' ); 
            
        }

    }

}