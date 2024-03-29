<?php
	// 1. Footer active callback.

function formula_footer_widgets_enabled( $control ) {
	return true === ( $control->manager->get_setting( 'formula_footer_widgets_enabled' )->value() == true );
}
function formula_footer_container_size( $control ) {
	return true === (
		$control->manager->get_setting( 'formula_footer_widgets_enabled' )->value() == true &&
		$control->manager->get_setting( 'formula_footer_container_size' )->value() == true
	);
}

	// 2. Footer widgets active callback.
function formula_footer_copright_enabled( $control ) {
	return true === ( $control->manager->get_setting( 'formula_footer_copright_enabled' )->value() == true );
}
function formula_footer_copyright_text( $control ) {
	return true === (
		$control->manager->get_setting( 'formula_footer_copright_enabled' )->value() == true &&
		$control->manager->get_setting( 'formula_footer_copyright_text' )->value() == true
	);
}
