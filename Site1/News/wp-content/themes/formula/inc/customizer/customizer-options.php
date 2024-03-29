<?php
/**
 * Extend default customizer section.
 *
 * @package Formula
 *
 * @see     WP_Customize_Section
 * @access  public
 */

require FORMULA_THEME_DIR . '/inc/customizer/webfont.php';
require FORMULA_THEME_DIR . '/inc/customizer/controls/code/customize-typography-control.php';
require FORMULA_THEME_DIR . '/inc/customizer/controls/code/customize-plugin-control.php';
require FORMULA_THEME_DIR . '/inc/customizer/controls/code/customize-category-control.php';
require FORMULA_THEME_DIR . '/inc/customizer/customizer-repeater/functions.php';
require FORMULA_THEME_DIR . '/inc/customizer/upgrade-to-pro.php';


function formula_customizer_theme_settings( $wp_customize ){

	$active_callback   = isset( $array['active_callback'] ) ? $array['active_callback'] : null;
	$selective_refresh = isset( $wp_customize->selective_refresh ) ? 'postMessage' : 'refresh';

	// Site Title.
	$wp_customize->get_setting( 'blogname' )->transport         = 'postMessage';
	$wp_customize->get_setting( 'blogdescription' )->transport  = 'postMessage';

	/* ALL Theme Optons Settings */
		// Top Bar Settings.
		require( FORMULA_THEME_DIR . '/inc/customizer/theme-options/top-bar-customizer.php');	
		// Menu Settings.
		require( FORMULA_THEME_DIR . '/inc/customizer/theme-options/menu-customizer.php');	
		// Footer Settings.
		require( FORMULA_THEME_DIR . '/inc/customizer/theme-options/footer-customizer.php');
		// Excerpt Options.
		require( FORMULA_THEME_DIR . '/inc/customizer/theme-options/excerpt-customizer.php');
	/* ALL Theme Optons Settings */

	/* Typography Settings */
	require( FORMULA_THEME_DIR . '/inc/customizer/theme-options/typography-customizer.php');
	/* Colors Settings */
	require( FORMULA_THEME_DIR . '/inc/customizer/theme-options/colors-customizer.php');
}
add_action( 'customize_register', 'formula_customizer_theme_settings' );

add_action( 'customize_register', 'formula_recommended_plugin_section' );

//recommended plugin section function.
function formula_recommended_plugin_section( $manager ) {
	// Register custom section types.
	$manager->register_section_type( 'formula_Customize_Recommended_Plugin_Section' );
	// Register sections.
	$manager->add_section(
		new formula_Customize_Recommended_Plugin_Section(
			$manager,
			'formula_upgrade_to_pro_option',
			array(
				'title'       => esc_html__( 'Ready for more?', 'formula' ),
				'priority'    => 500,
				'plugin_text' => esc_html__( 'Upgrade To Pro', 'formula' ),
				'plugin_url'  => 'https://awplife.com/wordpress-themes/formula-premium/',
			)
		)
	);
}


/*
 *  Customizer Notifications
 */

require get_template_directory() . '/inc/customizer/customizer-notice/formula-customizer-notify.php';

$formula_config_customizer = array(
	'recommended_plugins'                      => array(
		'awp-companion' => array(
			'recommended' => true,
			'description' => sprintf(
				/* translators: %s: plugin name */
				esc_html__( 'Recommended Plugin: If you want to show all the features and business sections of the FrontPage. please install and activate %s plugin', 'formula' ),
				'<strong>AWP Companion</strong>'
			),
		),
	),
	'recommended_actions'                      => array(),
	'recommended_actions_title'                => esc_html__( 'Recommended Actions', 'formula' ),
	'recommended_plugins_title'                => esc_html__( 'Import Theme Demo Data', 'formula' ),
	'install_button_label'                     => esc_html__( 'Install and Activate', 'formula' ),
	'activate_button_label'                    => esc_html__( 'Activate', 'formula' ),
	'formula_deactivate_button_label' => esc_html__( 'Deactivate', 'formula' ),
);
formula_Customizer_Notify::init( apply_filters( 'formula_customizer_notify_array', $formula_config_customizer ) );