<?php
/**
 * This file adds functions to the inspiro-blocks WordPress theme.
 *
 * @package inspiro-blocks
 * @author  WPZOOM
 * @license GNU General Public License v2 or later
 * @link    https://www.wpzoom.com/
 */

/**
 * Define Constants
 */
define( 'INSPIRO_THEME_DIR', trailingslashit( get_template_directory() ) );

/**
 * Enqueues scripts and styles
 */
require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-enqueue-scripts.php';


/**
 * Theme admin notices and info page
 */
if ( is_admin() ) {
    require INSPIRO_THEME_DIR . 'inc/admin-notice.php';
    require INSPIRO_THEME_DIR . 'inc/theme-info-page.php';

    if ( current_user_can( 'manage_options' ) ) {
        require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-notices.php';
        require INSPIRO_THEME_DIR . 'inc/classes/class-inspiro-notice-review.php';
    }
}


if ( ! function_exists( 'inspiro_blocks_setup' ) ) {

	/**
	 * Sets up theme defaults and registers support for various WordPress features.
	 *
	 * Note that this function is hooked into the after_setup_theme hook, which
	 * runs before the init hook. The init hook is too late for some features, such
	 * as indicating support for post thumbnails.
	 *
	 * @since 1.0.0
	 *
	 * @return void
	 */
	function inspiro_blocks_setup() {

		// Make theme available for translation.
		load_theme_textdomain( 'inspiro-blocks', get_template_directory() . '/languages' );

		// Enqueue editor styles and fonts.
		add_editor_style(
			array(
				'./style.css',
			)
		);

		// Remove core block patterns.
		remove_theme_support( 'core-block-patterns' );

        register_nav_menus( array( 'primary' => esc_html__( 'Primary Menu', 'inspiro-blocks' ) ) );

	}
}
add_action( 'after_setup_theme', 'inspiro_blocks_setup' );

// Enqueue style sheet.
add_action( 'wp_enqueue_scripts', 'inspiro_blocks_enqueue_style_sheet' );
function inspiro_blocks_enqueue_style_sheet() {

	wp_enqueue_style( 'inspiro-blocks', get_template_directory_uri() . '/style.css', array(), wp_get_theme()->get( 'Version' ) );

}

/**
 * Register block styles.
 *
 * @since 1.0.0
 */
function inspiro_blocks_register_block_styles() {

	$block_styles = array(
		'core/group'           => array(
			'shadow'       => __( 'Shadow', 'inspiro-blocks' ),
			'border' => __( 'Border', 'inspiro-blocks' ),
			'full-height'  => __( 'Full-height', 'inspiro-blocks' ),
		),
        'core/cover'           => array(
            'round-corners'       => __( 'Rounded', 'inspiro-blocks' ),
        ),
        'core/column'           => array(
            'shadow'       => __( 'Shadow', 'inspiro-blocks' ),
            'border' => __( 'Border', 'inspiro-blocks' ),
            'pull-right'  => __( 'Pull right', 'inspiro-blocks' ),
            'pull-left'  => __( 'Pull left', 'inspiro-blocks' ),
        ),
		'core/image'           => array(
			'shadow' => __( 'Shadow', 'inspiro-blocks' ),
		),
		'core/list'            => array(
			'no-disc' => __( 'No Disc', 'inspiro-blocks' ),
		),
		'core/media-text'      => array(
			'shadow-media' => __( 'Shadow', 'inspiro-blocks' ),
		),
		'core/navigation-link' => array(
			'fill'         => __( 'Fill', 'inspiro-blocks' ),
			'fill-background'    => __( 'Fill Background', 'inspiro-blocks' ),
			'outline'      => __( 'Outline', 'inspiro-blocks' ),
			'outline-background' => __( 'Outline Background', 'inspiro-blocks' ),
		),
	);

	foreach ( $block_styles as $block => $styles ) {
		foreach ( $styles as $style_name => $style_label ) {
			register_block_style(
				$block,
				array(
					'name'  => $style_name,
					'label' => $style_label,
				)
			);
		}
	}
}
add_action( 'init', 'inspiro_blocks_register_block_styles' );

/**
 * Registers block categories, and type.
 *
 * @since 1.0
 */

if ( ! function_exists( 'inspiro_blocks_register_block_pattern_categories' ) ) {

    function inspiro_blocks_register_block_pattern_categories() {

    	/* Functionality specific to the Block Pattern Explorer plugin. */
    	if ( function_exists( 'register_block_pattern_category_type' ) ) {
    		register_block_pattern_category_type( 'inspiro-blocks', array( 'label' => __( 'inspiro-blocks', 'inspiro-blocks' ) ) );
    	}

    	$block_pattern_categories = array(
    		'inspiro-blocks-footer'  => array(
    			'label'         => __( 'Footer', 'inspiro-blocks' ),
    			'categoryTypes' => array( 'inspiro-blocks' ),
    		),
    		'inspiro-blocks-general' => array(
    			'label'         => __( 'Sections', 'inspiro-blocks' ),
    			'categoryTypes' => array( 'inspiro-blocks' ),
    		),
    		'inspiro-blocks-header'  => array(
    			'label'         => __( 'Header', 'inspiro-blocks' ),
    			'categoryTypes' => array( 'inspiro-blocks' ),
    		),
    		'inspiro-blocks-page'    => array(
    			'label'         => __( 'Pages', 'inspiro-blocks' ),
    			'categoryTypes' => array( 'inspiro-blocks' ),
    		),
    		'inspiro-blocks-query'   => array(
    			'label'         => __( 'Blog Posts', 'inspiro-blocks' ),
    			'categoryTypes' => array( 'inspiro-blocks' ),
    		),
    	);

    	foreach ( $block_pattern_categories as $name => $properties ) {
    		register_block_pattern_category( $name, $properties );
    	}
    }
    add_action( 'init', 'inspiro_blocks_register_block_pattern_categories', 9 );

}


