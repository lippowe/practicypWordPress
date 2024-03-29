<?php
/**
 * Typography.
 * @package     formula
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== TYPOGRAPHY ==========================================*/
if ( ! class_exists( 'formula_Customize_Theme_Typography_Option' ) ) :

	/**
	 * Theme Typography option.
	 */
	class formula_Customize_Theme_Typography_Option extends formula_Customize_Base_Option {

		public function elements() {

			return array(
				
				//Hedaer Typo Heading
				'formula_typography_header_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'   	=> 'heading',
						'priority'	=> 1,
						'label'  	=> esc_html__( 'Enable Header/Menu Typography', 'formula' ),
						'section'	=> 'formula_header_typography',
					),
				),
				//Hedaer Typo Enable Disable
			    'formula_typography_header_disable'         => array(
					'setting'	=> array(
						'default'			=> false,
						'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control'	=> array(
						'type'		=> 'toggle',
						'priority'	=> 2,
						'label'		=> esc_html__( 'Enable Header Typography', 'formula' ),
						'section'	=> 'formula_header_typography',
					),
				),
				
				
				//Slider Typo Heading
				'formula_typography_slider_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'   	=> 'heading',
						'priority'	=> 1,
						'label'  	=> esc_html__( 'Enable Slider Typography', 'formula' ),
						'section'	=> 'formula_slider_typography',
					),
				),
				//Slider Typo Enable Disable
			    'formula_typography_slider_disable'         => array(
					'setting'	=> array(
						'default'			=> false,
						'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control'	=> array(
						'type'		=> 'toggle',
						'priority'	=> 2,
						'label'		=> esc_html__( 'Enable Slider Typography', 'formula' ),
						'section'	=> 'formula_slider_typography',
					),
				),
				
				
				//Slider Typo Heading
				'formula_typography_homepage_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'   	=> 'heading',
						'priority'	=> 1,
						'label'  	=> esc_html__( 'Enable Homepage Typography', 'formula' ),
						'section'	=> 'formula_homepage_typography',
					),
				),
				//Homepage Typo Enable Disable
			    'formula_typography_homepage_disable'         => array(
					'setting'	=> array(
						'default'			=> false,
						'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control'	=> array(
						'type'		=> 'toggle',
						'priority'	=> 2,
						'label'		=> esc_html__( 'Enable Homepage Typography', 'formula' ),
						'section'	=> 'formula_homepage_typography',
					),
				),
				
				
				//Slider Typo Heading
				'formula_typography_headings_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'   	=> 'heading',
						'priority'	=> 1,
						'label'  	=> esc_html__( 'Enable Headings Typography', 'formula' ),
						'section'	=> 'formula_headings_typography',
					),
				),
				//Heading Typo Enable Disable
			    'formula_typography_heading_disable'         => array(
					'setting'	=> array(
						'default'			=> false,
						'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control'	=> array(
						'type'		=> 'toggle',
						'priority'	=> 2,
						'label'		=> esc_html__( 'Enable Headings Typography', 'formula' ),
						'section'	=> 'formula_headings_typography',
					),
				),
				
				
				//Blog Archive Typo Heading
				'formula_typography_blog_archive_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'   	=> 'heading',
						'priority'	=> 1,
						'label'  	=> esc_html__( 'Enable Blog/Archive/Single Typography', 'formula' ),
						'section'	=> 'formula_blog_archive_typography',
					),
				),
				//Blog Typo Enable Disable
			    'formula_typography_blog_archive_disable'         => array(
					'setting'	=> array(
						'default'			=> false,
						'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control'	=> array(
						'type'		=> 'toggle',
						'priority'	=> 2,
						'label'		=> esc_html__( 'Enable Blog/Archive Typography', 'formula' ),
						'section'	=> 'formula_blog_archive_typography',
					),
				),
				
				
				//Sidebar Typo Heading
				'formula_typography_sidebar_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'   	=> 'heading',
						'priority'	=> 1,
						'label'  	=> esc_html__( 'Enable Sidebar Typography', 'formula' ),
						'section'	=> 'formula_sidebar_widget_typography',
					),
				),
				//Sidebar Typo Enable Disable
			    'formula_typography_sidebar_widget_disable'         => array(
					'setting'	=> array(
						'default'			=> false,
						'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control'	=> array(
						'type'		=> 'toggle',
						'priority'	=> 2,
						'label'		=> esc_html__( 'Enable Sidebar Typography', 'formula' ),
						'section'	=> 'formula_sidebar_widget_typography',
					),
				),
				
				
				//Footer Typo Heading
				'formula_typography_footer_heading'     => array(
					'setting' => array(),
					'control' => array(
						'type'   	=> 'heading',
						'priority'	=> 1,
						'label'  	=> esc_html__( 'Enable Footer Typography', 'formula' ),
						'section'	=> 'formula_footer_widget_typography',
					),
				),
				//Footer Typo Enable Disable
			    'formula_typography_sidebar_footer_disable'         => array(
					'setting'	=> array(
						'default'			=> false,
						'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control'	=> array(
						'type'		=> 'toggle',
						'priority'	=> 2,
						'label'		=> esc_html__( 'Enable Footer Typography', 'formula' ),
						'section'	=> 'formula_footer_widget_typography',
					),
				),
            );	
			
		}

	}

	new formula_Customize_Theme_Typography_Option();

endif;