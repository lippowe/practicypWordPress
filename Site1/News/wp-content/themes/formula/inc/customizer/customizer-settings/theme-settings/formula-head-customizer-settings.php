<?php
/**
 * Formula Header.
 *
 * @package formula
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
* Formula Header.
*/

if ( ! class_exists( 'formula_Customize_Page_Header_Option' ) ) :

	class formula_Customize_Page_Header_Option extends formula_Customize_Base_Option {


		public function elements() {

			return array(

				'formula_page_header_heading'          => array(
					'setting' => array(),
					'control' => array(
						'type'     => 'heading',
						'priority' => 1,
						'label'    => esc_html__( 'Page Header', 'formula' ),
						'section'  => 'header_image',
					),
				),

				'formula_page_header_disabled'         => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 5,
						'label'    => esc_html__( 'Page Header Enable/Disable', 'formula' ),
						// 'description'    => esc_html__( 'Note: If you Disable Page Header then also disable Menu Overlap Setting. GO To Theme Options > Menu Settings and disable Menu Overlap.', 'formula' ),
						'section'  => 'header_image',
					),
				),

				'formula_page_header_background_color' => array(
					'setting' => array(
						'default'           => 'rgba(0,0,0,0.69)',
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_alpha_color' ),
					),
					'control' => array(
						'type'            => 'color',
						'priority'        => 7,
						'label'           => esc_html__( 'Page Header/Breadcrumb Color', 'formula' ),
						'section'         => 'header_image',
						'choices'         => array(
							'alpha' => true,
						),
						'active_callback' => 'formula_page_header_background_color',
					),
				),

				'formula_custom_logo_size'             => array(
					'setting' => array(
						'default'           => array(
							'slider' => 210,
							'suffix' => 'px',
						),
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_slider' ),
					),
					'control' => array(
						'type'        => 'slider',
						'priority'    => 55,
						'label'       => esc_html__( 'Logo Width', 'formula' ),
						'section'     => 'title_tagline',
						'input_attrs' => array(
							'min'  => 0,
							'max'  => 600,
							'step' => 3,
						),
					),
				),

			);

		}

	}

	new formula_Customize_Page_Header_Option();

endif;

function formula_page_header_background_color( $control ) {
	return true === ( $control->manager->get_setting( 'formula_page_header_disabled' )->value() == true );
}
