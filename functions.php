<?php
/**
 * Theme functions and definitions
 *
 * @package AvailHub
 */

if ( ! defined( '_S_VERSION' ) ) {
	define( '_S_VERSION', time() );
}


/**
 * Load child theme css and optional scripts
 *
 * @return void
 */
function hello_elementor_child_enqueue_scripts() {
	wp_enqueue_style( 'theme', get_stylesheet_directory_uri() . '/style.css', ['hello-elementor-theme-style',], '1.0.0' );
	wp_enqueue_style( 'header-footer', get_stylesheet_directory_uri() . '/header-footer.css', null, '1.0.0' );

	wp_enqueue_script( 'main', get_stylesheet_directory_uri() . '/assets/js/main.js', array( 'jquery' ), _S_VERSION, true );

	$vars['ajaxurl'] = admin_url( 'admin-ajax.php' );
	wp_localize_script( 'main', '_avb', $vars );
}
add_action( 'wp_enqueue_scripts', 'hello_elementor_child_enqueue_scripts', 20 );

/**
 * Load Ajax Init
 */
require_once( get_stylesheet_directory() . '/includes/ajax/init.php' );

/**
 * Custom Widget Elementor
 */
require_once( get_stylesheet_directory() . '/includes/elementor/init.php' );