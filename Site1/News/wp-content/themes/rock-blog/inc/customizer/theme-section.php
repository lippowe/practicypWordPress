<?php
/**
 * Theme Options.
 *
 * @package Rock Blog
 */

$default = rock_blog_get_default_theme_options();

// Add Panel.
$wp_customize->add_panel( 'theme_option_panel',
	array(
	'title'      => __( 'Theme Options', 'rock-blog' ),
	'priority'   => 150,
	'capability' => 'edit_theme_options',
	)
);

// Sidebar Layout
$wp_customize->add_section('section_sidebar_layout', array(    
	'title'       => __('Sidebar Layout', 'rock-blog'),
	'panel'       => 'theme_option_panel'    
));

// Blog Layout
$wp_customize->add_setting('theme_options[layout_options_blog]', 
	array(
	'default' 			=> $default['layout_options_blog'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'rock_blog_sanitize_select'
	)
);

$wp_customize->add_control(new rock_blog_Image_Radio_Control($wp_customize, 'theme_options[layout_options_blog]', 
	array(		
	'label' 	=> __('Blog Layout', 'rock-blog'),
	'section' 	=> 'section_sidebar_layout',
	'settings'  => 'theme_options[layout_options_blog]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> get_template_directory_uri() . '/assets/images/left-sidebar.png',						
		'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> get_template_directory_uri() . '/assets/images/no-sidebar.png',
		),	
	))
);

// Archive Layout
$wp_customize->add_setting('theme_options[layout_options_archive]', 
	array(
	'default' 			=> $default['layout_options_archive'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'rock_blog_sanitize_select'
	)
);

$wp_customize->add_control(new rock_blog_Image_Radio_Control($wp_customize, 'theme_options[layout_options_archive]', 
	array(		
	'label' 	=> __('Archive Layout', 'rock-blog'),
	'section' 	=> 'section_sidebar_layout',
	'settings'  => 'theme_options[layout_options_archive]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> get_template_directory_uri() . '/assets/images/left-sidebar.png',						
		'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> get_template_directory_uri() . '/assets/images/no-sidebar.png',
		),	
	))
);


// Page Layout
$wp_customize->add_setting('theme_options[layout_options_page]', 
	array(
	'default' 			=> $default['layout_options_page'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'rock_blog_sanitize_select'
	)
);

$wp_customize->add_control(new rock_blog_Image_Radio_Control($wp_customize, 'theme_options[layout_options_page]', 
	array(		
	'label' 	=> __('Page Layout', 'rock-blog'),
	'section' 	=> 'section_sidebar_layout',
	'settings'  => 'theme_options[layout_options_page]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> get_template_directory_uri() . '/assets/images/left-sidebar.png',						
		'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> get_template_directory_uri() . '/assets/images/no-sidebar.png',
		),	
	))
);

// Single Post Layout
$wp_customize->add_setting('theme_options[layout_options_single]', 
	array(
	'default' 			=> $default['layout_options_single'],
	'type'              => 'theme_mod',
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'rock_blog_sanitize_select'
	)
);

$wp_customize->add_control(new rock_blog_Image_Radio_Control($wp_customize, 'theme_options[layout_options_single]', 
	array(		
	'label' 	=> __('Single Post Layout', 'rock-blog'),
	'section' 	=> 'section_sidebar_layout',
	'settings'  => 'theme_options[layout_options_single]',
	'type' 		=> 'radio-image',
	'choices' 	=> array(		
		'left-sidebar' 	=> get_template_directory_uri() . '/assets/images/left-sidebar.png',						
		'right-sidebar' => get_template_directory_uri() . '/assets/images/right-sidebar.png',
		'no-sidebar' 	=> get_template_directory_uri() . '/assets/images/no-sidebar.png',
		),	
	))
);

// Excerpt Length
$wp_customize->add_section('section_excerpt_length', 
	array(    
	'title'       => __('Excerpt Length', 'rock-blog'),
	'panel'       => 'theme_option_panel'    
	)
);

$wp_customize->add_setting( 'theme_options[excerpt_length]', array(
	'default'           => $default['excerpt_length'],
	'sanitize_callback' => 'rock_blog_sanitize_number_range',
) );
$wp_customize->add_control( 'theme_options[excerpt_length]', array(
	'label'       => esc_html__( 'Excerpt Length', 'rock-blog' ),
	'section'     => 'section_excerpt_length',
	'type'        => 'number',
	'input_attrs' => array( 'min' => 1, 'max' => 200, 'style' => 'width: 80px;' ),
) );

// Read More Section
$wp_customize->add_section('section_read_more', 
	array(    
	'title'       => __('Read More Button', 'rock-blog'),
	'panel'       => 'theme_option_panel'    
	)
);

// Setting Read More Text.
$wp_customize->add_setting( 'theme_options[readmore_text]',
	array(
	'default'           => $default['readmore_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'rock_blog_sanitize_textarea_content',
	'transport'         => 'refresh',
	)
);
$wp_customize->add_control( 'theme_options[readmore_text]',
	array(
	'label'    => __( 'Read More Button Label', 'rock-blog' ),
	'section'  => 'section_read_more',
	'type'     => 'text',
	'priority' => 100,
	)
);

// Footer Setting Section starts
$wp_customize->add_section('section_footer', 
	array(    
	'title'       => __('Footer Setting', 'rock-blog'),
	'panel'       => 'theme_option_panel'    
	)
);

// Setting copyright_text.
$wp_customize->add_setting( 'theme_options[copyright_text]',
	array(
	'default'           => $default['copyright_text'],
	'capability'        => 'edit_theme_options',
	'sanitize_callback' => 'sanitize_text_field',
	'transport'         => 'refresh',
	)
);
$wp_customize->add_control( 'theme_options[copyright_text]',
	array(
	'label'    => __( 'Copyright Text', 'rock-blog' ),
	'section'  => 'section_footer',
	'type'     => 'text',
	'priority' => 100,
	)
);