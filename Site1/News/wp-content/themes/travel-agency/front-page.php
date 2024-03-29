<?php
/**
 * Front Page Template
 * 
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Travel_Agency
 */

get_header(); 

$home_sections = travel_agency_get_homepage_section();
$ed_elementor = get_theme_mod( 'ed_elementor', false );

if ( 'posts' == get_option( 'show_on_front' ) ) { //Show Static Blog Page
    include( get_home_template() );
    get_sidebar();
}elseif( travel_agency_is_elementor_activated_post() && $ed_elementor ){ 
    get_template_part('template-parts/content-elementor');
}elseif( $home_sections ){ 
    
    //If any one section are enabled then show custom home page.
    foreach( $home_sections as $section ){
        travel_agency_get_template_part( esc_attr( $section ) );  
    }
    
}else {
    //If all section are disabled then show respective page template. 
    include( get_page_template() );
    get_sidebar();
}

get_footer();