/**
* Enqueue theme fonts.
*/
function inspiro_blocks_theme_fonts() {
    $fonts_url = inspiro_blocks_get_fonts_url();

    // Load Fonts if necessary.
    if ( $fonts_url ) {
        require_once get_theme_file_path( 'inc/wptt-webfont-loader.php' );

        wp_enqueue_style( 'inspiro-blocks-theme-fonts', wptt_get_webfont_url( $fonts_url ), array(), wp_get_theme()->get( 'Version' ) );

        add_editor_style( $fonts_url );

    }

}
add_action( 'admin_init', 'inspiro_blocks_theme_fonts', 1 );
add_action( 'wp_enqueue_scripts', 'inspiro_blocks_theme_fonts', 1 );
add_action( 'enqueue_block_editor_assets', 'inspiro_blocks_theme_fonts', 1 );


/**
 * Retrieve webfont URL to load fonts locally.
 */
function inspiro_blocks_get_fonts_url() {
    $font_families = array(
        'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
        'Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'Cormorant+Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700',
        'Crimson+Pro:ital,wght@0,400;0,500;0,600;1,400;1,500;1,600',
        'DM+Sans:ital,wght@0,400;0,500;0,700;1,400;1,500;1,700',
        'Epilogue:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'Figtree:wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900',
        'IBM+Plex+Mono:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;1,200;1,300;1,400;1,500;1,600;1,700',
        'IBM+Plex+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
        'Inter:wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900',
        'Josefin+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700',
        'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'Lexend:wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900',
        'Libre+Baskerville:ital,wght@0,400;0,700;1,400',
        'Libre+Franklin:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700',
        'Manrope:wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800',
        'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900',
        'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000',
        'Nunito:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000',
        'Open+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800',
        'Oswald:wght@0,200;0,300;0,400;0,500;0,600;0,700',
        'Outfit:wght@100;200;300;400;500;600;700;800;900',
        'Philosopher:ital,wght@0,400;0,700;1,400;1,700',
        'Playfair+Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900',
        'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'Quicksand:wght@0,300;0,400;0,500;0,600;0,700',
        'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900',
        'Roboto+Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700',
        'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
        'Source+Serif+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900',
        'Space+Grotesk:wght@0,300;0,400;0,500;0,600;0,700',
        'Urbanist:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'Work+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900',
        'Yeseva+One'
    );

    $query_args = array(
        'family'  => implode( '|', $font_families ),
        'subset'  => urlencode( 'latin,latin-ext' ),
        'display' => urlencode( 'swap' ),
    );

    return apply_filters( 'inspiro_blocks_get_fonts_url', add_query_arg( $query_args, 'https://fonts.googleapis.com/css' ) );
}


/**
 * Include the TGM_Plugin_Activation class.
 */
require_once get_template_directory() . '/inc/class-tgm-plugin-activation.php';

add_action( 'tgmpa_register', 'inspiro_blocks_register_required_plugins' );


/**
 * Register the required plugins for this theme.
 *
 * The variable passed to tgmpa_register_plugins() should be an array of plugin
 * arrays.
 *
 * This function is hooked into tgmpa_init, which is fired within the
 * TGM_Plugin_Activation class constructor.
 */
function inspiro_blocks_register_required_plugins() {

    /*
     * Array of plugin arrays. Required keys are name and slug.
     * If the source is NOT from the .org repo, then source is also required.
     */
    $plugins = array(

        // Recommended plugins from the WordPress Plugin Repository.
        array(
            'name'      => 'WPZOOM Portfolio',
            'slug'      => 'wpzoom-portfolio',
            'required'  => false,
        ),

    );

    /*
     * Array of configuration settings. Amend each line as needed.
     *
     * TGMPA will start providing localized text strings soon. If you already have translations of our standard
     * strings available, please help us make TGMPA even better by giving us access to these translations or by
     * sending in a pull-request with .po file(s) with the translations.
     *
     * Only uncomment the strings in the config array if you want to customize the strings.
     */
    $config = array(
        'id'           => 'inspiro-blocks',                 // Unique ID for hashing notices for multiple instances of TGMPA.
        'default_path' => '',                      // Default absolute path to bundled plugins.
        'menu'         => 'tgmpa-install-plugins', // Menu slug.
        'has_notices'  => true,                    // Show admin notices or not.
        'dismissable'  => true,                    // If false, a user cannot dismiss the nag message.
        'dismiss_msg'  => '',                      // If 'dismissable' is false, this message will be output at top of nag.
        'is_automatic' => false,                   // Automatically activate plugins after installation or not.
        'message'      => '',                      // Message to output right before the plugins table.

    );

    tgmpa( $plugins, $config );
}
