<?php

/**
 * Breadcrumb
 *
 * @package travel_vacation
 */

$wp_customize->add_section(
	'travel_vacation_breadcrumb',
	array(
		'title' => esc_html__( 'Breadcrumb', 'travel-vacation' ),
		'panel' => 'travel_vacation_theme_options',
	)
);

// Breadcrumb - Enable Breadcrumb.
$wp_customize->add_setting(
	'travel_vacation_enable_breadcrumb',
	array(
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
		'default'           => true,
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_enable_breadcrumb',
		array(
			'label'   => esc_html__( 'Enable Breadcrumb', 'travel-vacation' ),
			'section' => 'travel_vacation_breadcrumb',
		)
	)
);

// Breadcrumb - Separator.
$wp_customize->add_setting(
	'travel_vacation_breadcrumb_separator',
	array(
		'sanitize_callback' => 'sanitize_text_field',
		'default'           => '/',
	)
);

$wp_customize->add_control(
	'travel_vacation_breadcrumb_separator',
	array(
		'label'           => esc_html__( 'Separator', 'travel-vacation' ),
		'active_callback' => 'travel_vacation_is_breadcrumb_enabled',
		'section'         => 'travel_vacation_breadcrumb',
	)
);
