<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package travel_vacation
 */

function travel_vacation_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'travel_vacation_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1360,
		'height'                 => 110,
		'flex-width'         	=> true,
        'flex-height'        	=> true,
		'wp-head-callback'       => 'travel_vacation_header_style',
	) ) );
}

add_action( 'after_setup_theme', 'travel_vacation_custom_header_setup' );

if ( ! function_exists( 'travel_vacation_header_style' ) ) :

add_action( 'wp_enqueue_scripts', 'travel_vacation_header_style' );
function travel_vacation_header_style() {
	if ( get_header_image() ) :
	$travel_vacation_custom_css = "
        .home header.site-header .header-main-wrapper .bottom-header-outer-wrapper .bottom-header-part{
			background-image:url('".esc_url(get_header_image())."') !important;
			background-position: center top;
		}";
	   	wp_add_inline_style( 'travel-vacation-style', $travel_vacation_custom_css );
	endif;
}
endif;