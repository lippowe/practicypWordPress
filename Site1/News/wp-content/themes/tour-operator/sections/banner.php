<?php
/**
 * Banner Section
 * 
 * @package WP_Tour_Package
 */

$banner_title = get_theme_mod( 'banner_title', __( 'Find Your Best Holiday', 'tour-operator' ) );
$sub_title    = get_theme_mod( 'banner_subtitle', __( 'Find great adventure holidays and activities around the planet.', 'tour-operator' ) );
$button_label = get_theme_mod( 'banner_btn_label', __( 'Get Started', 'tour-operator' ) );
$button_url   = get_theme_mod( 'banner_btn_url', __( 'Get Started', 'tour-operator' ) );
$banner_image = get_header_image();

if( $banner_image ){ ?>  
<div class="banner">
	   <?php 
        the_custom_header_markup(); 
        
        if( ( $button_label && $button_url ) || $banner_title || $sub_title ){ ?>	
            <div class="form-holder">
        		<?php 
                    if( $banner_title || $sub_title || ( $button_label && $button_url ) ){
                        echo '<div class="text wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.1s">';
                        if( $banner_title ) echo '<h1>' . esc_html( $banner_title ) . '</h1>';
                        if( $sub_title ) echo '<div class="banner-content">' . wp_kses_post( wpautop( $sub_title ) ) . '</div>';
                        
                        if( ( $button_label && $button_url ) ){
                            echo '<a class="btn-banner" href='. esc_url( $button_url ) .'>'. esc_html( $button_label ) .'</a>';
                        }        
                        echo '</div>';
                    }
                ?>
        	</div>            
        <?php 
        }
    ?>
</div> <!-- banner ends -->
<?php
}            