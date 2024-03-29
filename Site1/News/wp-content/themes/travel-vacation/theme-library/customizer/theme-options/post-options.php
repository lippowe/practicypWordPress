<?php

/**
 * Post Options
 *
 * @package travel_vacation
 */

$wp_customize->add_section(
	'travel_vacation_post_options',
	array(
		'title' => esc_html__( 'Post Options', 'travel-vacation' ),
		'panel' => 'travel_vacation_theme_options',
	)
);

// Post Options - Hide Feature Image.
$wp_customize->add_setting(
	'travel_vacation_post_hide_feature_image',
	array(
		'default'           => false,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_post_hide_feature_image',
		array(
			'label'   => esc_html__( 'Hide Featured Image', 'travel-vacation' ),
			'section' => 'travel_vacation_post_options',
		)
	)
);

// Post Options - Hide Post Heading.
$wp_customize->add_setting(
	'travel_vacation_post_hide_post_heading',
	array(
		'default'           => false,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_post_hide_post_heading',
		array(
			'label'   => esc_html__( 'Hide Post Heading', 'travel-vacation' ),
			'section' => 'travel_vacation_post_options',
		)
	)
);

// Post Options - Hide Post Content.
$wp_customize->add_setting(
	'travel_vacation_post_hide_post_content',
	array(
		'default'           => false,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_post_hide_post_content',
		array(
			'label'   => esc_html__( 'Hide Post Content', 'travel-vacation' ),
			'section' => 'travel_vacation_post_options',
		)
	)
);

// Post Options - Hide Date.
$wp_customize->add_setting(
	'travel_vacation_post_hide_date',
	array(
		'default'           => false,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_post_hide_date',
		array(
			'label'   => esc_html__( 'Hide Date', 'travel-vacation' ),
			'section' => 'travel_vacation_post_options',
		)
	)
);

// Post Options - Hide Author.
$wp_customize->add_setting(
	'travel_vacation_post_hide_author',
	array(
		'default'           => false,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_post_hide_author',
		array(
			'label'   => esc_html__( 'Hide Author', 'travel-vacation' ),
			'section' => 'travel_vacation_post_options',
		)
	)
);

// Post Options - Hide Category.
$wp_customize->add_setting(
	'travel_vacation_post_hide_category',
	array(
		'default'           => true,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_post_hide_category',
		array(
			'label'   => esc_html__( 'Hide Category', 'travel-vacation' ),
			'section' => 'travel_vacation_post_options',
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
			'section' => 'travel_vacation_post_options',
		)
	)
);

// Post Options - Related Post Label.
$wp_customize->add_setting(
	'travel_vacation_post_related_post_label',
	array(
		'default'           => __( 'Related Posts', 'travel-vacation' ),
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'travel_vacation_post_related_post_label',
	array(
		'label'    => esc_html__( 'Related Posts Label', 'travel-vacation' ),
		'section'  => 'travel_vacation_post_options',
		'settings' => 'travel_vacation_post_related_post_label',
		'type'     => 'text',
	)
);

// Post Options - Hide Related Posts.
$wp_customize->add_setting(
	'travel_vacation_post_hide_related_posts',
	array(
		'default'           => false,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_post_hide_related_posts',
		array(
			'label'   => esc_html__( 'Hide Related Posts', 'travel-vacation' ),
			'section' => 'travel_vacation_post_options',
		)
	)
);
