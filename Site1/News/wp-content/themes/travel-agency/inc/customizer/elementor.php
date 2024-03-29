<?php
/**
 * Elementor Settings
 *
 * @package Travel_Agency
 */

function travel_agency_customize_register_elementor_settings( $wp_customize ) {
    
    /** Elementor Settings */
    $wp_customize->add_section(
        'elementor_settings',
        array(
            'title'    => __( 'Elementor Settings', 'travel-agency' ),
            'priority' => 90,
        )
    );

    /* Disable Google Fonts */
    $wp_customize->add_setting(
        'ed_elementor',
        array(
            'default'           => false,
            'sanitize_callback' => 'travel_agency_sanitize_checkbox'
        )
    );
    
    $wp_customize->add_control(
        'ed_elementor',
        array(
            'section'         => 'elementor_settings',
            'type'            => 'checkbox',
            'label'           => __( 'Enable Elementor Page Builder in FrontPage', 'travel-agency' ),
            'description'     => __( 'You can override your Homepage Contents from this Elementor Page Builder.', 'travel-agency' ),
            'active_callback' => 'travel_agency_is_elementor_activated'
        )
	);
}
add_action( 'customize_register', 'travel_agency_customize_register_elementor_settings' );