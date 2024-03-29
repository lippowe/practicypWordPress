<?php

/**
 * Service Section
 *
 * @package travel_vacation
 */

$wp_customize->add_section(
	'travel_vacation_places_section',
	array(
		'panel'    => 'travel_vacation_front_page_options',
		'title'    => esc_html__( 'Places Section', 'travel-vacation' ),
		'priority' => 10,
	)
);

// Service Section - Enable Section.
$wp_customize->add_setting(
	'travel_vacation_enable_service_section',
	array(
		'default'           => false,
		'sanitize_callback' => 'travel_vacation_sanitize_switch',
	)
);

$wp_customize->add_control(
	new Travel_Vacation_Toggle_Switch_Custom_Control(
		$wp_customize,
		'travel_vacation_enable_service_section',
		array(
			'label'    => esc_html__( 'Enable Places Section', 'travel-vacation' ),
			'section'  => 'travel_vacation_places_section',
			'settings' => 'travel_vacation_enable_service_section',
		)
	)
);

if ( isset( $wp_customize->selective_refresh ) ) {
	$wp_customize->selective_refresh->add_partial(
		'travel_vacation_enable_service_section',
		array(
			'selector' => '#travel_vacation_service_section .section-link',
			'settings' => 'travel_vacation_enable_service_section',
		)
	);
}

// Service Section - Button Label.
$wp_customize->add_setting(
	'travel_vacation_places_section_heading_',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'travel_vacation_places_section_heading_',
	array(
		'label'           => esc_html__( 'Heading', 'travel-vacation' ),
		'section'         => 'travel_vacation_places_section',
		'settings'        => 'travel_vacation_places_section_heading_',
		'type'            => 'text',
		'active_callback' => 'travel_vacation_is_places_section_enabled',
	)
);

// Service Section - Button Label.
$wp_customize->add_setting(
	'travel_vacation_places_section_text_',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'travel_vacation_places_section_text_',
	array(
		'label'           => esc_html__( 'Content', 'travel-vacation' ),
		'section'         => 'travel_vacation_places_section',
		'settings'        => 'travel_vacation_places_section_text_',
		'type'            => 'text',
		'active_callback' => 'travel_vacation_is_places_section_enabled',
	)
);

for ( $i = 1; $i <= 3; $i++ ) {

// Places Section - Count Label.
$wp_customize->add_setting(
	'travel_vacation_places_count_text_' .$i,
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'travel_vacation_places_count_text_' .$i,
	array(
	    'label'           => sprintf( esc_html__( 'Count %d', 'travel-vacation' ),$i ),
		'section'         => 'travel_vacation_places_section',
		'settings'        => 'travel_vacation_places_count_text_' .$i,
		'type'            => 'text',
		'active_callback' => 'travel_vacation_is_places_section_enabled',
	)
);

// Places Section - Count Heading Label.
$wp_customize->add_setting(
	'travel_vacation_places_count_heading_' .$i,
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'travel_vacation_places_count_heading_' .$i,
	array(
		'label'           => sprintf( esc_html__( 'Count Heading %d', 'travel-vacation' ) ,$i ),
		'section'         => 'travel_vacation_places_section',
		'settings'        => 'travel_vacation_places_count_heading_' .$i,
		'type'            => 'text',
		'active_callback' => 'travel_vacation_is_places_section_enabled',
	)
);

}

// Places Section - Button Label.
$wp_customize->add_setting(
	'travel_vacation_places_button_label_',
	array(
		'default'           => '',
		'sanitize_callback' => 'sanitize_text_field',
	)
);

$wp_customize->add_control(
	'travel_vacation_places_button_label_',
	array(
		'label'           => esc_html__( 'Button Text', 'travel-vacation' ),
		'section'         => 'travel_vacation_places_section',
		'settings'        => 'travel_vacation_places_button_label_',
		'type'            => 'text',
		'active_callback' => 'travel_vacation_is_places_section_enabled',
	)
);

// Places Section - Button Link.
$wp_customize->add_setting(
	'travel_vacation_places_button_link_',
	array(
		'default'           => '',
		'sanitize_callback' => 'esc_url_raw',
	)
);


$wp_customize->add_control(
	'travel_vacation_places_button_link_',
	array(
		'label'           =>  esc_html__( 'Button Link', 'travel-vacation' ),
		'section'         => 'travel_vacation_places_section',
		'settings'        => 'travel_vacation_places_button_link_',
		'type'            => 'url',
		'active_callback' => 'travel_vacation_is_banner_slider_section_enabled',
	)
);

// Popular Video Section - Content Type.
$wp_customize->add_setting(
	'travel_vacation_places_content_type',
	array(
		'default'           => 'page',
		'sanitize_callback' => 'travel_vacation_sanitize_select',
	)
);

$wp_customize->add_control(
	'travel_vacation_places_content_type',
	array(
		'label'           => esc_html__( 'Select Content Type', 'travel-vacation' ),
		'section'         => 'travel_vacation_places_section',
		'settings'        => 'travel_vacation_places_content_type',
		'type'            => 'select',
		'active_callback' => 'travel_vacation_is_places_section_enabled',
		'choices'         => array(
			'page' => esc_html__( 'Page', 'travel-vacation' ),
			'post' => esc_html__( 'Post', 'travel-vacation' ),
		),
	)
);

for ( $i = 1; $i <= 6; $i++ ) {

	// Service Section - Select Post.
	$wp_customize->add_setting(
		'travel_vacation_places_content_post_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'travel_vacation_places_content_post_' . $i,
		array(
			'label'           => esc_html__( 'Select Post ', 'travel-vacation' ) . $i,
			'section'         => 'travel_vacation_places_section',
			'settings'        => 'travel_vacation_places_content_post_' . $i,
			'active_callback' => 'travel_vacation_is_places_section_and_content_type_post_enabled',
			'type'            => 'select',
			'choices'         => travel_vacation_get_post_choices(),
		)
	);

	// Service Section - Select Page.
	$wp_customize->add_setting(
		'travel_vacation_places_content_page_' . $i,
		array(
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'travel_vacation_places_content_page_' . $i,
		array(
			'label'           => esc_html__( 'Select Page ', 'travel-vacation' ) . $i,
			'section'         => 'travel_vacation_places_section',
			'settings'        => 'travel_vacation_places_content_page_' . $i,
			'active_callback' => 'travel_vacation_is_places_section_and_content_type_page_enabled',
			'type'            => 'select',
			'choices'         => travel_vacation_get_page_choices(),
		)
	);
}