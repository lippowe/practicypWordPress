<?php
/**
 * WPZOOM Portfolio
 *
 * @package   WPZOOM_Portfolio
 * @author    WPZOOM
 * @copyright 2022 WPZOOM
 * @license   GPL-2.0-or-later
 *
 * @wordpress-plugin
 * Plugin Name: WPZOOM Portfolio
 * Plugin URI:  https://www.wpzoom.com/plugins/portfolio-pro/
 * Description: The ultimate solution for creatives, designers, photographers, and businesses looking to showcase their work in an elegant, professional, and fully customizable way.
 * Author:      WPZOOM
 * Author URI:  https://www.wpzoom.com
 * Text Domain: wpzoom-portfolio
 * Version:     1.4.3
 * License:     GPL2+
 * License URI: http://www.gnu.org/licenses/gpl-2.0.txt
 */

// Exit if accessed directly
defined( 'ABSPATH' ) || exit;

if ( ! defined( 'WPZOOM_PORTFOLIO_VERSION' ) ) {
	define( 'WPZOOM_PORTFOLIO_VERSION', get_file_data( __FILE__, [ 'Version' ] )[0] ); // phpcs:ignore
}

// settings page url attribute
define( 'WPZOOM_PORTFOLIO_SETTINGS_PAGE', 'wpzoom-portfolio-settings' );

define( 'WPZOOM_PORTFOLIO__FILE__', __FILE__ );
define( 'WPZOOM_PORTFOLIO_PLUGIN_BASE', plugin_basename( WPZOOM_PORTFOLIO__FILE__ ) );
define( 'WPZOOM_PORTFOLIO_PLUGIN_DIR', dirname( WPZOOM_PORTFOLIO_PLUGIN_BASE ) );

define( 'WPZOOM_PORTFOLIO_PATH', plugin_dir_path( WPZOOM_PORTFOLIO__FILE__ ) );
define( 'WPZOOM_PORTFOLIO_URL', plugin_dir_url( WPZOOM_PORTFOLIO__FILE__ ) );

// Instance the plugin
$wpzoom_blocks = new WPZOOM_Blocks();

// Register plugin activation hook
register_activation_hook( __FILE__, array( $wpzoom_blocks, 'activate' ) );

// Hook the plugin into WordPress
add_action( 'init', array( $wpzoom_blocks, 'init' ) );

/**
 * Class WPZOOM_Blocks
 *
 * Main container class of the WPZOOM Blocks WordPress plugin.
 *
 * @since 1.0.0
 */
class WPZOOM_Blocks {

	/**
	 * Whether the plugin has been initialized.
	 *
	 * @var    boolean
	 * @access public
	 * @since  1.0.0
	 */
	public $initialized = false;

	/**
	 * The path to this plugin's root directory.
	 *
	 * @var    string
	 * @access public
	 * @since  1.0.0
	 */
	public $plugin_dir_path;

	/**
	 * The URL to this plugin's root directory.
	 *
	 * @var    string
	 * @access public
	 * @since  1.0.0
	 */
	public $plugin_dir_url;

	/**
	 * The path to this plugin's "main" directory.
	 *
	 * @var    string
	 * @access public
	 * @since  1.0.0
	 */
	public $main_dir_path;

	/**
	 * The URL to this plugin's "main" directory.
	 *
	 * @var    string
	 * @access public
	 * @since  1.0.0
	 */
	public $main_dir_url;

	/**
	 * The path to this plugin's "blocks" directory.
	 *
	 * @var    string
	 * @access public
	 * @since  1.0.0
	 */
	public $blocks_dir_path;

	/**
	 * The URL to this plugin's "blocks" directory.
	 *
	 * @var    string
	 * @access public
	 * @since  1.0.0
	 */
	public $blocks_dir_url;

