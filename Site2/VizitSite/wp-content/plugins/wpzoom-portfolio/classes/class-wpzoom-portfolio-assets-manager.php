<?php
/**
 * WPZOOM Portfolio Assets Manager
 *
 * @since   1.3.2
 * @package WPZOOM_Portfolio
 */

// Exit if accessed directly.
if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

if ( ! class_exists( 'WPZOOM_Portfolio_Assets_Manager' ) ) {

	/**
	 * Main WPZOOM_Portfolio_Assets_Manager Class.
	 *
	 * @since 1.3.2
	 */
	class WPZOOM_Portfolio_Assets_Manager {

		/**
		 * This class instance.
		 *
		 * @var WPZOOM_Portfolio_Assets_Manager
		 * @since 1.3.2
		 */
		private static $instance;

		/**
		 * Provides singleton instance.
		 *
		 * @since 1.3.2
		 * @return self instance
		 */
		public static function instance() {			

			if ( null === self::$instance ) {
				self::$instance = new WPZOOM_Portfolio_Assets_Manager();
			}

			return self::$instance;
		}

		/**
		 * The Constructor.
		 */
		public function __construct() {

			add_action( 'enqueue_block_assets', array( $this, 'enqueue_frontend_styles' ) );
			add_action( 'enqueue_block_assets', array( $this, 'enqueue_google_fonts' ) );
			
			//Enqueue google fonts to editor
			add_action( 'enqueue_block_editor_assets', array( $this, 'load_google_fonts_to_editor' ), 1 );
			

		}

		public function enqueue_frontend_styles() {
		
			$should_enqueue =
				has_block( 'wpzoom-blocks/portfolio' ) ||
				has_block( 'wpzoom-blocks/portfolio-layouts' ) ||
				self::has_wpzoom_portfolio_shortcode();

			if( ! $should_enqueue ) {
				return;
			}

			wp_enqueue_style( 
				'magnificPopup', 
				WPZOOM_PORTFOLIO_URL . 'assets/css/magnific-popup.css', 
				array(), 
				WPZOOM_PORTFOLIO_VERSION
			);

			wp_enqueue_script( 
				'magnificPopup', 
				WPZOOM_PORTFOLIO_URL . 'assets/js/jquery.magnific-popup.min.js', 
				array( 'jquery' ), 
				WPZOOM_PORTFOLIO_VERSION,
				true 
			);

			wp_enqueue_script( 
				'wpzoom-portfolio-block',
				WPZOOM_PORTFOLIO_URL . 'assets/js/wpzoom-portfolio.js',
				array( 'jquery', 'wp-util' ), 
				WPZOOM_PORTFOLIO_VERSION,
				true 
			);

			wp_localize_script( 
				'wpzoom-portfolio-block',
				'WPZoomPortfolioBlock', 
				array(
					'ajaxURL'       => admin_url( 'admin-ajax.php' ),
					'loadingString' => esc_html__( 'Loading...', 'wpzoom-portfolio' )
				) 
			);

		}

		/**
		 * Check the post content has wpzoom portfolio shortcode
		 *
		 * @since  1.3.2
		 * @param  int         $post_id The post ID.
		 * @param  boolean|int $content The post content.
		 * @return boolean     Return true if post content has portfolio shortcode, else return false.
		 */
		public static function has_wpzoom_portfolio_shortcode( $post_id = 0, $content = '' ) {
			
			$post_id = $post_id > 0 ? $post_id : get_the_ID();
			
			if ( empty( $content ) ) {
				$content = get_post_field( 'post_content', $post_id );
			}

			if ( $content ) {			
				if ( has_shortcode( $content, 'wpzoom_block_portfolio' ) || has_shortcode( $content, 'wpzoom_portfolio_layout' ) ) {
					return true;
				}
			}
			return false;
		}

		/**
		 * Load google fonts for the block
		 *
		 * @since  1.3.2
		 */
		public function enqueue_google_fonts() {

			global $post;

			if ( ! isset( $post ) || ! is_object( $post ) ) {
				return;
			}

			$google_fonts = $wp_google_fonts = $font_families = array();

			$blocks = parse_blocks( $post->post_content );

			foreach ( $blocks as $index => $block ) {

				if ( 'wpzoom-blocks/portfolio' === $block['blockName'] ) {
					if( isset( $block['attrs']['fontFamily'] ) && 'Default' != $block['attrs']['fontFamily'] ) {
						$wp_google_fonts[] = $block['attrs']['fontFamily'];
					}
					if( isset( $block['attrs']['filterFontFamily'] ) && 'Default' != $block['attrs']['filterFontFamily'] ) {
						$google_fonts[] = $block['attrs']['filterFontFamily'];
					}
					if( isset( $block['attrs']['postTitleFontFamily'] ) && 'Default' != $block['attrs']['postTitleFontFamily'] ) {
						$google_fonts[] = $block['attrs']['postTitleFontFamily'];
					}
					if( isset( $block['attrs']['btnFontFamily'] ) && 'Default' != $block['attrs']['btnFontFamily'] ) {
						$google_fonts[] = $block['attrs']['btnFontFamily'];
					}
				}

			}

			if( empty( $google_fonts ) && empty( $wp_google_fonts ) ) {
				return;
			}

			if( !empty( $wp_google_fonts ) ) {
				if( function_exists( 'wp_enqueue_fonts' ) ) {
					wp_enqueue_fonts( $wp_google_fonts );
				}
			}
			
			if( !empty( $google_fonts ) ) {
				foreach( $google_fonts as $google_font ) {
					$google_font = str_replace( '-', ' ', $google_font );
					$google_font = ucwords( $google_font );
					$google_font = str_replace( ' ', '+', $google_font );
					
					$font_families[] = $google_font . ':wght@300;400;500;600;700';
				}
	
				$fonts_url = add_query_arg( array(
					'family' => implode( '&family=', $font_families ),
					'display' => 'swap',
				), 'https://fonts.googleapis.com/css2' );
	
				wp_enqueue_style(
					'wpzoom-portfolio-block-google-fonts',
					wptt_get_webfont_url( esc_url_raw( $fonts_url ) ),
					array(),
					WPZOOM_PORTFOLIO_VERSION
				);
			}

		}

		public function load_google_fonts_to_editor() {

			wp_enqueue_style( 
				'wpzoom-portfolio-google-fonts', 
				WPZOOM_PORTFOLIO_URL . '/assets/admin/css/editor-google-fonts.css',
				array(), 
				WPZOOM_PORTFOLIO_VERSION
			);

		}

	}

}

WPZOOM_Portfolio_Assets_Manager::instance();