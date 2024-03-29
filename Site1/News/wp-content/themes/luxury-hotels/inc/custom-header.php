<?php
/**
 * Custom header implementation
 *
 * @link https://codex.wordpress.org/Custom_Headers
 *
 * @package Luxury Hotels
 * @subpackage luxury_hotels
 */

/**
 * Set up the WordPress core custom header feature.
 *
 * @uses luxury_hotels_header_style()
 */
function luxury_hotels_custom_header_setup() {
	add_theme_support( 'custom-header', apply_filters( 'luxury_hotels_custom_header_args', array(
		'default-text-color'     => 'fff',
		'header-text' 			 =>	false,
		'width'                  => 1400,
		'height'                 => 300,
		'flex-width'    		 => true,
		'flex-height'    		 => true,
		'wp-head-callback'       => 'luxury_hotels_header_style',
		'default-image'          => get_parent_theme_file_uri( '/assets/images/header_img.png' ),
	) ) );

	register_default_headers( array(
		'default-image' => array(
			'url'           => '%s/assets/images/header_img.png',
			'thumbnail_url' => '%s/assets/images/header_img.png',
			'description'   => __( 'Default Header Image', 'luxury-hotels' ),
		),
	) );
}
add_action( 'after_setup_theme', 'luxury_hotels_custom_header_setup' );
