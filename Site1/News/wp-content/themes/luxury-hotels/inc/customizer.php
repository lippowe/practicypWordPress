<?php
/**
 * Luxury Hotels: Customizer
 *
 * @package Luxury Hotels
 * @subpackage luxury_hotels
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function luxury_hotels_customize_register( $wp_customize ) {

	require get_parent_theme_file_path('/inc/controls/icon-changer.php');

	require get_parent_theme_file_path('/inc/controls/range-slider-control.php');

	// Register the custom control type.
	$wp_customize->register_control_type( 'Luxury_Hotels_Toggle_Control' );

	//Register the sortable control type.
	$wp_customize->register_control_type( 'Luxury_Hotels_Control_Sortable' );	

	//add home page setting pannel
	$wp_customize->add_panel( 'luxury_hotels_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Home page Settings', 'luxury-hotels' ),
	    'description' => __( 'Description of what this panel does.', 'luxury-hotels' ),
	) );

	//TP General Option
	$wp_customize->add_section('luxury_hotels_tp_general_settings',array(
        'title' => __('TP General Option', 'luxury-hotels'),
        'panel' => 'luxury_hotels_panel_id',
        'priority' => 1,
    ) );

	$wp_customize->add_setting('luxury_hotels_tp_body_layout_settings',array(
        'default' => 'Full',
        'sanitize_callback' => 'luxury_hotels_sanitize_choices'
	));
    $wp_customize->add_control('luxury_hotels_tp_body_layout_settings',array(
        'type' => 'radio',
        'label'     => __('Body Layout Setting', 'luxury-hotels'),
        'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'luxury-hotels'),
        'section' => 'luxury_hotels_tp_general_settings',
        'choices' => array(
            'Full' => __('Full','luxury-hotels'),
            'Container' => __('Container','luxury-hotels'),
            'Container Fluid' => __('Container Fluid','luxury-hotels')
        ),
	) );
	
    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('luxury_hotels_sidebar_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'luxury_hotels_sanitize_choices'
	));
	$wp_customize->add_control('luxury_hotels_sidebar_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Sidebar Position', 'luxury-hotels'),
        'description'   => __('This option work for blog page, archive page and search page.', 'luxury-hotels'),
        'section' => 'luxury_hotels_tp_general_settings',
        'choices' => array(
            'full' => __('Full','luxury-hotels'),
            'left' => __('Left','luxury-hotels'),
            'right' => __('Right','luxury-hotels'),
            'three-column' => __('Three Columns','luxury-hotels'),
            'four-column' => __('Four Columns','luxury-hotels'),
            'grid' => __('Grid Layout','luxury-hotels')
        ),
	) );

	// Add Settings and Controls for Post sidebar Layout
	$wp_customize->add_setting('luxury_hotels_sidebar_single_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'luxury_hotels_sanitize_choices'
	));
	$wp_customize->add_control('luxury_hotels_sidebar_single_post_layout',array(
        'type' => 'radio',
        'label'     => __('Single Post Sidebar Position', 'luxury-hotels'),
        'description'   => __('This option work for single blog page', 'luxury-hotels'),
        'section' => 'luxury_hotels_tp_general_settings',
        'choices' => array(
            'full' => __('Full','luxury-hotels'),
            'left' => __('Left','luxury-hotels'),
            'right' => __('Right','luxury-hotels'),
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('luxury_hotels_sidebar_page_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'luxury_hotels_sanitize_choices'
	));
	$wp_customize->add_control('luxury_hotels_sidebar_page_layout',array(
        'type' => 'radio',
        'label'     => __('Page Sidebar Position', 'luxury-hotels'),
        'description'   => __('This option work for pages.', 'luxury-hotels'),
        'section' => 'luxury_hotels_tp_general_settings',
        'choices' => array(
            'full' => __('Full','luxury-hotels'),
            'left' => __('Left','luxury-hotels'),
            'right' => __('Right','luxury-hotels')
        ),
	) );
	//tp typography option
	$luxury_hotels_font_array = array(
		''                       => 'No Fonts',
		'Abril Fatface'          => 'Abril Fatface',
		'Acme'                   => 'Acme',
		'Anton'                  => 'Anton',
		'Architects Daughter'    => 'Architects Daughter',
		'Arimo'                  => 'Arimo',
		'Arsenal'                => 'Arsenal',
		'Arvo'                   => 'Arvo',
		'Alegreya'               => 'Alegreya',
		'Alfa Slab One'          => 'Alfa Slab One',
		'Averia Serif Libre'     => 'Averia Serif Libre',
		'Bangers'                => 'Bangers',
		'Boogaloo'               => 'Boogaloo',
		'Bad Script'             => 'Bad Script',
		'Bitter'                 => 'Bitter',
		'Bree Serif'             => 'Bree Serif',
		'BenchNine'              => 'BenchNine',
		'Cabin'                  => 'Cabin',
		'Cardo'                  => 'Cardo',
		'Courgette'              => 'Courgette',
		'Cherry Swash'           => 'Cherry Swash',
		'Cormorant Garamond'     => 'Cormorant Garamond',
		'Crimson Text'           => 'Crimson Text',
		'Cuprum'                 => 'Cuprum',
		'Cookie'                 => 'Cookie',
		'Chewy'                  => 'Chewy',
		'Days One'               => 'Days One',
		'Dosis'                  => 'Dosis',
		'Droid Sans'             => 'Droid Sans',
		'Economica'              => 'Economica',
		'Fredoka One'            => 'Fredoka One',
		'Fjalla One'             => 'Fjalla One',
		'Francois One'           => 'Francois One',
		'Frank Ruhl Libre'       => 'Frank Ruhl Libre',
		'Gloria Hallelujah'      => 'Gloria Hallelujah',
		'Great Vibes'            => 'Great Vibes',
		'Handlee'                => 'Handlee',
		'Hammersmith One'        => 'Hammersmith One',
		'Inconsolata'            => 'Inconsolata',
		'Indie Flower'           => 'Indie Flower',
		'IM Fell English SC'     => 'IM Fell English SC',
		'Julius Sans One'        => 'Julius Sans One',
		'Josefin Slab'           => 'Josefin Slab',
		'Josefin Sans'           => 'Josefin Sans',
		'Kanit'                  => 'Kanit',
		'Lobster'                => 'Lobster',
		'Lato'                   => 'Lato',
		'Lora'                   => 'Lora',
		'Libre Baskerville'      => 'Libre Baskerville',
		'Lobster Two'            => 'Lobster Two',
		'Merriweather'           => 'Merriweather',
		'Monda'                  => 'Monda',
		'Montserrat'             => 'Montserrat',
		'Muli'                   => 'Muli',
		'Marck Script'           => 'Marck Script',
		'Noto Serif'             => 'Noto Serif',
		'Open Sans'              => 'Open Sans',
		'Overpass'               => 'Overpass',
		'Overpass Mono'          => 'Overpass Mono',
		'Oxygen'                 => 'Oxygen',
		'Orbitron'               => 'Orbitron',
		'Patua One'              => 'Patua One',
		'Pacifico'               => 'Pacifico',
		'Padauk'                 => 'Padauk',
		'Playball'               => 'Playball',
		'Playfair Display'       => 'Playfair Display',
		'PT Sans'                => 'PT Sans',
		'Philosopher'            => 'Philosopher',
		'Permanent Marker'       => 'Permanent Marker',
		'Poiret One'             => 'Poiret One',
		'Quicksand'              => 'Quicksand',
		'Quattrocento Sans'      => 'Quattrocento Sans',
		'Raleway'                => 'Raleway',
		'Rubik'                  => 'Rubik',
		'Rokkitt'                => 'Rokkitt',
		'Russo One'              => 'Russo One',
		'Righteous'              => 'Righteous',
		'Slabo'                  => 'Slabo',
		'Source Sans Pro'        => 'Source Sans Pro',
		'Shadows Into Light Two' => 'Shadows Into Light Two',
		'Shadows Into Light'     => 'Shadows Into Light',
		'Sacramento'             => 'Sacramento',
		'Shrikhand'              => 'Shrikhand',
		'Tangerine'              => 'Tangerine',
		'Ubuntu'                 => 'Ubuntu',
		'VT323'                  => 'VT323',
		'Varela Round'           => 'Varela Round',
		'Vampiro One'            => 'Vampiro One',
		'Vollkorn'               => 'Vollkorn',
		'Volkhov'                => 'Volkhov',
		'Yanone Kaffeesatz'      => 'Yanone Kaffeesatz'
	);

	$wp_customize->add_section('luxury_hotels_typography_option',array(
		'title'         => __('TP Typography Option', 'luxury-hotels'),
		'priority' => 1,
		'panel' => 'luxury_hotels_panel_id'
   	));

   	$wp_customize->add_setting('luxury_hotels_heading_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'luxury_hotels_sanitize_choices',
	));
	$wp_customize->add_control(	'luxury_hotels_heading_font_family', array(
		'section' => 'luxury_hotels_typography_option',
		'label'   => __('heading Fonts', 'luxury-hotels'),
		'type'    => 'select',
		'choices' => $luxury_hotels_font_array,
	));

	$wp_customize->add_setting('luxury_hotels_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'luxury_hotels_sanitize_choices',
	));
	$wp_customize->add_control(	'luxury_hotels_body_font_family', array(
		'section' => 'luxury_hotels_typography_option',
		'label'   => __('Body Fonts', 'luxury-hotels'),
		'type'    => 'select',
		'choices' => $luxury_hotels_font_array,
	));

	//TP Preloader Option
	$wp_customize->add_section('luxury_hotels_prelaoder_option',array(
		'title'         => __('TP Preloader Option', 'luxury-hotels'),
		'panel' => 'luxury_hotels_panel_id',
		'priority' => 1,
	) );
	$wp_customize->add_setting( 'luxury_hotels_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Luxury_Hotels_Toggle_Control( $wp_customize, 'luxury_hotels_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'luxury-hotels' ),
		'section'     => 'luxury_hotels_prelaoder_option',
		'type'        => 'toggle',
		'settings'    => 'luxury_hotels_preloader_show_hide',
	) ) );
	$wp_customize->add_setting( 'luxury_hotels_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luxury_hotels_tp_preloader_color1_option', array(
			'label'     => __('Preloader First Ring Color', 'luxury-hotels'),
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'luxury-hotels'),
	    'section' => 'luxury_hotels_prelaoder_option',
	    'settings' => 'luxury_hotels_tp_preloader_color1_option',
  	)));
  	$wp_customize->add_setting( 'luxury_hotels_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luxury_hotels_tp_preloader_color2_option', array(
			'label'     => __('Preloader Second Ring Color', 'luxury-hotels'),
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'luxury-hotels'),
	    'section' => 'luxury_hotels_prelaoder_option',
	    'settings' => 'luxury_hotels_tp_preloader_color2_option',
  	)));
  	$wp_customize->add_setting( 'luxury_hotels_tp_preloader_bg_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luxury_hotels_tp_preloader_bg_color_option', array(
			'label'     => __('Preloader Background Color', 'luxury-hotels'),
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'luxury-hotels'),
	    'section' => 'luxury_hotels_prelaoder_option',
	    'settings' => 'luxury_hotels_tp_preloader_bg_color_option',
  	)));

	//TP Blog Option
	$wp_customize->add_section('luxury_hotels_blog_option',array(
        'title' => __('TP Blog Option', 'luxury-hotels'),
        'panel' => 'luxury_hotels_panel_id',
        'priority' => 1,
    ) );
	/** Meta Order */
    $wp_customize->add_setting('blog_meta_order', array(
        'default' => array('date', 'author', 'comment', 'category'),
        'sanitize_callback' => 'luxury_hotels_sanitize_sortable',
    ));
    $wp_customize->add_control(new Luxury_Hotels_Control_Sortable($wp_customize, 'blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'luxury-hotels'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'luxury-hotels') ,
        'section' => 'luxury_hotels_blog_option',
        'choices' => array(
            'date' => __('date', 'luxury-hotels') ,
            'author' => __('author', 'luxury-hotels') ,
            'comment' => __('comment', 'luxury-hotels') ,
            'category' => __('category', 'luxury-hotels') ,
        ) ,
    )));
    $wp_customize->add_setting( 'luxury_hotels_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'luxury_hotels_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'luxury_hotels_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','luxury-hotels' ),
		'section'     => 'luxury_hotels_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );
	$wp_customize->add_setting('luxury_hotels_read_more_text',array(
		'default'=> __('Read More','luxury-hotels'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luxury_hotels_read_more_text',array(
		'label'	=> __('Edit Button Text','luxury-hotels'),
		'section'=> 'luxury_hotels_blog_option',
		'type'=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'luxury_hotels_read_more_text', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'luxury_hotels_customize_partial_luxury_hotels_read_more_text',
	) );
	$wp_customize->add_setting( 'luxury_hotels_remove_read_button', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
	 ) );
	 $wp_customize->add_control( new Luxury_Hotels_Toggle_Control( $wp_customize, 'luxury_hotels_remove_read_button', array(
		 'label'       => esc_html__( 'Show / Hide Read More Button', 'luxury-hotels' ),
		 'section'     => 'luxury_hotels_blog_option',
		 'type'        => 'toggle',
		 'settings'    => 'luxury_hotels_remove_read_button',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'luxury_hotels_remove_read_button', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'luxury_hotels_customize_partial_luxury_hotels_remove_read_button',
	));
	$wp_customize->add_setting( 'luxury_hotels_remove_tags', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
	) );

	$wp_customize->add_control( new Luxury_Hotels_Toggle_Control( $wp_customize, 'luxury_hotels_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'luxury-hotels' ),
		'section'     => 'luxury_hotels_blog_option',
		'type'        => 'toggle',
		'settings'    => 'luxury_hotels_remove_tags',
		) ) );
    $wp_customize->selective_refresh->add_partial( 'luxury_hotels_remove_tags', array(
		'selector' => '.box-content a[rel="tag"]',
		'render_callback' => 'luxury_hotels_customize_partial_luxury_hotels_remove_tags',
	));
    $wp_customize->add_setting( 'luxury_hotels_remove_category', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Luxury_Hotels_Toggle_Control( $wp_customize, 'luxury_hotels_remove_category', array(
		'label'       => esc_html__( 'Show / Hide Category Option', 'luxury-hotels' ),
		'section'     => 'luxury_hotels_blog_option',
		'type'        => 'toggle',
		'settings'    => 'luxury_hotels_remove_category',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'luxury_hotels_remove_category', array(
		'selector' => '.box-content a[rel="category"]',
		'render_callback' => 'luxury_hotels_customize_partial_luxury_hotels_remove_category',
	));
	$wp_customize->add_setting( 'luxury_hotels_remove_comment', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Luxury_Hotels_Toggle_Control( $wp_customize, 'luxury_hotels_remove_comment', array(
	 'label'       => esc_html__( 'Show / Hide Comment Form', 'luxury-hotels' ),
	 'section'     => 'luxury_hotels_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'luxury_hotels_remove_comment',
	) ) );

	$wp_customize->add_setting( 'luxury_hotels_remove_related_post', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Luxury_Hotels_Toggle_Control( $wp_customize, 'luxury_hotels_remove_related_post', array(
	 'label'       => esc_html__( 'Show / Hide Related Post', 'luxury-hotels' ),
	 'section'     => 'luxury_hotels_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'luxury_hotels_remove_related_post',
	) ) );
	$wp_customize->add_setting( 'luxury_hotels_related_post_per_page', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'luxury_hotels_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'luxury_hotels_related_post_per_page', array(
		'label'       => esc_html__( 'Related Post Per Page','luxury-hotels' ),
		'section'     => 'luxury_hotels_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 3,
			'max'              => 9,
		),
	) );
	$wp_customize->add_setting('luxury_hotels_post_layout',array(
        'default' => 'image-content',
        'sanitize_callback' => 'luxury_hotels_sanitize_choices'
	));
	$wp_customize->add_control('luxury_hotels_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Layout', 'luxury-hotels'),
        'section' => 'luxury_hotels_blog_option',
        'choices' => array(
            'image-content' => __('Media-Content','luxury-hotels'),
            'content-image' => __('Content-Media','luxury-hotels'),
        ),
	) );
	
	 //MENU TYPOGRAPHY
	$wp_customize->add_section( 'luxury_hotels_menu_typography', array(
    	'title'      => __( 'Menu Typography', 'luxury-hotels' ),
		'panel' => 'luxury_hotels_panel_id',
		'priority' => 1,
	) );
	$wp_customize->add_setting('luxury_hotels_menu_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'luxury_hotels_sanitize_choices',
	));
	$wp_customize->add_control(	'luxury_hotels_menu_font_family', array(
		'section' => 'luxury_hotels_menu_typography',
		'label'   => __('Menu Fonts', 'luxury-hotels'),
		'type'    => 'select',
		'choices' => $luxury_hotels_font_array,
	));
	$wp_customize->add_setting('luxury_hotels_menu_text_tranform',array(
		'default' => 'Capitalize',
		'sanitize_callback' => 'luxury_hotels_sanitize_choices'
 	));
 	$wp_customize->add_control('luxury_hotels_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','luxury-hotels'),
		'section' => 'luxury_hotels_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','luxury-hotels'),
		   'Lowercase' => __('Lowercase','luxury-hotels'),
		   'Capitalize' => __('Capitalize','luxury-hotels'),
		),
	) );
	$wp_customize->add_setting('luxury_hotels_menu_font_size', array(
		'default' => 15,
	    'sanitize_callback' => 'luxury_hotels_sanitize_number_range',
	));
	$wp_customize->add_control(new Luxury_Hotels_Range_Slider($wp_customize, 'luxury_hotels_menu_font_size', array(
	    'section' => 'luxury_hotels_menu_typography',
	    'label' => esc_html__('Font Size', 'luxury-hotels'),
	    'input_attrs' => array(
	        'min' => 0,
	        'max' => 20,
	        'step' => 1
	    )
	)));

	// Contact Details Section
	$wp_customize->add_section( 'luxury_hotels_contact_details', array(
    	'title'      => __( 'Contact Details', 'luxury-hotels' ),
    	'description' => __( 'Add your contact details', 'luxury-hotels' ),
		'panel' => 'luxury_hotels_panel_id',
		'priority' => 2,
	) );
	$wp_customize->add_setting('luxury_hotels_mail',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_email'
	));
	$wp_customize->add_control('luxury_hotels_mail',array(
		'label'	=> __('Add Mail Address','luxury-hotels'),
		'section'=> 'luxury_hotels_contact_details',
		'type'=> 'text'
	));
	$wp_customize->add_setting('luxury_hotels_mail_icon',array(
		'default'	=> 'fas fa-envelope-open',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Luxury_Hotels_Icon_Changer(
        $wp_customize,'luxury_hotels_mail_icon',array(
		'label'	=> __('Mail Icon','luxury-hotels'),
		'transport' => 'refresh',
		'section'	=> 'luxury_hotels_contact_details',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('luxury_hotels_call',array(
		'default'=> '',
		'sanitize_callback'	=> 'luxury_hotels_sanitize_phone_number'
	));
	$wp_customize->add_control('luxury_hotels_call',array(
		'label'	=> __('Add Phone Number','luxury-hotels'),
		'section'=> 'luxury_hotels_contact_details',
		'type'=> 'text'
	));
    $wp_customize->add_setting('luxury_hotels_phone_icon',array(
		'default'	=> 'fas fa-phone',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Luxury_Hotels_Icon_Changer(
        $wp_customize,'luxury_hotels_phone_icon',array(
		'label'	=> __('Mail Icon','luxury-hotels'),
		'transport' => 'refresh',
		'section'	=> 'luxury_hotels_contact_details',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('luxury_hotels_header_button',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luxury_hotels_header_button',array(
		'label'	=> __('Add Button Text','luxury-hotels'),
		'section'=> 'luxury_hotels_contact_details',
		'type'=> 'text'
	));
	$wp_customize->add_setting('luxury_hotels_header_button_link',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('luxury_hotels_header_button_link',array(
		'label'	=> __('Add Button URL','luxury-hotels'),
		'section'=> 'luxury_hotels_contact_details',
		'type'=> 'url'
	));


	// Social Link
	$wp_customize->add_section( 'luxury_hotels_social_media', array(
    	'title'      => __( 'Social Media Links', 'luxury-hotels' ),
    	'description' => __( 'Add your Social Links', 'luxury-hotels' ),
		'panel' => 'luxury_hotels_panel_id',
		'priority' => 2,
	) );
	$wp_customize->add_setting( 'luxury_hotels_header_fb_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Luxury_Hotels_Toggle_Control( $wp_customize, 'luxury_hotels_header_fb_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'luxury-hotels' ),
		'section'     => 'luxury_hotels_social_media',
		'type'        => 'toggle',
		'settings'    => 'luxury_hotels_header_fb_new_tab',
	) ) );
	$wp_customize->add_setting('luxury_hotels_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('luxury_hotels_facebook_url',array(
		'label'	=> __('Facebook Link','luxury-hotels'),
		'section'=> 'luxury_hotels_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('luxury_hotels_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Luxury_Hotels_Icon_Changer(
        $wp_customize,'luxury_hotels_facebook_icon',array(
		'label'	=> __('Facebook Icon','luxury-hotels'),
		'transport' => 'refresh',
		'section'	=> 'luxury_hotels_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->selective_refresh->add_partial( 'luxury_hotels_facebook_url', array(
		'selector' => '.social-media',
		'render_callback' => 'luxury_hotels_customize_partial_luxury_hotels_facebook_url',
	) );
	$wp_customize->add_setting( 'luxury_hotels_header_twt_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Luxury_Hotels_Toggle_Control( $wp_customize, 'luxury_hotels_header_twt_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'luxury-hotels' ),
		'section'     => 'luxury_hotels_social_media',
		'type'        => 'toggle',
		'settings'    => 'luxury_hotels_header_twt_new_tab',
	) ) );
	$wp_customize->add_setting('luxury_hotels_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('luxury_hotels_twitter_url',array(
		'label'	=> __('Twitter Link','luxury-hotels'),
		'section'=> 'luxury_hotels_social_media',
		'type'=> 'url'
	));
    $wp_customize->add_setting('luxury_hotels_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Luxury_Hotels_Icon_Changer(
        $wp_customize,'luxury_hotels_twitter_icon',array(
		'label'	=> __('Twitter Icon','luxury-hotels'),
		'transport' => 'refresh',
		'section'	=> 'luxury_hotels_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'luxury_hotels_header_ins_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Luxury_Hotels_Toggle_Control( $wp_customize, 'luxury_hotels_header_ins_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'luxury-hotels' ),
		'section'     => 'luxury_hotels_social_media',
		'type'        => 'toggle',
		'settings'    => 'luxury_hotels_header_ins_new_tab',
	) ) );
	$wp_customize->add_setting('luxury_hotels_instagram_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('luxury_hotels_instagram_url',array(
		'label'	=> __('Instagram Link','luxury-hotels'),
		'section'=> 'luxury_hotels_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('luxury_hotels_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Luxury_Hotels_Icon_Changer(
        $wp_customize,'luxury_hotels_instagram_icon',array(
		'label'	=> __('Instagram Icon','luxury-hotels'),
		'transport' => 'refresh',
		'section'	=> 'luxury_hotels_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'luxury_hotels_header_ut_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Luxury_Hotels_Toggle_Control( $wp_customize, 'luxury_hotels_header_ut_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'luxury-hotels' ),
		'section'     => 'luxury_hotels_social_media',
		'type'        => 'toggle',
		'settings'    => 'luxury_hotels_header_ut_new_tab',
	) ) );
	$wp_customize->add_setting('luxury_hotels_youtube_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('luxury_hotels_youtube_url',array(
		'label'	=> __('YouTube Link','luxury-hotels'),
		'section'=> 'luxury_hotels_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('luxury_hotels_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Luxury_Hotels_Icon_Changer(
        $wp_customize,'luxury_hotels_youtube_icon',array(
		'label'	=> __('YouTube Icon','luxury-hotels'),
		'transport' => 'refresh',
		'section'	=> 'luxury_hotels_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'luxury_hotels_header_pint_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Luxury_Hotels_Toggle_Control( $wp_customize, 'luxury_hotels_header_pint_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'luxury-hotels' ),
		'section'     => 'luxury_hotels_social_media',
		'type'        => 'toggle',
		'settings'    => 'luxury_hotels_header_pint_new_tab',
	) ) );
	$wp_customize->add_setting('luxury_hotels_pint_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('luxury_hotels_pint_url',array(
		'label'	=> __('Pinterest Link','luxury-hotels'),
		'section'=> 'luxury_hotels_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('luxury_hotels_pinterest_icon',array(
		'default'	=> 'fab fa-pinterest',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Luxury_Hotels_Icon_Changer(
        $wp_customize,'luxury_hotels_pinterest_icon',array(
		'label'	=> __('Pinterest Icon','luxury-hotels'),
		'transport' => 'refresh',
		'section'	=> 'luxury_hotels_social_media',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('luxury_hotels_social_icon_fontsize',array(
		'default'=> '20',
		'sanitize_callback'	=> 'luxury_hotels_sanitize_number_absint'
	));
	$wp_customize->add_control('luxury_hotels_social_icon_fontsize',array(
		'label'	=> __('Social Icons Font Size in PX','luxury-hotels'),
		'type'=> 'number',
		'section'=> 'luxury_hotels_social_media',
		'input_attrs' => array(
	      		'step' => 1,
				'min'  => 0,
				'max'  => 30,
	        ),
	));

	//home page slider
	$wp_customize->add_section( 'luxury_hotels_slider_section' , array(
    	'title'      => __( 'Slider Settings', 'luxury-hotels' ),
		'panel' => 'luxury_hotels_panel_id',
      	'priority' => 3,
	) );

	$wp_customize->add_setting( 'luxury_hotels_slider_arrows', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Luxury_Hotels_Toggle_Control( $wp_customize, 'luxury_hotels_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide slider', 'luxury-hotels' ),
		'section'     => 'luxury_hotels_slider_section',
		'type'        => 'toggle',
		'settings'    => 'luxury_hotels_slider_arrows',
	) ) );

    $wp_customize->selective_refresh->add_partial( 'luxury_hotels_slider_arrows', array(
		'selector' => '#slider .carousel-caption',
		'render_callback' => 'luxury_hotels_customize_partial_luxury_hotels_slider_arrows',
	) );

	$wp_customize->add_setting('luxury_hotels_slider_short_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luxury_hotels_slider_short_heading',array(
		'label'	=> __('Add short Heading','luxury-hotels'),
		'section'=> 'luxury_hotels_slider_section',
		'type'=> 'text'
	));


	for ( $luxury_hotels_count = 1; $luxury_hotels_count <= 4; $luxury_hotels_count++ ) {

	// Add color scheme setting and control.
	$wp_customize->add_setting( 'luxury_hotels_slider_page' . $luxury_hotels_count, array(
		'default'           => '',
		'sanitize_callback' => 'luxury_hotels_sanitize_dropdown_pages'
	) );

	$wp_customize->add_control( 'luxury_hotels_slider_page' . $luxury_hotels_count, array(
		'label'    => __( 'Select Slide Image Page', 'luxury-hotels' ),
		'section'  => 'luxury_hotels_slider_section',
		'type'     => 'dropdown-pages'
	) );


	$wp_customize->add_setting('luxury_hotels_slider_button_link' . $luxury_hotels_count,array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('luxury_hotels_slider_button_link' . $luxury_hotels_count,array(
		'label'	=> __('Slider Button Link','luxury-hotels'),
		'section'	=> 'luxury_hotels_slider_section',
		'type'		=> 'url'
	));
	}

	//About Section
	$wp_customize->add_section('luxury_hotels_about_section',array(
		'title'	=> __('About Section','luxury-hotels'),
		'panel' => 'luxury_hotels_panel_id',
		'priority' => 4,
	));
	$wp_customize->add_setting( 'luxury_hotels_about_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Luxury_Hotels_Toggle_Control( $wp_customize, 'luxury_hotels_about_show_hide', array(
		'label'       => esc_html__( 'Show / Hide About Section', 'luxury-hotels' ),
		'section'     => 'luxury_hotels_about_section',
		'type'        => 'toggle',
		'settings'    => 'luxury_hotels_about_show_hide',
		'priority' => 1,
	) ) );
	$wp_customize->add_setting('luxury_hotels_about_short_heading',array(
		'default' => '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luxury_hotels_about_short_heading',array(
		'label'	=> __('About Title','luxury-hotels'),
		'section'	=> 'luxury_hotels_about_section',
		'type'		=> 'text'
	));
	$wp_customize->selective_refresh->add_partial( 'luxury_hotels_about_short_heading', array(
		'selector' => '#about h3',
		'render_callback' => 'luxury_hotels_customize_partial_luxury_hotels_about_short_heading',
	) );
	$wp_customize->add_setting( 'luxury_hotels_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'luxury_hotels_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'luxury_hotels_about_page', array(
		'label'    => __( 'Select About Page', 'luxury-hotels' ),
		'section'  => 'luxury_hotels_about_section',
		'type'     => 'dropdown-pages'
	) );
	$wp_customize->add_setting('luxury_hotels_about_points',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luxury_hotels_about_points',array(
		'label'	=> __('Add number of points','luxury-hotels'),
		'section'	=> 'luxury_hotels_about_section',
		'type'		=> 'number',
		'input_attrs' => array(
		'step' => 1,
        'min' => 0,     
        'max' => 6
    	)
	));
	$luxury_hotels_about_point = get_theme_mod('luxury_hotels_about_points','');
   	for ( $m = 1; $m <= $luxury_hotels_about_point; $m++ ){
		$wp_customize->add_setting('luxury_hotels_about_points_text'.$m,array(
			'default'	=> '',
			'sanitize_callback'	=> 'sanitize_text_field'
		));
		$wp_customize->add_control('luxury_hotels_about_points_text'.$m,array(
			'label'	=> __('Add Text ','luxury-hotels').$m,
			'section'	=> 'luxury_hotels_about_section',
			'type'		=> 'text'
		));
	}

	//About Section
	$wp_customize->add_section( 'luxury_hotels_latest_news_section' , array(
    	'title'      => __( 'Latest News Section', 'luxury-hotels' ),
    	'priority' => 4,
		'panel' => 'luxury_hotels_panel_id'
	) );
	$wp_customize->add_setting( 'luxury_hotels_latest_news_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Luxury_Hotels_Toggle_Control( $wp_customize, 'luxury_hotels_latest_news_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Latest News Section', 'luxury-hotels' ),
		'section'     => 'luxury_hotels_latest_news_section',
		'type'        => 'toggle',
		'settings'    => 'luxury_hotels_latest_news_show_hide',
	) ) );
	$wp_customize->add_setting('luxury_hotels_news_heading',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luxury_hotels_news_heading',array(
		'label'	=> __('Add Heading','luxury-hotels'),
		'section'=> 'luxury_hotels_latest_news_section',
		'type'=> 'text'
	));
	$luxury_hotels_categories = get_categories();
	$cats = array();
	$i = 0;
	$luxury_hotels_offer_cat[]= 'select';
	foreach($luxury_hotels_categories as $category){
		if($i==0){
			$default = $category->slug;
			$i++;
		}
		$luxury_hotels_offer_cat[$category->slug] = $category->name;
	}
	$wp_customize->add_setting('luxury_hotels_latest_news_section_category',array(
		'default'	=> 'select',
		'sanitize_callback' => 'luxury_hotels_sanitize_choices',
	));
	$wp_customize->add_control('luxury_hotels_latest_news_section_category',array(
		'type'    => 'select',
		'choices' => $luxury_hotels_offer_cat,
		'label' => __('Select Category','luxury-hotels'),
		'section' => 'luxury_hotels_latest_news_section',
	));

	//footer
	$wp_customize->add_section('luxury_hotels_footer_section',array(
		'title'	=> __('Footer Text','luxury-hotels'),
		'description'	=> __('Add copyright text.','luxury-hotels'),
		'panel' => 'luxury_hotels_panel_id',
		'priority' => 5,
	));
	$wp_customize->add_setting('luxury_hotels_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luxury_hotels_footer_text',array(
		'label'	=> __('Copyright Text','luxury-hotels'),
		'section'	=> 'luxury_hotels_footer_section',
		'type'		=> 'text'
	));
	// footer columns
	$wp_customize->add_setting('luxury_hotels_footer_columns',array(
		'default'	=> 4,
		'sanitize_callback'	=> 'luxury_hotels_sanitize_number_absint'
	));
	$wp_customize->add_control('luxury_hotels_footer_columns',array(
		'label'	=> __('Footer Widget Columns','luxury-hotels'),
		'section'	=> 'luxury_hotels_footer_section',
		'setting'	=> 'luxury_hotels_footer_columns',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	));
	$wp_customize->add_setting( 'luxury_hotels_tp_footer_bg_color_option', array(
		'default' => '#151515',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'luxury_hotels_tp_footer_bg_color_option', array(
		'label'     => __('Footer Widget Background Color', 'luxury-hotels'),
		'description' => __('It will change the complete footer widget backgorund color.', 'luxury-hotels'),
		'section' => 'luxury_hotels_footer_section',
		'settings' => 'luxury_hotels_tp_footer_bg_color_option',
	)));
	$wp_customize->add_setting('luxury_hotels_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'luxury_hotels_footer_widget_image',array(
	    'label' => __('Footer Widget Background Image','luxury-hotels'),
	    'section' => 'luxury_hotels_footer_section'
	)));
	$wp_customize->selective_refresh->add_partial( 'luxury_hotels_footer_text', array(
		'selector' => '#footer p',
		'render_callback' => 'luxury_hotels_customize_partial_luxury_hotels_footer_text',
	) );
	$wp_customize->add_setting( 'luxury_hotels_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Luxury_Hotels_Toggle_Control( $wp_customize, 'luxury_hotels_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'luxury-hotels' ),
		'section'     => 'luxury_hotels_footer_section',
		'type'        => 'toggle',
		'settings'    => 'luxury_hotels_return_to_header',
	) ) );
	$wp_customize->add_setting('luxury_hotels_scroll_top_icon',array(
		'default'	=> 'fas fa-arrow-up',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Luxury_Hotels_Icon_Changer(
        $wp_customize,'luxury_hotels_scroll_top_icon',array(
		'label'	=> __('Scroll to top Icon','luxury-hotels'),
		'transport' => 'refresh',
		'section'	=> 'luxury_hotels_footer_section',
		'type'		=> 'icon'
	)));
	// Add Settings and Controls for Scroll top
	$wp_customize->add_setting('luxury_hotels_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'luxury_hotels_sanitize_choices'
	));
	$wp_customize->add_control('luxury_hotels_scroll_top_position',array(
        'type' => 'radio',
        'label'     => __('Scroll to top Position', 'luxury-hotels'),
        'description'   => __('This option work for scroll to top', 'luxury-hotels'),
        'section' => 'luxury_hotels_footer_section',
        'choices' => array(
            'Right' => __('Right','luxury-hotels'),
            'Left' => __('Left','luxury-hotels'),
            'Center' => __('Center','luxury-hotels')
        ),
	) );

	// mobile responsive
	$wp_customize->add_section('luxury_hotels_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'luxury-hotels'),
		'description' => __('Control will no function if the toggle in the main settings is off.', 'luxury-hotels'),
		'panel' => 'luxury_hotels_panel_id',
		'priority' => 6,
	) );
	$wp_customize->add_setting( 'luxury_hotels_return_to_header_mob', array(
		'default'           => True,
		'transport'         => 'refresh',
		'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Luxury_Hotels_Toggle_Control( $wp_customize, 'luxury_hotels_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'luxury-hotels' ),
		'section'     => 'luxury_hotels_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'luxury_hotels_return_to_header_mob',
	) ) );
	$wp_customize->add_setting( 'luxury_hotels_related_post_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Luxury_Hotels_Toggle_Control( $wp_customize, 'luxury_hotels_related_post_mob', array(
		'label'       => esc_html__( 'Show / Hide Related Post', 'luxury-hotels' ),
		'section'     => 'luxury_hotels_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'luxury_hotels_related_post_mob',
	) ) );

	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';

	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'luxury_hotels_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'luxury_hotels_customize_partial_blogdescription',
	) );

	$wp_customize->add_setting( 'luxury_hotels_site_title_text', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Luxury_Hotels_Toggle_Control( $wp_customize, 'luxury_hotels_site_title_text', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'luxury-hotels' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'luxury_hotels_site_title_text',
	) ) );

	// site identity
	// logo site title size
	$wp_customize->add_setting('luxury_hotels_site_title_font_size',array(
		'default'	=> 30,
		'sanitize_callback'	=> 'luxury_hotels_sanitize_number_absint'
	));
	$wp_customize->add_control('luxury_hotels_site_title_font_size',array(
		'label'	=> __('Site Title Font Size in PX','luxury-hotels'),
		'section'	=> 'title_tagline',
		'setting'	=> 'luxury_hotels_site_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 30,
		),
	));
	$wp_customize->add_setting( 'luxury_hotels_site_tagline_text', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Luxury_Hotels_Toggle_Control( $wp_customize, 'luxury_hotels_site_tagline_text', array(
		'label'       => esc_html__( 'Show / Hide Site Tagline', 'luxury-hotels' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'luxury_hotels_site_tagline_text',
	) ) );
	// logo site tagline size
	$wp_customize->add_setting('luxury_hotels_site_tagline_font_size',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'luxury_hotels_sanitize_number_absint'
	));
	$wp_customize->add_control('luxury_hotels_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','luxury-hotels'),
		'section'	=> 'title_tagline',
		'setting'	=> 'luxury_hotels_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 30,
		),
	));
    $wp_customize->add_setting('luxury_hotels_logo_width',array(
		'default' => 50,
		'sanitize_callback'	=> 'luxury_hotels_sanitize_number_absint'
	));
	$wp_customize->add_control('luxury_hotels_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','luxury-hotels'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

   	// woocommerce settings
	$wp_customize->add_setting('luxury_hotels_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'luxury_hotels_sanitize_number_absint'
	));
	$wp_customize->add_control('luxury_hotels_per_columns',array(
		'label'	=> __('Product Per Row','luxury-hotels'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
	$wp_customize->add_setting('luxury_hotels_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'luxury_hotels_sanitize_number_absint'
	));
	$wp_customize->add_control('luxury_hotels_product_per_page',array(
		'label'	=> __('Product Per Page','luxury-hotels'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
	$wp_customize->add_setting( 'luxury_hotels_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Luxury_Hotels_Toggle_Control( $wp_customize, 'luxury_hotels_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Shop page sidebar', 'luxury-hotels' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'luxury_hotels_product_sidebar',
	) ) );
	$wp_customize->add_setting( 'luxury_hotels_single_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Luxury_Hotels_Toggle_Control( $wp_customize, 'luxury_hotels_single_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Product page sidebar', 'luxury-hotels' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'luxury_hotels_single_product_sidebar',
	) ) );
	$wp_customize->add_setting( 'luxury_hotels_related_product', array(
			'default'           => true,
			'transport'         => 'refresh',
			'sanitize_callback' => 'luxury_hotels_sanitize_checkbox',
	) );
	$wp_customize->add_control( new luxury_hotels_Toggle_Control( $wp_customize, 'luxury_hotels_related_product', array(
			'label'       => esc_html__( 'Show / Hide related product', 'luxury-hotels' ),
			'section'     => 'woocommerce_product_catalog',
			'type'        => 'toggle',
			'settings'    => 'luxury_hotels_related_product',
	) ) );
	// 404 PAGE
	$wp_customize->add_section('luxury_hotels_404_page_section',array(
		'title'         => __('404 Page', 'luxury-hotels'),
		'description'   => 'Here you can customize 404 Page content.',
	) );
	$wp_customize->add_setting('luxury_hotels_not_found_title',array(
		'default'=> __('Oops! That page cant be found.','luxury-hotels'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('luxury_hotels_not_found_title',array(
		'label'	=> __('Edit Title','luxury-hotels'),
		'section'=> 'luxury_hotels_404_page_section',
		'type'=> 'text',
	));
	$wp_customize->add_setting('luxury_hotels_not_found_text',array(
		'default'=> __('It looks like nothing was found at this location. Maybe try a search?','luxury-hotels'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('luxury_hotels_not_found_text',array(
		'label'	=> __('Edit Text','luxury-hotels'),
		'section'=> 'luxury_hotels_404_page_section',
		'type'=> 'text'
	));
}
add_action( 'customize_register', 'luxury_hotels_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Luxury Hotels 1.0
 * @see luxury_hotels_customize_register()
 *
 * @return void
 */
function luxury_hotels_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Luxury Hotels 1.0
 * @see luxury_hotels_customize_register()
 *
 * @return void
 */
function luxury_hotels_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'LUXURY_HOTELS_PRO_THEME_NAME' ) ) {
	define( 'LUXURY_HOTELS_PRO_THEME_NAME', esc_html__( 'Luxury Hotels Pro Theme', 'luxury-hotels' ));
}
if ( ! defined( 'LUXURY_HOTELS_PRO_THEME_URL' ) ) {
	define( 'LUXURY_HOTELS_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/hotel-booking-wordpress-theme/'));
}
if ( ! defined( 'LUXURY_HOTELS_DOCS_URL' ) ) {
	define( 'LUXURY_HOTELS_DOCS_URL', esc_url('https://www.themespride.com/demo/docs/luxury-hotels/'));
}

/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Luxury_Hotels_Customize {

	/**
	 * Returns the instance.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return object
	 */
	public static function get_instance() {

		static $instance = null;

		if ( is_null( $instance ) ) {
			$instance = new self;
			$instance->setup_actions();
		}

		return $instance;
	}

	/**
	 * Constructor method.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function __construct() {}

	/**
	 * Sets up initial actions.
	 *
	 * @since  1.0.0
	 * @access private
	 * @return void
	 */
	private function setup_actions() {

		// Register panels, sections, settings, controls, and partials.
		add_action( 'customize_register', array( $this, 'sections' ) );

		// Register scripts and styles for the controls.
		add_action( 'customize_controls_enqueue_scripts', array( $this, 'enqueue_control_scripts' ), 0 );
	}

	/**
	 * Sets up the customizer sections.
	 *
	 * @since  1.0.0
	 * @access public
	 * @param  object  $manager
	 * @return void
	 */
	public function sections( $manager ) {

		// Load custom sections.
		load_template( trailingslashit( get_template_directory() ) . '/inc/section-pro.php' );

		// Register custom section types.
		$manager->register_section_type( 'Luxury_Hotels_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Luxury_Hotels_Customize_Section_Pro(
				$manager,
				'luxury_hotels_section_pro',
				array(
					'priority'   => 9,
					'title'    => LUXURY_HOTELS_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'luxury-hotels' ),
					'pro_url'  => esc_url( LUXURY_HOTELS_PRO_THEME_URL, 'luxury-hotels' ),
				)
			)
		);

		    // Register sections.
		$manager->add_section(
			new Luxury_Hotels_Customize_Section_Pro(
				$manager,
				'luxury_hotels_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'luxury-hotels' ),
					'pro_text' => esc_html__( 'Click Here', 'luxury-hotels' ),
					'pro_url'  => esc_url( LUXURY_HOTELS_DOCS_URL, 'luxury-hotels'),
				)
			)
		);
	}

	/**
	 * Loads theme customizer CSS.
	 *
	 * @since  1.0.0
	 * @access public
	 * @return void
	 */
	public function enqueue_control_scripts() {

		wp_enqueue_script( 'luxury-hotels-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'luxury-hotels-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Luxury_Hotels_Customize::get_instance();
