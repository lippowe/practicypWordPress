<?php
/**
 * Theme Colors.
 *
 * @package Crypto AirDrop
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'formula_Customize_Theme_Colors_Option' ) ) :

	/**
	 * Menu option.
	 */
	class formula_Customize_Theme_Colors_Option extends formula_Customize_Base_Option {

		public function elements() {

			return array(
				// 1. Primary Menu Colors.
					//Menu Colors Enable Disable
					'formula_colors_menu_disable'         => array(
						'setting'	=> array(
							'default'			=> false,
							'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control'	=> array(
							'type'		=> 'toggle',
							'priority'	=> 1,
							'label'		=> esc_html__( 'Enable Menu Colors', 'formula' ),
							'section'	=> 'formula_primary_menu_colors',
						),
					),

					'formula_colors_menu_heading'     => array(
						'setting'	=> array(),
						'control'	=> array(
							'type'		=> 'heading',
							'priority'	=> 2,
							'label'		=> esc_html__( 'Menu Colors', 'formula' ),
							'section'	=> 'formula_primary_menu_colors',
						),
					),

					'formula_colors_submenu_heading'     => array(
						'setting'	=> array(),
						'control'	=> array(
							'type'		=> 'heading',
							'priority'	=> 35,
							'label'		=> esc_html__( 'SubMenu Colors', 'formula' ),
							'section'	=> 'formula_primary_menu_colors',
						),
					),

				// 2. Cotent Colors.
					//Cotent Colors Enable Disable
					'formula_colors_content_disable'         => array(
						'setting'	=> array(
							'default'			=> false,
							'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control'	=> array(
							'type'		=> 'toggle',
							'priority'	=> 1,
							'label'		=> esc_html__( 'Enable Content Colors', 'formula' ),
							'section'	=> 'formula_content_theme_colors',
						),
					),

					'formula_colors_content_heading'     => array(
						'setting'	=> array(),
						'control'	=> array(
							'type'		=> 'heading',
							'priority'	=> 2,
							'label'		=> esc_html__( 'Headings Colors', 'formula' ),
							'section'	=> 'formula_content_theme_colors',
						),
					),

					// a. Paragraph Colors.
					'formula_colors_content_p_heading'     => array(
						'setting'	=> array(),
						'control'	=> array(
							'type'		=> 'heading',
							'priority'	=> 65,
							'label'		=> esc_html__( 'Paragraph Colors', 'formula' ),
							'section'	=> 'formula_content_theme_colors',
						),
					),

				// 3. Sidebar Widgets Color.
					'formula_colors_sidebar_disable'            => array(
						'setting' => array(
							'default'           => false,
							'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control' => array(
							'type'     => 'toggle',
							'priority' => 1,
							'label'    => esc_html__( 'Enable Sidebar Color Settings', 'formula' ),
							'section'  => 'formula_sidebar_theme_colors',
						),
					),

					'formula_colors_sidebar_heading'     => array(
						'setting'	=> array(),
						'control'	=> array(
							'type'		=> 'heading',
							'priority'	=> 2,
							'label'		=> esc_html__( 'Sidebar Widgets Colors', 'formula' ),
							'section'	=> 'formula_sidebar_theme_colors',
						),
					),

				// 4. Footer Widgets Color.
					'formula_colors_footer_disable'            => array(
						'setting' => array(
							'default'           => false,
							'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control' => array(
							'type'     => 'toggle',
							'priority' => 1,
							'label'    => esc_html__( 'Enable Footer Color Settings', 'formula' ),
							'section'  => 'formula_footer_theme_colors',
						),
					),

					'formula_colors_footer_heading'     => array(
						'setting'	=> array(),
						'control'	=> array(
							'type'		=> 'heading',
							'priority'	=> 2,
							'label'		=> esc_html__( 'Footer Widgets Colors', 'formula' ),
							'section'	=> 'formula_footer_theme_colors',
						),
					),

			);
		}
	}
	new formula_Customize_Theme_Colors_Option();
endif;