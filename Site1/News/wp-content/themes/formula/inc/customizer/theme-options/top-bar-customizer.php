<?php
	require 'customizer-callback/top-bar-typo.php';

	// 1. Topbar Details Settings Start----
class formula_topbar_top_Customize_Control extends WP_Customize_Control {
	public $type = 'formula_topbar_heading_text';
	/**
	 * Render the control's content.
	 */
	public function render_content() {
		?>
			<h3 class="customize-control-formula-heading"><?php esc_html_e( 'Topbar Details', 'formula' ); ?></h3>
		<?php
	}
}
	// a. Site Title Heading-Text
	$wp_customize->add_setting(
		'formula_topbar_heading_text',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new formula_topbar_top_Customize_Control(
			$wp_customize,
			'formula_topbar_heading_text',
			array(
				'section'         => 'formula_topbar_settings',
				'setting'         => 'formula_topbar_heading_text',
				'priority'        => 5,
				'active_callback' => 'formula_topbar_heading_text',
			)
		)
	);

	// Add Phone Details
	$wp_customize->add_setting(
		'formula_topbar_num',
		array(
			'default'           => esc_html__( '(901)-2345-6789', 'formula' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'formula_sanitize_text',
			// 'transport'         => $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'formula_topbar_num',
		array(
			'type'            => 'num',
			'label'           => esc_html__( 'Add Phone Detail', 'formula' ),
			'section'         => 'formula_topbar_settings',
			'priority'        => 5,
			'active_callback' => 'formula_topbar_num',
		)
	);

	// Add Phone Text
	$wp_customize->add_setting(
		'formula_topbar_text',
		array(
			'default'           => esc_html__( 'Request a Callback', 'formula' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'formula_sanitize_text',
			// 'transport'         =>    $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'formula_topbar_text',
		array(
			'type'            => 'text',
			'label'           => esc_html__( 'Add Text', 'formula' ),
			'section'         => 'formula_topbar_settings',
			'priority'        => 10,
			'active_callback' => 'formula_topbar_text',
		)
	);

	// Add Button Text
	$wp_customize->add_setting(
		'formula_topbar_button',
		array(
			'default'           => esc_html__( 'Get Started', 'formula' ),
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'formula_sanitize_text',
			'transport'         => $selective_refresh,
		)
	);
	$wp_customize->add_control(
		'formula_topbar_button',
		array(
			'type'            => 'text',
			'label'           => esc_html__( 'Button Text', 'formula' ),
			'section'         => 'formula_topbar_settings',
			'priority'        => 15,
			'active_callback' => 'formula_topbar_button',
		)
	);

	// Add Button Link
	$wp_customize->add_setting(
		'formula_topbar_button_link',
		array(
			'default'           => '#',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'formula_topbar_button_link',
		array(
			'type'            => 'url',
			'label'           => esc_html__( 'Button URL', 'formula' ),
			'section'         => 'formula_topbar_settings',
			'priority'        => 16,
			'active_callback' => 'formula_topbar_button_link',
		)
	);

	/*
	  //Social Media
	$wp_customize->add_setting('formula_title', array(
			'type'              => 'info_control',
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'esc_attr',
		)
	);

	$wp_customize->add_control( $wp_customize, 'social_media', array(
		'label' 	=> esc_html__('Social Media Icons', 'formula'),
		'description'	=> esc_html__('Social Media icons will disappear if you leave Input Field blank.', 'formula'),
		'section' 	=> 'formula_topbar_settings',
		'settings' 	=> 'formula_title',
		'priority' 	=> 15,
		'active_callback'	=> 'formula_title',
	) );
	*/

	// 2. Social icons Settings Start----
	class formula_topbar_social_icon_Customize_Control extends WP_Customize_Control {
		public $type = 'formula_social_icon_heading_text';
		/**
		 * Render the control's content.
		 */
		public function render_content() {
			?>
			<h3 class="customize-control-formula-heading"><?php esc_html_e( 'Social Icons', 'formula' ); ?></h3>
			<?php
		}
	}
	// a. Site Title Heading-Text
	$wp_customize->add_setting(
		'formula_social_icon_heading_text',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);
	$wp_customize->add_control(
		new formula_topbar_social_icon_Customize_Control(
			$wp_customize,
			'formula_social_icon_heading_text',
			array(
				'section'         => 'formula_topbar_settings',
				'setting'         => 'formula_social_icon_heading_text',
				'priority'        => 20,
				'active_callback' => 'formula_social_icon_heading_text',
			)
		)
	);

	// Facebook link
	$wp_customize->add_setting(
		'formula_facebook_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'formula_facebook_url',
		array(
			'description'     => esc_html__( 'Enter your Facebook url.', 'formula' ),
			'section'         => 'formula_topbar_settings',
			'type'            => 'url',
			'priority'        => 25,
			'active_callback' => 'formula_facebook_url',
		)
	);
	// Twitter URL
	$wp_customize->add_setting(
		'formula_twitter_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'formula_twitter_url',
		array(
			'description'     => esc_html__( 'Enter your Twitter url.', 'formula' ),
			'section'         => 'formula_topbar_settings',
			'type'            => 'url',
			'priority'        => 35,
			'active_callback' => 'formula_twitter_url',
		)
	);

	// Youtube URL
	$wp_customize->add_setting(
		'formula_youtube_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'formula_youtube_url',
		array(
			'description'     => esc_html__( 'Enter your Youtube url.', 'formula' ),
			'section'         => 'formula_topbar_settings',
			'type'            => 'url',
			'priority'        => 38,
			'active_callback' => 'formula_youtube_url',
		)
	);

	// Linkedin URL
	$wp_customize->add_setting(
		'formula_linkedin_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'formula_linkedin_url',
		array(
			'description'     => esc_html__( 'Enter your Linkedin url.', 'formula' ),
			'section'         => 'formula_topbar_settings',
			'type'            => 'url',
			'priority'        => 36,
			'active_callback' => 'formula_linkedin_url',
		)
	);

	// Instagram URL
	$wp_customize->add_setting(
		'formula_instagram_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'formula_instagram_url',
		array(
			'description'     => esc_html__( 'Enter your Instagram url.', 'formula' ),
			'section'         => 'formula_topbar_settings',
			'type'            => 'url',
			'priority'        => 41,
			'active_callback' => 'formula_instagram_url',
		)
	);

	// Tumblr URL
	$wp_customize->add_setting(
		'formula_tumblr_url',
		array(
			'default'           => '',
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		'formula_tumblr_url',
		array(
			'description'     => esc_html__( 'Enter your Tumblr url.', 'formula' ),
			'section'         => 'formula_topbar_settings',
			'type'            => 'url',
			'priority'        => 46,
			'active_callback' => 'formula_tumblr_url',
		)
	);
