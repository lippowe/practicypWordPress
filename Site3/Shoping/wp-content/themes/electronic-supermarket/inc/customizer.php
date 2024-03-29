<?php
/**
 * Electronic Supermarket: Customizer
 *
 * @package Electronic Supermarket
 * @subpackage electronic_supermarket
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function electronic_supermarket_customize_register( $wp_customize ) {

	require get_parent_theme_file_path('/inc/controls/icon-changer.php');

	require get_parent_theme_file_path('/inc/controls/range-slider-control.php');

	// Register the custom control type.
	$wp_customize->register_control_type( 'Electronic_Supermarket_Toggle_Control' );

	//Register the sortable control type.
	$wp_customize->register_control_type( 'Electronic_Supermarket_Control_Sortable' );	

	//add home page setting pannel
	$wp_customize->add_panel( 'electronic_supermarket_panel_id', array(
	    'priority' => 10,
	    'capability' => 'edit_theme_options',
	    'theme_supports' => '',
	    'title' => __( 'Custom Home page', 'electronic-supermarket' ),
	    'description' => __( 'Description of what this panel does.', 'electronic-supermarket' ),
	) );

	//TP Genral Option
	$wp_customize->add_section('electronic_supermarket_tp_general_settings',array(
        'title' => __('TP General Option', 'electronic-supermarket'),
        'priority' => 1,
        'panel' => 'electronic_supermarket_panel_id'
    ) );
 	$wp_customize->add_setting('electronic_supermarket_tp_body_layout_settings',array(
		'default' => 'Full',
		'sanitize_callback' => 'electronic_supermarket_sanitize_choices'
	));
 	$wp_customize->add_control('electronic_supermarket_tp_body_layout_settings',array(
		'type' => 'radio',
		'label'     => __('Body Layout Setting', 'electronic-supermarket'),
		'description'   => __('This option work for complete body, if you want to set the complete website in container.', 'electronic-supermarket'),
		'section' => 'electronic_supermarket_tp_general_settings',
		'choices' => array(
		'Full' => __('Full','electronic-supermarket'),
		'Container' => __('Container','electronic-supermarket'),
		'Container Fluid' => __('Container Fluid','electronic-supermarket')
		),
	) );

    // Add Settings and Controls for Post Layout
	$wp_customize->add_setting('electronic_supermarket_sidebar_post_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'electronic_supermarket_sanitize_choices'
	));
	$wp_customize->add_control('electronic_supermarket_sidebar_post_layout',array(
     'type' => 'radio',
     'label'     => __('Post Sidebar Position', 'electronic-supermarket'),
     'description'   => __('This option work for blog page, blog single page, archive page and search page.', 'electronic-supermarket'),
     'section' => 'electronic_supermarket_tp_general_settings',
     'choices' => array(
         'full' => __('Full','electronic-supermarket'),
         'left' => __('Left','electronic-supermarket'),
         'right' => __('Right','electronic-supermarket'),
         'three-column' => __('Three Columns','electronic-supermarket'),
         'four-column' => __('Four Columns','electronic-supermarket'),
         'grid' => __('Grid Layout','electronic-supermarket')
     ),
	) );

	// Add Settings and Controls for single post sidebar Layout
	$wp_customize->add_setting('electronic_supermarket_sidebar_single_post_layout',array(
        'default' => 'right',
        'sanitize_callback' => 'electronic_supermarket_sanitize_choices'
	));
	$wp_customize->add_control('electronic_supermarket_sidebar_single_post_layout',array(
        'type' => 'radio',
        'label'     => __('Single Post Sidebar Position', 'electronic-supermarket'),
        'description'   => __('This option work for single blog page', 'electronic-supermarket'),
        'section' => 'electronic_supermarket_tp_general_settings',
        'choices' => array(
            'full' => __('Full','electronic-supermarket'),
            'left' => __('Left','electronic-supermarket'),
            'right' => __('Right','electronic-supermarket'),
        ),
	) );

	// Add Settings and Controls for Page Layout
	$wp_customize->add_setting('electronic_supermarket_sidebar_page_layout',array(
     'default' => 'right',
     'sanitize_callback' => 'electronic_supermarket_sanitize_choices'
	));
	$wp_customize->add_control('electronic_supermarket_sidebar_page_layout',array(
     'type' => 'radio',
     'label'     => __('Page Sidebar Position', 'electronic-supermarket'),
     'description'   => __('This option work for pages.', 'electronic-supermarket'),
     'section' => 'electronic_supermarket_tp_general_settings',
     'choices' => array(
         'full' => __('Full','electronic-supermarket'),
         'left' => __('Left','electronic-supermarket'),
         'right' => __('Right','electronic-supermarket')
     ),
	) );
    $wp_customize->add_setting( 'electronic_supermarket_sticky', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_sticky', array(
		'label'       => esc_html__( 'Show / Hide Sticky Header', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_tp_general_settings',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_sticky',
	) ) );

	//tp typography option
	$electronic_supermarket_font_array = array(
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

	$wp_customize->add_section('electronic_supermarket_typography_option',array(
		'title'         => __('TP Typography Option', 'electronic-supermarket'),
		'priority' => 1,
		'panel' => 'electronic_supermarket_panel_id'
   	));

   	$wp_customize->add_setting('electronic_supermarket_heading_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'electronic_supermarket_sanitize_choices',
	));
	$wp_customize->add_control(	'electronic_supermarket_heading_font_family', array(
		'section' => 'electronic_supermarket_typography_option',
		'label'   => __('heading Fonts', 'electronic-supermarket'),
		'type'    => 'select',
		'choices' => $electronic_supermarket_font_array,
	));

	$wp_customize->add_setting('electronic_supermarket_body_font_family', array(
		'default'           => '',
		'capability'        => 'edit_theme_options',
		'sanitize_callback' => 'electronic_supermarket_sanitize_choices',
	));
	$wp_customize->add_control(	'electronic_supermarket_body_font_family', array(
		'section' => 'electronic_supermarket_typography_option',
		'label'   => __('Body Fonts', 'electronic-supermarket'),
		'type'    => 'select',
		'choices' => $electronic_supermarket_font_array,
	));

	//TP Preloader Option
	$wp_customize->add_section('electronic_supermarket_prelaoder_option',array(
		'title'         => __('TP Preloader Option', 'electronic-supermarket'),
		'priority' => 1,
		'panel' => 'electronic_supermarket_panel_id'
	) );
	$wp_customize->add_setting( 'electronic_supermarket_preloader_show_hide', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_preloader_show_hide', array(
		'label'       => esc_html__( 'Show / Hide Preloader Option', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_prelaoder_option',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_preloader_show_hide',
	) ) );
	$wp_customize->add_setting( 'electronic_supermarket_tp_preloader_color1_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electronic_supermarket_tp_preloader_color1_option', array(
			'label'     => __('Preloader First Ring Color', 'electronic-supermarket'),
	    'description' => __('It will change the complete theme preloader ring 1 color in one click.', 'electronic-supermarket'),
	    'section' => 'electronic_supermarket_prelaoder_option',
	    'settings' => 'electronic_supermarket_tp_preloader_color1_option',
  	)));
  	$wp_customize->add_setting( 'electronic_supermarket_tp_preloader_color2_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electronic_supermarket_tp_preloader_color2_option', array(
			'label'     => __('Preloader Second Ring Color', 'electronic-supermarket'),
	    'description' => __('It will change the complete theme preloader ring 2 color in one click.', 'electronic-supermarket'),
	    'section' => 'electronic_supermarket_prelaoder_option',
	    'settings' => 'electronic_supermarket_tp_preloader_color2_option',
  	)));
  	$wp_customize->add_setting( 'electronic_supermarket_tp_preloader_bg_color_option', array(
	    'default' => '',
	    'sanitize_callback' => 'sanitize_hex_color'
  	));
  	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electronic_supermarket_tp_preloader_bg_color_option', array(
			'label'     => __('Preloader Background Color', 'electronic-supermarket'),
	    'description' => __('It will change the complete theme preloader bg color in one click.', 'electronic-supermarket'),
	    'section' => 'electronic_supermarket_prelaoder_option',
	    'settings' => 'electronic_supermarket_tp_preloader_bg_color_option',
  	)));
  	
	//TP Blog Option
	$wp_customize->add_section('electronic_supermarket_blog_option',array(
		'title' => __('TP Blog Option', 'electronic-supermarket'),
		'priority' => 1,
		'panel' => 'electronic_supermarket_panel_id'
	) );
	$wp_customize->add_setting('blog_meta_order', array(
        'default' => array('date', 'author', 'comment', 'category'),
        'sanitize_callback' => 'electronic_supermarket_sanitize_sortable',
    ));
    $wp_customize->add_control(new Electronic_Supermarket_Control_Sortable($wp_customize, 'blog_meta_order', array(
    	'label' => esc_html__('Meta Order', 'electronic-supermarket'),
        'description' => __('Drag & Drop post items to re-arrange the order and also hide and show items as per the need by clicking on the eye icon.', 'electronic-supermarket') ,
        'section' => 'electronic_supermarket_blog_option',
        'choices' => array(
            'date' => __('date', 'electronic-supermarket') ,
            'author' => __('author', 'electronic-supermarket') ,
            'comment' => __('comment', 'electronic-supermarket') ,
            'category' => __('category', 'electronic-supermarket') ,
        ) ,
    )));
    $wp_customize->add_setting( 'electronic_supermarket_excerpt_count', array(
		'default'              => 35,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'electronic_supermarket_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'electronic_supermarket_excerpt_count', array(
		'label'       => esc_html__( 'Edit Excerpt Limit','electronic-supermarket' ),
		'section'     => 'electronic_supermarket_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 2,
			'min'              => 0,
			'max'              => 50,
		),
	) );
	$wp_customize->add_setting('electronic_supermarket_read_more_text',array(
		'default'=> __('Read More','electronic-supermarket'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_supermarket_read_more_text',array(
		'label'	=> __('Edit Button Text','electronic-supermarket'),
		'section'=> 'electronic_supermarket_blog_option',
		'type'=> 'text'
	));
	$wp_customize->add_setting( 'electronic_supermarket_remove_read_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_remove_read_button', array(
		'label'       => esc_html__( 'Show / Hide Read More Button', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_blog_option',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_remove_read_button',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'electronic_supermarket_remove_read_button', array(
		'selector' => '.readmore-btn',
		'render_callback' => 'electronic_supermarket_customize_partial_electronic_supermarket_remove_read_button',
	 ));

	 $wp_customize->add_setting( 'electronic_supermarket_remove_tags', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_remove_tags', array(
		'label'       => esc_html__( 'Show / Hide Tags Option', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_blog_option',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_remove_tags',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'electronic_supermarket_remove_tags', array(
		'selector' => '.box-content a[rel="tag"]',
		'render_callback' => 'electronic_supermarket_customize_partial_electronic_supermarket_remove_tags',
	));

	$wp_customize->add_setting( 'electronic_supermarket_remove_category', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_remove_category', array(
		'label'       => esc_html__( 'Show / Hide Category Option', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_blog_option',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_remove_category',
	) ) );
    $wp_customize->selective_refresh->add_partial( 'electronic_supermarket_remove_category', array(
		'selector' => '.box-content a[rel="category"]',
		'render_callback' => 'electronic_supermarket_customize_partial_electronic_supermarket_remove_category',
	));
	$wp_customize->add_setting( 'electronic_supermarket_remove_comment', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_remove_comment', array(
	 'label'       => esc_html__( 'Show / Hide Comment Form', 'electronic-supermarket' ),
	 'section'     => 'electronic_supermarket_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'electronic_supermarket_remove_comment',
	) ) );

	$wp_customize->add_setting( 'electronic_supermarket_remove_related_post', array(
	 'default'           => true,
	 'transport'         => 'refresh',
	 'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
 	) );

	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_remove_related_post', array(
	 'label'       => esc_html__( 'Show / Hide Related Post', 'electronic-supermarket' ),
	 'section'     => 'electronic_supermarket_blog_option',
	 'type'        => 'toggle',
	 'settings'    => 'electronic_supermarket_remove_related_post',
	) ) );
	$wp_customize->add_setting( 'electronic_supermarket_related_post_per_page', array(
		'default'              => 3,
		'type'                 => 'theme_mod',
		'transport' 		   => 'refresh',
		'sanitize_callback'    => 'electronic_supermarket_sanitize_number_range',
		'sanitize_js_callback' => 'absint',
	) );
	$wp_customize->add_control( 'electronic_supermarket_related_post_per_page', array(
		'label'       => esc_html__( 'Related Post Per Page','electronic-supermarket' ),
		'section'     => 'electronic_supermarket_blog_option',
		'type'        => 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 3,
			'max'              => 9,
		),
	) );
	$wp_customize->add_setting('electronic_supermarket_post_layout',array(
        'default' => 'image-content',
        'sanitize_callback' => 'electronic_supermarket_sanitize_choices'
	));
	$wp_customize->add_control('electronic_supermarket_post_layout',array(
        'type' => 'radio',
        'label'     => __('Post Layout', 'electronic-supermarket'),
        'section' => 'electronic_supermarket_blog_option',
        'choices' => array(
            'image-content' => __('Media-Content','electronic-supermarket'),
            'content-image' => __('Content-Media','electronic-supermarket'),
        ),
	) );

 	 //MENU TYPOGRAPHY
	$wp_customize->add_section( 'electronic_supermarket_menu_typography', array(
    	'title'      => __( 'Menu Typography', 'electronic-supermarket' ),
    	'priority' => 2,
		'panel' => 'electronic_supermarket_panel_id'
	) );
	$wp_customize->add_setting('electronic_supermarket_menu_text_tranform',array(
		'default' => 'Capitalize',
		'sanitize_callback' => 'electronic_supermarket_sanitize_choices'
 	));
 	$wp_customize->add_control('electronic_supermarket_menu_text_tranform',array(
		'type' => 'select',
		'label' => __('Menu Text Transform','electronic-supermarket'),
		'section' => 'electronic_supermarket_menu_typography',
		'choices' => array(
		   'Uppercase' => __('Uppercase','electronic-supermarket'),
		   'Lowercase' => __('Lowercase','electronic-supermarket'),
		   'Capitalize' => __('Capitalize','electronic-supermarket'),
		),
	) );
	$wp_customize->add_setting('electronic_supermarket_menu_font_size', array(
	  'default' => 14,
      'sanitize_callback' => 'electronic_supermarket_sanitize_number_range',
	));
	$wp_customize->add_control(new Electronic_Supermarket_Range_Slider($wp_customize, 'electronic_supermarket_menu_font_size', array(
       'section' => 'electronic_supermarket_menu_typography',
      'label' => esc_html__('Font Size', 'electronic-supermarket'),
      'input_attrs' => array(
        'min' => 0,
        'max' => 20,
        'step' => 1
    )
	)));

	// Top Bar
	$wp_customize->add_section( 'electronic_supermarket_topbar', array(
    	'title'      => __( 'Header Details', 'electronic-supermarket' ),
    	'priority' => 2,
    	'description' => __( 'Add your contact details', 'electronic-supermarket' ),
		'panel' => 'electronic_supermarket_panel_id'
	) );
	$wp_customize->add_setting('electronic_supermarket_topbar_text',array(
		'default'=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_supermarket_topbar_text',array(
		'label'	=> __('Topbar Text','electronic-supermarket'),
		'section'=> 'electronic_supermarket_topbar',
		'type'=> 'text'
	));
	$wp_customize->add_setting('electronic_supermarket_about_us_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_supermarket_about_us_text',array(
		'label'	=> __('My About Us Text','electronic-supermarket'),
		'section'	=> 'electronic_supermarket_topbar',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('electronic_supermarket_about_us_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('electronic_supermarket_about_us_link',array(
		'label'	=> __('My About Us Page Link','electronic-supermarket'),
		'section'	=> 'electronic_supermarket_topbar',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('electronic_supermarket_about_us_icon',array(
		'default'	=> 'fas fa-info-circle',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Electronic_Supermarket_Icon_Changer(
        $wp_customize,'electronic_supermarket_about_us_icon',array(
		'label'	=> __('About Us Icon','electronic-supermarket'),
		'transport' => 'refresh',
		'section'	=> 'electronic_supermarket_topbar',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting('electronic_supermarket_order_tracking_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_supermarket_order_tracking_text',array(
		'label'	=> __('Order Tracking Text','electronic-supermarket'),
		'section'	=> 'electronic_supermarket_topbar',
		'type'		=> 'text'
	));
	$wp_customize->add_setting('electronic_supermarket_order_tracking_link',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('electronic_supermarket_order_tracking_link',array(
		'label'	=> __('Order Tracking Link','electronic-supermarket'),
		'section'	=> 'electronic_supermarket_topbar',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('electronic_supermarket_order_tracking_icon',array(
		'default'	=> 'fas fa-truck',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Electronic_Supermarket_Icon_Changer(
        $wp_customize,'electronic_supermarket_order_tracking_icon',array(
		'label'	=> __('Order Tracking Icon','electronic-supermarket'),
		'transport' => 'refresh',
		'section'	=> 'electronic_supermarket_topbar',
		'type'		=> 'icon'
	)));
	$wp_customize->add_setting( 'electronic_supermarket_search_icon', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_search_icon', array(
		'label'       => esc_html__( 'Show / Hide Search Option', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_topbar',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_search_icon',
	) ) );
	$wp_customize->add_setting( '`', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_user_icon', array(
		'label'       => esc_html__( 'Show / Hide User Option', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_topbar',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_user_icon',
	) ) );

	$wp_customize->add_setting('electronic_supermarket_notification',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('electronic_supermarket_notification',array(
		'label'	=> __('Notification Link','electronic-supermarket'),
		'section'	=> 'electronic_supermarket_topbar',
		'type'		=> 'url'
	));

	$wp_customize->add_setting('electronic_supermarket_like_option',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('electronic_supermarket_like_option',array(
		'label'	=> __('My Wishlist Link','electronic-supermarket'),
		'section'	=> 'electronic_supermarket_topbar',
		'type'		=> 'url'
	));

	$wp_customize->add_setting( 'electronic_supermarket_cart_icon', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_cart_icon', array(
		'label'       => esc_html__( 'Show / Hide Cart Option', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_topbar',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_cart_icon',
	) ) );

	$wp_customize->add_setting( 'electronic_supermarket_cart_language_translator', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_cart_language_translator', array(
		'label'       => esc_html__( 'Show / Hide Language Translator Option', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_topbar',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_cart_language_translator',
	) ) );

	$wp_customize->add_setting( 'electronic_supermarket_currency_switcher', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_currency_switcher', array(
		'label'       => esc_html__( 'Show / Hide Currency Switcher', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_topbar',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_currency_switcher',
	) ) );

	$wp_customize->add_setting('electronic_supermarket_category_text',array(
		'default' => 'All Categories',
		'sanitize_callback' => 'sanitize_text_field',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'electronic_supermarket_category_text', array(
	   'settings' => 'electronic_supermarket_category_text',
	   'section'   => 'electronic_supermarket_topbar',
	   'label' => __('Add Category Text', 'electronic-supermarket'),
	   'type'      => 'text'
	));

	$wp_customize->add_setting('electronic_supermarket_product_category_number',array(
		'default' => '',
		'sanitize_callback' => 'electronic_supermarket_sanitize_number_absint',
		'capability' => 'edit_theme_options',
	));
	$wp_customize->add_control( 'electronic_supermarket_product_category_number', array(
	   'settings' => 'electronic_supermarket_product_category_number',
	   'section'   => 'electronic_supermarket_topbar',
	   'label' => __('Add Category Limit', 'electronic-supermarket'),
	   'type'      => 'number'
	));

	// Social Link
	$wp_customize->add_section( 'electronic_supermarket_social_media', array(
    	'title'      => __( 'Social Media Links', 'electronic-supermarket' ),
    	'description' => __( 'Add your Social Links', 'electronic-supermarket' ),
		'panel' => 'electronic_supermarket_panel_id',
      	'priority' => 3,
	) );

	$wp_customize->add_setting( 'electronic_supermarket_header_fb_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_header_fb_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_social_media',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_header_fb_new_tab',
	) ) );
	
	$wp_customize->add_setting('electronic_supermarket_facebook_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('electronic_supermarket_facebook_url',array(
		'label'	=> __('Facebook Link','electronic-supermarket'),
		'section'=> 'electronic_supermarket_social_media',
		'type'=> 'url'
	));

	$wp_customize->selective_refresh->add_partial( 'electronic_supermarket_facebook_url', array(
		'selector' => '.social-media',
		'render_callback' => 'electronic_supermarket_customize_partial_electronic_supermarket_facebook_url',
	) );
	$wp_customize->add_setting('electronic_supermarket_facebook_icon',array(
		'default'	=> 'fab fa-facebook-f',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Electronic_Supermarket_Icon_Changer(
        $wp_customize,'electronic_supermarket_facebook_icon',array(
		'label'	=> __('Facebook Icon','electronic-supermarket'),
		'transport' => 'refresh',
		'section'	=> 'electronic_supermarket_social_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'electronic_supermarket_header_twt_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_header_twt_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_social_media',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_header_twt_new_tab',
	) ) );

	$wp_customize->add_setting('electronic_supermarket_twitter_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('electronic_supermarket_twitter_url',array(
		'label'	=> __('Twitter Link','electronic-supermarket'),
		'section'=> 'electronic_supermarket_social_media',
		'type'=> 'url'
	));
	$wp_customize->add_setting('electronic_supermarket_twitter_icon',array(
		'default'	=> 'fab fa-twitter',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Electronic_Supermarket_Icon_Changer(
        $wp_customize,'electronic_supermarket_twitter_icon',array(
		'label'	=> __('Twitter Icon','electronic-supermarket'),
		'transport' => 'refresh',
		'section'	=> 'electronic_supermarket_social_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'electronic_supermarket_header_ins_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_header_ins_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_social_media',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_header_ins_new_tab',
	) ) );

	$wp_customize->add_setting('electronic_supermarket_instagram_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('electronic_supermarket_instagram_url',array(
		'label'	=> __('Instagram Link','electronic-supermarket'),
		'section'=> 'electronic_supermarket_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('electronic_supermarket_instagram_icon',array(
		'default'	=> 'fab fa-instagram',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Electronic_Supermarket_Icon_Changer(
        $wp_customize,'electronic_supermarket_instagram_icon',array(
		'label'	=> __('Instagram Icon','electronic-supermarket'),
		'transport' => 'refresh',
		'section'	=> 'electronic_supermarket_social_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'electronic_supermarket_header_ut_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_header_ut_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_social_media',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_header_ut_new_tab',
	) ) );

	$wp_customize->add_setting('electronic_supermarket_youtube_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('electronic_supermarket_youtube_url',array(
		'label'	=> __('YouTube Link','electronic-supermarket'),
		'section'=> 'electronic_supermarket_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('electronic_supermarket_youtube_icon',array(
		'default'	=> 'fab fa-youtube',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Electronic_Supermarket_Icon_Changer(
        $wp_customize,'electronic_supermarket_youtube_icon',array(
		'label'	=> __('YouTube Icon','electronic-supermarket'),
		'transport' => 'refresh',
		'section'	=> 'electronic_supermarket_social_media',
		'type'		=> 'icon'
	)));

	$wp_customize->add_setting( 'electronic_supermarket_header_pint_new_tab', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_header_pint_new_tab', array(
		'label'       => esc_html__( 'Open in new tab', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_social_media',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_header_pint_new_tab',
	) ) );


	$wp_customize->add_setting('electronic_supermarket_pint_url',array(
		'default'=> '',
		'sanitize_callback'	=> 'esc_url_raw'
	));
	$wp_customize->add_control('electronic_supermarket_pint_url',array(
		'label'	=> __('Pinterest Link','electronic-supermarket'),
		'section'=> 'electronic_supermarket_social_media',
		'type'=> 'url'
	));

	$wp_customize->add_setting('electronic_supermarket_pinterest_icon',array(
		'default'	=> 'fab fa-pinterest',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Electronic_Supermarket_Icon_Changer(
        $wp_customize,'electronic_supermarket_pinterest_icon',array(
		'label'	=> __('Pinterest Icon','electronic-supermarket'),
		'transport' => 'refresh',
		'section'	=> 'electronic_supermarket_social_media',
		'type'		=> 'icon'
	)));

	//home page slider
	$wp_customize->add_section( 'electronic_supermarket_slider_section' , array(
    	'title'      => __( 'Slider Section', 'electronic-supermarket' ),
    	'priority' => 5,
		'panel' => 'electronic_supermarket_panel_id'
	) );

	$wp_customize->add_setting( 'electronic_supermarket_slider_arrows', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_slider_arrows', array(
		'label'       => esc_html__( 'Show / Hide slider', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_slider_section',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_slider_arrows',
	) ) );
	for ( $count = 1; $count <= 4; $count++ ) {

		$wp_customize->add_setting( 'electronic_supermarket_slider_page' . $count, array(
			'default'           => '',
			'sanitize_callback' => 'electronic_supermarket_sanitize_dropdown_pages'
		) );

		$wp_customize->add_control( 'electronic_supermarket_slider_page' . $count, array(
			'label'    => __( 'Select Slide Image Page', 'electronic-supermarket' ),
			'description' => __('Image Size ( 1835 x 700 ) px','electronic-supermarket'),
			'section'  => 'electronic_supermarket_slider_section',
			'type'     => 'dropdown-pages'
		) );
	}
	$wp_customize->add_setting( 'electronic_supermarket_slider_button', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_slider_button', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_slider_section',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_slider_button',
	) ) );
	$wp_customize->add_setting('electronic_supermarket_slider_option',array(
        'default' => 'defaut-layout',
        'sanitize_callback' => 'electronic_supermarket_sanitize_choices'
	));
	$wp_customize->add_control('electronic_supermarket_slider_option',array(
        'type' => 'radio',
        'label'     => __('Theme Layout', 'electronic-supermarket'),
        'section' => 'electronic_supermarket_slider_section',
        'choices' => array(
            'defaut-layout' => __('Defaut Layout','electronic-supermarket'),
            'custom-layout' => __('Custom Layout','electronic-supermarket'),
        ),
	) );

	$electronic_supermarket_args = array('numberposts' => -1);
	$post_list = get_posts($electronic_supermarket_args);
	$i = 0;
	$pst[]='Select';
	foreach($post_list as $post){
		$pst[$post->post_title] = $post->post_title;
	}

	$wp_customize->add_setting('electronic_supermarket_static_blog_2',array(
		'sanitize_callback' => 'electronic_supermarket_sanitize_choices',
	));
	$wp_customize->add_control('electronic_supermarket_static_blog_2',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','electronic-supermarket'),
		'section' => 'electronic_supermarket_slider_section',
	));
	$wp_customize->add_setting('electronic_supermarket_static_blog_3',array(
		'sanitize_callback' => 'electronic_supermarket_sanitize_choices',
	));
	$wp_customize->add_control('electronic_supermarket_static_blog_3',array(
		'type'    => 'select',
		'choices' => $pst,
		'label' => __('Select post','electronic-supermarket'),
		'section' => 'electronic_supermarket_slider_section',
	));

	$wp_customize->add_setting('electronic_supermarket_slider_content_layout',array(
        'default' => 'LEFT-ALIGN',
        'sanitize_callback' => 'electronic_supermarket_sanitize_choices'
	));
	$wp_customize->add_control('electronic_supermarket_slider_content_layout',array(
        'type' => 'radio',
        'label'     => __('Slider Content Layout', 'electronic-supermarket'),
        'section' => 'electronic_supermarket_slider_section',
        'choices' => array(
        	'LEFT-ALIGN' => __('LEFT-ALIGN','electronic-supermarket'),
            'CENTER-ALIGN' => __('CENTER-ALIGN','electronic-supermarket'),
            'RIGHT-ALIGN' => __('RIGHT-ALIGN','electronic-supermarket'),
        ),
	) );
	
	
	//Category Section
    $wp_customize->add_section('electronic_supermarket_category_section',array(
        'title' => __('Our Category','electronic-supermarket'),
        'description'   => __('Our Category Section','electronic-supermarket'),
        'panel' => 'electronic_supermarket_panel_id',
        'priority' => 4,
    ));
    $wp_customize->add_setting( 'electronic_supermarket_show_hide_category_section', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_show_hide_category_section', array(
		'label'       => esc_html__( 'Show / Hide Category Section', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_category_section',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_show_hide_category_section',
	) ) );


	// Product Section
	$wp_customize->add_section( 'electronic_supermarket_product_section' , array(
    	'title'      => __( 'Product Section', 'electronic-supermarket' ),
    	'priority' => 6,
		'panel' => 'electronic_supermarket_panel_id'
	) );
	$wp_customize->add_setting( 'electronic_supermarket_show_hide_product_section', array(
		'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_show_hide_product_section', array(
		'label'       => esc_html__( 'Show / Hide Product Section', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_product_section',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_show_hide_product_section',
	) ) );

	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_show_hide_about_section', array(
		'label'       => esc_html__( 'Show / Hide Product Section', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_product_section',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_show_hide_about_section',
	) ) );
	$wp_customize->add_setting( 'electronic_supermarket_about_page', array(
		'default'           => '',
		'sanitize_callback' => 'electronic_supermarket_sanitize_dropdown_pages'
	) );
	$wp_customize->add_control( 'electronic_supermarket_about_page', array(
		'label'    => __( 'Select Product Page', 'electronic-supermarket' ),
		'section'  => 'electronic_supermarket_product_section',
		'type'     => 'dropdown-pages'
	) );

	$electronic_supermarket_args = array(
	 'type'                     => 'product',
	 'child_of'                 => 0,
	 'parent'                   => '',
	 'orderby'                  => 'term_group',
	 'order'                    => 'ASC',
	 'hide_empty'               => false,
	 'hierarchical'             => 1,
	 'number'                   => '',
	 'taxonomy'                 => 'product_cat',
	 'pad_counts'               => false
	);
	$categories = get_categories( $electronic_supermarket_args );
	$electronic_supermarket_cats = array();
	$i = 0;
	foreach($categories as $category){
		if($i==0){
				$default = $category->slug;
				$i++;
		}
		$electronic_supermarket_cats[$category->slug] = $category->name;
	}
	$wp_customize->add_setting('electronic_supermarket_recent_product_category',array(
		'sanitize_callback' => 'electronic_supermarket_sanitize_select',
	));
	$wp_customize->add_control('electronic_supermarket_recent_product_category',array(
		'type'    => 'select',
		'choices' => $electronic_supermarket_cats,
		'label' => __('Select Product Category','electronic-supermarket'),
		'section' => 'electronic_supermarket_product_section',
	));

	//footer
	$wp_customize->add_section('electronic_supermarket_footer_section',array(
		'title'	=> __('Footer Text','electronic-supermarket'),
		'description'	=> __('Add copyright text.','electronic-supermarket'),
		'panel' => 'electronic_supermarket_panel_id',
		'priority' => 7,
	));
	$wp_customize->add_setting('electronic_supermarket_footer_text',array(
		'default'	=> '',
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_supermarket_footer_text',array(
		'label'	=> __('Copyright Text','electronic-supermarket'),
		'section'	=> 'electronic_supermarket_footer_section',
		'type'		=> 'text'
	));
	// footer columns
	$wp_customize->add_setting('electronic_supermarket_footer_columns',array(
		'default'	=> 4,
		'sanitize_callback'	=> 'electronic_supermarket_sanitize_number_absint'
	));
	$wp_customize->add_control('electronic_supermarket_footer_columns',array(
		'label'	=> __('Footer Widget Columns','electronic-supermarket'),
		'section'	=> 'electronic_supermarket_footer_section',
		'setting'	=> 'electronic_supermarket_footer_columns',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 1,
			'max'              => 4,
		),
	));
	$wp_customize->add_setting( 'electronic_supermarket_tp_footer_bg_color_option', array(
		'default' => '',
		'sanitize_callback' => 'sanitize_hex_color'
	));
	$wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'electronic_supermarket_tp_footer_bg_color_option', array(
			'label'     => __('Footer Widget Background Color', 'electronic-supermarket'),
			'description' => __('It will change the complete footer widget backgorund color.', 'electronic-supermarket'),
			'section' => 'electronic_supermarket_footer_section',
			'settings' => 'electronic_supermarket_tp_footer_bg_color_option',
	)));
	$wp_customize->add_setting('electronic_supermarket_footer_widget_image',array(
		'default'	=> '',
		'sanitize_callback'	=> 'esc_url_raw',
	));
	$wp_customize->add_control( new WP_Customize_Image_Control($wp_customize,'electronic_supermarket_footer_widget_image',array(
        'label' => __('Footer Widget Background Image','electronic-supermarket'),
         'section' => 'electronic_supermarket_footer_section'
	)));
	$wp_customize->add_setting( 'electronic_supermarket_return_to_header', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_return_to_header', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_footer_section',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_return_to_header',
	) ) );
    $wp_customize->add_setting('electronic_supermarket_scroll_top_icon',array(
	  'default'	=> 'fas fa-arrow-up',
	  'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control(new Electronic_Supermarket_Icon_Changer(
	        $wp_customize,'electronic_supermarket_scroll_top_icon',array(
		'label'	=> __('Scroll to top Icon','electronic-supermarket'),
		'transport' => 'refresh',
		'section'	=> 'electronic_supermarket_footer_section',
			'type'		=> 'icon'
	)));

    // Add Settings and Controls for Scroll top
	$wp_customize->add_setting('electronic_supermarket_scroll_top_position',array(
        'default' => 'Right',
        'sanitize_callback' => 'electronic_supermarket_sanitize_choices'
	));
	$wp_customize->add_control('electronic_supermarket_scroll_top_position',array(
        'type' => 'radio',
        'label'     => __('Scroll to top Position', 'electronic-supermarket'),
        'description'   => __('This option work for scroll to top', 'electronic-supermarket'),
       'section' => 'electronic_supermarket_footer_section',
       'choices' => array(
            'Right' => __('Right','electronic-supermarket'),
            'Left' => __('Left','electronic-supermarket'),
            'Center' => __('Center','electronic-supermarket')
     ),
	) );
	$wp_customize->get_setting( 'blogname' )->transport          = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport   = 'postMessage';
	$wp_customize->selective_refresh->add_partial( 'blogname', array(
		'selector' => '.site-title a',
		'render_callback' => 'electronic_supermarket_customize_partial_blogname',
	) );
	$wp_customize->selective_refresh->add_partial( 'blogdescription', array(
		'selector' => '.site-description',
		'render_callback' => 'electronic_supermarket_customize_partial_blogdescription',
	) );

	//Mobile Respnsive
	$wp_customize->add_section('electronic_supermarket_mobile_media_option',array(
		'title'         => __('Mobile Responsive media', 'electronic-supermarket'),
		'description' => __('Control will no function if the toggle in the main settings is off.', 'electronic-supermarket'),
		'priority' => 8,
		'panel' => 'electronic_supermarket_panel_id'
	) );
	$wp_customize->add_setting( 'electronic_supermarket_return_to_header_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_return_to_header_mob', array(
		'label'       => esc_html__( 'Show / Hide Return to header', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_return_to_header_mob',
	) ) );
	$wp_customize->add_setting( 'electronic_supermarket_slider_buttom_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_slider_buttom_mob', array(
		'label'       => esc_html__( 'Show / Hide Slider Button', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_slider_buttom_mob',
	) ) );
	$wp_customize->add_setting( 'electronic_supermarket_related_post_mob', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_related_post_mob', array(
		'label'       => esc_html__( 'Show / Hide Related Post', 'electronic-supermarket' ),
		'section'     => 'electronic_supermarket_mobile_media_option',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_related_post_mob',
	) ) );

	//Site Identity
	$wp_customize->add_setting( 'electronic_supermarket_site_title', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_site_title', array(
		'label'       => esc_html__( 'Show / Hide Site Title', 'electronic-supermarket' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_site_title',
	) ) );
	$wp_customize->add_setting('electronic_supermarket_site_title_font_size',array(
		'default'	=> 25,
		'sanitize_callback'	=> 'electronic_supermarket_sanitize_number_absint'
	));
	$wp_customize->add_control('electronic_supermarket_site_title_font_size',array(
		'label'	=> __('Site Title Font Size in PX','electronic-supermarket'),
		'section'	=> 'title_tagline',
		'setting'	=> 'electronic_supermarket_site_title_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 80,
		),
	));
	$wp_customize->add_setting( 'electronic_supermarket_site_tagline', array(
	    'default'           => false,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_site_tagline', array(
		'label'       => esc_html__( 'Show / Hide Site Tagline', 'electronic-supermarket' ),
		'section'     => 'title_tagline',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_site_tagline',
	) ) );

	// logo site tagline size
	$wp_customize->add_setting('electronic_supermarket_site_tagline_font_size',array(
		'default'	=> 15,
		'sanitize_callback'	=> 'electronic_supermarket_sanitize_number_absint'
	));
	$wp_customize->add_control('electronic_supermarket_site_tagline_font_size',array(
		'label'	=> __('Site Tagline Font Size in PX','electronic-supermarket'),
		'section'	=> 'title_tagline',
	    'setting'	=> 'electronic_supermarket_site_tagline_font_size',
		'type'	=> 'number',
		'input_attrs' => array(
			'step'             => 1,
			'min'              => 0,
			'max'              => 50,
		),
	));
    $wp_customize->add_setting('electronic_supermarket_logo_width',array(
		'default' => 150,
		'sanitize_callback'	=> 'electronic_supermarket_sanitize_number_absint'
	));
	$wp_customize->add_control('electronic_supermarket_logo_width',array(
		'label'	=> esc_html__('Here You Can Customize Your Logo Size','electronic-supermarket'),
		'section'	=> 'title_tagline',
		'type'		=> 'number'
	));

	$wp_customize->add_setting('electronic_supermarket_logo_settings',array(
		'default' => 'Different Line',
		'sanitize_callback' => 'electronic_supermarket_sanitize_choices'
	));
    $wp_customize->add_control('electronic_supermarket_logo_settings',array(
        'type' => 'radio',
        'label'     => __('Logo Layout Settings', 'electronic-supermarket'),
        'description'   => __('Here you have two options 1. Logo and Site tite in differnt line. 2. Logo and Site title in same line.', 'electronic-supermarket'),
        'section' => 'title_tagline',
        'choices' => array(
            'Different Line' => __('Different Line','electronic-supermarket'),
            'Same Line' => __('Same Line','electronic-supermarket')
        ),
	) );

	//Woo Coomerce
	$wp_customize->add_setting('electronic_supermarket_per_columns',array(
		'default'=> 3,
		'sanitize_callback'	=> 'electronic_supermarket_sanitize_number_absint'
	));
	$wp_customize->add_control('electronic_supermarket_per_columns',array(
		'label'	=> __('Product Per Row','electronic-supermarket'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
	$wp_customize->add_setting('electronic_supermarket_product_per_page',array(
		'default'=> 9,
		'sanitize_callback'	=> 'electronic_supermarket_sanitize_number_absint'
	));
	$wp_customize->add_control('electronic_supermarket_product_per_page',array(
		'label'	=> __('Product Per Page','electronic-supermarket'),
		'section'=> 'woocommerce_product_catalog',
		'type'=> 'number'
	));
   	$wp_customize->add_setting( 'electronic_supermarket_product_sidebar', array(
		 'default'           => true,
		 'transport'         => 'refresh',
		 'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Shop Page Sidebar', 'electronic-supermarket' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_product_sidebar',
	) ) );

	$wp_customize->add_setting( 'electronic_supermarket_single_product_sidebar', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_single_product_sidebar', array(
		'label'       => esc_html__( 'Show / Hide Product Page Sidebar', 'electronic-supermarket' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_single_product_sidebar',
	) ) );
	$wp_customize->add_setting( 'electronic_supermarket_related_product', array(
		'default'           => true,
		'transport'         => 'refresh',
		'sanitize_callback' => 'electronic_supermarket_sanitize_checkbox',
	) );
	$wp_customize->add_control( new Electronic_Supermarket_Toggle_Control( $wp_customize, 'electronic_supermarket_related_product', array(
		'label'       => esc_html__( 'Show / Hide related product', 'electronic-supermarket' ),
		'section'     => 'woocommerce_product_catalog',
		'type'        => 'toggle',
		'settings'    => 'electronic_supermarket_related_product',
	) ) );
	// 404 PAGE
	$wp_customize->add_section('electronic_supermarket_404_page_section',array(
		'title'         => __('404 Page', 'electronic-supermarket'),
		'description'   => 'Here you can customize 404 Page content.',
	) );
	$wp_customize->add_setting('electronic_supermarket_not_found_title',array(
		'default'=> __('Oops! That page cant be found.','electronic-supermarket'),
		'sanitize_callback'	=> 'sanitize_text_field',
	));
	$wp_customize->add_control('electronic_supermarket_not_found_title',array(
		'label'	=> __('Edit Title','electronic-supermarket'),
		'section'=> 'electronic_supermarket_404_page_section',
		'type'=> 'text',
	));
	$wp_customize->add_setting('electronic_supermarket_not_found_text',array(
		'default'=> __('It looks like nothing was found at this location. Maybe try a search?','electronic-supermarket'),
		'sanitize_callback'	=> 'sanitize_text_field'
	));
	$wp_customize->add_control('electronic_supermarket_not_found_text',array(
		'label'	=> __('Edit Text','electronic-supermarket'),
		'section'=> 'electronic_supermarket_404_page_section',
		'type'=> 'text'
	));

}
add_action( 'customize_register', 'electronic_supermarket_customize_register' );

/**
 * Render the site title for the selective refresh partial.
 *
 * @since Electronic Supermarket 1.0
 * @see electronic_supermarket_customize_register()
 *
 * @return void
 */
