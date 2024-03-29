<?php
/**
 * fTourism functions and definitions
 *
 * Set up the theme and provides some helper functions, which are used in the
 * theme as custom template tags. Others are attached to action and filter
 * hooks in WordPress to change core functionality.
 *
 * When using a child theme you can override certain functions (those wrapped
 * in a function_exists() call) by defining them first in your child theme's
 * functions.php file. The child theme's functions.php file is included before
 * the parent theme's file, so the child theme functions would be used.
 *
 * @link https://codex.wordpress.org/Theme_Development
 * @link https://codex.wordpress.org/Child_Themes
 *
 * Functions that are not pluggable (not wrapped in function_exists()) are
 * instead attached to a filter or action hook.
 *
 * For more information on hooks, actions, and filters,
 * {@link https://codex.wordpress.org/Plugin_API}
 *
 * @subpackage fTourism
 * @author tishonator
 * @since fTourism 1.0.0
 *
 */

/**
 * Set a constant that holds the theme's minimum supported PHP version.
 */
define( 'FTOURISM_MIN_PHP_VERSION', '7.0' );

/**
 * Immediately after theme switch is fired we we want to check php version and
 * revert to previously active theme if version is below our minimum.
 */
add_action( 'after_switch_theme', 'ftourism_test_for_min_php' );

/**
 * Switches back to the previous theme if the minimum PHP version is not met.
 */
function ftourism_test_for_min_php() {

	// Compare versions.
	if ( version_compare( PHP_VERSION, FTOURISM_MIN_PHP_VERSION, '<' ) ) {
		// Site doesn't meet themes min php requirements, add notice...
		add_action( 'admin_notices', 'ftourism_min_php_not_met_notice' );
		// ... and switch back to previous theme.
		switch_theme( get_option( 'theme_switched' ) );
		return false;

	};
}

if ( ! function_exists( 'wp_body_open' ) ) {
        function wp_body_open() {
                do_action( 'wp_body_open' );
        }
}

/**
 * An error notice that can be displayed if the Minimum PHP version is not met.
 */
function ftourism_min_php_not_met_notice() {
	?>
	<div class="notice notice-error is_dismissable">
		<p>
			<?php esc_html_e( 'You need to update your PHP version to run this theme.', 'ftourism' ); ?> <br />
			<?php
			printf(
				/* translators: 1 is the current PHP version string, 2 is the minmum supported php version string of the theme */
				esc_html__( 'Actual version is: %1$s, required version is: %2$s.', 'ftourism' ),
				PHP_VERSION,
				FTOURISM_MIN_PHP_VERSION
			); // phpcs: XSS ok.
			?>
		</p>
	</div>
	<?php
}


require_once( trailingslashit( get_template_directory() ) . 'customize-pro/class-customize.php' );

