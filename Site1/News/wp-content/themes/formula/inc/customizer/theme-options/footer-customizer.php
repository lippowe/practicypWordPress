<?php
	require 'customizer-callback/footer-typo.php';
	// Footer copyright.
	$wp_customize->add_setting(
		'formula_footer_copyright_text',
		array(
			'sanitize_callback' => 'formula_sanitize_text',
			'default'           => __( 'Copyright &copy; 2023 | Powered by <a href="//wordpress.org/">WordPress</a> <span class="sep"> | </span> formula theme by A WP Life', 'formula' ),
			'transport'         => $selective_refresh,
		)
	);

	$wp_customize->add_control(
		'formula_footer_copyright_text',
		array(
			'label'           => esc_html__( 'Footer Copyright', 'formula' ),
			'section'         => 'formula_footer_copyright',
			'priority'        => 10,
			'type'            => 'textarea',
			'active_callback' => 'formula_footer_copyright_text',
		)
	);
