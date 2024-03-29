<?php
/**
 * Override default customizer options.
 *
 * @package formula
 */

// Settings.
$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

if ( isset( $wp_customize->selective_refresh ) ) {
	
	// site title
	$wp_customize->selective_refresh->add_partial('blogname',array(
		'selector'        => '.header-titles-wrapper .site-title',
		'render_callback' => array( 'formula_Customizer_Partials', 'formula_customize_partial_blogname' ),
	));

    // site tagline
	$wp_customize->selective_refresh->add_partial('blogdescription',array(
		'selector'        => '.header-titles-wrapper .site-description',
		'render_callback' => array( 'formula_Customizer_Partials', 'formula_customize_partial_blogdescription' ),
	));

	// Slider Area
	$wp_customize->selective_refresh->add_partial('formula_main_slider_content',array(
		'selector'	=> '.hero-slider .slider-selector',
		'render_callback' => array( 'formula_Customizer_Partials', 'formula_main_slider_content_render_callback' ),
	));
	
	// Top Info Area
	$wp_customize->selective_refresh->add_partial('formula_top_info_content',array(
		'selector'	=> '.top-contact-info .topinfo-selector',
		'render_callback' => array( 'formula_Customizer_Partials', 'formula_top_info_content_render_callback' ),
	));
	
	// Footer Info Area
	$wp_customize->selective_refresh->add_partial('formula_footer_info_content',array(
		'selector'	=> '.footer-contact-info .footerinfo-selector',
		'render_callback' => array( 'formula_Customizer_Partials', 'formula_footer_info_content_render_callback' ),
	));
	
	// service title
	$wp_customize->selective_refresh->add_partial('formula_service_area_title',array(
		'selector'	=> '.service .section-title',
		'render_callback'	=> array( 'formula_Customizer_Partials', 'customize_partial_formula_service_area_title' ),
	));
	
	// service desc
	$wp_customize->selective_refresh->add_partial('formula_service_area_des',array(
		'selector'        => '.service .section-header p',
		'render_callback' => array( 'formula_Customizer_Partials', 'customize_partial_formula_service_area_des' ),
	));
	
	// service content
	/* $wp_customize->selective_refresh->add_partial('formula_service_content',array(
		'selector'        => '.theme-services .row.theme-services-content',
	)); */
	
	// Service Area
	$wp_customize->selective_refresh->add_partial('formula_service_content',array(
		'selector'	=> '.service .service-selector',
		'render_callback' => array( 'formula_Customizer_Partials', 'formula_service_content_render_callback' ),
	));
	
	// funfact title
	$wp_customize->selective_refresh->add_partial('formula_funfact_area_title',array(
		'selector'	=> '.funfact .section-title',
		'render_callback'	=> array( 'formula_Customizer_Partials', 'customize_partial_formula_funfact_area_title' ),
	));
	
	// funfact desc
	$wp_customize->selective_refresh->add_partial('formula_funfact_area_des',array(
		'selector'        => '.funfact .section-header p',
		'render_callback' => array( 'formula_Customizer_Partials', 'customize_partial_formula_funfact_area_des' ),
	));
	
	// funfact Area
	$wp_customize->selective_refresh->add_partial('formula_funfact_content',array(
		'selector'	=> '.funfact-selector',
		'render_callback' => array( 'formula_Customizer_Partials', 'formula_funfact_content_render_callback' ),
	));
	
	// project title
	$wp_customize->selective_refresh->add_partial('formula_project_area_title',array(
		'selector'        => '.portfolio-selector .section-header .section-title',
		'render_callback' => array( 'formula_Customizer_Partials', 'customize_partial_formula_project_area_title' ),
	));
	 
	// project description
	$wp_customize->selective_refresh->add_partial('formula_project_area_des',array(
		'selector'        => '.portfolio-selector .section-header p',
		'render_callback' => array( 'formula_Customizer_Partials', 'customize_partial_formula_project_area_des' ),
	));
	
	// project Area
	$wp_customize->selective_refresh->add_partial('formula_theme_portfolio_category',array(
		'selector'	=> '.portfolio',
		'render_callback' => array( 'formula_Customizer_Partials', 'formula_theme_portfolio_category_render_callback' ),
	));
	
	// testimonial title
	$wp_customize->selective_refresh->add_partial('formula_testimonial_area_title',array(
		'selector'        => '.testimonial .section-header h1',
		'render_callback' => array( 'formula_Customizer_Partials', 'customize_partial_formula_testimonial_area_title' ),
	));
	
	// testimonial description
	$wp_customize->selective_refresh->add_partial('formula_testimonial_area_des',array(
		'selector'        => '.testimonial .section-header p',
		'render_callback' => array( 'formula_Customizer_Partials', 'customize_partial_formula_testimonial_area_des' ),
	));
	
	// testimonial Area
	$wp_customize->selective_refresh->add_partial('formula_testimonial_content',array(
		'selector'	=> '.testimonial .testimonial-selector',
		'render_callback' => array( 'formula_Customizer_Partials', 'formula_testimonial_content_render_callback' ),
	));
	
	// call to action title
	$wp_customize->selective_refresh->add_partial('formula_cta_area_title',array(
		'selector'        => '.callout-to-action .title',
		'render_callback' => array( 'formula_Customizer_Partials', 'customize_partial_formula_cta_area_title' ),
	));
	
	// call to action subtitle
	$wp_customize->selective_refresh->add_partial('formula_cta_area_subtitle',array(
		'selector'        => '.callout-to-action .subtitle',
		'render_callback' => array( 'formula_Customizer_Partials', 'customize_partial_formula_cta_area_subtitle' ),
	));
	
	// call to action description
	$wp_customize->selective_refresh->add_partial('formula_cta_area_des',array(
		'selector'        => '.callout-to-action .subtitle',
		'render_callback' => array( 'formula_Customizer_Partials', 'customize_partial_formula_cta_area_des' ),
	));
	
	// call to action button text
	$wp_customize->selective_refresh->add_partial('formula_cta_button_text',array(
		'selector'        => '.callout-to-action .m-top-40 .callout-button',
		'render_callback' => array( 'formula_Customizer_Partials', 'customize_partial_formula_cta_button_text' ),
	));
	
	// blog title
	$wp_customize->selective_refresh->add_partial('formula_blog_area_title',array(
		'selector'        => '.home-news .section-title',
		'render_callback' => array( 'formula_Customizer_Partials', 'customize_partial_formula_blog_area_title' ),
	));
	
	// blog description
	$wp_customize->selective_refresh->add_partial('formula_blog_area_des',array(
		'selector'        => '.home-news .section-subtitle',
		'render_callback' => array( 'formula_Customizer_Partials', 'customize_partial_formula_blog_area_des' ),
	));
	
	// blog Button
	$wp_customize->selective_refresh->add_partial('formula_blog_area_button',array(
		'selector'        => '.home-news .news-selector-button a',
		'render_callback' => array( 'formula_Customizer_Partials', 'customize_partial_formula_blog_area_button' ),
	));
	
	// blog Area
	$wp_customize->selective_refresh->add_partial('formula_theme_blog_category',array(
		'selector'	=> '.home-news .blog-selector',
		'render_callback' => array( 'formula_Customizer_Partials', 'formula_theme_blog_category_render_callback' ),
	));
	
	// Team Title
	$wp_customize->selective_refresh->add_partial('formula_team_area_title',array(
		'selector'        => '.team .section-header h1',
		'render_callback' => array( 'formula_Customizer_Partials', 'customize_partial_formula_team_area_title' ),
	));
	// Team Subtitle
	$wp_customize->selective_refresh->add_partial('formula_team_area_des',array(
		'selector'        => '.team .section-header p',
		'render_callback' => array( 'formula_Customizer_Partials', 'customize_partial_formula_team_area_des' ),
	));
	
	// Team Area
	$wp_customize->selective_refresh->add_partial('formula_team_content',array(
		'selector'	=> '.team .team-selector',
		'render_callback' => array( 'formula_Customizer_Partials', 'formula_team_content_render_callback' ),
	));

	// Client Area
	$wp_customize->selective_refresh->add_partial('formula_client_content',array(
		'selector'	=> '.sponsors .sponsors-selector',
		'render_callback' => array( 'formula_Customizer_Partials', 'formula_client_content_render_callback' ),
	));

	//Client Title
	$wp_customize->selective_refresh->add_partial( 'formula_client_area_title', array(
		'selector'            => '.sponsors .section-header .section-title',
		'render_callback' => array( 'formula_Customizer_Partials', 'customize_partial_formula_client_area_title' ),
	) );
	//Client Desc
	$wp_customize->selective_refresh->add_partial( 'formula_client_area_desc', array(
		'selector'            => '.sponsors .section-header .section-subtitle',
		'render_callback' => array( 'formula_Customizer_Partials', 'customize_partial_formula_client_area_desc' ),
	) );

	//woocommerce Title
	$wp_customize->selective_refresh->add_partial( 'formula_woocommerce_area_title', array(
		'selector'            => '.woocommerce-section .section-header .section-title',
		'render_callback' => array( 'formula_Customizer_Partials', 'customize_partial_formula_woocommerce_area_title' ),
	) );
	//woocommerce Desc
	$wp_customize->selective_refresh->add_partial( 'formula_woocommerce_area_desc', array(
		'selector'            => '.woocommerce-section .section-header .section-subtitle',
		'render_callback' => array( 'formula_Customizer_Partials', 'customize_partial_formula_woocommerce_area_desc' ),
	) );

	// Woocommerce Area
	$wp_customize->selective_refresh->add_partial('formula_woocommerce_content',array(
		'selector'	=> '.woocommerce-section .woocommerce-selector',
		'render_callback' => array( 'formula_Customizer_Partials', 'formula_woocommerce_content_render_callback' ),
	));	

	// footer copyright text
	$wp_customize->selective_refresh->add_partial('formula_footer_copyright_text',array(
		'selector'        => '.footer-copyrights .site-info',
		'render_callback' => array( 'formula_Customizer_Partials', 'formula_footer_copyright_text_render_callback' ),
	));

	// topbar phone text
	$wp_customize->selective_refresh->add_partial('formula_topbar_text',array(
		'selector'        => '.header-top .top_header_add .phone-text',
		'render_callback' => array( 'formula_Customizer_Partials', 'formula_topbar_text_render_callback' ),
	));
	
	// topbar phone number
	$wp_customize->selective_refresh->add_partial('formula_topbar_num',array(
		'selector'        => '.header-top .top_header_add .phone-num',
		'render_callback' => array( 'formula_Customizer_Partials', 'formula_topbar_num_render_callback' ),
	));
	
	// topbar Button text
	$wp_customize->selective_refresh->add_partial('formula_topbar_button',array(
		'selector'        => '.header-top .header_btn a',
		'render_callback' => array( 'formula_Customizer_Partials', 'formula_topbar_button_render_callback' ),
	));

	// All General Settings
		// excerpt number
		$wp_customize->selective_refresh->add_partial('formula_excerpt_length',array(
			'selector'        => '.post .full-content .entry-content .more-link',
			'render_callback' => array( 'formula_Customizer_Partials', 'formula_excerpt_length_render_callback' ),
		));

		// Blog Meta
		$wp_customize->selective_refresh->add_partial('formula_blog_content_ordering',array(
			'selector'        => '.post .entry-meta .byline',
			'render_callback' => array( 'formula_Customizer_Partials', 'formula_blog_content_ordering_render_callback' ),
		));


	/**
	* Theme Template
	*/
	// contact Form title
	$wp_customize->selective_refresh->add_partial('contact_form_title',array(
		'selector'        => '.contact .contact-header .section-title',
		'render_callback' => array( 'formula_Customizer_Partials', 'formula_template_contact_form_title_render_callback' ),
	));
	// contact Form subtitle
	$wp_customize->selective_refresh->add_partial('contact_form_description',array(
		'selector'        => '.contact .contact-header .section-subtitle',
		'render_callback' => array( 'formula_Customizer_Partials', 'formula_template_contact_form_subtitle_render_callback' ),
	));
	
	// contact Form Info
	$wp_customize->selective_refresh->add_partial('contact_google_map_title',array(
		'selector'        => '.contact .section-header .section-title',
		'render_callback' => array( 'formula_Customizer_Partials', 'formula_template_contact_google_map_title_render_callback' ),
	));

}