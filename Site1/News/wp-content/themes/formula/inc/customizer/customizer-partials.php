<?php
/**
 * formula Customizer partials.
 *
 * @package formula
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'formula_Customizer_Partials' ) ) {

	/**
	 * Customizer Partials.
	 */
	class formula_Customizer_Partials {

		/**
		 * Instance.
		 *
		 * @access private
		 * @var object
		 */
		private static $instance;

		/**
		 * Initiator.
		 */
		public static function get_instance() {
			if ( ! isset( self::$instance ) ) {
				self::$instance = new self();
			}

			return self::$instance;
		}

		// site title
		public static function formula_customize_partial_blogname() {
			return get_bloginfo( 'name' );
		}

		// Site tagline
		public static function formula_customize_partial_blogdescription() {
			return get_bloginfo( 'description' );
		}
		
		// Slider Area
		public static function formula_main_slider_content_render_callback() {
			return get_theme_mod( 'formula_main_slider_content' );
		}
		
		// Top info Area
		public static function formula_top_info_content_render_callback() {
			return get_theme_mod( 'formula_top_info_content' );
		}
		
		// Footer info Area
		public static function formula_footer_info_content_render_callback() {
			return get_theme_mod( 'formula_footer_info_content' );
		}
		
		// service title
		public static function customize_partial_formula_service_area_title() {
			return get_theme_mod( 'formula_service_area_title' );
		}
		
		// service description
		public static function customize_partial_formula_service_area_des() {
			return get_theme_mod( 'formula_service_area_des' );
		}
		
		// Service Area
		public static function formula_service_content_render_callback() {
			return get_theme_mod( 'formula_service_content' );
		}
		
		// funfact title
		public static function customize_partial_formula_funfact_area_title() {
			return get_theme_mod( 'formula_funfact_area_title' );
		}
		
		// funfact description
		public static function customize_partial_formula_funfact_area_des() {
			return get_theme_mod( 'formula_funfact_area_des' );
		}
		
		// funfact area
		public static function customize_partial_formula_funfact_content() {
			return get_theme_mod( 'formula_funfact_content' );
		}
		
		// project title
		public static function customize_partial_formula_project_area_title() {
			return get_theme_mod( 'formula_project_area_title' );
		}
		
		// project description
		public static function customize_partial_formula_project_area_des() {
			return get_theme_mod( 'formula_project_area_des' );
		}
		
		// project area
		public static function customize_partial_formula_theme_portfolio_category() {
			return get_theme_mod( 'formula_theme_portfolio_category' );
		}
		
	    // testimonial title
		public static function customize_partial_formula_testimonial_area_title() {
			return get_theme_mod( 'formula_testimonial_area_title' );
		}
		
		// testimonial description
		public static function customize_partial_formula_testimonial_area_des() {
			return get_theme_mod( 'formula_testimonial_area_des' );
		}
		
		// testimonial area
		public static function customize_partial_formula_testimonial_content() {
			return get_theme_mod( 'formula_testimonial_content' );
		}
		
		// call to action title
		public static function customize_partial_formula_cta_area_title() {
			return get_theme_mod( 'formula_cta_area_title' );
		}
		
		// call to action subtitle
		public static function customize_partial_formula_cta_area_subtitle() {
			return get_theme_mod( 'formula_cta_area_subtitle' );
		}
		
		// call to action description
		public static function customize_partial_formula_cta_area_des() {
			return get_theme_mod( 'formula_cta_area_des' );
		}
		
	    // call to action button text
		public static function customize_partial_formula_cta_button_text() {
			return get_theme_mod( 'formula_cta_button_text' );
		}
		
	    // blog title
		public static function customize_partial_formula_blog_area_title() {
			return get_theme_mod( 'formula_blog_area_title' );
		}
		
		// blog description
		public static function customize_partial_formula_blog_area_des() {
			return get_theme_mod( 'formula_blog_area_des' );
		} 
		
		// blog Button
		public static function customize_partial_formula_blog_area_button() {
			return get_theme_mod( 'formula_blog_area_button' );
		}
		
		// blog area
		public static function customize_partial_formula_theme_blog_category() {
			return get_theme_mod( 'formula_theme_blog_category' );
		}
		
		// team title
		public static function customize_partial_formula_team_area_title() {
			return get_theme_mod( 'formula_team_area_title' );
		}
		
		// team description
		public static function customize_partial_formula_team_area_des() {
			return get_theme_mod( 'formula_team_area_des' );
		}
		
		// team area
		public static function customize_partial_formula_team_content() {
			return get_theme_mod( 'formula_team_content' );
		}
		
		// Client area
		public static function customize_partial_formula_client_content() {
			return get_theme_mod( 'formula_client_content' );
		}
		
		// Client title
		public static function customize_partial_formula_client_area_title() {
			return get_theme_mod( 'formula_client_area_title' );
		}
		// Client Desc
		public static function customize_partial_formula_client_area_desc() {
			return get_theme_mod( 'formula_client_area_desc' );
		}

		// Woocommerce title
		public static function customize_partial_formula_woocommerce_area_title() {
			return get_theme_mod( 'formula_woocommerce_area_title' );
		}
		// Woocommerce Desc
		public static function customize_partial_formula_woocommerce_area_desc() {
			return get_theme_mod( 'formula_woocommerce_area_desc' );
		}
		// Woocommerce Area
		public static function customize_partial_formula_woocommerce_content() {
			return get_theme_mod( 'formula_woocommerce_content' );
		}

		// footer copyright text
		public static function formula_footer_copyright_text_render_callback() {
			return get_theme_mod( 'formula_footer_copyright_text' );
		}

		// topbar text
		public static function formula_topbar_text_render_callback() {
			return get_theme_mod( 'formula_topbar_text' );
		}
		// topbar phone number
		public static function formula_topbar_num_render_callback() {
			return get_theme_mod( 'formula_topbar_num' );
		}
		// topbar phone number
		public static function formula_topbar_button_render_callback() {
			return get_theme_mod( 'formula_topbar_button' );
		}

		// ecxerpt length
		public static function formula_excerpt_length_render_callback() {
			return get_theme_mod( 'formula_excerpt_length' );
		}

		// Blog Meta
		public static function formula_blog_content_ordering_render_callback() {
			return get_theme_mod( 'formula_blog_content_ordering' );
		}


		/**
		* Theme Template
		*/
		public static function formula_template_contact_form_title_render_callback() {
			return get_theme_mod( 'contact_form_title' );
		}
		public static function formula_template_contact_form_subtitle_render_callback() {
			return get_theme_mod( 'contact_form_description' );
		}
		
		public static function formula_template_contact_google_map_title_render_callback() {
			return get_theme_mod( 'contact_google_map_title' );
		}

	}
}

formula_Customizer_Partials::get_instance();
