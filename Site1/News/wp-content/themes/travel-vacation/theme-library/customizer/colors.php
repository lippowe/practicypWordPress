<?php

/**
 * Color Option
 *
 * @package travel_vacation
 */

// Primary Color.
$wp_customize->add_setting(
	'primary_color',
	array(
		'default'           => '#4EC9FF',
		'sanitize_callback' => 'sanitize_hex_color',
	)
);

$wp_customize->add_control(
	new WP_Customize_Color_Control(
		$wp_customize,
		'primary_color',
		array(
			'label'    => __( 'Primary Color', 'travel-vacation' ),
			'section'  => 'colors',
			'priority' => 5,
		)
	)
);
