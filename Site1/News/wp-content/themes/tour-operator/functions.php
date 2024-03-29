<?php
/**
 * Theme functions and definitions
 *
 * @package tour_operator
 */

 // For Getting Started
define( 'TRAVEL_AGENCY_THEME_TEXTDOMAIN', 'tour-operator' );

/**
 * After setup theme hook
 */
function tour_operator_theme_setup(){
    /*
     * Make chile theme available for translation.
     * Translations can be filed in the /languages/ directory.
     */
    load_child_theme_textdomain( 'tour-operator', get_stylesheet_directory() . '/languages' );

    /**
     * Register default header image
     */
    register_default_headers( array(
        'child' => array(
            'url'           => '%2$s/images/banner-img.png',
            'thumbnail_url' => '%2$s/images/banner-img.png',
            'description'   => __( 'Default Header Image', 'tour-operator' ),
        ),
    ) );

}
add_action( 'after_setup_theme', 'tour_operator_theme_setup' );

/**
 * Custom header
 */
function tour_operator_custom_header(){

    $header_args = array(
        'default-image' => get_stylesheet_directory_uri() . '/images/banner-img.png',
        'width'         => 1920,
        'height'        => 680,
        'header-text'   => false 
    );

    return $header_args;
}
add_filter( 'travel_agency_custom_header_args', 'tour_operator_custom_header' );

/**
 * Enqueue scripts and styles.
 */
function tour_operator_enqueue_styles(){
    wp_enqueue_style( 'tour-operator-google-fonts', tour_operator_fonts_url() );

    wp_enqueue_style( 'travel-agency', get_template_directory_uri() . '/style.css' );
    wp_enqueue_style( 'tour-operator', get_stylesheet_directory_uri() . '/style.css', array( 'travel-agency' ), wp_get_theme()->get( 'Version' ) );
}
add_action( 'wp_enqueue_scripts', 'tour_operator_enqueue_styles' );

/**
 * Register custom fonts.
 */
