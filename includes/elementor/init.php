<?php 
/**
 * Register New Category Widget for Elementor
 */
function add_elementor_widget_categories( $elements_manager ) {
    $elements_manager->add_category(
        'availhub-widget',
        [
            'title' => __( 'Availhub Widget', 'availhub' ),
            'icon' => 'fa fa-plug'
        ]
    );
}
add_action( 'elementor/elements/categories_registered', 'add_elementor_widget_categories' );

class Custom_Elementor_Widgets {

	protected static $instance = null;

	public static function get_instance() {
		if ( ! isset( static::$instance ) ) {
			static::$instance = new static;
		}

		return static::$instance;
	}

	protected function __construct() {
		require_once( 'availhub_testimoni_carousel/module.php' );
		require_once( 'availhub_trainings_with_filter/module.php' );
		require_once( 'availhub_presenters/module.php' );
		add_action( 'elementor/widgets/widgets_registered', [ $this, 'register_widgets' ] );
	}

	public function register_widgets() {
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Availhub_Testimoni_Carousel() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Availhub_Trainings_With_Filter() );
		\Elementor\Plugin::instance()->widgets_manager->register_widget_type( new \Elementor\Availhub_Presenters() );
	}

}

add_action( 'init', 'my_elementor_init' );
function my_elementor_init() {
	Custom_Elementor_Widgets::get_instance();
}