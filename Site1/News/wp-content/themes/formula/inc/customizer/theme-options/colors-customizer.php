<?php
/**
 * 1. Primary Menu Color Settings
 */

	/* A. Menu */
		// Text/Link Color.
		$wp_customize->add_setting( 'formula_colors_menu_text',array(
			'sanitize_callback'	=> 'formula_sanitize_select',		
			'capability'		=> 'edit_theme_options', 
			'default'			=> '#fff',
		) );	
		$wp_customize->add_control( new formula_Customize_Color_Control( $wp_customize, 'formula_colors_menu_text', array(
			'label'			=> esc_html__( 'Text/Link Color', 'formula' ),
			'section'		=> 'formula_primary_menu_colors',
			'settings'		=> 'formula_colors_menu_text',
			'priority'		=> 10,
		) ) );

		// Hover Link Color.
		$wp_customize->add_setting( 'formula_colors_menu_hover',array(
			'sanitize_callback'	=> 'formula_sanitize_select',		
			'capability'		=> 'edit_theme_options', 
			'default'			=> '#9cd0ff',
		) );
		$wp_customize->add_control( new formula_Customize_Color_Control( $wp_customize, 'formula_colors_menu_hover', array(
			'label'			=> esc_html__( 'Link Hover Color', 'formula' ),
			'section'		=> 'formula_primary_menu_colors',
			'settings'		=> 'formula_colors_menu_hover',
			'priority'		=> 20,
		) ) );

		// Active Link Color.
		$wp_customize->add_setting( 'formula_colors_menu_active',array(
			'sanitize_callback'	=> 'formula_sanitize_select',		
			'capability'		=> 'edit_theme_options', 
			'default'			=> '#000',
		) );
		$wp_customize->add_control( new formula_Customize_Color_Control( $wp_customize, 'formula_colors_menu_active', array(
			'label'			=> esc_html__( 'Active Link Color', 'formula' ),
			'section'		=> 'formula_primary_menu_colors',
			'settings'		=> 'formula_colors_menu_active',
			'priority'		=> 30,
		) ) );

	/* B. SubMenu */
		// SubMenu Text/Link Color.
		$wp_customize->add_setting( 'formula_colors_submenu_text',array(
			'sanitize_callback'	=> 'formula_sanitize_select',		
			'capability'		=> 'edit_theme_options', 
			'default'			=> '#000',
		) );	
		$wp_customize->add_control( new formula_Customize_Color_Control( $wp_customize, 'formula_colors_submenu_text', array(
			'label'			=> esc_html__( 'Text/Link Color', 'formula' ),
			'section'		=> 'formula_primary_menu_colors',
			'settings'		=> 'formula_colors_submenu_text',
			'priority'		=> 40,
		) ) );

		// SubMenu Hover Link Color.
		$wp_customize->add_setting( 'formula_colors_submenu_hover',array(
			'sanitize_callback'	=> 'formula_sanitize_select',		
			'capability'		=> 'edit_theme_options', 
			'default'			=> '#fff',
		) );
		$wp_customize->add_control( new formula_Customize_Color_Control( $wp_customize, 'formula_colors_submenu_hover', array(
			'label'			=> esc_html__( 'Link Hover Color', 'formula' ),
			'section'		=> 'formula_primary_menu_colors',
			'settings'		=> 'formula_colors_submenu_hover',
			'priority'		=> 50,
		) ) );

		// SubMenu Active Link Color.
		$wp_customize->add_setting( 'formula_colors_submenu_bg',array(
			'sanitize_callback'	=> 'formula_sanitize_select',		
			'capability'		=> 'edit_theme_options', 
			'default'			=> '#fff',
		) );
		$wp_customize->add_control( new formula_Customize_Color_Control( $wp_customize, 'formula_colors_submenu_bg', array(
			'label'			=> esc_html__( 'Background Color', 'formula' ),
			'section'		=> 'formula_primary_menu_colors',
			'settings'		=> 'formula_colors_submenu_bg',
			'priority'		=> 60,
		) ) );

