<?php
/**
 * Footer Copyright.
 *
 * @package     formula
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'formula_Customize_Footer_Copyright_Option' ) ) :

	/**
	 * Footer Copyright.
	 */
	class formula_Customize_Footer_Copyright_Option extends formula_Customize_Base_Option {

		public function elements() {

			return array(

				'formula_footer_copright_enabled'                  => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 5,
						'label'    => esc_html__( 'Footer Copyright Enable/Disable', 'formula' ),
						'section'  => 'formula_footer_copyright',
					),
				),		
				
				
			);

		}

	}

	new formula_Customize_Footer_Copyright_Option();

endif;