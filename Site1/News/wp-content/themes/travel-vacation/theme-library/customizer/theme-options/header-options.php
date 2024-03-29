<?php

/**
 * Header Options
 *
 * @package travel_vacation
 */

// General Options
$wp_customize->add_section(
	'travel_vacation_general_options',
	array(
		'panel' => 'travel_vacation_theme_options',
		'title' => esc_html__( 'General Options', 'travel-vacation' ),
	)
);

// General Options - Enable Preloader.
$wp_customize->add_setting(
	'travel_vacation_enable_preloader',
	array(
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
		'default'           => false,
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_enable_preloader',
		array(
			'label'   => esc_html__( 'Enable Preloader', 'travel-vacation' ),
			'section' => 'travel_vacation_general_options',
		)
	)
);

// Site Title - Enable Setting.
$wp_customize->add_setting(
	'travel_vacation_enable_site_title_setting',
	array(
		'default'           => true,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_enable_site_title_setting',
		array(
			'label'    => esc_html__( 'Disable Site Title', 'travel-vacation' ),
			'section'  => 'title_tagline',
			'settings' => 'travel_vacation_enable_site_title_setting',
		)
	)
);

// Tagline - Enable Setting.
$wp_customize->add_setting(
	'travel_vacation_enable_tagline_setting',
	array(
		'default'           => false,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_enable_tagline_setting',
		array(
			'label'    => esc_html__( 'Enable Tagline', 'travel-vacation' ),
			'section'  => 'title_tagline',
			'settings' => 'travel_vacation_enable_tagline_setting',
		)
	)
);

$wp_customize->add_section(
	'travel_vacation_header_options',
	array(
		'panel' => 'travel_vacation_theme_options',
		'title' => esc_html__( 'Header Options', 'travel-vacation' ),
	)
);
