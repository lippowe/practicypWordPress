<?php
/**
 * Travel Vacation functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package travel_vacation
 */

$travel_vacation_theme_data = wp_get_theme();
if( ! defined( 'TRAVEL_VACATION_THEME_VERSION' ) ) define ( 'TRAVEL_VACATION_THEME_VERSION', $travel_vacation_theme_data->get( 'Version' ) );
if( ! defined( 'TRAVEL_VACATION_THEME_NAME' ) ) define( 'TRAVEL_VACATION_THEME_NAME', $travel_vacation_theme_data->get( 'Name' ) );
if( ! defined( 'TRAVEL_VACATION_THEME_TEXTDOMAIN' ) ) define( 'TRAVEL_VACATION_THEME_TEXTDOMAIN', $travel_vacation_theme_data->get( 'TextDomain' ) );

if ( ! defined( 'TRAVEL_VACATION_VERSION' ) ) {
	define( 'TRAVEL_VACATION_VERSION', '1.0.0' );
}

if ( ! function_exists( 'travel_vacation_setup' ) ) :
	
	function travel_vacation_setup() {
		
		load_theme_textdomain( 'travel-vacation', get_template_directory() . '/languages' );

		add_theme_support( 'woocommerce' );

		add_theme_support( 'automatic-feed-links' );
		
		add_theme_support( 'title-tag' );

		add_theme_support( 'post-thumbnails' );

		register_nav_menus(
			array(
				'primary' => esc_html__( 'Primary', 'travel-vacation' ),
			)
		);

		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'style',
				'script',
				'woocommerce',
			)
		);

		add_theme_support(
			'custom-background',
			apply_filters(
				'travel_vacation_custom_background_args',
				array(
					'default-color' => 'ffffff',
					'default-image' => '',
				)
			)
		);

		add_theme_support( 'customize-selective-refresh-widgets' );

		add_theme_support(
			'custom-logo',
			array(
				'height'      => 250,
				'width'       => 250,
				'flex-width'  => true,
				'flex-height' => true,
			)
		);

		add_theme_support( 'align-wide' );

		add_theme_support( 'responsive-embeds' );
	}
endif;
add_action( 'after_setup_theme', 'travel_vacation_setup' );

function travel_vacation_content_width() {
	$GLOBALS['content_width'] = apply_filters( 'travel_vacation_content_width', 640 );
}
add_action( 'after_setup_theme', 'travel_vacation_content_width', 0 );

function travel_vacation_widgets_init() {
	register_sidebar(
		array(
			'name'          => esc_html__( 'Sidebar', 'travel-vacation' ),
			'id'            => 'sidebar-1',
			'description'   => esc_html__( 'Add widgets here.', 'travel-vacation' ),
			'before_widget' => '<section id="%1$s" class="widget %2$s">',
			'after_widget'  => '</section>',
			'before_title'  => '<h2 class="widget-title"><span>',
			'after_title'   => '</span></h2>',
		)
	);

	// Regsiter 4 footer widgets.
	$travel_vacation_footer_widget_column = get_theme_mod('travel_vacation_footer_widget_column','4');
	for ($i=1; $i<=$travel_vacation_footer_widget_column; $i++) {
		register_sidebar( array(
			'name' => __( 'Footer  ', 'travel-vacation' )  . $i,
			'id' => 'travel-vacation-footer-widget-' . $i,
			'description' => __( 'The Footer Widget Area', 'travel-vacation' )  . $i,
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<div class="widget-header"><h4 class="widget-title">',
			'after_title' => '</h4></div>',
		) );
	}
}
add_action( 'widgets_init', 'travel_vacation_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function travel_vacation_scripts() {
	// Append .min if SCRIPT_DEBUG is false.
	$min = ( defined( 'SCRIPT_DEBUG' ) && SCRIPT_DEBUG ) ? '' : '.min';

	// Slick style.
	wp_enqueue_style( 'travel-vacation-slick-style', get_template_directory_uri() . '/resource/css/slick' . $min . '.css', array(), '1.8.1' );

	// Fontawesome style.
	wp_enqueue_style( 'travel-vacation-fontawesome-style', get_template_directory_uri() . '/resource/css/fontawesome' . $min . '.css', array(), '5.15.4' );

	// Main style.
	wp_enqueue_style( 'travel-vacation-style', get_template_directory_uri() . '/style.css', array(), TRAVEL_VACATION_VERSION );

	// Navigation script.
	wp_enqueue_script( 'travel-vacation-navigation-script', get_template_directory_uri() . '/resource/js/navigation' . $min . '.js', array(), TRAVEL_VACATION_VERSION, true );

	// Slick script.
	wp_enqueue_script( 'travel-vacation-slick-script', get_template_directory_uri() . '/resource/js/slick' . $min . '.js', array( 'jquery' ), '1.8.1', true );

	// Custom script.
	wp_enqueue_script( 'travel-vacation-custom-script', get_template_directory_uri() . '/resource/js/custom.js', array( 'jquery' ), TRAVEL_VACATION_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	// Include the file.
	require_once get_theme_file_path( 'theme-library/function-files/wptt-webfont-loader.php' );

	// Load the webfont.
	wp_enqueue_style(
		'league-spartan',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=League+Spartan:wght@100..900&display=swap' ),
		array(),
		'1.0'
	);

	wp_enqueue_style(
		'jost',
		wptt_get_webfont_url( 'https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100..900;1,100..900&family=League+Spartan:wght@100..900&display=swap' ),
		array(),
		'1.0'
	);

}
add_action( 'wp_enqueue_scripts', 'travel_vacation_scripts' );

/**
 * Include wptt webfont loader.
 */
require_once get_theme_file_path( 'theme-library/function-files/wptt-webfont-loader.php' );

/**
 * Implement the Custom Header feature.
 */
require get_template_directory() . '/theme-library/custom-header.php';

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . '/theme-library/function-files/template-tags.php';

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . '/theme-library/function-files/template-functions.php';

/**
 * Customizer additions.
 */
require get_template_directory() . '/theme-library/customizer.php';

/**
 * Breadcrumb
 */
require get_template_directory() . '/theme-library/function-files/class-breadcrumb-trail.php';

/**
 * Getting Started
*/
require get_template_directory() . '/theme-library/getting-started/getting-started.php';