function electronic_supermarket_customize_partial_blogname() {
	bloginfo( 'name' );
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @since Electronic Supermarket 1.0
 * @see electronic_supermarket_customize_register()
 *
 * @return void
 */
function electronic_supermarket_customize_partial_blogdescription() {
	bloginfo( 'description' );
}

if ( ! defined( 'ELECTRONIC_SUPERMARKET_PRO_THEME_NAME' ) ) {
	define( 'ELECTRONIC_SUPERMARKET_PRO_THEME_NAME', esc_html__( 'Electronic Supermarket Pro', 'electronic-supermarket' ));
}
if ( ! defined( 'ELECTRONIC_SUPERMARKET_PRO_THEME_URL' ) ) {
	define( 'ELECTRONIC_SUPERMARKET_PRO_THEME_URL', esc_url('https://www.themespride.com/themes/supermarket-wordpress-theme/'));
}
if ( ! defined( 'ELECTRONIC_SUPERMARKET_DOCS_URL' ) ) {
	define( 'ELECTRONIC_SUPERMARKET_DOCS_URL', esc_url('https://www.themespride.com/demo/docs/electronic-supermarket/'));
}


/**
 * Singleton class for handling the theme's customizer integration.
 *
 * @since  1.0.0
 * @access public
 */
final class Electronic_Supermarket_Customize {

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
		$manager->register_section_type( 'Electronic_Supermarket_Customize_Section_Pro' );

		// Register sections.
		$manager->add_section(
			new Electronic_Supermarket_Customize_Section_Pro(
				$manager,
				'electronic_supermarket_section_pro',
				array(
					'priority'   => 9,
					'title'    => ELECTRONIC_SUPERMARKET_PRO_THEME_NAME,
					'pro_text' => esc_html__( 'Upgrade Pro', 'electronic-supermarket' ),
					'pro_url'  => esc_url( ELECTRONIC_SUPERMARKET_PRO_THEME_URL, 'electronic-supermarket' ),
				)
			)
		);

		    // Register sections.
		$manager->add_section(
			new Electronic_Supermarket_Customize_Section_Pro(
				$manager,
				'electronic_supermarket_documentation',
				array(
					'priority'   => 500,
					'title'    => esc_html__( 'Theme Documentation', 'electronic-supermarket' ),
					'pro_text' => esc_html__( 'Click Here', 'electronic-supermarket' ),
					'pro_url'  => esc_url( ELECTRONIC_SUPERMARKET_DOCS_URL, 'electronic-supermarket'),
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

		wp_enqueue_script( 'electronic-supermarket-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/js/customize-controls.js', array( 'customize-controls' ) );

		wp_enqueue_style( 'electronic-supermarket-customize-controls', trailingslashit( esc_url( get_template_directory_uri() ) ) . '/assets/css/customize-controls.css' );
	}
}

// Doing this customizer thang!
Electronic_Supermarket_Customize::get_instance();
