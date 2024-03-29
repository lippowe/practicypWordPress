<?php
	// Header Image.
	$wp_customize->get_section( 'header_image' )->panel    = 'formula_theme_settings';
	$wp_customize->get_section( 'header_image' )->title    = __( 'Page Header', 'formula' );
	$wp_customize->get_section( 'header_image' )->priority = 40;

	// Sticky Bar Logo.
	$wp_customize->add_setting(
		'formula_sticky_bar_logo',
		array(
			'sanitize_callback' => 'esc_url_raw',
		)
	);
	$wp_customize->add_control(
		new WP_Customize_Image_Control(
			$wp_customize,
			'formula_sticky_bar_logo',
			array(
				'label'           => esc_html__( 'Set Sticky Menu Logo', 'formula' ),
				'description'     => esc_html__( 'You can Upload the Standrad size of logo (220x40px)', 'formula' ),
				'section'         => 'formula_theme_menu_bar',
				'settings'        => 'formula_sticky_bar_logo',
				'priority'        => 15,
				'active_callback' => 'formula_sticky_bar_logo',
			)
		)
	);
	function formula_sticky_bar_logo( $control ) {
		return true === ( $control->manager->get_setting( 'formula_menu_style' )->value() == 'sticky' );
	}
