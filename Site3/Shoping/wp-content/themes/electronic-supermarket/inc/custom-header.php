<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Electronic Supermarket
 * @subpackage electronic_supermarket
 */

function electronic_supermarket_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'electronic_supermarket_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1600,
		'height'                 => 400,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'electronic_supermarket_header_style',
	) ) );
}
add_action( 'after_setup_theme', 'electronic_supermarket_custom_header_setup' );

if ( ! function_exists( 'electronic_supermarket_header_style' ) ) :
add_action( 'wp_enqueue_scripts', 'electronic_supermarket_header_style' );
function electronic_supermarket_header_style() {
	if ( get_header_image() ) :
	$custom_css = "
        .header-box{
			background-image:url('".esc_url(get_header_image())."');
			background-position: center top;
			background-size: cover;
		}";
	   	wp_add_inline_style( 'electronic-supermarket-style', $custom_css );
	endif;
}
endif;