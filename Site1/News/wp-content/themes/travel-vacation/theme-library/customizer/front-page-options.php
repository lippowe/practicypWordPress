<?php

/**
 * Front Page Options
 *
 * @package Travel Vacation
 */

$wp_customize->add_panel(
	'travel_vacation_front_page_options',
	array(
		'title'    => esc_html__( 'Front Page Options', 'travel-vacation' ),
		'priority' => 20,
	)
);

// Banner Section.
require get_template_directory() . '/theme-library/customizer/front-page-options/banner.php';

// Tranding Product Section.
require get_template_directory() . '/theme-library/customizer/front-page-options/places.php';