	/**
	 * Initializes the plugin and sets up needed hooks and features.
	 *
	 * @access public
	 * @return void
	 * @since  1.0.0
	 * @see    WPZOOM_Blocks::load_assets()
	 */
	public function init() {
		// If the plugin has not already been initialized...
		if ( false === $this->initialized ) {
			// Assign the values for the plugins 'root' dir/url
			$this->plugin_dir_path = plugin_dir_path( __FILE__ );
			$this->plugin_dir_url = plugin_dir_url( __FILE__ );

			// Assign the values for the plugins 'main' dir/url
			$this->main_dir_path = trailingslashit( $this->plugin_dir_path . 'build' );
			$this->main_dir_url = trailingslashit( $this->plugin_dir_url . 'build' );

			// Assign the values for the plugins 'blocks' dir/url
			$this->blocks_dir_path = trailingslashit( $this->main_dir_path . 'blocks' );
			$this->blocks_dir_url = trailingslashit( $this->main_dir_url . 'blocks' );

			// Load the correct translation files for the plugin
			load_plugin_textdomain( 'wpzoom-portfolio', false, dirname( plugin_basename( __FILE__ ) ) . '/languages' );

			// Filter the Gutenberg block categories to add our custom 'WPZOOM Blocks' category if needed
			add_filter( 'block_categories_all', array( $this, 'filter_block_categories' ), 10, 2 );

			// Load in all needed assets for the plugin
			$this->load_assets();

			// Enqueue the main/root scripts and styles in the Gutenberg editor
			add_action( 'enqueue_block_editor_assets', array( $this, 'enqueue_portfolio_block_editor_assets' ) );
			add_action( 'enqueue_block_assets', array( $this, 'enqueue_portfolio_block_assets' ) );

			// Hook into the REST API in order to add some custom things
			add_action( 'rest_api_init', array( $this, 'rest_api_routes' ) );

			// Add some extra needed styles on the frontend
			add_action( 'wp_enqueue_scripts', function() { wp_enqueue_script( 'jquery' ); wp_enqueue_style( 'dashicons' ); } );

			// Mark the plugin as initialized
			$this->initialized = true;

		}

	}


	/**
	 * Runs once during the activation of the plugin to run some one-time setup functions.
	 *
	 * @access public
	 * @return void
	 * @since  1.0.0
	 */
	public function enqueue_portfolio_block_editor_assets() {

		wp_enqueue_script( 'masonry' );

		$options = get_option( 'wpzoom-portfolio-settings' );

		wp_enqueue_script( 'wpzoom-blocks-js-index-main' ); 

		wp_localize_script(
			'wpzoom-blocks-js-index-main',
			'wpzoomPortfolioBlock',
			array(
				'setting_options' => ( !empty( $options ) ? $options : array() )
			)
		);

		wp_enqueue_style( 'wpzoom-blocks-css-editor-main' );

	}

	/**
	 * Runs once during the activation of the plugin to run some one-time setup functions.
	 *
	 * @access public
	 * @return void
	 * @since  1.0.0
	 */
	public function enqueue_portfolio_block_assets() {

		$should_enqueue =
		has_block( 'wpzoom-blocks/portfolio' ) ||
		has_block( 'wpzoom-blocks/portfolio-layouts' ) ||
		WPZOOM_Portfolio_Assets_Manager::has_wpzoom_portfolio_shortcode();

		if( ! $should_enqueue ) {
			return;
		}

		wp_enqueue_script( 'masonry' );

		wp_enqueue_script( 'wpzoom-blocks-js-script-main' ); 
		wp_enqueue_style( 'wpzoom-blocks-css-style-main' );


	}


	/**
	 * Runs once during the activation of the plugin to run some one-time setup functions.
	 *
	 * @access public
	 * @return void
	 * @since  1.0.0
	 * @see    WPZOOM_Blocks::init()
	 */
	public function activate() {
		// Make sure the plugin is initialized
		$this->init();

		// Flush the rewrite rules so any custom post types work correctly
		flush_rewrite_rules();
	}