if ( ! function_exists( 'ftourism_setup' ) ) {
	/**
	 * fTourism setup.
	 *
	 * Set up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support post thumbnails.
	 *
	 */
	function ftourism_setup() {

		load_theme_textdomain( 'ftourism', get_template_directory() . '/languages' );

		add_theme_support( "title-tag" );


		// This theme uses wp_nav_menu() in two locations.
		register_nav_menus( array(
			'primary'   => __( 'Primary Menu', 'ftourism' ),
			'footer'   => __( 'Footer Menu', 'ftourism' ),
		) );

		// add Custom background				 
		add_theme_support( 'custom-background', 
					   array ('default-color'  => '#FFFFFF')
					 );


		add_theme_support( 'post-thumbnails' );
	

		global $content_width;
		if ( ! isset( $content_width ) )
			$content_width = 900;

		add_theme_support( 'automatic-feed-links' );

		/*
		 * Switch default core markup for search form, comment form, and comments
		 * to output valid HTML5.
		 */
		add_theme_support( 'html5', array(
			'comment-form', 'comment-list',
		) );

		// add custom header
		add_theme_support( 'custom-header', array (
		                   'default-image'          => '',
		                   'random-default'         => '',
		                   'flex-height'            => true,
		                   'flex-width'             => true,
		                   'uploads'                => true,
		                   'width'                  => 900,
		                   'height'                 => 100,
		                   'default-text-color'        => '#000000',
		                   'wp-head-callback'       => 'ftourism_header_style',
		                ) );

		// add custom logo
		add_theme_support( 'custom-logo', array (
		                   'width'                  => 145,
		                   'height'                 => 36,
		                   'flex-height'            => true,
		                   'flex-width'             => true,
		                ) );

		// Define and register starter content to showcase the theme on new sites.
		$starter_content = array(

			'widgets' => array(
				'sidebar-widget-area' => array(
					'search',
					'recent-posts',
					'categories',
					'archives',
				),

				'footer-column-1-widget-area' => array(
					'recent-comments'
				),

				'footer-column-2-widget-area' => array(
					'recent-posts'
				),
			),

			'posts' => array(
				'home',
				'blog',
				'about',
				'contact'
			),

			// Default to a static front page and assign the front and posts pages.
			'options' => array(
				'show_on_front' => 'page',
				'page_on_front' => '{{home}}',
				'page_for_posts' => '{{blog}}',
			),

			// Set the front page section theme mods to the IDs of the core-registered pages.
			'theme_mods' => array(
				'ftourism_slider_display' => 1,
				'ftourism_slide1_image' => esc_url( get_template_directory_uri() . '/images/slider/1.jpg' ),
				'ftourism_slide1_content' => _x( '<h2>Slide 1 Title</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><a href="#" title="Read more">Read more</a>', 'Theme starter content', 'ftourism' ),
				'ftourism_slide2_image' => esc_url( get_template_directory_uri() . '/images/slider/2.jpg' ),
				'ftourism_slide2_content' => _x( '<h2>Slide 2 Title</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><a href="#" title="Read more">Read more</a>', 'Theme starter content', 'ftourism' ),
				'ftourism_slide3_image' => esc_url( get_template_directory_uri() . '/images/slider/3.jpg' ),
				'ftourism_slide3_content' => _x( '<h2>Slide 3 Title</h2><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p><a href="#" title="Read more">Read more</a>', 'Theme starter content', 'ftourism' ),
				'ftourism_social_facebook' => _x( '#', 'Theme starter content', 'ftourism' ),
				'ftourism_social_twitter' => _x( '#', 'Theme starter content', 'ftourism' ),
				'ftourism_social_linkedin' => _x( '#', 'Theme starter content', 'ftourism' ),
				'ftourism_social_instagram' => _x( '#', 'Theme starter content', 'ftourism' ),
				'ftourism_social_rss' => _x( '#', 'Theme starter content', 'ftourism' ),
				'ftourism_social_tumblr' => _x( '#', 'Theme starter content', 'ftourism' ),
				'ftourism_social_youtube' => _x( '#', 'Theme starter content', 'ftourism' ),
				'ftourism_social_pinterest' => _x( '#', 'Theme starter content', 'ftourism' ),
				'ftourism_social_vk' => _x( '#', 'Theme starter content', 'ftourism' ),
				'ftourism_social_flickr' => _x( '#', 'Theme starter content', 'ftourism' ),
				'ftourism_social_vine' => _x( '#', 'Theme starter content', 'ftourism' ),
				'ftourism_header_phone' => _x( 'info@example.com', 'Theme starter content', 'ftourism' ),
				'ftourism_header_email' => _x( '1.555.555.555', 'Theme starter content', 'ftourism' ),
			),

			'nav_menus' => array(

				// Assign a menu to the "primary" location.
				'primary' => array(
					'name' => __( 'Primary Menu', 'ftourism' ),
					'items' => array(
						'link_home',
						'page_blog',
						'page_contact',
						'page_about',
					),
				),

				// Assign a menu to the "footer" location.
				'footer' => array(
					'name' => __( 'Footer Menu', 'ftourism' ),
					'items' => array(
						'link_home',
						'page_about',
						'page_blog',
						'page_contact',
					),
				),
			),
		);

		$starter_content = apply_filters( 'ftourism_starter_content', $starter_content );
		add_theme_support( 'starter-content', $starter_content );
	}
} // ftourism_setup
add_action( 'after_setup_theme', 'ftourism_setup' );

/**
 * the main function to load scripts in the fTourism theme
 * if you add a new load of script, style, etc. you can use that function
 * instead of adding a new wp_enqueue_scripts action for it.
 */
