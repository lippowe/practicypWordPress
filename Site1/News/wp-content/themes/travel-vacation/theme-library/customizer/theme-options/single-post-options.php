<?php

/**
 * Single Post Options
 *
 * @package travel_vacation
 */

$wp_customize->add_section(
	'travel_vacation_single_post_options',
	array(
		'title' => esc_html__( 'Single Post Options', 'travel-vacation' ),
		'panel' => 'travel_vacation_theme_options',
	)
);


// Post Options - Hide Date.
$wp_customize->add_setting(
	'travel_vacation_single_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_single_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'travel-vacation' ),
			'section' => 'travel_vacation_single_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'travel_vacation_single_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_single_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'travel-vacation' ),
			'section' => 'travel_vacation_single_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'travel_vacation_single_post_hide_category',
	array(
		'default'           => false,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_single_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'travel-vacation' ),
			'section' => 'travel_vacation_single_post_options',
		)
	)
);

// Post Options - Hide Tag.
$wp_customize->add_setting(
	'travel_vacation_post_hide_tags',
	array(
		'default'           => false,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_post_hide_tags',
		array(
			'label'   => esc_html__( 'Hide Tag', 'travel-vacation' ),
			'section' => 'travel_vacation_single_post_options',
		)
	)
);
