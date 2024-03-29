<?php

/**
 * Sidebar Position
 *
 * @package travel_vacation
 */

$wp_customize->add_section(
	'travel_vacation_sidebar_position',
	array(
		'title' => esc_html__( 'Sidebar Position', 'travel-vacation' ),
		'panel' => 'travel_vacation_theme_options',
	)
);

// Sidebar Position - Global Sidebar Position.
$wp_customize->add_setting(
	'travel_vacation_sidebar_position',
	array(
		'sanitize_callback' => 'travel_vacation_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'travel_vacation_sidebar_position',
	array(
		'label'   => esc_html__( 'Global Sidebar Position', 'travel-vacation' ),
		'section' => 'travel_vacation_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'travel-vacation' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'travel-vacation' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'travel-vacation' ),
		),
	)
);

// Sidebar Position - Post Sidebar Position.
$wp_customize->add_setting(
	'travel_vacation_post_sidebar_position',
	array(
		'sanitize_callback' => 'travel_vacation_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'travel_vacation_post_sidebar_position',
	array(
		'label'   => esc_html__( 'Post Sidebar Position', 'travel-vacation' ),
		'section' => 'travel_vacation_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'travel-vacation' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'travel-vacation' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'travel-vacation' ),
		),
	)
);

// Sidebar Position - Page Sidebar Position.
$wp_customize->add_setting(
	'travel_vacation_page_sidebar_position',
	array(
		'sanitize_callback' => 'travel_vacation_sanitize_select',
		'default'           => 'right-sidebar',
	)
);

$wp_customize->add_control(
	'travel_vacation_page_sidebar_position',
	array(
		'label'   => esc_html__( 'Page Sidebar Position', 'travel-vacation' ),
		'section' => 'travel_vacation_sidebar_position',
		'type'    => 'select',
		'choices' => array(
			'right-sidebar' => esc_html__( 'Right Sidebar', 'travel-vacation' ),
			'left-sidebar'  => esc_html__( 'Left Sidebar', 'travel-vacation' ),
			'no-sidebar'    => esc_html__( 'No Sidebar', 'travel-vacation' ),
		),
	)
);