function ftourism_load_scripts() {

	// load main stylesheet.
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/css/font-awesome.min.css', array( ) );
	wp_enqueue_style( 'animate-css', get_template_directory_uri() . '/css/animate.css', array( ) );
	wp_enqueue_style( 'ftourism-style', get_stylesheet_uri(), array( ) );
	
	
	// Load thread comments reply script	
	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'viewportchecker', get_template_directory_uri() . '/js/viewportchecker.js',
			array( 'jquery' ) );
	
	// Load Utilities JS Script
	wp_enqueue_script( 'ftourism-js', get_template_directory_uri() . '/js/utilities.js',
		array( 'jquery', 'viewportchecker' ) );

	$data = array(
		'loading_effect' => ( get_theme_mod('ftourism_animations_display', 1) == 1 ),
	);
	wp_localize_script('ftourism-js', 'ftourism_options', $data);

	// Load Slider JS Scripts
	
	wp_enqueue_script( 'jquery.easing', get_template_directory_uri() . '/js/jquery.easing.js', array( 'jquery' ) );
	wp_enqueue_script( 'camera', get_template_directory_uri() . '/js/camera.js', array( 'jquery' ) );
}
add_action( 'wp_enqueue_scripts', 'ftourism_load_scripts' );


/**
 * Display website's logo image
 */
function ftourism_show_website_logo_image_and_title() {

	if ( has_custom_logo() ) {

        the_custom_logo();
    }

    $header_text_color = get_header_textcolor();

    if ( 'blank' !== $header_text_color ) {
    
        echo '<div id="site-identity">';
        echo '<a href="' . esc_url( home_url('/') ) . '" title="' . esc_attr( get_bloginfo('name') ) . '">';
        echo '<h1 class="entry-title">' . esc_html( get_bloginfo('name') ) . '</h1>';
        echo '</a>';
        echo '<strong>' . esc_html( get_bloginfo('description') ) . '</strong>';
        echo '</div>';
    }
}

/**
 *	Displays the copyright text.
 */
function ftourism_show_copyright_text() {

	$footerText = get_theme_mod('ftourism_footer_copyright', null);

	if ( !empty( $footerText ) ) {

		echo esc_html( $footerText ) . ' | ';		
	}
}

/**
 *	widgets-init action handler. Used to register widgets and register widget areas
 */
function ftourism_widgets_init() {
	
	// Register Sidebar Widget.
	register_sidebar( array (
						'name'	 		 =>	 __( 'Sidebar Widget Area', 'ftourism'),
						'id'		 	 =>	 'sidebar-widget-area',
						'description'	 =>  __( 'The sidebar widget area', 'ftourism'),
						'before_widget'	 =>  '',
						'after_widget'	 =>  '',
						'before_title'	 =>  '<div class="sidebar-before-title"></div><h3 class="sidebar-title">',
						'after_title'	 =>  '</h3><div class="sidebar-after-title"></div>',
					) );
	
	/**
	 * Add Footer Columns Widget areas
	 */
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #1', 'ftourism' ),
							'id' 			 =>  'footer-column-1-widget-area',
							'description'	 =>  __( 'The Footer Column #1 widget area', 'ftourism' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="sidebar-title">',
							'after_title'	 =>  '</h2><div class="sidebar-after-title"></div>',
						) );
						
	register_sidebar( array (
							'name'			 =>  __( 'Footer Column #2', 'ftourism' ),
							'id' 			 =>  'footer-column-2-widget-area',
							'description'	 =>  __( 'The Footer Column #2 widget area', 'ftourism' ),
							'before_widget'  =>  '',
							'after_widget'	 =>  '',
							'before_title'	 =>  '<h2 class="sidebar-title">',
							'after_title'	 =>  '</h2><div class="sidebar-after-title"></div>',
						) );
}
add_action( 'widgets_init', 'ftourism_widgets_init' );

/**
 * Displays the slider
 */
function ftourism_display_slider() { ?>
	 
	<div class="camera_wrap camera_emboss" id="camera_wrap">
		<?php
			// display slides
			for ( $i = 1; $i <= 3; ++$i ) {
					
					$defaultSlideImage = get_template_directory_uri().'/images/slider/' . $i .'.jpg';

					$slideContent = get_theme_mod( 'ftourism_slide'.$i.'_content' );
					$slideImage = get_theme_mod( 'ftourism_slide'.$i.'_image', $defaultSlideImage );

				?>

					<div data-thumb="<?php echo esc_attr( $slideImage ); ?>" data-src="<?php echo esc_attr( $slideImage ); ?>">
						<?php if ( $slideContent ) : ?>
								<div class="camera_caption fadeFromBottom">
									<?php echo $slideContent; ?>
								</div>
						<?php endif; ?>
					</div>
<?php		} ?>
	</div><!-- #camera_wrap -->
<?php  
}