function tour_operator_fonts_url() {
    $fonts_url = '';

    /*
    * translators: If there are characters in your language that are not supported
    * by Nunito Sans, translate this to 'off'. Do not translate into your own language.
    */
    $nunito_sans = _x( 'on', 'Nunito Sans font: on or off', 'tour-operator' );

    if ( 'off' !== $nunito_sans ) {
        $font_families = array();

        $font_families[] = 'Nunito Sans:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i';

        $query_args = array(
            'family'  => urlencode( implode( '|', $font_families ) ),
            'display' => urlencode( 'fallback' ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url_raw( $fonts_url );
}

function tour_operator_customizer_options( $wp_customize ){

    // Banner search 
    $wp_customize->remove_setting( 'ed_banner_search');
    $wp_customize->remove_control( 'ed_banner_search');

    $wp_customize->remove_setting( 'ed_search');
    $wp_customize->remove_control( 'ed_search');

    $wp_customize->remove_setting( 'phone');
    $wp_customize->remove_control( 'phone');

    $wp_customize->remove_setting( 'phone_label');
    $wp_customize->remove_control( 'phone_label');

    $wp_customize->get_section( 'popular_section' )->priority    = 20;
    $wp_customize->get_section( 'activities_section' )->priority = 25;
    $wp_customize->get_section( 'featured_section' )->priority   = 30;
    $wp_customize->get_section( 'whyus_section' )->priority      = 35;


    /**
     * Top header
     */ 

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
            'label'       => __( 'Work Hour', 'tour-operator' ),
            'description' => __( 'Add working hour in header.', 'tour-operator' ),
            'section'     => 'header_misc_setting',
            'type'        => 'text',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'time', array(
        'selector'        => '.site-header .opening-time .time',
        'render_callback' => 'tour_operator_get_time',
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
            'label'       => __( 'Email', 'tour-operator' ),
            'description' => __( 'Add email in header.', 'tour-operator' ),
            'section'     => 'header_misc_setting',
            'type'        => 'text',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'email', array(
        'selector'        => '.site-header .email-link .email',
        'render_callback' => 'tour_operator_get_email',
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
            'label'       => __( 'Phone Number', 'tour-operator' ),
            'description' => __( 'Add phone number in header.', 'tour-operator' ),
            'section'     => 'header_misc_setting',
            'type'        => 'text',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'phone', array(
        'selector'        => '.site-header .header-b .phone',
        'render_callback' => 'tour_operator_get_header_phone',
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
            'label'       => __( 'Phone Label', 'tour-operator' ),
            'description' => __( 'Add phone label in header.', 'tour-operator' ),
            'section'     => 'header_misc_setting',
            'type'        => 'text',
        )
    );
    
    $wp_customize->selective_refresh->add_partial( 'phone_label', array(
        'selector' => '.site-header .header-b .phone-label',
        'render_callback' => 'tour_operator_get_phone_label',
    ) );
    

    /** Banner link one label */
    $wp_customize->add_setting(
        'banner_btn_label',
        array(
            'default'           => __( 'Get Started', 'tour-operator' ),
            'sanitize_callback' => 'sanitize_text_field',
            'transport'         => 'postMessage'
        )
    );
    
    $wp_customize->add_control(
        'banner_btn_label',
        array(
            'section'         => 'header_image',
            'label'           => __( 'Button Label', 'tour-operator' ),
        )
    );

    /** Enable/Disable Search Form */
    $wp_customize->add_setting(
        'ed_search',
        array(
            'default'           => true,
            'sanitize_callback' => 'travel_agency_sanitize_checkbox',
        )
    );
    
    $wp_customize->add_control(
        'ed_search',
        array(
            'section'     => 'header_misc_setting',
            'label'       => __( 'Search Form', 'tour-operator' ),
            'description' => __( 'Enable to show search form in header.', 'tour-operator' ),
            'type'        => 'checkbox'
        )       
    );

    // Selective refresh for banner link one label
    $wp_customize->selective_refresh->add_partial( 'banner_btn_label', array(
        'selector'            => '.banner .form-holder a.btn-banner',
        'render_callback'     => 'tour_operator_btn_label_selective_refresh',
        'container_inclusive' => false,
        'fallback_refresh'    => true,
    ) );

    /** Banner link one url */
    $wp_customize->add_setting(
        'banner_btn_url',
        array(
            'default'           => '#',
            'sanitize_callback' => 'esc_url_raw',
        )
    );

    $wp_customize->add_control(
        'banner_btn_url',
        array(
            'section' => 'header_image',
            'label'   => __( 'Button Url', 'tour-operator' ),
            'type'    => 'url',
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
            'label'       => __( 'Social Links', 'tour-operator' ),
            'description' => __( 'Enable to show social links in header.', 'tour-operator' ),
            'type'        => 'checkbox'
        )       
    );

}
add_action( 'customize_register', 'tour_operator_customizer_options',50 );

function travel_agency_get_homepage_section(){
    $sections      = array();
    $ed_banner     = get_theme_mod( 'ed_banner', true );
    $ed_search_bar = get_theme_mod( 'ed_search_bar', true );
    $ed_about      = get_theme_mod( 'ed_about_section', true );
    $ed_activities = get_theme_mod( 'ed_activities_section', true );
    $ed_popular    = get_theme_mod( 'ed_popular_section', true );
    $ed_why_us     = get_theme_mod( 'ed_why_us_section', true );
    $ed_feature    = get_theme_mod( 'ed_feature_section', true );
    $ed_stat       = get_theme_mod( 'ed_stat_section', true );
    $ed_deal       = get_theme_mod( 'ed_deal_section', true );
    $ed_cta        = get_theme_mod( 'ed_cta_section', true );
    $ed_blog       = get_theme_mod( 'ed_blog_section', true );
    
    if( $ed_banner ) array_push( $sections, 'banner' );
    if( $ed_search_bar && travel_agency_is_wte_advanced_search_active() ) array_push( $sections, 'search' );

    // Sections from travel agency companion
    if( $ed_about ) array_push( $sections, 'about' );
    if( $ed_popular ) array_push( $sections, 'popular' );
    if( $ed_activities ) array_push( $sections, 'activities' );    
    if( $ed_feature ) array_push( $sections, 'featured-trip' );
    if( $ed_why_us ) array_push( $sections, 'our-feature' );
    if( $ed_stat ) array_push( $sections, 'stats' );
    if( $ed_deal ) array_push( $sections, 'deals' );
    if( $ed_cta ) array_push( $sections, 'cta' );

    if( $ed_blog ) array_push( $sections, 'blog' );
    
    return apply_filters( 'ta_home_sections', $sections );
}

/**
 * Prints phone number in header
*/
function tour_operator_get_header_phone(){
    return esc_html( get_theme_mod( 'phone', '' ) );
}

/**
 * Prints phone label
*/
function tour_operator_get_phone_label(){
    return esc_html( get_theme_mod( 'phone_label', '' ) );
}

/**
 * Selective refresh for header email 
 */
function tour_operator_get_email(){
    return esc_html( get_theme_mod( 'email', '' ) );
}

/**
 * Selective refresh for banner button 
 */
function tour_operator_btn_label_selective_refresh(){
    return esc_html( get_theme_mod( 'banner_btn_label', esc_html__( 'Get Started', 'tour-operator') ) );
}

/**
 * Prints Time
*/
function tour_operator_get_time(){
    return esc_html( get_theme_mod( 'time', '' ) );
}

/**
 * Header Time
*/
function tour_operator_header_time(){
    $time = get_theme_mod( 'time' );
    if( $time ) echo '<div class="opening-time"><i class="fa fa-clock-o"></i><span class="time">' . esc_html( $time ) . '</span></div>';
}

/**
 * Header Email
*/
function tour_operator_header_email(){
    $email = get_theme_mod( 'email', '' );
    if( is_email( $email ) ) echo '<a href="' . esc_url( 'mailto:' .  $email ) . '" class="email-link"><i class="fa fa-envelope-open-o"></i><span class="email">' . esc_html( $email ) . '</span></a>';
}

/**
 * Header Start
*/
function travel_agency_header(){
    $phone       = get_theme_mod( 'phone', __( '(888) 123-45678', 'tour-operator' ) );
    $phone_label = get_theme_mod( 'phone_label', __( 'Call us, we are open 24/7', 'tour-operator' ) );
    $ed_social   = get_theme_mod( 'ed_social_links', true );
    $ed_search   = get_theme_mod( 'ed_search', true ); 
    ?>
    <header id="masthead" class="site-header header-four" itemscope itemtype="https://schema.org/WPHeader">

        <div class="header-holder">         
            <?php if( $ed_social || $ed_search ){ ?>
                <div class="header-t">
                    <div class="container">
                        <div class="left">
                            <?php
                            tour_operator_header_time();
                            tour_operator_header_email();
                            ?>
                        </div><!-- .left -->
                        <div class="right">
                            <?php if( $ed_social ) travel_agency_social_links(); ?>
                        </div><!-- .right -->
                        
                    </div>
                </div> <!-- header-t ends -->
            <?php } ?>
            
            <div class="header-b">
                <div class="container">
                    <div class="site-branding" itemscope itemtype="https://schema.org/Organization">
                        <?php 
                        if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                            the_custom_logo();
                        } 
                        ?>
                        <div class="text-logo">
                            <?php if ( is_front_page() ) : ?>
                                <h1 class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></h1>
                                <?php else : ?>
                                    <p class="site-title" itemprop="name"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home" itemprop="url"><?php bloginfo( 'name' ); ?></a></p>
                                <?php endif;
                                $description = get_bloginfo( 'description', 'display' );
                                if ( $description || is_customize_preview() ) : ?>
                                    <p class="site-description" itemprop="description"><?php echo esc_html( $description ); /* WPCS: xss ok. */ ?></p>
                                    <?php
                                endif; ?>
                            </div>
                        </div><!-- .site-branding -->
                        
                        <?php if( $phone_label || $phone ){ ?>
                            <div class="right">
                                <?php
                                if( $phone_label ) echo '<span class="phone-label">' . esc_html( travel_agency_get_phone_label() ) . '</span>';
                                if( $phone ) echo '<a href="' . esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $phone ) ) . '" class="tel-link"><span class="phone">' . esc_html( travel_agency_get_header_phone() ) . '</span></a>';
                                ?>
                            </div>
                        <?php } ?>
                        
                    </div>
                </div> <!-- header-b ends -->                
            </div> <!-- header-holder ends -->
            
            <div class="nav-holder">
                <div class="container">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="home-link"><i class="fa fa-home"></i></a>
                    <div class="mobile-menu-wrapper">
                        <button id="primary-toggle-button" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".close-main-nav-toggle"><?php _e( 'MENU', 'tour-operator' );?><i class="fa fa-bars"></i></button>

                        <nav id="mobile-site-navigation" class="main-navigation mobile-navigation">        
                            <div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">
                                <button class="close close-main-nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal">
                                    <?php _e( 'CLOSE', 'tour-operator' ); ?>
                                    <i class="fas fa-times"></i>
                                </button>
                                <div class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'tour-operator' ); ?>">
                                    <?php
                                        wp_nav_menu( array(
                                            'theme_location' => 'primary',
                                            'menu_id'        => 'mobile-primary-menu',
                                            'menu_class'     => 'nav-menu main-menu-modal',
                                            'fallback_cb'    => 'travel_agency_primary_menu_fallback',
                                        ) );
                                    ?>
                                </div>
                            </div>
                        </nav><!-- #mobile-site-navigation -->
                    </div>

                    <nav id="site-navigation" class="main-navigation" itemscope itemtype="https://schema.org/SiteNavigationElement">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'primary',
                            'menu_id'        => 'primary-menu',
                            'fallback_cb'    => 'travel_agency_primary_menu_fallback',
                        ) );
                        ?>
                    </nav><!-- #site-navigation -->

                    <div class="tools desktop-search">
                        <?php if( $ed_search ) travel_agency_get_header_search(); ?>                     
                    </div>
                </div>
            </div> <!-- nav-holder ends -->
            
        </header> <!-- header ends -->
    <?php
}

