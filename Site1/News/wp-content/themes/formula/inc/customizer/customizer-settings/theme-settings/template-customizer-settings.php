<?php
/**
 * Template.
 * @package     formula
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/*========================================== Template ==========================================*/
if ( ! class_exists( 'Formula_Customize_Theme_Template_Option' ) ) :


	class Formula_Customize_Theme_Template_Option extends formula_Customize_Base_Option {

		public function elements() {

			return array(
				/**
				* Theme contact form
				*/

					//Contact Form Heading.
					'formula_template_contact_form_heading'     => array(
						'setting' => array(),
						'control' => array(
							'type'   	=> 'heading',
							'priority'	=> 1,
							'label'  	=> esc_html__( 'Contact Form Settings', 'formula' ),
							'section'	=> 'formula_theme_contact_page',
						),
					),

					//Contact Form Enable Disable.
					'formula_template_contact_form_disable'         => array(
						'setting'	=> array(
							'default'			=> true,
							'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control'	=> array(
							'type'		=> 'toggle',
							'priority'	=> 5,
							'label'		=> esc_html__( 'Enable Contact Form', 'formula' ),
							'section'	=> 'formula_theme_contact_page',
						),
					),

					//Social Icon Enable Disable.
					'formula_template_contact_icon_disable'         => array(
						'setting'	=> array(
							'default'			=> true,
							'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control'	=> array(
							'type'		=> 'toggle',
							'priority'	=> 6,
							'label'		=> esc_html__( 'Enable Social Icon', 'formula' ),
							'section'	=> 'formula_theme_contact_page',
							'active_callback' => 'contact_form_callback', // Callback location contact-us-template.php
						),
					),


					// Google Map.
					'formula_template_contact_form_map_heading'     => array(
						'setting' => array(),
						'control' => array(
							'type'   	=> 'heading',
							'priority'	=> 15,
							'label'  	=> esc_html__( 'Contact Form Map', 'formula' ),
							'section'	=> 'formula_theme_contact_page',
						),
					),

					// Google Map Enable.
					'formula_template_contact_form_map_disable'         => array(
						'setting'	=> array(
							'default'			=> true,
							'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control'	=> array(
							'type'		=> 'toggle',
							'priority'	=> 20,
							'label'		=> esc_html__( 'Enable Google Map', 'formula' ),
							'section'	=> 'formula_theme_contact_page',
						),
					),
					
					// Contact Form Info.
					'formula_template_contact_form_info_heading'     => array(
						'setting' => array(),
						'control' => array(
							'type'   	=> 'heading',
							'priority'	=> 25,
							'label'  	=> esc_html__( 'Contact Form Info', 'formula' ),
							'section'	=> 'formula_theme_contact_page',
						),
					),
					
					// Contact Form Info Enable.
					'formula_template_contact_form_info_disable'         => array(
						'setting'	=> array(
							'default'			=> true,
							'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control'	=> array(
							'type'		=> 'toggle',
							'priority'	=> 26,
							'label'		=> esc_html__( 'Enable Form Info', 'formula' ),
							'section'	=> 'formula_theme_contact_page',
						),
					),


					// Extra Sections.
					'formula_template_contact_form_extra_heading'     => array(
						'setting' => array(),
						'control' => array(
							'type'   	=> 'heading',
							'priority'	=> 30,
							'label'  	=> esc_html__( 'Extra Sections', 'formula' ),
							'section'	=> 'formula_theme_contact_page',
						),
					),
					
					// Callout Enable Disable.
					'formula_template_contact_callout_disable'         => array(
						'setting'	=> array(
							'default'			=> true,
							'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control'	=> array(
							'type'		=> 'toggle',
							'priority'	=> 35,
							'label'		=> esc_html__( 'Enable Contact Callout', 'formula' ),
							'section'	=> 'formula_theme_contact_page',
						),
					),
					
					// Client Enable Disable.
					'formula_template_contact_client_disable'         => array(
						'setting'	=> array(
							'default'			=> true,
							'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control'	=> array(
							'type'		=> 'toggle',
							'priority'	=> 40,
							'label'		=> esc_html__( 'Enable Contact Client', 'formula' ),
							'section'	=> 'formula_theme_contact_page',
						),
					),

				/**
				* Theme About Us
				*/
					//About US Heading.
					'formula_template_about_us_heading'     => array(
						'setting' => array(),
						'control' => array(
							'type'   	=> 'heading',
							'priority'	=> 1,
							'label'  	=> esc_html__( 'About Us Settings', 'formula' ),
							'section'	=> 'about_section_settings',
						),
					),
					
					// Funfact Enable Disable.
					'formula_template_about_us_funfact_disable'         => array(
						'setting'	=> array(
							'default'			=> true,
							'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control'	=> array(
							'type'		=> 'toggle',
							'priority'	=> 10,
							'label'		=> esc_html__( 'Enable Funfact Section', 'formula' ),
							'section'	=> 'about_section_settings',
						),
					),
					
					// Testimonial Disable.
					'formula_template_about_us_testimonial_disable'         => array(
						'setting'	=> array(
							'default'			=> true,
							'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control'	=> array(
							'type'		=> 'toggle',
							'priority'	=> 15,
							'label'		=> esc_html__( 'Enable Testimonial Section', 'formula' ),
							'section'	=> 'about_section_settings',
						),
					),
					
					// Testimonial Disable.
					'formula_template_about_us_sponsors_disable'         => array(
						'setting'	=> array(
							'default'			=> true,
							'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control'	=> array(
							'type'		=> 'toggle',
							'priority'	=> 25,
							'label'		=> esc_html__( 'Enable Sponsors Section', 'formula' ),
							'section'	=> 'about_section_settings',
						),
					),
					
					// Funfact Disable.
					'formula_template_about_us_team_disable'         => array(
						'setting'	=> array(
							'default'			=> true,
							'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control'	=> array(
							'type'		=> 'toggle',
							'priority'	=> 35,
							'label'		=> esc_html__( 'Enable Team Section', 'formula' ),
							'section'	=> 'about_section_settings',
						),
					),
					
				/**
				* Theme Service Template
				*/
					//Service Heading.
					'formula_template_service_heading'     => array(
						'setting' => array(),
						'control' => array(
							'type'   	=> 'heading',
							'priority'	=> 1,
							'label'  	=> esc_html__( 'Service Settings', 'formula' ),
							'section'	=> 'service_template_settings',
						),
					),
					
					// Service Funfact Enable Disable.
					'formula_template_service_callout_disable'         => array(
						'setting'	=> array(
							'default'			=> true,
							'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control'	=> array(
							'type'		=> 'toggle',
							'priority'	=> 10,
							'label'		=> esc_html__( 'Enable Callout Section', 'formula' ),
							'section'	=> 'service_template_settings',
						),
					),
					
					// Service Sponsors Disable.
					'formula_template_service_sponsors_disable'         => array(
						'setting'	=> array(
							'default'			=> true,
							'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
						),
						'control'	=> array(
							'type'		=> 'toggle',
							'priority'	=> 25,
							'label'		=> esc_html__( 'Enable Sponsors Section', 'formula' ),
							'section'	=> 'service_template_settings',
						),
					),

            );
		}
	}

	new Formula_Customize_Theme_Template_Option();

endif;