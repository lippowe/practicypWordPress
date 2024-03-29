<?php
	// A. Sidebar Widget Title typo Settings.
function formula_typography_sidebar_title( $control ) {
	return true === ( $control->manager->get_setting( 'formula_typography_sidebar_widget_disable' )->value() == true );
}
function formula_typography_sidebar_title_ff( $control ) {
	return true === ( $control->manager->get_setting( 'formula_typography_sidebar_widget_disable' )->value() == true );
}
function formula_typography_sidebar_title_fs( $control ) {
	return true === ( $control->manager->get_setting( 'formula_typography_sidebar_widget_disable' )->value() == true );
}
function formula_typography_sidebar_title_lh( $control ) {
	return true === ( $control->manager->get_setting( 'formula_typography_sidebar_widget_disable' )->value() == true );
}

	// B. Sidebar Widget Content typo Settings.
function formula_typography_sidebar_content( $control ) {
	return true === ( $control->manager->get_setting( 'formula_typography_sidebar_widget_disable' )->value() == true );
}
function formula_typography_sidebar_content_ff( $control ) {
	return true === ( $control->manager->get_setting( 'formula_typography_sidebar_widget_disable' )->value() == true );
}
function formula_typography_sidebar_content_fs( $control ) {
	return true === ( $control->manager->get_setting( 'formula_typography_sidebar_widget_disable' )->value() == true );
}
function formula_typography_sidebar_content_lh( $control ) {
	return true === ( $control->manager->get_setting( 'formula_typography_sidebar_widget_disable' )->value() == true );
}


