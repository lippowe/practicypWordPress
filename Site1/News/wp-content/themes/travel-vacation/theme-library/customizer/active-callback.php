<?php

/**
 * Active Callbacks
 *
 * @package travel_vacation
 */

// Theme Options.
function travel_vacation_is_pagination_enabled( $control ) {
	return ( $control->manager->get_setting( 'travel_vacation_enable_pagination' )->value() );
}
function travel_vacation_is_breadcrumb_enabled( $control ) {
	return ( $control->manager->get_setting( 'travel_vacation_enable_breadcrumb' )->value() );
}

// Header Options.
function travel_vacation_is_topbar_enabled( $control ) {
	return ( $control->manager->get_Setting( 'travel_vacation_enable_topbar' )->value() );
}

// Banner Slider Section.
function travel_vacation_is_banner_slider_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'travel_vacation_enable_banner_section' )->value() );
}
function travel_vacation_is_banner_slider_section_and_content_type_post_enabled( $control ) {
	$travel_vacation_content_type = $control->manager->get_setting( 'travel_vacation_banner_slider_content_type' )->value();
	return ( travel_vacation_is_banner_slider_section_enabled( $control ) && ( 'post' === $travel_vacation_content_type ) );
}
function travel_vacation_is_banner_slider_section_and_content_type_page_enabled( $control ) {
	$travel_vacation_content_type = $control->manager->get_setting( 'travel_vacation_banner_slider_content_type' )->value();
	return ( travel_vacation_is_banner_slider_section_enabled( $control ) && ( 'page' === $travel_vacation_content_type ) );
}

// Places section.
function travel_vacation_is_places_section_enabled( $control ) {
	return ( $control->manager->get_setting( 'travel_vacation_enable_service_section' )->value() );
}
function travel_vacation_is_places_section_and_content_type_post_enabled( $control ) {
	$travel_vacation_content_type = $control->manager->get_setting( 'travel_vacation_places_content_type' )->value();
	return ( travel_vacation_is_places_section_enabled( $control ) && ( 'post' === $travel_vacation_content_type ) );
}
function travel_vacation_is_places_section_and_content_type_page_enabled( $control ) {
	$travel_vacation_content_type = $control->manager->get_setting( 'travel_vacation_places_content_type' )->value();
	return ( travel_vacation_is_places_section_enabled( $control ) && ( 'page' === $travel_vacation_content_type ) );
}