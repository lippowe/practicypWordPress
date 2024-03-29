<?php
/**
 * Theme functions and definitions
 *
 * @package travel_charm
 */

// Exit if accessed directly
if ( !defined( 'ABSPATH' ) ) exit;

/**
 * After setup theme hook
 */
function travel_charm_theme_setup(){
    /*
     * Make chile theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'travel-charm', get_stylesheet_directory() . '/languages' );

}
add_action( 'after_setup_theme', 'travel_charm_theme_setup' );

/**
 * Load assets.
 */
function travel_charm_enqueue_styles() {
    $my_theme = wp_get_theme();
    $version = $my_theme['Version'];
    
    wp_enqueue_style( 'travel-agency-style', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'travel-charm-style', get_stylesheet_directory_uri() . '/style.css', array( 'travel-agency-style' ), $version );

    wp_enqueue_script( 'travel-charm-custom-js', get_stylesheet_directory_uri() . '/js/custom.js', array('jquery'), $version, true );
}
add_action( 'wp_enqueue_scripts', 'travel_charm_enqueue_styles' );

/**
 * Remove action from parent
*/
function travel_charm_remove_action(){
    remove_action( 'customize_register', 'travel_agency_customizer_theme_info' );
    remove_action( 'customize_register', 'travel_agency_customizer_demo_content' );    
}
add_action( 'init', 'travel_charm_remove_action' );

function travel_charm_customizer_theme_info( $wp_customize ){
    $wp_customize->add_section( 'theme_info', array(
        'title'       => __( 'Information Links' , 'travel-charm' ),
        'priority'    => 6,
    ) );
    
    /** Important Links */
    $wp_customize->add_setting( 'theme_info_theme',
        array(
            'default' => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );
    
    $theme_info = '<div class="customizer-custom">';
    $theme_info .= '<h3 class="sticky_title">' . __( 'Need help?', 'travel-charm' ) . '</h3>';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'View demo', 'travel-charm' ) . ': </label><a href="' . esc_url( 'https://rarathemes.com/previews/?theme=travel-charm/' ) . '" target="_blank">' . __( 'here', 'travel-charm' ) . '</a></span>';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'View documentation', 'travel-charm' ) . ': </label><a href="' . esc_url( 'https://docs.rarathemes.com/docs/travel-charm/' ) . '" target="_blank">' . __( 'here', 'travel-charm' ) . '</a></span>';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Support ticket', 'travel-charm' ) . ': </label><a href="' . esc_url( 'https://rarathemes.com/support-ticket/' ) . '" target="_blank">' . __( 'here', 'travel-charm' ) . '</a></span>';
    $theme_info .= '<span class="sticky_info_row"><label class="more-detail row-element">' . __( 'More Details', 'travel-charm' ) . ': </label><a href="' . esc_url( 'https://rarathemes.com/wordpress-themes/' ) . '" target="_blank">' . __( 'here', 'travel-charm' ) . '</a></span>';
    $theme_info .= '</div>';

    $wp_customize->add_control( new Travel_Agency_Info_Text( $wp_customize,
        'theme_info_theme', 
        array(
            'label' => __( 'About Travel Charm' , 'travel-charm' ),
            'section'     => 'theme_info',
            'description' => $theme_info
        )
        )
    );
    
    /** Demo Content Import */
    $wp_customize->add_section( 
        'theme_demo_content',
        array(
            'title'    => __( 'Demo Content Import', 'travel-charm' ),
            'priority' => 7,
        )
    );
    
    $wp_customize->add_setting(
        'demo_content_instruction',
        array(
            'sanitize_callback' => 'wp_kses_post'
        )
    );

    $demo_content_description = sprintf( __( 'Travel Charm comes with demo content import feature. You can import the demo content with just one click. For step-by-step video tutorial, %1$sClick here%2$s', 'travel-charm' ), '<a class="documentation" href="' . esc_url( 'https://rarathemes.com/blog/import-demo-content-rara-themes/' ) . '" target="_blank">', '</a>' );

    $wp_customize->add_control(
        new Travel_Agency_Info_Text( 
            $wp_customize,
            'demo_content_instruction',
            array(
                'label'       => __( 'About Demo Import' , 'travel-charm' ),
                'section'     => 'theme_demo_content',
                'description' => $demo_content_description,
            )
        )
    );
    
    $theme_demo_content_desc = '<div class="customizer-custom">';

    if( ! class_exists( 'RDDI_init' ) ){
        $theme_demo_content_desc .= '<span><label class="row-element">' . __( 'Plugin required', 'travel-charm' ) . ': </label><a href="' . esc_url( 'https://wordpress.org/plugins/rara-one-click-demo-import/' ) . '" target="_blank">' . __( 'Rara One Click Demo Import', 'travel-charm' ) . '</a></span><br />';
    }

    $theme_demo_content_desc .= '<span><label class="row-element">' . __( 'Download Demo Content', 'travel-charm' ) . ': </label><a href="' . esc_url( 'https://docs.rarathemes.com/docs/travel-charm/theme-activation-and-installation/how-to-import-demo-content/' ) . '" target="_blank" rel="nofollow noopener">' . __( 'Click here', 'travel-charm' ) . '</a></span><br />';

    $theme_demo_content_desc .= '</div>';
    $wp_customize->add_setting( 
        'theme_demo_content_info',
        array(
            'default'           => '',
            'sanitize_callback' => 'wp_kses_post',
        )
    );

    // Demo content 
    $wp_customize->add_control( 
        new Travel_Agency_Info_Text( 
            $wp_customize,
            'theme_demo_content_info',
            array(
                'section'     => 'theme_demo_content',
                'description' => $theme_demo_content_desc,
            )
        )
    );
}
add_action( 'customize_register', 'travel_charm_customizer_theme_info' );


/**
 * Prints phone number in header
*/
function travel_charm_get_header_phone(){
    return esc_html( get_theme_mod( 'phone' ) );
}

/**
 * Prints phone label
*/
function travel_charm_get_phone_label(){
    return esc_html( get_theme_mod( 'phone_label' ) );
}

/**
 * Selective refresh for header email 
 */
function travel_charm_get_email(){
    return esc_html( get_theme_mod( 'email' ) );
}

/**
 * Prints Time
*/
function travel_charm_get_time(){
    return esc_html( get_theme_mod( 'time') );
}

/**
 * Header Time
*/
function travel_charm_header_time(){
    $time = get_theme_mod( 'time' );
    if( $time ) echo '<div class="opening-time"><i class="fa fa-clock-o"></i><span class="time">' . travel_charm_get_time() . '</span></div>';
}

/**
 * Header Email
*/
function travel_charm_header_email(){
    $email = get_theme_mod( 'email');
    if( $email ) echo '<a href="' . esc_url( 'mailto:' .  $email ) . '" class="email-link"><i class="fa fa-envelope-open-o"></i><span class="email">' . sanitize_email( travel_charm_get_email() ) . '</span></a>';
}
/**
 * Customizer Function
*/
require get_stylesheet_directory() . '/inc/customizer-functions.php';
/**
 * Pluggable function 
*/
require get_stylesheet_directory() . '/inc/pluggable-functions.php';