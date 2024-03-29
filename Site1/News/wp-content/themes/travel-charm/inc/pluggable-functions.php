<?php 
/**
 * Travel Agency Pluggable Functions
 * Overriding it on travel charm 
*/

function travel_agency_header(){     
    $time             = get_theme_mod( 'time' );
    $email            = get_theme_mod( 'email' );
    $phone            = get_theme_mod( 'phone' );
    $phone_label      = get_theme_mod( 'phone_label' );
    $ed_social        = get_theme_mod( 'ed_social_links', false );
    $ed_search        = get_theme_mod( 'ed_search', false );
    $site_title       = get_bloginfo( 'name' );
    $site_description = get_bloginfo( 'description', 'display' );
    $header_text      = get_theme_mod( 'header_text', 1 );
    ?>
    <header id="masthead" class="site-header header-four" itemscope itemtype="https://schema.org/WPHeader">
        <div class="header-holder">			
            <?php if( $ed_social || $ed_search || $time || $email ){ ?>
                <div class="header-t">
                    <div class="container">
                        <div class="left">
                            <?php
                                travel_charm_header_time();
                                travel_charm_header_email();
                            ?>
                        </div><!-- .left -->
                        <div class="right">
                            <?php if( $ed_social ) travel_agency_social_links();  ?>	
                        </div><!-- .right -->                  
                    </div>
                </div> <!-- header-t ends -->
            <?php } ?>
            <div class="header-b">
				<div class="container">
                    <?php if( has_custom_logo() || $site_title || $site_description || $header_text ){?>
                        <div class="site-branding" itemscope itemtype="https://schema.org/Organization">
                            <?php 
                                if( function_exists( 'has_custom_logo' ) && has_custom_logo() ){
                                    the_custom_logo();
                            } 
                            if( $site_title || $site_description ) {?>
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
                            <?php } ?>
                        </div><!-- .site-branding -->
                    <?php } ?>
                    
                    <?php if( $phone_label || $phone ){ ?>
                        <div class="right">
                            <?php
                                if( $phone_label ) echo '<span class="phone-label">' .  travel_agency_get_phone_label()  . '</span>';
                                if( $phone ) echo '<a href="' . esc_url( 'tel:' . preg_replace( '/[^\d+]/', '', $phone ) ) . '" class="tel-link"><span class="phone">' . travel_agency_get_header_phone() . '</span></a>';
                            ?>
                        </div>
                    <?php } ?>
                    
				</div>
			</div> <!-- header-b ends -->      
		</div> <!-- header-holder ends -->
		
        <div class="nav-holder">
			<div class="container">
                <div class="holder">
                    <a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="home-link"><i class="fa fa-home"></i></a>
                    
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
                    <div class="mobile-menu-wrapper">
                        <button id="primary-toggle-button" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".close-main-nav-toggle"><?php _e( 'MENU', 'travel-charm' );?><i class="fa fa-bars"></i></button>
                        <nav id="mobile-site-navigation" class="main-navigation mobile-navigation">        
                            <div class="primary-menu-list main-menu-modal cover-modal" data-modal-target-string=".main-menu-modal">
                                <button class="close close-main-nav-toggle" data-toggle-target=".main-menu-modal" data-toggle-body-class="showing-main-menu-modal" aria-expanded="false" data-set-focus=".main-menu-modal">
                                    <?php _e( 'CLOSE', 'travel-charm'); ?>
                                    <i class="fas fa-times"></i>
                                </button>
                                <div class="mobile-menu" aria-label="<?php esc_attr_e( 'Mobile', 'travel-charm' ); ?>">
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
                </div>
			</div>
		</div> <!-- nav-holder ends -->
	</header> <!-- header ends -->
    <?php
}

/**
 * Return homepage sections
*/
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
    if( $ed_activities ) array_push( $sections, 'activities' );
    if( $ed_popular ) array_push( $sections, 'popular' );
    if( $ed_why_us ) array_push( $sections, 'our-feature' );
    if( $ed_deal ) array_push( $sections, 'deals' );
    if( $ed_stat ) array_push( $sections, 'stats' );
    if( $ed_feature ) array_push( $sections, 'featured-trip' );    
    if( $ed_cta ) array_push( $sections, 'cta' );
    if( $ed_blog ) array_push( $sections, 'blog' );
    
    return apply_filters( 'ta_home_sections', $sections );
}


function travel_agency_fonts_url() {
    $fonts_url = '';
    /*
        * translators: If there are characters in your language that are not supported
        * by Poppins, translate this to 'off'. Do not translate into your own language.
        */
    $roboto = _x( 'on', 'Roboto font: on or off', 'travel-charm' );
    /*
        * translators: If there are characters in your language that are not supported
        * by Montserrat, translate this to 'off'. Do not translate into your own language.
        */
    $barlow = _x( 'on', 'Barlow font: on or off', 'travel-charm' );

    if ( 'off' !== $roboto || 'off' !== $barlow ) {
        $font_families = array();

        if( 'off' !== $roboto ){
            $font_families[] = 'Roboto:200,300,400,500,600,700,800,800i';
        }

        if( 'off' !== $barlow ){
            $font_families[] = 'Barlow:100,100i,200,200i,300,300i,400,400i,700,700i,900,900i';
        }

        $query_args = array(
            'family'  => urlencode( implode( '|', $font_families ) ),
            'display' => urlencode( 'fallback' ),
        );

        $fonts_url = add_query_arg( $query_args, 'https://fonts.googleapis.com/css' );
    }

    return esc_url( $fonts_url );
}

/**
 * Footer Bottom
*/
function travel_agency_footer_bottom(){ ?>
    <div class="footer-b">
        <div class="site-info">
            <?php
                travel_agency_get_footer_copyright();
                echo esc_html__( 'Travel Charm | Developed By ', 'travel-charm' );
                echo '<a href="' . esc_url( 'https://rarathemes.com/' ) .'" rel="nofollow" target="_blank">' . esc_html__( 'Rara Themes', 'travel-charm' ) . '</a>';
                
                printf( esc_html__( ' Powered by %s', 'travel-charm' ), '<a href="'. esc_url( __( 'https://wordpress.org/', 'travel-charm' ) ) .'" target="_blank">WordPress</a> .' );
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