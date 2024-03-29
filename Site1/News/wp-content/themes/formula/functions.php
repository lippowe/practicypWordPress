<?php
/**
 * Formula functions and definitions
 *
 * PHP version 5.6
 *
 * @category Creative
 * @package  Formula
 */

// formula Theme URL.
define( 'FORMULA_THEME_URL', get_template_directory_uri() );
define( 'FORMULA_THEME_DIR', get_template_directory() );

// Theme version.
$formula_theme = wp_get_theme();
define( 'FORMULA_THEME_VERSION', $formula_theme->get( 'Version' ) );
define( 'FORMULA_THEME_NAME', $formula_theme->get( 'Name' ) );

// Nav Menu file.
require FORMULA_THEME_DIR . '/inc/menu/wpbp-nav-walker.php';

if ( ! function_exists( 'formula_theme_setup' ) ) :

	/**
	 * Formula Theme Setup
	 */
	function formula_theme_setup() {
		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		*/
		load_theme_textdomain( 'formula', FORMULA_THEME_DIR . '/languages' );

		// Add default posts and comments RSS feed links to head.
		add_theme_support( 'automatic-feed-links' );

		// Set content-width.
		global $formula_content_width;
		if ( ! isset( $formula_content_width ) ) {
			$formula_content_width = 580;
		}
		// Custom background color.
		add_theme_support( 'custom-background', array( 'default-color' => 'f7f7f7' ) );

		// Add selective refresh for sidebar widget.
		add_theme_support( 'customize-selective-refresh-widgets' );

		/*
		* Let WordPress manage the document title.
		*/
		add_theme_support( 'title-tag' );

		// supports featured image.
		add_theme_support( 'post-thumbnails' );

		// woocommerce support.
		add_theme_support( 'woocommerce' );

		// Block Styles allow alternative styles to be applied to existing blocks.
		add_theme_support( 'wp-block-styles' );

		// Woocommerce Gallery Support.
		add_theme_support( 'wc-product-gallery-zoom' );
		add_theme_support( 'wc-product-gallery-lightbox' );
		add_theme_support( 'wc-product-gallery-slider' );

		// Custom logo.
		$logo_width  = 120;
		$logo_height = 90;

		// If the retina setting is active, double the recommended width and height.
		if ( get_theme_mod( 'retina_logo', false ) ) {
			$logo_width  = floor( $logo_width * 2 );
			$logo_height = floor( $logo_height * 2 );
		}

		add_theme_support(
			'custom-logo',
			array(
				'height'      => $logo_height,
				'width'       => $logo_width,
				'flex-height' => true,
				'flex-width'  => true,
			)
		);

		/*
		* Switch default core markup for search form, comment form, and comments
		* to output valid HTML5.
		*/
		add_theme_support(
			'html5',
			array(
				'search-form',
				'comment-form',
				'comment-list',
				'gallery',
				'caption',
				'script',
				'style',
				'navigation-widgets',
			)
		);

		/*
		* Make theme available for translation.
		* Translations can be filed in the /languages/ directory.
		* If you're building a theme based on formula, use a find and replace
		* to change 'formula' to the name of your theme in all the template files.
		*/
		load_theme_textdomain( 'formula' );

		// Add support for full and wide align images.
		add_theme_support( 'align-wide' );

		// Add support for responsive embeds.
		add_theme_support( 'responsive-embeds' );

		// Add theme support for selective refresh for widgets.
		add_theme_support( 'customize-selective-refresh-widgets' );

		// Grid Blog Template Images
		add_image_size( 'formula-blog-grid', '700', '535', true );
		add_image_size( 'formula-portfolio-grid', '700', '535', true );

		// Theme Starter Content
		add_theme_support(
			'starter-content',
			array(

				'widgets'    => array(
					'footer_widget_area_left'   => array(
						'meta_custom' => array(
							'text',
							array(
								'title' => 'About Us',
								'text'  => 'We are the group of professional vector graphics content creator working to provide the quality content.',
							),
						),
					),
					'footer_widget_area_center' => array(
						'meta_custom' => array(
							'recent-posts',
							array(
								'title' => 'Recent Posts',
							),
						),
					),
					'footer_widget_area_right'  => array(
						'meta_custom' => array(
							'archives',
							array(
								'title' => 'Archives',
							),
						),
					),
				),

				'theme_mods' => array(
					'formula_topbar_enabled'         => 'true',
					'formula_topbar_num'             => '(901)-2345-6789',
					'formula_topbar_text'            => 'Request a Callback',
					'formula_topbar_button'          => 'Get Started',
					'formula_topbar_button_link'     => '#',
					'formula_fb_link_disable'        => 'true',
					'formula_facebook_url'           => '#',
					'formula_tweet_link_disable'     => 'true',
					'formula_twitter_url'            => '#',
					'formula_youtube_link_disable'   => 'true',
					'formula_youtube_url'            => '#',
					'formula_linkedin_link_disable'  => 'true',
					'formula_linkedin_url'           => '#',
					'formula_instagram_link_disable' => 'true',
					'formula_instagram_url'          => '#',
					'formula_tumblr_link_disable'    => 'true',
					'formula_tumblr_url'             => '#',
				),

				'nav_menus'  => array(
					'primary' => array(
						'name'  => __( 'Desktop Horizontal Menu', 'formula' ),
						'items' => array(
							'page_home'     => array(
								'type'      => 'post_type',
								'object'    => 'page',
								'object_id' => '{{home}}',
							),
							'page_about'    => array(
								'type'      => 'post_type',
								'object'    => 'page',
								'object_id' => '{{about}}',
							),
							'page_creative' => array(
								'type'      => 'post_type',
								'object'    => 'page',
								'object_id' => '{{creative}}',
							),

						),
					),
				),

				'posts'      => array(
					'home'     => array(
						'post_type'  => 'page',
						'post_title' => 'Home',
					),
					'about'    => array(
						'post_type'  => 'page',
						'post_title' => 'About',
					),
					'creative' => array(
						'post_type'  => 'page',
						'post_title' => 'Creative',
					),
					
				),
			)
		);
	}
