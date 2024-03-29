<?php
	$wp_customize->add_setting(
		'formula_excerpt_length',
		array(
			'capability'        => 'edit_theme_options',
			'default'           => 30,
			'sanitize_callback' => 'absint',
		)
	);

	$wp_customize->add_control(
		'formula_excerpt_length',
		array(
			'type'        => 'number',
			'section'     => 'formula_excerpt_general', // Add a default or your own section.
			'label'       => esc_html__( 'Excerpt Length', 'formula' ),
			'description' => esc_html__( 'excerpt number of words', 'formula' ),
			'input_attrs' => array(
				'min'   => 10,
				'max'   => 300,
				'step'  => 5,
				'style' => 'width: 60px;',
			),
		)
	);

	$wp_customize->add_setting(
		'formula_excerpt_more_text',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'sanitize_text_field',
			'default'           => esc_html__( 'Continue reading', 'formula' ),
		)
	);

	$wp_customize->add_control(
		'formula_excerpt_more_text',
		array(
			'label'   => esc_html__( 'Button Text', 'formula' ),
			'section' => 'formula_excerpt_general',
			'type'    => 'text',
		)
	);


