<?php
namespace Elementor;

if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

class Availhub_Trainings_With_Filter extends Widget_Base {

	public function get_name() {
		return 'availhub_trainings_with_filter';
	}

	public function get_title() {
		return __( 'Availhub Trainings', 'availhub' );
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
                'box_spacing',
                [
                    'label' => __( 'Box Gap', 'availhub' ),
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
                        'size' => 30,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-trainings-listing-wrapper__item' => 'gap: {{SIZE}}{{UNIT}};',
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
                        '{{WRAPPER}} .avb-training-listing-wrapper__content' => 'padding: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .avb-trainings-listing-wrapper__item' => 'border-radius: {{TOP}}{{UNIT}} {{RIGHT}}{{UNIT}} {{BOTTOM}}{{UNIT}} {{LEFT}}{{UNIT}};',
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
                        '{{WRAPPER}} .avb-trainings-listing-wrapper__item' => 'background-color: {{VALUE}}',
                    ],
                    'default' => '#FFFFFF00'
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Box_Shadow::get_type(),
                [
                    'name' => 'box_shadow',
                    'label' => __( 'Box Shadow', 'availhub' ),
                    'selector' => '{{WRAPPER}} .avb-trainings-listing-wrapper__item',
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
                        '{{WRAPPER}} .avb-training-listing__title' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_typography',
                    'label' => __( 'Typography', 'availhub' ),
                    'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .avb-training-listing__title',
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
                        '{{WRAPPER}} .avb-training-listing__title' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );


        $this->end_controls_section();

        // Description Style
        $this->start_controls_section(
			'description_style_section',
			[
				'label' => __( 'Description', 'availhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_control(
                'description_color',
                [
                    'label' => __( 'Description Color', 'availhub' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Core\Schemes\Color::get_type(),
                        'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-training-listing__content-item' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'description_typography',
                    'label' => __( 'Typography', 'availhub' ),
                    'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .avb-training-listing__content-item',
                ]
            );

            $this->add_control(
                'description_spacing',
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
                        '{{WRAPPER}} .avb-training-listing__content-item' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );


        $this->end_controls_section();

        // Price Style
        $this->start_controls_section(
			'price_style_section',
			[
				'label' => __( 'Price', 'availhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_control(
                'price_color',
                [
                    'label' => __( 'Price Color', 'availhub' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Core\Schemes\Color::get_type(),
                        'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-training-listing__price' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'price_typography',
                    'label' => __( 'Typography', 'availhub' ),
                    'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .avb-training-listing__price',
                ]
            );

        $this->end_controls_section();

        // Filter Style
        $this->start_controls_section(
			'filter_style_section',
			[
				'label' => __( 'Filter', 'availhub' ),
				'tab' => \Elementor\Controls_Manager::TAB_STYLE,
			]
		);

            $this->add_control(
                'title_filter_color',
                [
                    'label' => __( 'Title Color', 'availhub' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Core\Schemes\Color::get_type(),
                        'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-trainings-category-row h2' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'title_filter_typography',
                    'label' => __( 'Typography', 'availhub' ),
                    'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .avb-trainings-category-row h2',
                ]
            );

            $this->add_control(
                'title_filter_spacing',
                [
                    'label' => __( 'Title Spacing', 'availhub' ),
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
                        '{{WRAPPER}} .avb-trainings-category-row h2' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

            $this->add_control(
                'content_filter_color',
                [
                    'label' => __( 'Content Color', 'availhub' ),
                    'type' => \Elementor\Controls_Manager::COLOR,
                    'scheme' => [
                        'type' => \Elementor\Core\Schemes\Color::get_type(),
                        'value' => \Elementor\Core\Schemes\Color::COLOR_1,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-cat-wrapper label' => 'color: {{VALUE}}',
                    ],
                ]
            );

            $this->add_group_control(
                \Elementor\Group_Control_Typography::get_type(),
                [
                    'name' => 'content_filter_typography',
                    'label' => __( 'Typography', 'availhub' ),
                    'scheme' => \Elementor\Core\Schemes\Typography::TYPOGRAPHY_1,
                    'selector' => '{{WRAPPER}} .avb-cat-wrapper label',
                ]
            );

            $this->add_control(
                'group_filter_spacing',
                [
                    'label' => __( 'Category Wrap Spacing', 'availhub' ),
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
                        'size' => 30,
                    ],
                    'selectors' => [
                        '{{WRAPPER}} .avb-trainings-category-row' => 'margin-bottom: {{SIZE}}{{UNIT}};',
                    ],
                ]
            );

        $this->end_controls_section();

    }

    protected function render() {

        $settings = $this->get_settings_for_display();
		$source	= $settings['source'];


        if( $source == "latest" ) {

            $args = array(
                'post_type' => 'trainings',
                'post_status' => 'publish',
                'posts_per_page' => -1,
                'order' => 'DESC',
            );

        }

        $posts = new \WP_Query( $args );

        if( $posts->have_posts() ) { ?>
        <div class="avb-trainings-listing-wrapper__all">
            <div class="avb-trainings-listing-wrapper" data-ppg="<?php echo $posts_per_page; ?>" data-paged="1" data-pages="<?php echo $posts->max_num_pages; ?>" data-query='<?php echo json_encode( $posts->query_vars ); ?>'>
                
                <div class="avb-trainings-category-listing-wrapper">
                    <div class="avb-trainings-category-row avb-trainings-category-listing-item">
                        <h2>Training Categories</h2>
                        <input type="hidden" name="cat-val" value="">

                            <?php 
                                $terms = get_terms(array(
                                    'taxonomy' => 'trainings_category',
                                    'orderby' => 'term_id', 
                                    'hide_empty' => false
                                )); 
                            ?>
                            <?php
                                foreach($terms as $term):
                            ?>
                                <div class="avb-cat-wrapper" data-set="<?php echo $term->term_id;?> ">
                                    <input class="avb-trainings-category-element avb-trainings-category-item <?php echo $post_id; ?>" type="checkbox" id="<?php echo $term->name;?>" name="category" value="<?php echo $term->term_id;?>">
                                    <label for="<?php echo $term->name;?>"><?php echo $term->name;?></label>
                                </div> 
                            <?php endforeach; ?>               
                            <?php    
                                wp_reset_postdata();
                            ?>

                    </div>

                    <div class="avb-trainings-category-row avb-trainings-category-listing-year">
                        <h2>Years</h2>
                        <input type="hidden" name="cat-year" value="">

                            <?php 
                                $terms = get_terms(array(
                                    'taxonomy' => 'trainings_year',
                                    'orderby' => 'term_id', 
                                    'hide_empty' => false
                                )); 
                            ?>
                            <?php
                                foreach($terms as $term):
                            ?>
                                <div class="avb-cat-wrapper" data-set="<?php echo $term->term_id;?> ">
                                    <input class="avb-trainings-category-element avb-trainings-category-year <?php echo $post_id; ?>" type="checkbox" id="<?php echo $term->name;?>" name="year" value="<?php echo $term->term_id;?>">
                                    <label for="<?php echo $term->name;?>"><?php echo $term->name;?></label>
                                </div> 
                            <?php endforeach; ?>               
                            <?php    
                                wp_reset_postdata();
                            ?>

                    </div>
                </div>

                <div class="avb-trainings-listing-wrapper__item">
                
                    <?php
                     
                    while( $posts->have_posts() ) {
                        $posts->the_post();

                            get_template_part( 'template-parts/trainings', 'loop' );

                    } wp_reset_postdata();
                    ?>
                </div>
                
            </div>
        </div>
        
        
        <?php } else {

            echo __( 'No Training(s) found.', 'availhub' ); 
            
        }

    }

}