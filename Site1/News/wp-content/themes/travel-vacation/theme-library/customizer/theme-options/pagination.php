<?php

/**
 * Pagination
 *
 * @package travel_vacation
 */

$wp_customize->add_section(
	'travel_vacation_pagination',
	array(
		'panel' => 'travel_vacation_theme_options',
		'title' => esc_html__( 'Pagination', 'travel-vacation' ),
	)
);

// Pagination - Enable Pagination.
$wp_customize->add_setting(
	'travel_vacation_enable_pagination',
	array(
		'default'           => true,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_enable_pagination',
		array(
			'label'    => esc_html__( 'Enable Pagination', 'travel-vacation' ),
			'section'  => 'travel_vacation_pagination',
			'settings' => 'travel_vacation_enable_pagination',
			'type'     => 'checkbox',
		)
	)
);

// Pagination - Pagination Type.
$wp_customize->add_setting(
	'travel_vacation_pagination_type',
	array(
		'default'           => 'default',
		'sanitize_callback' => 'travel_vacation_sanitize_select',
	)
);

$wp_customize->add_control(
	'travel_vacation_pagination_type',
	array(
		'label'           => esc_html__( 'Pagination Type', 'travel-vacation' ),
		'section'         => 'travel_vacation_pagination',
		'settings'        => 'travel_vacation_pagination_type',
		'active_callback' => 'travel_vacation_is_pagination_enabled',
		'type'            => 'select',
		'choices'         => array(
			'default' => __( 'Default (Older/Newer)', 'travel-vacation' ),
			'numeric' => __( 'Numeric', 'travel-vacation' ),
		),
	)
);
