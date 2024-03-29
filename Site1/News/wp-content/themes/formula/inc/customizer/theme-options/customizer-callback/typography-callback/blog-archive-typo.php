<?php
	// 1. Blog Arcive active callback.
function formula_typography_blog_archive( $control ) {
	return true === ( $control->manager->get_setting( 'formula_typography_blog_archive_disable' )->value() == true );
}
function formula_typography_blog_archive_ff( $control ) {
	return true === ( $control->manager->get_setting( 'formula_typography_blog_archive_disable' )->value() == true );
}
function formula_typography_blog_archive_fs( $control ) {
	return true === ( $control->manager->get_setting( 'formula_typography_blog_archive_disable' )->value() == true );
}
function formula_typography_blog_archive_lh( $control ) {
	return true === ( $control->manager->get_setting( 'formula_typography_blog_archive_disable' )->value() == true );
}