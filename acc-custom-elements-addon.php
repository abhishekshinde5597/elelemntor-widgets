<?php

/**
 * Plugin Name: Acc Elements Addon
 * Description: Acc Elements Addon
 * Plugin URI:  #
 * Version:     1.0.0
 * Author:      
 * Author URI:  #
 * Text Domain: AQUAPROX
 *
 * Elementor tested up to: 3.5.0
 * Elementor Pro tested up to: 3.5.0
 */

if ( ! defined( 'ABSPATH' ) ) {
    exit; // Exit if accessed directly.
}

/**
 * Register Widgets.
 *
 * Include widget file and register widget class.
 *
 * @since 1.0.0
 * @param \Elementor\Widgets_Manager $widgets_manager Elementor widgets manager.
 * @return void
 */
function register_essential_custom_widgets( $widgets_manager ) {

    require_once( __DIR__ . '/widgets/card-widget.php' );  
    require_once( __DIR__ . '/widgets/card-widget-2.php' );
    require_once( __DIR__ . '/widgets/card-widget-3.php' );
    require_once( __DIR__ . '/widgets/card-widget-4.php' );
    require_once( __DIR__ . '/widgets/card-widget-5.php' );
  
    $widgets_manager->register( new \Essential_Elementor_Card_Widget() );  
    $widgets_manager->register( new \Elementor_Hello_World_Widget_2() );
    $widgets_manager->register( new \Elementor_Nos_Expertise() );
    $widgets_manager->register( new \Elementor_Entites() );
    $widgets_manager->register( new \Elementor_Gsap_circular_slider() );
    
    

}
add_action( 'elementor/widgets/register', 'register_essential_custom_widgets' );



wp_enqueue_script(
    'essential-elementor-widget',
    plugin_dir_url(__FILE__) . 'js/custom.js', 
    ['jquery'], // Dependencies
    null,
    true 
);

wp_enqueue_style(
    'essential-elementor-accordion',
    plugin_dir_url(__FILE__) . 'css/accordion.css'
);


function some_elementor_addon_activate() {
    if( !class_exists( 'Elementor\Plugin' ) ) {
        deactivate_plugins( plugin_basename( __FILE__ ) );
        wp_die( __( 'Please install and Activate Elementor.', 'elementor-addon-slug' ), 'Plugin dependency check', array( 'back_link' => true ) );
    }
}
register_activation_hook( __FILE__, 'some_elementor_addon_activate' );