	/**
	 * Loads in all the needed assets for the plugin.
	 *
	 * @access public
	 * @return void
	 * @since  1.0.0
	 * @see    register_block_type()
	 */
	public function load_assets() {
		// Set a fallback for files with no version/dependency info
		$no_asset = array( 'dependencies' => array( 'wp-blocks', 'wp-data', 'wp-element', 'wp-i18n', 'wp-polyfill' ), 'version' => '-1' );

		// Go through the main directory and each sub-directory in the blocks directory...
		foreach ( array_merge( array( $this->main_dir_path ), glob( $this->blocks_dir_path . '*', GLOB_ONLYDIR | GLOB_NOSORT ) ) as $path ) {
			// Get the slug for the directory in the current iteration
			$slug = 0 === substr_compare( $path, 'build/', -strlen( 'build/' ) ) ? 'main' : str_replace( $this->blocks_dir_path, '', $path );

			// Get a version of the slug with dashes replaced by underscores
			$slug_ = str_replace( '-', '_', $slug );

			// Consistent slashing
			$path = trailingslashit( $path );

			// Go through every possible script/style there could be in the directory from the current iteration...
			foreach ( array( 'index' => 'js', 'script' => 'js', 'editor' => 'css', 'style' => 'css' ) as $name => $ext ) {
				// If a script/style with the given name exists in the directory from the current iteration...
				if ( file_exists( "$path$name.$ext" ) ) {
					// Get the version/dependency info
					$asset_file = "$path$name.asset.php";
					$asset = file_exists( $asset_file ) ? require_once( $asset_file ) : $no_asset;

					// Register the script/style so it can be enqueued later
					$func = 'js' == $ext ? 'wp_register_script' : 'wp_register_style';
					$url = trailingslashit( 'main' == $slug_ ? $this->main_dir_url : $this->blocks_dir_url . $slug ) . "$name.$ext";
					$depends = 'js' == $ext ? $asset[ 'dependencies' ] : array();
					$func( "wpzoom-blocks-$ext-$name-$slug_", $url, $depends, $asset[ 'version' ], ( 'main' != $slug_ && 'js' == $ext ) );

					// If the file in the current iteration is a script...
					if ( 'js' == $ext && function_exists( 'wp_set_script_translations' ) ) {
						// Setup the translations for it
						wp_set_script_translations( "wpzoom-blocks-js-$name-$slug_", 'wpzoom-portfolio', plugin_dir_path( __FILE__ ) . 'languages' );
					}
				}
			}

			// If the file in the current iteration is in a block...
			if ( 'main' != $slug_ ) {
				// Include the index.php file if the block has one
				if ( file_exists( $path . 'index.php' ) ) {
					require_once( $path . 'index.php' );
				}

				// Construct the arguments array
				$args = array(
					'editor_script' => "wpzoom-blocks-js-index-$slug_",
					'editor_style' => "wpzoom-blocks-css-editor-$slug_",
					'script' => "wpzoom-blocks-js-script-$slug_",
					'style' => "wpzoom-blocks-css-style-$slug_"
				);

				// Construct the class name to use below
				$class_name = 'WPZOOM_Blocks_' . ucwords( $slug_, '_' );

				// If a class with the given name exists...
				if ( class_exists( $class_name ) ) {
					// Instantiate the class
					$class = new $class_name();

					// Add attributes if they have been declared in the class
					if ( property_exists( $class, 'attributes' ) ) {
						$args[ 'attributes' ] = $class->attributes;
					}

					// Add a render callback if one is specified in the class
					if ( method_exists( $class, 'render' ) ) {
						$args[ 'render_callback' ] = array( $class, 'render' );
					}
				}

				// Register the block with Gutenberg using the given arguments
				register_block_type( "wpzoom-blocks/$slug", $args );
			}
		}
	}

	/**
	 * Adds the WPZOOM category to the Gutenberg block categories, if not already present.
	 *
	 * @access public
	 * @param  array   $categories Array containing all registered Gutenberg block categories.
	 * @param  WP_Post $post       A WP_Post object representing the post being loaded.
	 * @return array
	 * @since  1.0.0
	 */
	public function filter_block_categories( $categories, $post ) {
		// Get a list of all the block category slugs
		$category_slugs = wp_list_pluck( $categories, 'slug' );

		// Return the list of categories with our custom category included
		return in_array( 'wpzoom-blocks', $category_slugs, true ) ? $categories : array_merge(
			$categories,
			array(
				array(
					'slug' => 'wpzoom-blocks',
					'title' => esc_html__( 'WPZOOM - Blocks', 'wpzoom-portfolio' )
				)
			)
		);
	}

	/**
	 * Adds extra needed routes in the WordPress REST API.
	 *
	 * @access public
	 * @return void
	 * @since  1.0.0
	 * @see    register_rest_route()
	 * @see    register_rest_field()
	 * @see    WPZOOM_Blocks::get_rest_image_sizes()
	 * @see    WPZOOM_Blocks::get_featured_media_urls()
	 */
	public function rest_api_routes() {
		// Register the 'image-sizes' REST API route
		register_rest_route(
			'wpzoom-blocks/v1',
			'/image-sizes',
			array(
				'methods' => WP_REST_Server::READABLE,
				'callback' => array( $this, 'get_rest_image_sizes' ),
				'permission_callback' => function() { return current_user_can( 'edit_posts' ); }
			)
		);


		// Register the 'featured_media_urls' REST API field on all post types
		register_rest_field(
			get_post_types(),
			'featured_media_urls',
			array(
				'get_callback' => array( $this, 'get_featured_media_urls' ),
				'update_callback' => null,
				'schema' => array(
					'description' => esc_html__( 'Different sized featured images', 'wpzoom-portfolio' ),
					'type' => 'array'
				)
			)
		);
	}

	/**
	 * Returns a REST response containing all available media library image sizes.
	 *
	 * @access public
	 * @return array
	 * @since  1.0.0
	 * @see    get_intermediate_image_sizes()
	 */
	public function get_rest_image_sizes() {
		// Call the built-in get_intermediate_image_sizes() WordPress function to get an array of sizes
		$raw_sizes = get_intermediate_image_sizes();

		// Build an array with sizes and their labels
		$sizes = array();
		foreach ( $raw_sizes as $raw_size ) {
			$sizes[] = array( 'label' => ucwords( preg_replace( '/[_-]/', ' ', $raw_size ) ), 'value' => $raw_size );
		}

		// Return the sizes array properly formatted for a rest response
		return rest_ensure_response( $sizes );
	}



