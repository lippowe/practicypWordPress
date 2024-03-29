<?php
	// A. Footer Widget Title typo Settings.
function formula_typography_footer_title( $control ) {
	return true === ( $control->manager->get_setting( 'formula_typography_sidebar_footer_disable' )->value() == true );
}
function formula_typography_footer_title_ff( $control ) {
	return true === ( $control->manager->get_setting( 'formula_typography_sidebar_footer_disable' )->value() == true );
}
function formula_typography_footer_title_fs( $control ) {
	return true === ( $control->manager->get_setting( 'formula_typography_sidebar_footer_disable' )->value() == true );
}
function formula_typography_footer_title_lh( $control ) {
	return true === ( $control->manager->get_setting( 'formula_typography_sidebar_footer_disable' )->value() == true );
}

	// B. Footer Widget Content typo Settings.
function formula_typography_footer_content( $control ) {
	return true === ( $control->manager->get_setting( 'formula_typography_sidebar_footer_disable' )->value() == true );
}
function formula_typography_footer_content_ff( $control ) {
	return true === ( $control->manager->get_setting( 'formula_typography_sidebar_footer_disable' )->value() == true );
}
function formula_typography_footer_content_fs( $control ) {
	return true === ( $control->manager->get_setting( 'formula_typography_sidebar_footer_disable' )->value() == true );
}
function formula_typography_footer_content_lh( $control ) {
	return true === ( $control->manager->get_setting( 'formula_typography_sidebar_footer_disable' )->value() == true );
}


