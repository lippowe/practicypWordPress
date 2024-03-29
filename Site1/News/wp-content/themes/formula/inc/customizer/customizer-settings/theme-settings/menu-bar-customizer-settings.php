<?php
/**
 * MenuBar.
 *
 * @package formula
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'formula_Customize_Menu_Bar_Option' ) ) :

	/**
	 * Menu option.
	 */
	class formula_Customize_Menu_Bar_Option extends formula_Customize_Base_Option {

		public function elements() {

			return array(
			
			    'formula_main_menu_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'    => 'heading',
				   		'priority'        => 1,
						'label'   => esc_html__( 'Menu Settings', 'formula' ),
						'section' => 'formula_theme_menu_bar',
					),
				),
				
				/* 'formula_menu_overlap'            => array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 3,
						'label'    => esc_html__( 'Menu Overlap', 'formula' ),
						'description'    => esc_html__( 'Note: This Setting Will Work With Page Header. Enable Page Header for Overlaping Menu. Go To Theme Options > Page Header then Enable Page Header Setting.', 'formula' ),
						'section'  => 'formula_theme_menu_bar',
					),
				), */

				'formula_menu_style'     => array('setting' => array(
					'default'           => 'sticky',
					'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'            => 'radio',
						'priority'        => 5,
						'is_default_type' => true,
						'label'           => esc_html__( 'Menu Style', 'formula' ),
						'section'         => 'formula_theme_menu_bar',
						'choices'         => array(
							'sticky'  => esc_html__( 'Sticky', 'formula' ),
							'static' => esc_html__( 'Static', 'formula' ),
						),
					),
				),	
					
					
				'formula_menu_container_size'     => array(
					'setting' => array(
						'default'           => 'container',
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'            => 'radio',
						'priority'        => 7,
						'is_default_type' => true,
						'label'           => esc_html__( 'Menu Width', 'formula' ),
						'section'         => 'formula_theme_menu_bar',
						'choices'         => array(
							'container'  => esc_html__( 'Container', 'formula' ),
							'container-full' => esc_html__( 'Container Full', 'formula' ),
						),
					),
			    ),
			);

		}

	}

	new formula_Customize_Menu_Bar_Option();

endif;