/**
 * 2. Content Color Settings
 */

	// H1 Color.
		$wp_customize->add_setting( 'formula_colors_content_h1',array(
			'sanitize_callback'	=> 'formula_sanitize_select',		
			'capability'		=> 'edit_theme_options', 
			'default'			=> '#000',
		) );	
		$wp_customize->add_control( new formula_Customize_Color_Control( $wp_customize, 'formula_colors_content_h1', array(
			'label'			=> esc_html__( 'H1 Color', 'formula' ),
			'section'		=> 'formula_content_theme_colors',
			'settings'		=> 'formula_colors_content_h1',
			'priority'		=> 10,
		) ) );
	// H2 Color.
		$wp_customize->add_setting( 'formula_colors_content_h2',array(
			'sanitize_callback'	=> 'formula_sanitize_select',		
			'capability'		=> 'edit_theme_options', 
			'default'			=> '#000',
		) );	
		$wp_customize->add_control( new formula_Customize_Color_Control( $wp_customize, 'formula_colors_content_h2', array(
			'label'			=> esc_html__( 'H2 Color', 'formula' ),
			'section'		=> 'formula_content_theme_colors',
			'settings'		=> 'formula_colors_content_h2',
			'priority'		=> 20,
		) ) );
	// H3 Color.
		$wp_customize->add_setting( 'formula_colors_content_h3',array(
			'sanitize_callback'	=> 'formula_sanitize_select',		
			'capability'		=> 'edit_theme_options', 
			'default'			=> '#000',
		) );	
		$wp_customize->add_control( new formula_Customize_Color_Control( $wp_customize, 'formula_colors_content_h3', array(
			'label'			=> esc_html__( 'H3 Color', 'formula' ),
			'section'		=> 'formula_content_theme_colors',
			'settings'		=> 'formula_colors_content_h3',
			'priority'		=> 30,
		) ) );
	// H4 Color.
		$wp_customize->add_setting( 'formula_colors_content_h4',array(
			'sanitize_callback'	=> 'formula_sanitize_select',		
			'capability'		=> 'edit_theme_options', 
			'default'			=> '#000',
		) );	
		$wp_customize->add_control( new formula_Customize_Color_Control( $wp_customize, 'formula_colors_content_h4', array(
			'label'			=> esc_html__( 'H4 Color', 'formula' ),
			'section'		=> 'formula_content_theme_colors',
			'settings'		=> 'formula_colors_content_h4',
			'priority'		=> 40,
		) ) );
	// H5 Color.
		$wp_customize->add_setting( 'formula_colors_content_h5',array(
			'sanitize_callback'	=> 'formula_sanitize_select',		
			'capability'		=> 'edit_theme_options', 
			'default'			=> '#000',
		) );	
		$wp_customize->add_control( new formula_Customize_Color_Control( $wp_customize, 'formula_colors_content_h5', array(
			'label'			=> esc_html__( 'H5 Color', 'formula' ),
			'section'		=> 'formula_content_theme_colors',
			'settings'		=> 'formula_colors_content_h5',
			'priority'		=> 50,
		) ) );
	// H6 Color.
		$wp_customize->add_setting( 'formula_colors_content_h6',array(
			'sanitize_callback'	=> 'formula_sanitize_select',		
			'capability'		=> 'edit_theme_options', 
			'default'			=> '#000',
		) );	
		$wp_customize->add_control( new formula_Customize_Color_Control( $wp_customize, 'formula_colors_content_h6', array(
			'label'			=> esc_html__( 'H6 Color', 'formula' ),
			'section'		=> 'formula_content_theme_colors',
			'settings'		=> 'formula_colors_content_h6',
			'priority'		=> 60,
		) ) );
	// P Color.
		$wp_customize->add_setting( 'formula_colors_content_p',array(
			'sanitize_callback'	=> 'formula_sanitize_select',		
			'capability'		=> 'edit_theme_options', 
			'default'			=> '#000',
		) );	
		$wp_customize->add_control( new formula_Customize_Color_Control( $wp_customize, 'formula_colors_content_p', array(
			'label'			=> esc_html__( 'Paragraph Color', 'formula' ),
			'section'		=> 'formula_content_theme_colors',
			'settings'		=> 'formula_colors_content_p',
			'priority'		=> 70,
		) ) );