	/**
	 * Returns an array of all the available image size URLs for the featured media from the given post object.
	 *
	 * @access public
	 * @param  WP_Post|Object $object The object that is the context to get the featured media ID from.
	 * @return array
	 * @since  1.0.0
	 * @see    get_intermediate_image_sizes()
	 * @see    wp_get_attachment_image_src()
	 */
	function get_featured_media_urls( $object ) {
		// Initialize the array that will be returned
		$featured_media_urls = array();

		// If the given object has attached featured media...
		if ( isset( $object[ 'featured_media' ] ) ) {
			// Keep track of the featured media ID
			$featured_media_id = $object[ 'featured_media' ];

			// Call wp_get_attachment_image_src() with the default options for the best chance to get a fallback
			$thumb = wp_get_attachment_image_src( $featured_media_id );

			// If the size above was found...
			if ( is_array( $thumb ) ) {
				// Set it so it will be present as a fallback if no other sizes can be found
				$featured_media_urls[ 'thumbnail' ] = $thumb;
			}

			// Go through every available image size...
			foreach ( get_intermediate_image_sizes() as $size ) {
				// Get the featured media source attached to the given object in the size from the current iteration
				$src = wp_get_attachment_image_src( $featured_media_id, $size, false );

				// If the size was found...
				if ( is_array( $src ) ) {
					// Add it to the array of size URLs
					$featured_media_urls[ $size ] = $src;
				}
			}

		}

		// Return the array
		return $featured_media_urls;
	}
}

function wpzoom_theme_has_portfolio() {

	$wpzoom_themes = array(
		'angle',
		'inspiro',
		'wpzoom-inspiro-pro',
		'wpzoom-reel',
		'wpzoom-rezzo'
	);

	$current_theme = get_option( 'stylesheet' );

	if( ! in_array( $current_theme, $wpzoom_themes ) ) {
		return false;
	}
	else {
		if( 'inspiro' == $current_theme ) {
			$theme = wp_get_theme();
			if(	 'https://www.wpzoom.com/free-wordpress-themes/inspiro-lite/' == $theme->get( 'ThemeURI' ) ) {
				return false;
			}
		}
	}

	return true;

}

if( ! function_exists( 'wpzoom_portfolio_load_files' ) ) {
	function wpzoom_portfolio_load_files() {
		//Add Portfolio Shortcode
		require_once 'classes/class-wpzoom-portfolio-shortcode.php';
		require_once 'classes/class-wpzoom-portfolio-admin-menu.php';
		require_once 'classes/class-wpzoom-portfolio-custom-posts.php';
		
		require_once 'classes/class-wpzoom-portfolio-assets-manager.php';
		require_once 'classes/class-wpzoom-wptt-webfont-loader.php';
		
	
		//Load Settings Panel
		require_once 'classes/class-wpzoom-settings-fields.php';
		require_once 'classes/class-wpzoom-portfolio-settings-page.php';
	
		if( ! wpzoom_theme_has_portfolio() ) {
			//Load Archive template
			require_once 'classes/class-wpzoom-portfolio-template.php';
		}
	
		if( ! wpzoom_theme_has_portfolio() ) {
			//Load Archive template
			require_once 'classes/class-wpzoom-portfolio-template.php';
		}
	
		if( ! class_exists( 'WPZOOM_Portfolio_Pro' ) && ! wpzoom_theme_has_portfolio() ) {
			require_once 'classes/class-wpzoom-portfolio-metaboxes-upsell.php';
		}
	}
	add_action( 'plugin_loaded', 'wpzoom_portfolio_load_files' );
}

function load_reorder_portfolio_items() {

	if( ! current_user_can( 'edit_posts' ) || current_theme_supports( 'zoom-portfolio' ) ) {
		return;
	}

	//Load Re-Order feature
	require_once 'classes/featured-posts/class-wpzoom-portfolio-featured-posts.php';
	
	$wpzoom_portfrolio_reorder_settings = array(
		//Unique Id that is used to add the new column in posts list table.
		'id'          => 'wpzoom_is_featured_id',
		//Label that appears in the submenu of post types
		'menu_title'  => __( 'Re-order', 'wpzoom-portfolio' ),
		//Post type in which this feature will be added.
		'post_type'   => 'portfolio_item',
	);

	$featured_posts_plugin_uri         = WPZOOM_PORTFOLIO_URL . '/classes/featured-posts/';
	$list_table_checkbox_directory_uri = WPZOOM_PORTFOLIO_URL . '/classes/featured-posts/list-table-checkbox';

	new WPZOOM_Featured_Posts( $wpzoom_portfrolio_reorder_settings, $featured_posts_plugin_uri );

}
add_action( 'init', 'load_reorder_portfolio_items' );
add_action( 'init', 'WPZOOM_Blocks_Portfolio_Shortcode::instance' );