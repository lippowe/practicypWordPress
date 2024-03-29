<?php

/**
 * Render homepage sections.
 */
function travel_vacation_homepage_sections() {
	$travel_vacation_homepage_sections = array_keys( travel_vacation_get_homepage_sections() );

	foreach ( $travel_vacation_homepage_sections as $travel_vacation_section ) {
		require get_template_directory() . '/sections/' . $travel_vacation_section . '.php';
	}
}