endif;
add_action( 'after_setup_theme', 'formula_theme_setup' );


/**
 * Custom theme background by customizer
 */
function formula_custom_background_function() {
	 $page_bg_image_url = get_theme_mod( 'predefined_back_image', 'bg-img1.png' );
	if ( $page_bg_image_url != '' ) {
		echo '<style>body.boxed{ background-image:url("' . esc_url( FORMULA_THEME_URL ) . '/assets/images/bg-patterns/' . esc_html( $page_bg_image_url ) . '");}</style>';
	}
}
add_action( 'wp_head', 'formula_custom_background_function', 10, 0 );

/**
 * Formula Theme CSS & JS
 */
function formula_backend_resources() {
	// Formula Css.
	wp_enqueue_style( 'jost-fonts', 'https://fonts.googleapis.com/css2?family=Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap'  );
	wp_enqueue_style( 'bootstrap-min', FORMULA_THEME_URL . '/assets/vendors/bootstrap/css/bootstrap.min.css', array(), '5.0.0' );
	wp_enqueue_style( 'animate-min', FORMULA_THEME_URL . '/assets/vendors/animate/animate.min.css' );
	wp_enqueue_style( 'fontawesome-min', FORMULA_THEME_URL . '/assets/vendors/fontawesome/css/all.min.css' );
	wp_enqueue_style( 'carousel-min', FORMULA_THEME_URL . '/assets/vendors/owl-carousel/owl.carousel.min.css' );
	wp_enqueue_style( 'odometer-min', FORMULA_THEME_URL . '/assets/vendors/odometer/odometer.min.css' );

	// smartmenus.
	wp_enqueue_style( 'bootstrap-smartmenus-css', FORMULA_THEME_URL . '/assets/css/bootstrap-smartmenus.css' );

	wp_enqueue_style( 'menu-css', FORMULA_THEME_URL . '/assets/css/menu-css.css' );
	wp_enqueue_style( 'responsive', FORMULA_THEME_URL . '/assets/css/formula-responsive.css' );
	wp_enqueue_style( 'rtl-css', FORMULA_THEME_URL . '/assets/css/formula-rtl.css' );
	wp_enqueue_style( 'theme-dark-css', FORMULA_THEME_URL . '/assets/css/colors/theme-dark.css' );
	wp_enqueue_style( 'formula-style', get_stylesheet_uri(), array(), FORMULA_THEME_VERSION );

	// Woocommerce.
	wp_enqueue_style( 'woocommerce-css', FORMULA_THEME_URL . '/assets/css/woocommerce.css' );

	wp_enqueue_style( 'font-awesome-4.7.0-css', FORMULA_THEME_URL . '/assets/css/font-awesome-4.0.7/css/font-awesome.min.css' );

	// Google Fonts Library.
	wp_enqueue_style( 'OpenSans-fonts', 'https://fonts.googleapis.com/css?family=Open+Sans:300,400,400i,500,600,600i,700,700i,800', false );
	wp_enqueue_style( 'Montserrat-fonts', 'https://fonts.googleapis.com/css?family=Montserrat:300,300i,400,400i,500,500i,600,700,800,900', false );

	// Comment reply enable.
	wp_enqueue_script( 'comment-reply' );

	// Formula js.
	wp_enqueue_script( 'bootstrap-js', FORMULA_THEME_URL . '/assets/js/bootstrap.js', array( 'jquery' ) );
	wp_enqueue_script( 'jquery' );
	wp_enqueue_script( 'imagesloaded' );
	wp_enqueue_script( 'masonry' );

	wp_enqueue_script( 'appear-min', FORMULA_THEME_URL . '/assets/vendors/jquery-appear/jquery.appear.min.js', '', false );
	wp_enqueue_script( 'easing-min', FORMULA_THEME_URL . '/assets/vendors/jquery-easing/jquery.easing.min.js', '', false );
	wp_enqueue_script( 'bootstrap-bundle-min', FORMULA_THEME_URL . '/assets/vendors/bootstrap/js/bootstrap.bundle.min.js', '', false );

	// Animation Js.
	if ( get_theme_mod( 'formula_animation_disabled', true ) == true ) :
		wp_enqueue_script( 'wow', FORMULA_THEME_URL . '/assets/vendors/wow/wow.js', '', false );
	endif;

	wp_enqueue_script( 'owl-carousel-min', FORMULA_THEME_URL . '/assets/vendors/owl-carousel/owl.carousel.min.js', '', false );
	wp_enqueue_script( 'odometer', FORMULA_THEME_URL . '/assets/vendors/odometer/odometer.min.js', '', false );
	wp_enqueue_script( 'formula-main', FORMULA_THEME_URL . '/assets/js/formula.js', '', false );

}