function ftourism_display_social_sites() {

	echo '<ul class="header-social-widget">';

	$socialURL = get_theme_mod('ftourism_social_facebook');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Facebook', 'ftourism') . '" class="facebook16"></a></li>';
	}

	$socialURL = get_theme_mod('ftourism_social_twitter');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Twitter', 'ftourism') . '" class="twitter16"></a></li>';
	}

	$socialURL = get_theme_mod('ftourism_social_linkedin');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on LinkedIn', 'ftourism') . '" class="linkedin16"></a></li>';
	}

	$socialURL = get_theme_mod('ftourism_social_instagram');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Instagram', 'ftourism') . '" class="instagram16"></a></li>';
	}

	$socialURL = get_theme_mod('ftourism_social_rss');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow our RSS Feeds', 'ftourism') . '" class="rss16"></a></li>';
	}

	$socialURL = get_theme_mod('ftourism_social_tumblr');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Tumblr', 'ftourism') . '" class="tumblr16"></a></li>';
	}

	$socialURL = get_theme_mod('ftourism_social_youtube');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Youtube', 'ftourism') . '" class="youtube16"></a></li>';
	}

	$socialURL = get_theme_mod('ftourism_social_pinterest');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Pinterest', 'ftourism') . '" class="pinterest16"></a></li>';
	}

	$socialURL = get_theme_mod('ftourism_social_vk');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on VK', 'ftourism') . '" class="vk16"></a></li>';
	}

	$socialURL = get_theme_mod('ftourism_social_flickr');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Flickr', 'ftourism') . '" class="flickr16"></a></li>';
	}

	$socialURL = get_theme_mod('ftourism_social_vine');
	if ( !empty($socialURL) ) {

		echo '<li><a href="' . esc_url( $socialURL ) . '" title="' . __('Follow us on Vine', 'ftourism') . '" class="vine16"></a></li>';
	}

	echo '</ul>';
}

/**
 * Register theme settings in the customizer
 */
