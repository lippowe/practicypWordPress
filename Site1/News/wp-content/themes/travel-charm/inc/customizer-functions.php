<?php 
/**
 * Travel Agency Customizer Functions
*/

function travel_charm_customizer_options( $wp_customize ){
    //Modify default parent theme controls
    if( defined( 'TRAVEL_AGENCY_COMPANION_PATH' )  ){
        $wp_customize->get_section( 'deal_section' )->priority     = 35;
        $wp_customize->get_section( 'featured_section' )->priority = 45;
    }

    /** Work Hour */
    $wp_customize->add_setting(
        'time',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'time',
        array(
            'label'       => __( 'Work Hour', 'travel-charm' ),
            'description' => __( 'Add working hour in header.', 'travel-charm' ),
            'section'     => 'header_misc_setting',
            'type'        => 'text',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'time', array(
        'selector'        => '.site-header .opening-time .time',
        'render_callback' => 'travel_charm_get_time',
    ) );

    /** Email */
    $wp_customize->add_setting(
        'email',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_email',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'email',
        array(
            'label'       => __( 'Email', 'travel-charm' ),
            'description' => __( 'Add email in header.', 'travel-charm' ),
            'section'     => 'header_misc_setting',
            'type'        => 'text',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'email', array(
        'selector'        => '.site-header .email-link .email',
        'render_callback' => 'travel_charm_get_email',
    ) );

    /** Phone Number  */
    $wp_customize->add_setting(
        'phone',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'phone',
        array(
            'label'       => __( 'Phone Number', 'travel-charm' ),
            'description' => __( 'Add phone number in header.', 'travel-charm' ),
            'section'     => 'header_misc_setting',
            'type'        => 'text',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'phone', array(
        'selector'        => '.site-header .header-b .phone',
        'render_callback' => 'travel_charm_get_header_phone',
    ) );
    
    /** Phone Label  */
    $wp_customize->add_setting(
        'phone_label',
        array(
            'default'           => '',
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'phone_label',
        array(
            'label'       => __( 'Phone Label', 'travel-charm' ),
            'description' => __( 'Add phone label in header.', 'travel-charm' ),
            'section'     => 'header_misc_setting',
            'type'        => 'text',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'phone_label', array(
        'selector' => '.site-header .header-b .phone-label',
        'render_callback' => 'travel_charm_get_phone_label',
    ) );
    

    /** Enable/Disable Search Form */
    $wp_customize->add_setting(
        'ed_search',
        array(
            'default'           => false,
            'sanitize_callback' => 'travel_agency_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'ed_search',
        array(
            'section'     => 'header_misc_setting',
            'label'       => __( 'Search Form', 'travel-charm' ),
            'description' => __( 'Enable to show search form in header.', 'travel-charm' ),
            'type'        => 'checkbox'
        )       
    );


    /** Enable/Disable Social Links */
    $wp_customize->add_setting(
        'ed_social_links',
        array(
            'default'           => false,
            'sanitize_callback' => 'travel_agency_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'ed_social_links',
        array(
            'section'     => 'social_setting',
            'label'       => __( 'Social Links', 'travel-charm' ),
            'description' => __( 'Enable to show social links in header.', 'travel-charm' ),
            'type'        => 'checkbox',
            'priority'    => 5
        )       
    );

}
add_action( 'customize_register', 'travel_charm_customizer_options',50 );
