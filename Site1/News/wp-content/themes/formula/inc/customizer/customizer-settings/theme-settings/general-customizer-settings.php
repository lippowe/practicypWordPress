<?php
/**
 * General Settings.
 *
 * @package formula
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
* General Settings.
*/

if ( ! class_exists( 'formula_Customize_General_Option' ) ) :

	class formula_Customize_General_Option extends formula_Customize_Base_Option {

		public function elements() {

			return array(

				'formula_general_heading'       => array(
					'setting' => array(),
					'control' => array(
						'type'     => 'heading',
						'priority' => 1,
						'label'    => esc_html__( 'General Settings', 'formula' ),
						'section'  => 'formula_theme_general',
					),
				),

				// Animation.
				'formula_animation_disabled'    => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 2,
						'label'    => esc_html__( 'Site Animation Enable/Disable', 'formula' ),
						'section'  => 'formula_theme_general',
					),
				),

				// Loading Icon.
				'formula_loading_icon_disabled' => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 5,
						'label'    => esc_html__( 'Loading Icon Enable/Disable', 'formula' ),
						'section'  => 'formula_theme_general',
					),
				),

				// Go To Top Icon.
				'formula_goto_top_icon_enabled' => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 20,
						'label'    => esc_html__( 'Go To Top Icon Enable/Disable', 'formula' ),
						'section'  => 'formula_theme_general',
					),
				),

				// WOO Cart Icon.
				'formula_cart_icon_enabled'     => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 30,
						'label'    => esc_html__( 'WOO Cart Icon Enable/Disable', 'formula' ),
						'section'  => 'formula_theme_general',
					),
				),

			);

		}

	}

	new formula_Customize_General_Option();

endif;
