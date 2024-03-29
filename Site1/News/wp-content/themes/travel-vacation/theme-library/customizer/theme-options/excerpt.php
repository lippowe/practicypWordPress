<?php

/**
 * Excerpt
 *
 * @package travel_vacation
 */

$wp_customize->add_section(
	'travel_vacation_excerpt_options',
	array(
		'panel' => 'travel_vacation_theme_options',
		'title' => esc_html__( 'Excerpt', 'travel-vacation' ),
	)
);

// Excerpt - Excerpt Length.
$wp_customize->add_setting(
	'travel_vacation_excerpt_length',
	array(
		'default'           => 20,
		'sanitize_callback' => 'absint',
		'transport'         => 'refresh',
	)
);

$wp_customize->add_control(
	'travel_vacation_excerpt_length',
	array(
		'label'       => esc_html__( 'Excerpt Length (no. of words)', 'travel-vacation' ),
		'section'     => 'travel_vacation_excerpt_options',
		'settings'    => 'travel_vacation_excerpt_length',
		'type'        => 'number',
		'input_attrs' => array(
			'min'  => 10,
			'max'  => 200,
			'step' => 1,
		),
	)
);