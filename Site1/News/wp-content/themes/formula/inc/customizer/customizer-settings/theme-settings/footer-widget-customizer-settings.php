<?php
/**
 * Footer widgets.
 *
 * @package     formula
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'formula_Customize_Footer_Widget_Option' ) ) :

	/**
	 * Option: Footer widget.
	 */
	class formula_Customize_Footer_Widget_Option extends formula_Customize_Base_Option {

		public function elements() {

			return array(

				'formula_footer_widgets_enabled'                  => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 10,
						'label'    => esc_html__( 'Footer Widget Area Enable/Disable', 'formula' ),
						'section'  => 'formula_footer_widgets',
					),
				),

				'formula_footer_container_size'     => array(
					'setting' => array(
						'default'           => 'container',
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'				=> 'radio',
						'priority'			=> 25,
						'is_default_type'	=> true,
						'label'				=> esc_html__( 'Footer Width', 'formula' ),
						'section'			=> 'formula_footer_widgets',
						'choices'			=> array(
							'container'			=> esc_html__( 'Container', 'formula' ),
							'container-full'	=> esc_html__( 'Container Full', 'formula' ),
						),
						'active_callback'	=> 'formula_footer_container_size',
					),
				),
			);
		}
	}

	new formula_Customize_Footer_Widget_Option();

endif;