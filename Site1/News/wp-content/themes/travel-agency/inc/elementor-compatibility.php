<?php

if( travel_agency_is_elementor_activated() ){
    
    /**Disable Default Colours and Default Fonts of elementor on Theme Activation*/

    $fresh        = get_option( 'travel_agency_flag' );
    if( ! $fresh ){
        update_option('elementor_disable_color_schemes', 'yes');
        update_option('elementor_disable_typography_schemes', 'yes');
        update_option( 'travel_agency_flag', true ); 
    }
    $flexbox        = get_option( 'travel_agency_flexbox' );
    /**Activate Flexbox container of elementor on Theme Activation*/
    if( ! $flexbox ){
        update_option('elementor_experiment-container', 'active');
        update_option( 'travel_agency_flexbox', true );
    }
}