function ftourism_customize_register( $wp_customize ) {

	/**
	 * Add Slider Section
	 */
	$wp_customize->add_section(
		'ftourism_slider_section',
		array(
			'title'       => __( 'Slider', 'ftourism' ),
			'capability'  => 'edit_theme_options',
		)
	);

	// Add display slider option
	$wp_customize->add_setting(
			'ftourism_slider_display',
			array(
					'default'           => 0,
					'sanitize_callback' => 'ftourism_sanitize_checkbox',
			)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ftourism_slider_display',
							array(
								'label'          => __( 'Display Slider on a Static Front Page', 'ftourism' ),
								'section'        => 'ftourism_slider_section',
								'settings'       => 'ftourism_slider_display',
								'type'           => 'checkbox',
							)
						)
	);
	
	for ($i = 1; $i <= 3; ++$i) {
	
		$slideContentId = 'ftourism_slide'.$i.'_content';
		$slideImageId = 'ftourism_slide'.$i.'_image';
		$defaultSliderImagePath = get_template_directory_uri().'/images/slider/'.$i.'.jpg';
	
		// Add Slide Content
		$wp_customize->add_setting(
			$slideContentId,
			array(
				'sanitize_callback' => 'ftourism_sanitize_html',
			)
		);
		
		$wp_customize->add_control( new WP_Customize_Control( $wp_customize, $slideContentId,
									array(
										'label'          => sprintf( esc_html__( 'Slide #%s Content', 'ftourism' ), $i ),
										'section'        => 'ftourism_slider_section',
										'settings'       => $slideContentId,
										'type'           => 'textarea',
										)
									)
		);
		
		// Add Slide Background Image
		$wp_customize->add_setting( $slideImageId,
			array(
				'default' => $defaultSliderImagePath,
				'sanitize_callback' => 'ftourism_sanitize_url'
			)
		);

		$wp_customize->add_control( new WP_Customize_Image_Control( $wp_customize, $slideImageId,
				array(
					'label'   	 => sprintf( esc_html__( 'Slide #%s Image', 'ftourism' ), $i ),
					'section' 	 => 'ftourism_slider_section',
					'settings'   => $slideImageId,
				) 
			)
		);
	}

	/**
	 * Add Footer Section
	 */
	$wp_customize->add_section(
		'ftourism_footer_section',
		array(
			'title'       => __( 'Footer', 'ftourism' ),
			'capability'  => 'edit_theme_options',
		)
	);
	
	// Add footer copyright text
	$wp_customize->add_setting(
		'ftourism_footer_copyright',
		array(
		    'default'           => '',
		    'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ftourism_footer_copyright',
        array(
            'label'          => __( 'Copyright Text', 'ftourism' ),
            'section'        => 'ftourism_footer_section',
            'settings'       => 'ftourism_footer_copyright',
            'type'           => 'text',
            )
        )
	);

	/**
	 * Add Social Sites Section
	 */
	$wp_customize->add_section(
		'ftourism_social_section',
		array(
			'title'       => __( 'Social Sites', 'ftourism' ),
			'capability'  => 'edit_theme_options',
		)
	);

	// Add facebook url
	$wp_customize->add_setting(
		'ftourism_social_facebook',
		array(
		    'sanitize_callback' => 'ftourism_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ftourism_social_facebook',
        array(
            'label'          => __( 'Facebook Page URL', 'ftourism' ),
            'section'        => 'ftourism_social_section',
            'settings'       => 'ftourism_social_facebook',
            'type'           => 'text',
            )
        )
	);

	// Add Twitter url
	$wp_customize->add_setting(
		'ftourism_social_twitter',
		array(
		    'sanitize_callback' => 'ftourism_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ftourism_social_twitter',
        array(
            'label'          => __( 'Twitter URL', 'ftourism' ),
            'section'        => 'ftourism_social_section',
            'settings'       => 'ftourism_social_twitter',
            'type'           => 'text',
            )
        )
	);

	// Add LinkedIn url
	$wp_customize->add_setting(
		'ftourism_social_linkedin',
		array(
		    'sanitize_callback' => 'ftourism_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ftourism_social_linkedin',
        array(
            'label'          => __( 'LinkedIn URL', 'ftourism' ),
            'section'        => 'ftourism_social_section',
            'settings'       => 'ftourism_social_linkedin',
            'type'           => 'text',
            )
        )
	);

	// Add Instagram url
	$wp_customize->add_setting(
		'ftourism_social_instagram',
		array(
		    'sanitize_callback' => 'ftourism_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ftourism_social_instagram',
        array(
            'label'          => __( 'LinkedIn URL', 'ftourism' ),
            'section'        => 'ftourism_social_section',
            'settings'       => 'ftourism_social_instagram',
            'type'           => 'text',
            )
        )
	);

	// Add RSS Feeds url
	$wp_customize->add_setting(
		'ftourism_social_rss',
		array(
		    'sanitize_callback' => 'ftourism_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ftourism_social_rss',
        array(
            'label'          => __( 'RSS Feeds URL', 'ftourism' ),
            'section'        => 'ftourism_social_section',
            'settings'       => 'ftourism_social_rss',
            'type'           => 'text',
            )
        )
	);

	// Add Tumblr url
	$wp_customize->add_setting(
		'ftourism_social_tumblr',
		array(
		    'sanitize_callback' => 'ftourism_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ftourism_social_tumblr',
        array(
            'label'          => __( 'Tumblr URL', 'ftourism' ),
            'section'        => 'ftourism_social_section',
            'settings'       => 'ftourism_social_tumblr',
            'type'           => 'text',
            )
        )
	);

	// Add YouTube channel url
	$wp_customize->add_setting(
		'ftourism_social_youtube',
		array(
		    'sanitize_callback' => 'ftourism_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ftourism_social_youtube',
        array(
            'label'          => __( 'YouTube channel URL', 'ftourism' ),
            'section'        => 'ftourism_social_section',
            'settings'       => 'ftourism_social_youtube',
            'type'           => 'text',
            )
        )
	);

	// Add Pinterest url
	$wp_customize->add_setting(
		'ftourism_social_pinterest',
		array(
		    'sanitize_callback' => 'ftourism_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ftourism_social_pinterest',
        array(
            'label'          => __( 'Pinterest URL', 'ftourism' ),
            'section'        => 'ftourism_social_section',
            'settings'       => 'ftourism_social_pinterest',
            'type'           => 'text',
            )
        )
	);

	// Add VK url
	$wp_customize->add_setting(
		'ftourism_social_vk',
		array(
		    'sanitize_callback' => 'ftourism_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ftourism_social_vk',
        array(
            'label'          => __( 'VK URL', 'ftourism' ),
            'section'        => 'ftourism_social_section',
            'settings'       => 'ftourism_social_vk',
            'type'           => 'text',
            )
        )
	);

	// Add Flickr url
	$wp_customize->add_setting(
		'ftourism_social_flickr',
		array(
		    'sanitize_callback' => 'ftourism_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ftourism_social_flickr',
        array(
            'label'          => __( 'Flickr URL', 'ftourism' ),
            'section'        => 'ftourism_social_section',
            'settings'       => 'ftourism_social_flickr',
            'type'           => 'text',
            )
        )
	);

	// Add Vine url
	$wp_customize->add_setting(
		'ftourism_social_vine',
		array(
		    'sanitize_callback' => 'ftourism_sanitize_url',
		)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize, 'ftourism_social_vine',
        array(
            'label'          => __( 'Vine URL', 'ftourism' ),
            'section'        => 'ftourism_social_section',
            'settings'       => 'ftourism_social_vine',
            'type'           => 'text',
            )
        )
	);

	/**
	 * Add Animations Section
	 */
	$wp_customize->add_section(
		'ftourism_animations_display',
		array(
			'title'       => __( 'Animations', 'ftourism' ),
			'capability'  => 'edit_theme_options',
		)
	);

	// Add display Animations option
	$wp_customize->add_setting(
			'ftourism_animations_display',
			array(
					'default'           => 1,
					'sanitize_callback' => 'ftourism_sanitize_checkbox',
			)
	);

	$wp_customize->add_control( new WP_Customize_Control( $wp_customize,
						'ftourism_animations_display',
							array(
								'label'          => __( 'Enable Animations', 'ftourism' ),
								'section'        => 'ftourism_animations_display',
								'settings'       => 'ftourism_animations_display',
								'type'           => 'checkbox',
							)
						)
	);
}
add_action('customize_register', 'ftourism_customize_register');

