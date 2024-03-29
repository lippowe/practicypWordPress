<?php
if ( ! defined( 'ABSPATH' ) ) exit; // Exit if accessed directly

/**
 * Frontpage Blog.
 *
 * @package formula
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'formula_Customize_Theme_Styling_Option' ) ) :

	class formula_Customize_Theme_Styling_Option extends formula_Customize_Base_Option {

		/**
		 * Arguments for options.
		 *
		 * @return array
		 */
		public function elements() {

			return array(
				// 1. Theme Color Heading
				'formula_theme_color_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'		=> 'heading',
						'priority'	=> 1,
						'label'		=> esc_html__( 'Theme Styling', 'formula' ),
						'section'	=> 'formula_theme_color_settings',
					),
				),

				//Dark Theme Color Enable/Disable
				'formula_dark_theme_mode'     => array(
					'setting' => array(
						'default'           => false,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 1,
						'label'    => esc_html__( 'Dark Theme Mode', 'formula' ),
						'section'  => 'formula_theme_color_settings',
					),
				),

				//Custom Color Enable/Disable
				'formula_custom_color'     => array(
					'setting' => array(
						'default'           => false,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 7,
						'label'    => esc_html__( 'Custom Color Scheme Enable', 'formula' ),
						'section'  => 'formula_theme_color_settings',
					),
				),

				//Custom Color Picker
				'link_color' => array(
					'setting' => array(
						'default'           => '#7b40c0',
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'priority'        => 8,
						'description'     => esc_html__( 'Note: Enable Custom Color Scheme', 'formula' ),
						'section'         => 'formula_theme_color_settings',
						'choices'         => array(
							'alpha' => true,
						),
					),
				),

				// 2. Theme Size Layout Heading
				'formula_theme_size_layout_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'		=> 'heading',
						'priority'	=> 11,
						'label'		=> esc_html__( 'Theme Layout', 'formula' ),
						'section'	=> 'formula_theme_size_settings',
					),
				), 

				// Theme Size Layout
				'formula_layout_style'		=> array(
					'setting'		=> array(
						'default'	=> 'wide',
						'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'		=> 'radio_image',
						'priority'	=> 12,
						//'label'		=> esc_html__( 'Theme Layout', 'formula' ),
						'section'	=> 'formula_theme_size_settings',
						'choices'	=> array(
							'wide'	 => FORMULA_THEME_URL . '/assets/images/bg-patterns/wide.png',
							'boxed'	 => FORMULA_THEME_URL . '/assets/images/bg-patterns/boxed.png', 
						),
					),
				),
			);
		}
	}

	new formula_Customize_Theme_Styling_Option();

endif;