// formula Theme Option Panel CSS and JS Backend.
add_action( 'wp_enqueue_scripts', 'formula_backend_resources' );

/**
 * Enqueue admin scripts and styles. Only For Free version
 */
function Formula_Admin_Enqueue_scripts() {
	// For Getting Started.
	wp_enqueue_style( 'formula-admin-style', FORMULA_THEME_URL . '/inc/admin/css/admin.css' );
	wp_enqueue_script( 'formula-admin-script', FORMULA_THEME_URL . '/inc/admin/js/formula-admin-script.js', array( 'jquery' ), '', true );
	wp_localize_script(
		'formula-admin-script',
		'formula_ajax_object',
		array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
	);
	// For Selector Scroller.
	wp_enqueue_style( 'formula-selector-scroll-style', FORMULA_THEME_URL . '/inc/customizer/assets/css/customize.css', FORMULA_THEME_VERSION, 'screen' );
	wp_enqueue_script( 'formula-customizer-sections', FORMULA_THEME_URL . '/inc/customizer/assets/js/customizer-section.js', array( 'jquery' ), '', true );
}
add_action( 'admin_enqueue_scripts', 'Formula_Admin_Enqueue_scripts' );

/**
 * Set default texonomy for portfolio
 */
function Formula_Default_Object_terms( $post_id, $post ) {
	if ( 'publish' === $post->post_status && $post->post_type === 'formula_port' ) {
		$defaults   = array(
			'portfolio_categories' => array( 'Show All' ),
		);
		$taxonomies = get_object_taxonomies( $post->post_type );
		foreach ( (array) $taxonomies as $taxonomy ) {
			$terms = wp_get_post_terms( $post_id, $taxonomy );
			if ( empty( $terms ) && array_key_exists( $taxonomy, $defaults ) ) {
				wp_set_object_terms( $post_id, $defaults[ $taxonomy ], $taxonomy );
			}
		}
	}
}
add_action( 'save_post', 'Formula_Default_Object_terms', 0, 2 );

/**
 * Cart icon
 */
require FORMULA_THEME_DIR . '/inc/cart-icon.php';

/**
 * Implement the Theme Custom Header feature.
 */
require FORMULA_THEME_DIR . '/inc/custom-header.php';

/**
 * Widgets
 */
require FORMULA_THEME_DIR . '/inc/widgets/sidebars.php';

/**
 * Customizer additions.
 */
require FORMULA_THEME_DIR . '/inc/customizer/customizer.php';
require FORMULA_THEME_DIR . '/inc/customizer/customizer-options.php';

/**
 * Typography Setting.
 */
require FORMULA_THEME_DIR . '/inc/theme-custom-typography.php';

/**
 * Colors Setting.
 */
require FORMULA_THEME_DIR . '/inc/custom-theme-colors.php';

/**
 * Excerpt
 */
require FORMULA_THEME_DIR . '/inc/excerpt.php';

/**
 * Theme Style Settings
 */
require FORMULA_THEME_DIR . '/inc/customizer/theme-style-settings/theme-style-custom-color-script.php'; // premade / custom skin color code.
require FORMULA_THEME_DIR . '/assets/css/custom-css.php'; // Css for custom skin color.


// Featured image function class code
if ( ! function_exists( 'Formula_Image_thumbnail' ) ) :
	/**
	 * Feature Image Class
	 */
	function Formula_Image_thumbnail( $preset, $class ) {
		if ( has_post_thumbnail() ) {
			$defalt_arg = array( 'class' => $class );
			the_post_thumbnail( $preset, $defalt_arg );
		}
	}
endif;

/**
 * Menu File
 */
require FORMULA_THEME_DIR . '/theme-menu/menu-file.php';

/**
 * Theme About Submenu
 */
//$formula_theme = wp_get_theme();
//if ( 'Formula' == $formula_theme->name ) {
	if ( is_admin() ) {
		require FORMULA_THEME_DIR . '/inc/admin/getting-started.php';
	}
//}

/**
 * Demo File
 */
require_once ABSPATH . 'wp-admin/includes/plugin.php';
if ( is_plugin_active( 'awp-companion/awp-companion.php' ) ) {
	// plugin is activated.
	require awp_companion_plugin_dir . 'inc/formula/demo-content/setup.php';
}
