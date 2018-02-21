<?php
/**
 *
 * @package una
 * @since una 1.0.2
 * @license GPL 2.0
 *
 */

#-------------------------------------------------------------
# Enqueue Styles
#-------------------------------------------------------------

function interferenze_enqueue_styles() {

	# Main stylesheet
  	wp_register_style( 'interferenze-main-styles' , get_template_directory_uri(). "/style.css" , array(), una_theme_version, 'screen' );
  	wp_enqueue_style( 'interferenze-main-styles' );

}

add_action( 'wp_enqueue_scripts' , 'interferenze_enqueue_styles' );

#-------------------------------------------------------------
# Enqueue Scripts
#-------------------------------------------------------------

# False = Header
# True = Footer

function interferenze_enqueue_scripts() {

	# Custom Scripts
	wp_register_script  ( 'interferenze-custom-code' , get_template_directory_uri().'/frontend/js/custom-code.js' , array(), interferenze_theme_version, false );
	wp_enqueue_script ( 'interferenze-custom-code' );

}

add_action( 'wp_enqueue_scripts' , 'interferenze_enqueue_scripts'   );

#-------------------------------------------------------------
# Menu
#-------------------------------------------------------------

function register_my_menus() {
  register_nav_menus(
    array(
      'header-menu' => __( 'Header' ),
    )
  );
}
add_action( 'init', 'register_my_menus' );

#-------------------------------------------------------------
# Thumbnail
#-------------------------------------------------------------

add_theme_support( 'post-thumbnails' );
