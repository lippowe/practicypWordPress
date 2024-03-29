<?php
/**
 * Register customizer panels and sections.
 *
 * @package formula
 */
 
/* Theme Settings. */

$wp_customize->add_panel( new formula_Customize_Panel( $wp_customize, 'formula_theme_settings', array(
	'priority'   => 10,
	'title'      => esc_html__( 'Theme Options', 'formula' ),
	'capabitity' => 'edit_theme_options',
) ) );


// Section: General.

$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_theme_general', array(
	'title'    => esc_html__( 'General Settings', 'formula' ),
	'panel'    => 'formula_theme_settings',
	'priority' => 8,
) ) );

	
// Top Bar Section
	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_topbar_settings', array(
		'title'      	=> esc_html__( 'Top Bar', 'formula' ),
		'panel'			=> 'formula_theme_settings',
		'priority'      => 10,
	) ) );
	
	
// Menu Section
	
	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_theme_menu_bar', array(
		'title'    => esc_html__( 'Menu Settings', 'formula' ),
		'panel'    => 'formula_theme_settings',
		'priority' => 20,
	) ) );


// Blog Section
	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_blog_general', array(
		'title'    => esc_html__( 'Blog Settings', 'formula' ),
		'panel'    => 'formula_theme_settings',
		'priority' => 30,
	) ) );
	
	/* 	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_blog_general', array(
			'title'    => esc_html__( 'General', 'formula' ),
			'panel'    => 'formula_theme_settings',
			'section'  => 'formula_theme_blog_settings',
			'priority' => 10,
		) ) ); */

// excerpt Section
	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_excerpt_general', array(
		'title'    => esc_html__( 'Excerpt Settings', 'formula' ),
		'panel'    => 'formula_theme_settings',
		'priority' => 35,
	) ) );


// Page Header Section
	
	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_theme_page_header', array(
		'title'    => esc_html__( 'Page Header', 'formula' ),
		'panel'    => 'formula_theme_settings',
		'priority' => 40,
	) ) );


// Page Title Section
	
	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_theme_page_title', array(
		'title'   	=> esc_html__('Page/Breadcrumb Title','formula'),
		'panel'   	=> 'formula_theme_settings',
		'priority'	=> 45,
	) ) );


// Footer

	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_theme_footer', array(
		'title'    => esc_html__( 'Footer Settings', 'formula' ),
		'panel'    => 'formula_theme_settings',
		'priority' => 50,
	) ) );
	
		$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_footer_widgets', array(
			'title'    => esc_html__( 'Footer Widgets', 'formula' ),
			'panel'    => 'formula_theme_settings',
			'section'  => 'formula_theme_footer',
			'priority' => 10,
		) ) );
		
		$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_footer_copyright', array(
			'title'    => esc_html__( 'Footer Copyright', 'formula' ),
			'panel'    => 'formula_theme_settings',
			'section'  => 'formula_theme_footer',
			'priority' => 20,
		) ) );

/**
 * Panel: Typography
 */
$wp_customize->add_panel( new formula_Customize_Panel( $wp_customize, 'formula_theme_typography', array(
	'priority'   => 32,
	'title'      => esc_html__( 'Formula Typography', 'formula' ),
	'capabitity' => 'edit_theme_options',
) ) );

    // Section: Typography > Enable typography.
	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_enable_disable_typography', array(
		'title'    => esc_html__( 'Enable Typography', 'formula' ),
		'panel'    => 'formula_theme_typography',
		'priority' => 5,
	) ) );
	
	// Section: Typography > Header typography.
	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_header_typography', array(
		'title'				=> esc_html__( 'Header Typography', 'formula' ),
		'panel'				=> 'formula_theme_typography',
		'priority'			=> 20,
	) ) );
	
	// Section: Slider > Homepage Section Slider.
	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_slider_typography', array(
		'title'    => esc_html__( 'Slider Typography', 'formula' ),
		'panel'    => 'formula_theme_typography',
		'priority' => 25,
	) ) );
	
	// Section: Typography > Homepage Section typography.
	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_homepage_typography', array(
		'title'    => esc_html__( 'Homepage Typography', 'formula' ),
		'panel'    => 'formula_theme_typography',
		'priority' => 30,
	) ) );
	
	// Section: Headings > Headings typography.
	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_headings_typography', array(
		'title'    => esc_html__( 'Headings Typography', 'formula' ),
		'panel'    => 'formula_theme_typography',
		'priority' => 30,
	) ) );
	
	// Section: Typography > Page typography.
	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_blog_archive_typography', array(
		'title'    => esc_html__( 'Blog / Archive / Single Post', 'formula' ),
		'panel'    => 'formula_theme_typography',
		'priority' => 45,
	) ) );
	
	// Section: Typography > Sidebar typography.
	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_sidebar_widget_typography', array(
		'title'    => esc_html__( 'Sidebar Widget', 'formula' ),
		'panel'    => 'formula_theme_typography',
		'priority' => 55,
	) ) );
	
	// Section: Typography > Footer typography.
	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_footer_widget_typography', array(
		'title'    => esc_html__( 'Footer Widget', 'formula' ),
		'panel'    => 'formula_theme_typography',
		'priority' => 65,
	) ) );

/**
 * Panel: Colors & Background
 */
$wp_customize->add_panel( new formula_Customize_Panel( $wp_customize, 'formula_theme_colors', array(
	'priority'   => 32,
	'title'      => esc_html__( 'Formula Colors', 'formula' ),
	'capabitity' => 'edit_theme_options',
) ) );

	// Section: Colors > Menu Color.
	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_primary_menu_colors', array(
		'title'    => esc_html__( 'Primary Menu', 'formula' ),
		'panel'    => 'formula_theme_colors',
		'priority' => 10,
	) ) );
	
	// Section: Colors > Content.
	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_content_theme_colors', array(
		'title'    => esc_html__( 'Content', 'formula' ),
		'panel'    => 'formula_theme_colors',
		'priority' => 10,
	) ) );

	// Section: Colors > Sidebar.
	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_sidebar_theme_colors', array(
		'title'    => esc_html__( 'Sidebar', 'formula' ),
		'panel'    => 'formula_theme_colors',
		'priority' => 10,
	) ) );

	// Section: Colors > Footer.
	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_footer_theme_colors', array(
		'title'    => esc_html__( 'Footer', 'formula' ),
		'panel'    => 'formula_theme_colors',
		'priority' => 10,
	) ) );
	
/**
 * Styling: Theme Styling
 */
$wp_customize->add_panel( new formula_Customize_Panel( $wp_customize, 'theme_style', array(
	'priority'   => 30,
	'title'      => esc_html__( 'Formula Theme Styling', 'formula' ),
	'capabitity' => 'edit_theme_options',
) ) );

	// Section: Theme Styling > Theme Color
	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_theme_color_settings', array(
		'title'    => esc_html__( 'Theme Color', 'formula' ),
		'panel'    => 'theme_style',
		'priority' => 1,
	) ) );

	// Section: Theme Styling > Theme Size
	$wp_customize->add_section( new formula_Customize_Section( $wp_customize, 'formula_theme_size_settings', array(
		'title'    => esc_html__( 'Layout Size', 'formula' ),
		'panel'    => 'theme_style',
		'priority' => 5,
	) ) );