/**
 * 3. Sidebar Widgets Color Settings
 */
	// a. Sidebar Widget Title Color.
	$wp_customize->add_setting( 'formula_colors_sidebar_title',array(
		'sanitize_callback'	=> 'formula_sanitize_select',		
		'capability'		=> 'edit_theme_options', 
		'default'			=> '#000',
	) );	
	$wp_customize->add_control( new formula_Customize_Color_Control( $wp_customize, 'formula_colors_sidebar_title', array(
		'label'			=> esc_html__( 'Title Color', 'formula' ),
		'section'		=> 'formula_sidebar_theme_colors',
		'settings'		=> 'formula_colors_sidebar_title',
		'priority'		=> 10,
	) ) );
	// b. Sidebar Widget Text Color.
	$wp_customize->add_setting( 'formula_colors_sidebar_text',array(
		'sanitize_callback'	=> 'formula_sanitize_select',		
		'capability'		=> 'edit_theme_options', 
		'default'			=> '#000',
	) );	
	$wp_customize->add_control( new formula_Customize_Color_Control( $wp_customize, 'formula_colors_sidebar_text', array(
		'label'			=> esc_html__( 'Text Color', 'formula' ),
		'section'		=> 'formula_sidebar_theme_colors',
		'settings'		=> 'formula_colors_sidebar_text',
		'priority'		=> 20,
	) ) );
	// c. Sidebar Widget Link Color.
	$wp_customize->add_setting( 'formula_colors_sidebar_link',array(
		'sanitize_callback'	=> 'formula_sanitize_select',		
		'capability'		=> 'edit_theme_options', 
		'default'			=> '#000',
	) );	
	$wp_customize->add_control( new formula_Customize_Color_Control( $wp_customize, 'formula_colors_sidebar_link', array(
		'label'			=> esc_html__( 'Link Color', 'formula' ),
		'section'		=> 'formula_sidebar_theme_colors',
		'settings'		=> 'formula_colors_sidebar_link',
		'priority'		=> 30,
	) ) );
	// d. Sidebar Widget Link Hover Color.
	$wp_customize->add_setting( 'formula_colors_sidebar_hover',array(
		'sanitize_callback'	=> 'formula_sanitize_select',		
		'capability'		=> 'edit_theme_options', 
		'default'			=> '#0074da',
	) );	
	$wp_customize->add_control( new formula_Customize_Color_Control( $wp_customize, 'formula_colors_sidebar_hover', array(
		'label'			=> esc_html__( 'Link Hover Color', 'formula' ),
		'section'		=> 'formula_sidebar_theme_colors',
		'settings'		=> 'formula_colors_sidebar_hover',
		'priority'		=> 40,
	) ) );

	/**
	 * 4. Footer Widgets Color Settings
	 */
	// a. Footer Widget Title Color.
	$wp_customize->add_setting( 'formula_colors_footer_title',array(
		'sanitize_callback'	=> 'formula_sanitize_select',		
		'capability'		=> 'edit_theme_options', 
		'default'			=> '#000',
	) );	
	$wp_customize->add_control( new formula_Customize_Color_Control( $wp_customize, 'formula_colors_footer_title', array(
		'label'			=> esc_html__( 'Title Color', 'formula' ),
		'section'		=> 'formula_footer_theme_colors',
		'settings'		=> 'formula_colors_footer_title',
		'priority'		=> 10,
	) ) );
	// b. Footer Widget Text Color.
	$wp_customize->add_setting( 'formula_colors_footer_text',array(
		'sanitize_callback'	=> 'formula_sanitize_select',		
		'capability'		=> 'edit_theme_options', 
		'default'			=> '#000',
	) );	
	$wp_customize->add_control( new formula_Customize_Color_Control( $wp_customize, 'formula_colors_footer_text', array(
		'label'			=> esc_html__( 'Text Color', 'formula' ),
		'section'		=> 'formula_footer_theme_colors',
		'settings'		=> 'formula_colors_footer_text',
		'priority'		=> 20,
	) ) );
	// c. Footer Widget Link Color.
	$wp_customize->add_setting( 'formula_colors_footer_link',array(
		'sanitize_callback'	=> 'formula_sanitize_select',		
		'capability'		=> 'edit_theme_options', 
		'default'			=> '#000',
	) );	
	$wp_customize->add_control( new formula_Customize_Color_Control( $wp_customize, 'formula_colors_footer_link', array(
		'label'			=> esc_html__( 'Link Color', 'formula' ),
		'section'		=> 'formula_footer_theme_colors',
		'settings'		=> 'formula_colors_footer_link',
		'priority'		=> 30,
	) ) );
	// d. Footer Widget Link Hover Color.
	$wp_customize->add_setting( 'formula_colors_footer_hover',array(
		'sanitize_callback'	=> 'formula_sanitize_select',		
		'capability'		=> 'edit_theme_options', 
		'default'			=> '#0074da',
	) );	
	$wp_customize->add_control( new formula_Customize_Color_Control( $wp_customize, 'formula_colors_footer_hover', array(
		'label'			=> esc_html__( 'Link Hover Color', 'formula' ),
		'section'		=> 'formula_footer_theme_colors',
		'settings'		=> 'formula_colors_footer_hover',
		'priority'		=> 40,
	) ) );