function ftourism_header_style() {

    $header_text_color = get_header_textcolor();

    if ( ! has_header_image()
        && ( get_theme_support( 'custom-header', 'default-text-color' ) === $header_text_color
             || 'blank' === $header_text_color ) ) {

        return;
    }

    $headerImage = get_header_image();
?>
    <style type="text/css">
        <?php if ( has_header_image() ) : ?>

                #header-main {background-image: url("<?php echo esc_url( $headerImage ); ?>");}

        <?php endif; ?>

        <?php if ( get_theme_support( 'custom-header', 'default-text-color' ) !== $header_text_color
                    && 'blank' !== $header_text_color ) : ?>

                #header-main, #header-main h1.entry-title {color: #<?php echo sanitize_hex_color_no_hash( $header_text_color ); ?>;}

        <?php endif; ?>
    </style>
<?php

}

if ( ! function_exists( 'ftourism_sanitize_checkbox' ) ) :
	/**
	 * Sanitization callback for 'checkbox' type controls. This callback sanitizes `$checked`
	 * as a boolean value, either TRUE or FALSE.
	 *
	 * @param bool $checked Whether the checkbox is checked.
	 * @return bool Whether the checkbox is checked.
	 */
	function ftourism_sanitize_checkbox( $checked ) {
		// Boolean check.
		return ( ( isset( $checked ) && true == $checked ) ? true : false );
	}
endif; // ftourism_sanitize_checkbox

if ( ! function_exists( 'ftourism_sanitize_html' ) ) :

	function ftourism_sanitize_html( $html ) {
		return wp_kses_post( $html );
	}

endif; // ftourism_sanitize_html

if ( ! function_exists( 'ftourism_sanitize_url' ) ) :

	function ftourism_sanitize_url( $url ) {
		return esc_url_raw( $url );
	}

endif; // ftourism_sanitize_url

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function ftourism_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'ftourism_skip_link_focus_fix' );

function ftourism_register_block_styles() {

	register_block_style(
		'core/button',
		array(
			'name'  => 'btn',
			'label' => __( 'Hover Effect', 'ftourism' ),
		)
	);

	register_block_style(
		'core/group',
		array(
			'name'  => 'tgroup',
			'label' => __( 'Margin Bottom Space', 'ftourism' ),
		)
	);

	register_block_style(
		'core/site-title',
		array(
			'name'  => 'tsitetitle',
			'label' => __( 'Bold', 'ftourism' ),
		)
	);

	register_block_style(
		'core/post-title',
		array(
			'name'  => 'tposttitle',
			'label' => __( 'Bold', 'ftourism' ),
		)
	);

	register_block_style(
		'core/social-link',
		array(
			'name'  => 'tsociallinks',
			'label' => __( 'Square', 'ftourism' ),
		)
	);
}
add_action( 'init', 'ftourism_register_block_styles' );

?>