/**
 * Remove action from parent
*/
function tour_operator_remove_action(){
    remove_action( 'customize_register', 'travel_agency_customizer_theme_info' );
    remove_action( 'customize_register', 'travel_agency_customizer_demo_content' );    
}
add_action( 'init', 'tour_operator_remove_action' );

function tour_operator_customizer_theme_info( $wp_customize ){
    $wp_customize->add_section( 'theme_info', array(
        'title'       => __( 'Information Links' , 'tour-operator' ),
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
    $theme_info .= '<h3 class="sticky_title">' . __( 'Need help?', 'tour-operator' ) . '</h3>';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'View demo', 'tour-operator' ) . ': </label><a href="' . esc_url( 'https://rarathemes.com/previews/?theme=tour-operator/' ) . '" target="_blank">' . __( 'here', 'tour-operator' ) . '</a></span>';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'View documentation', 'tour-operator' ) . ': </label><a href="' . esc_url( 'https://docs.rarathemes.com/docs/tour-operator/' ) . '" target="_blank">' . __( 'here', 'tour-operator' ) . '</a></span>';
    $theme_info .= '<span class="sticky_info_row"><label class="row-element">' . __( 'Support ticket', 'tour-operator' ) . ': </label><a href="' . esc_url( 'https://rarathemes.com/support-ticket/' ) . '" target="_blank">' . __( 'here', 'tour-operator' ) . '</a></span>';
    $theme_info .= '<span class="sticky_info_row"><label class="more-detail row-element">' . __( 'More Details', 'tour-operator' ) . ': </label><a href="' . esc_url( 'https://rarathemes.com/wordpress-themes/' ) . '" target="_blank">' . __( 'here', 'tour-operator' ) . '</a></span>';
    $theme_info .= '</div>';

    $wp_customize->add_control( new Travel_Agency_Info_Text( $wp_customize,
        'theme_info_theme', 
        array(
            'label' => __( 'About Tour Package' , 'tour-operator' ),
            'section'     => 'theme_info',
            'description' => $theme_info
        )
        )
    );
    
    /** Demo Content Import */
    $wp_customize->add_section( 
        'theme_demo_content',
        array(
            'title'    => __( 'Demo Content Import', 'tour-operator' ),
            'priority' => 7,
        )
    );
    
    $wp_customize->add_setting(
        'demo_content_instruction',
        array(
            'sanitize_callback' => 'wp_kses_post'
        )
    );

    $demo_content_description = sprintf( __( 'Tour Operator comes with demo content import feature. You can import the demo content with just one click. For step-by-step video tutorial, %1$sClick here%2$s', 'tour-operator' ), '<a class="documentation" href="' . esc_url( 'https://rarathemes.com/blog/import-demo-content-rara-themes/' ) . '" target="_blank">', '</a>' );

    $wp_customize->add_control(
        new Travel_Agency_Info_Text( 
            $wp_customize,
            'demo_content_instruction',
            array(
                'label'       => __( 'About Demo Import' , 'tour-operator' ),
                'section'     => 'theme_demo_content',
                'description' => $demo_content_description,
            )
        )
    );
    
    $theme_demo_content_desc = '<div class="customizer-custom">';

    if( ! class_exists( 'RDDI_init' ) ){
        $theme_demo_content_desc .= '<span><label class="row-element">' . __( 'Plugin required', 'tour-operator' ) . ': </label><a href="' . esc_url( 'https://wordpress.org/plugins/rara-one-click-demo-import/' ) . '" target="_blank">' . __( 'Rara One Click Demo Import', 'tour-operator' ) . '</a></span><br />';
    }

    $theme_demo_content_desc .= '<span><label class="row-element">' . __( 'Download Demo Content', 'tour-operator' ) . ': </label><a href="' . esc_url( 'https://docs.rarathemes.com/docs/tour-operator/theme-activation-and-installation/how-to-import-demo-content/' ) . '" target="_blank" rel="nofollow noopener">' . __( 'Click here', 'tour-operator' ) . '</a></span><br />';

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
add_action( 'customize_register', 'tour_operator_customizer_theme_info' );

/**
 * Footer Bottom
*/
function travel_agency_footer_bottom(){ ?>
    <div class="footer-b">
        <div class="site-info">
            <?php
                travel_agency_get_footer_copyright();
                echo esc_html__( 'Tour Operator | Developed By ', 'tour-operator' );
                echo '<a href="' . esc_url( 'https://rarathemes.com/' ) .'" rel="nofollow" target="_blank">' . esc_html__( 'Rara Themes', 'tour-operator' ) . '</a>';
                
                printf( esc_html__( ' Powered by %s', 'tour-operator' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'tour-operator' ) ) .'" target="_blank">WordPress</a> .' );
            ?>                              
        </div>
        <?php 
        if ( function_exists( 'the_privacy_policy_link' ) ) {
            the_privacy_policy_link();
        }
        ?>
        <nav class="footer-navigation">
            <?php
                wp_nav_menu( array(
                    'theme_location' => 'footer',
                    'menu_id'        => 'footer-menu',
                    'fallback_cb'    => false,
                ) );
            ?>
        </nav><!-- .footer-navigation -->
    </div>
    <?php
}
