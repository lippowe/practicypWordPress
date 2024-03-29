<?php

function travel_vacation_sanitize_select( $input, $setting ) {
	$input = sanitize_key( $input );
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

function travel_vacation_sanitize_switch( $input ) {
	if ( true === $input ) {
		return true;
	} else {
		return false;
	}
}

function travel_vacation_sanitize_google_fonts( $input, $setting ) {
	$choices = $setting->manager->get_control( $setting->id )->choices;
	return ( array_key_exists( $input, $choices ) ? $input : $setting->default );
}

/**
 * Sanitize HTML input.
 *
 * @param string $input HTML input to sanitize.
 * @return string Sanitized HTML.
 */
function travel_vacation_sanitize_html( $input ) {
    return wp_kses_post( $input );
}

/**
 * Sanitize URL input.
 *
 * @param string $input URL input to sanitize.
 * @return string Sanitized URL.
 */
function travel_vacation_sanitize_url( $input ) {
    return esc_url_raw( $input );
}