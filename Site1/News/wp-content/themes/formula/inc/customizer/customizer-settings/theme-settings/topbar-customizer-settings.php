<?php
/**
 * topbar settings.
 *
 * @package     formula
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'formula_Customize_Topbar_Option' ) ) :

	/**
	 * topbar settings.
	 */
	
	class formula_Customize_Topbar_Option extends formula_Customize_Base_Option {

		public function elements() {

			return array(

				'formula_topbar_enabled'		=> array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 1,
						'label'    => esc_html__( 'Top Bar Enable/Disable', 'formula' ),
						'section'  => 'formula_topbar_settings',
					),
				),
				// Button
				'formula_topbar_button_disable'	=> array(
					'setting' => array(
						'default'           => true,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 14,
						'label'    => esc_html__('Enable Topbar Button', 'formula'),
						'section'  => 'formula_topbar_settings',
						'active_callback'	=> 'formula_topbar_button_disable',
					),
				),

				// Facebook Icon
				'formula_fb_link_disable'	=> array(
					'setting' => array(
						'default'           => false,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 20,
						'label'    => esc_html__('Enable Facebook Icon?', 'formula'),
						'section'  => 'formula_topbar_settings',
						'active_callback'	=> 'formula_fb_link_disable',
					),
				),
				
				// Twitter Icon
				'formula_tweet_link_disable'	=> array(
					'setting' => array(
						'default'           => false,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 30,
						'label'    => esc_html__('Enable Twitter Icon?', 'formula'),
						'section'  => 'formula_topbar_settings',
						'active_callback'	=> 'formula_tweet_link_disable',
					),
				),		
				
				//Youtube Icon
				'formula_youtube_link_disable'	=> array(
					'setting' => array(
						'default'           => false,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 36,
						'label'    => esc_html__('Enable Youtube Icon?', 'formula'),
						'section'  => 'formula_topbar_settings',
						'active_callback'	=> 'formula_youtube_link_disable',
					),
				),	
				
				// linkedin Icon
				'formula_linkedin_link_disable'	=> array(
					'setting' => array(
						'default'           => false,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 35,
						'label'    => esc_html__('Enable Linkedin Icon?', 'formula'),
						'section'  => 'formula_topbar_settings',
						'active_callback'	=> 'formula_linkedin_link_disable',
					),
				),		
				
				//Instagram Icon
				'formula_instagram_link_disable'	=> array(
					'setting' => array(
						'default'           => false,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 40,
						'label'    => esc_html__('Enable Instagram Icon?', 'formula'),
						'section'  => 'formula_topbar_settings',
						'active_callback'	=> 'formula_instagram_link_disable',
					),
				),		
				
				//Tumbler Icon
				'formula_tumblr_link_disable'	=> array(
					'setting' => array(
						'default'           => false,
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_checkbox' ),
					),
					'control' => array(
						'type'     => 'toggle',
						'priority' => 45,
						'label'    => esc_html__('Enable Tumblr Icon?', 'formula'),
						'section'  => 'formula_topbar_settings',
						'active_callback'	=> 'formula_tumblr_link_disable',
					),
				),
			);

		}

	}

	new formula_Customize_Topbar_Option();

endif;