<?php

/**
 * 404 page
 *
 * @package travel_vacation
 */


/*=========================================
404 Page
=========================================*/
$wp_customize->add_section(
	'404_pg_options', array(
		'title' => esc_html__( '404 Page', 'travel-vacation' ),
		'panel' => 'travel_vacation_theme_options',
	)
);

/*=========================================
404 Page
=========================================*/
$wp_customize->add_setting(
	'travel_vacation_pg_404_head_options'
		,array(
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'travel_vacation_sanitize_text',
	)
);

$wp_customize->add_control(
'travel_vacation_pg_404_head_options',
	array(
		'type' => 'hidden',
		'label' => __('404 Page','travel-vacation'),
		'section' => '404_pg_options',
	)
);

//  Title // 
$wp_customize->add_setting(
	'travel_vacation_pg_404_ttl',
	array(
        'default'			=> __('404 Page Not Found','travel-vacation'),
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'travel_vacation_sanitize_html',
	)
);	

$wp_customize->add_control( 
	'travel_vacation_pg_404_ttl',
	array(
	    'label'   => __('Title','travel-vacation'),
	    'section' => '404_pg_options',
		'type'           => 'text',
	)  
);

//  Description // 
$wp_customize->add_setting(
	'travel_vacation_pg_404_text',
	array(
        'default'			=> __('Apologies, but the page you are seeking cannot be found.','travel-vacation'),
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'travel_vacation_sanitize_html',
	)
);	

$wp_customize->add_control( 
	'travel_vacation_pg_404_text',
	array(
	    'label'   => __('Description','travel-vacation'),
	    'section' => '404_pg_options',
		'type'           => 'text',
	)  
);

//  Button Label // 
$wp_customize->add_setting(
	'travel_vacation_pg_404_btn_lbl',
	array(
        'default'			=> __('Go Back Home','travel-vacation'),
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'travel_vacation_sanitize_html',
	)
);	

$wp_customize->add_control( 
	'travel_vacation_pg_404_btn_lbl',
	array(
	    'label'   => __('Button Label','travel-vacation'),
	    'section' => '404_pg_options',
		'type'           => 'text',
	)  
);


//  Link // 
$wp_customize->add_setting(
	'travel_vacation_pg_404_btn_link',
	array(
        'default'			=> esc_url( home_url( '/' )),
		'capability'     	=> 'edit_theme_options',
		'sanitize_callback' => 'travel_vacation_sanitize_url',
	)
);	

$wp_customize->add_control( 
	'travel_vacation_pg_404_btn_link',
	array(
	    'label'   => __('Link','travel-vacation'),
	    'section' => '404_pg_options',
		'type'           => 'text',
	)  
);
