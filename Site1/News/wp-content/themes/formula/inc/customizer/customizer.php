<?php
/**
 * Customize for taxonomy with dropdown, extend the WP customizer
 */

 // Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'formula_Customizer' ) ) :

	class formula_Customizer {

		// Constructor customizer
		public function __construct() {

			add_action( 'customize_register', array( $this, 'formula_customizer_panel_control' ) );
			add_action( 'customize_register', array( $this, 'formula_customizer_register' ) );
			add_action( 'customize_register', array( $this, 'formula_customizer_selective_refresh' ) );
			add_action( 'customize_preview_init', array( $this, 'formula_customizer_preview_js' ) );
			add_action( 'after_setup_theme', array( $this, 'formula_customizer_settings' ) );
		}

		// Register custom controls
		public function formula_customizer_panel_control( $wp_customize ) {

			// Load customizer options extending classes.
			require FORMULA_THEME_DIR . '/inc/customizer/custom-customizer/customizer-panel.php';
			require FORMULA_THEME_DIR . '/inc/customizer/custom-customizer/customizer-section.php';

			// Register extended classes.
			$wp_customize->register_panel_type( 'formula_Customize_Panel' );
			$wp_customize->register_section_type( 'formula_Customize_Section' );

			// Load base class for controls.
			require_once FORMULA_THEME_DIR . '/inc/customizer/controls/code/customize-base-control.php';
			// Load custom control classes.
			require_once FORMULA_THEME_DIR . '/inc/customizer/controls/code/customize-color-control.php';
			//portfolio (For Taxonomy Dropdown control)
			require_once FORMULA_THEME_DIR . '/inc/customizer/controls/code/customize-dropdown-control.php';
			//menu (theme options)
			require_once FORMULA_THEME_DIR . '/inc/customizer/controls/code/customize-heading-control.php';
			//Blog (theme options)
			require_once FORMULA_THEME_DIR . '/inc/customizer/controls/code/customize-radio-image-control.php';
			require_once FORMULA_THEME_DIR . '/inc/customizer/controls/code/customize-radio-buttonset-control.php';
			require_once FORMULA_THEME_DIR . '/inc/customizer/controls/code/customize-sortable-control.php';

			//typography (theme settings)
			require_once FORMULA_THEME_DIR . '/inc/customizer/controls/code/customize-toggle-control.php';
			require_once FORMULA_THEME_DIR . '/inc/customizer/controls/code/customize-upgrade-control.php';

			require_once FORMULA_THEME_DIR . '/inc/customizer/controls/code/customize-slider-control.php';

			//menu theme options
			$wp_customize->register_control_type( 'formula_Customize_Heading_Control' ); 

			$wp_customize->register_control_type( 'formula_Customize_Radio_Image_Control' );
			$wp_customize->register_control_type( 'formula_Customize_Radio_Buttonset_Control' );
			$wp_customize->register_control_type( 'formula_Customize_Sortable_Control' );
			$wp_customize->register_control_type( 'formula_Customize_Slider_Control' );

			//typography settings
			$wp_customize->register_control_type( 'formula_Customize_Toggle_Control' ); 
			$wp_customize->register_control_type( 'formula_Customize_Upgrade_Control' );

		}

		// Customizer selective refresh.
		public function formula_customizer_selective_refresh() {

			require_once FORMULA_THEME_DIR . '/inc/customizer/customizer-sanitize.php';
			require_once FORMULA_THEME_DIR . '/inc/customizer/customizer-partials.php';

		}

		// Add postMessage support for site title and description for the Theme Customizer.
		public function formula_customizer_register( $wp_customize ) {

			// Customizer selective
			require FORMULA_THEME_DIR . '/inc/customizer/customizer-selective.php';

			// Register panels and sections.
			require FORMULA_THEME_DIR . '/inc/customizer/panels-and-sections.php';
		}

		// Site Title and Description instant change JS
		public function formula_customizer_preview_js() {
			wp_enqueue_script( 'formula_customizer_header', get_template_directory_uri() . '/inc/customizer/assets/js/site-title-customizer.js', array( 'customize-preview' ), '20151215', true );
		}

		public function formula_customizer_settings() {

			// Base class.
			require FORMULA_THEME_DIR . '/inc/customizer/customizer-settings/customize-base-customizer-settings.php';

			// General Settings
			require FORMULA_THEME_DIR . '/inc/customizer/customizer-settings/theme-settings/general-customizer-settings.php';

			// Top Bar. (Theme Options Settings)
			require FORMULA_THEME_DIR . '/inc/customizer/customizer-settings/theme-settings/topbar-customizer-settings.php';

			// Menu (Theme Options Settings)
			require FORMULA_THEME_DIR . '/inc/customizer/customizer-settings/theme-settings/menu-bar-customizer-settings.php';

			// Page Header (Theme Options Settings)
			require FORMULA_THEME_DIR . '/inc/customizer/customizer-settings/theme-settings/formula-head-customizer-settings.php';

			// Blog (Theme Options Settings)
			require FORMULA_THEME_DIR . '/inc/customizer/customizer-settings/theme-settings/blog-general-customizer-settings.php';

			// Footer (Theme Options Settings)
			require FORMULA_THEME_DIR . '/inc/customizer/customizer-settings/theme-settings/footer-copyright-customizer-settings.php';
			require FORMULA_THEME_DIR . '/inc/customizer/customizer-settings/theme-settings/footer-widget-customizer-settings.php';

			// Typography Settings
			require FORMULA_THEME_DIR . '/inc/customizer/customizer-settings/theme-settings/typography-customizer-settings.php';

			// Theme Styling Settings
			require FORMULA_THEME_DIR . '/inc/customizer/customizer-settings/theme-settings/theme-styling-customizer-settings.php';

			// Colors Settings
			require FORMULA_THEME_DIR . '/inc/customizer/customizer-settings/theme-settings/theme-colors-customizer-settings.php';

			// Template Settings
			require FORMULA_THEME_DIR . '/inc/customizer/customizer-settings/theme-settings/template-customizer-settings.php';
		}	
	}
endif;

new formula_Customizer();