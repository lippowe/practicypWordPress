<?php

/**
 * Theme Options
 *
 * @package travel_vacation
 */

$wp_customize->add_panel(
	'travel_vacation_theme_options',
	array(
		'title'    => esc_html__( 'Theme Options', 'travel-vacation' ),
		'priority' => 10,
	)
);

// Header Options.
require get_template_directory() . '/theme-library/customizer/theme-options/header-options.php';

// Excerpt.
require get_template_directory() . '/theme-library/customizer/theme-options/excerpt.php';

// Breadcrumb.
require get_template_directory() . '/theme-library/customizer/theme-options/breadcrumb.php';


// Sidebar Position.
require get_template_directory() . '/theme-library/customizer/theme-options/sidebar-position.php';

// Post Options.
require get_template_directory() . '/theme-library/customizer/theme-options/post-options.php';

// Single Post Options.
require get_template_directory() . '/theme-library/customizer/theme-options/single-post-options.php';

// Pagination.
require get_template_directory() . '/theme-library/customizer/theme-options/pagination.php';

// Footer Options.
require get_template_directory() . '/theme-library/customizer/theme-options/footer-options.php';

// 404 page option.
require get_template_directory() . '/theme-library/customizer/theme-options/404page-customize-setting.php';