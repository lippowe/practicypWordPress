<?php
	// 1. Top bar active callback
function formula_topbar_num( $control ) {
	return true === ( $control->manager->get_setting( 'formula_topbar_enabled' )->value() == true );
}
function formula_topbar_heading_text( $control ) {
	return true === ( $control->manager->get_setting( 'formula_topbar_enabled' )->value() == true );
}
function formula_topbar_text( $control ) {
	return true === ( $control->manager->get_setting( 'formula_topbar_enabled' )->value() == true );
}
function formula_topbar_button_disable( $control ) {
	return true === ( $control->manager->get_setting( 'formula_topbar_enabled' )->value() == true );
}
function formula_topbar_button( $control ) {
	return true === (
		$control->manager->get_setting( 'formula_topbar_enabled' )->value() == true &&
		$control->manager->get_setting( 'formula_topbar_button_disable' )->value() == true
	);
}
function formula_topbar_button_link( $control ) {
	return true === (
		$control->manager->get_setting( 'formula_topbar_enabled' )->value() == true &&
		$control->manager->get_setting( 'formula_topbar_button_disable' )->value() == true
	);
}

	// 2. Top Bar Social Icon active callback.
function formula_social_icon_heading_text( $control ) {
	return true === ( $control->manager->get_setting( 'formula_topbar_enabled' )->value() == true );
}

function formula_fb_link_disable( $control ) {
	return true === ( $control->manager->get_setting( 'formula_topbar_enabled' )->value() == true );
}
function formula_facebook_url( $control ) {
	return true === (
		$control->manager->get_setting( 'formula_topbar_enabled' )->value() == true &&
		$control->manager->get_setting( 'formula_fb_link_disable' )->value() == true
	);
}

function formula_tweet_link_disable( $control ) {
	return true === ( $control->manager->get_setting( 'formula_topbar_enabled' )->value() == true );
}
function formula_twitter_url( $control ) {
	return true === (
		$control->manager->get_setting( 'formula_topbar_enabled' )->value() == true &&
		$control->manager->get_setting( 'formula_tweet_link_disable' )->value() == true
	);
}

function formula_youtube_link_disable( $control ) {
	return true === ( $control->manager->get_setting( 'formula_topbar_enabled' )->value() == true );
}
function formula_youtube_url( $control ) {
	return true === (
		$control->manager->get_setting( 'formula_topbar_enabled' )->value() == true &&
		$control->manager->get_setting( 'formula_youtube_link_disable' )->value() == true
	);
}

function formula_linkedin_link_disable( $control ) {
	return true === ( $control->manager->get_setting( 'formula_topbar_enabled' )->value() == true );
}
function formula_linkedin_url( $control ) {
	return true === (
		$control->manager->get_setting( 'formula_topbar_enabled' )->value() == true &&
		$control->manager->get_setting( 'formula_linkedin_link_disable' )->value() == true
	);
}

function formula_instagram_link_disable( $control ) {
	return true === ( $control->manager->get_setting( 'formula_topbar_enabled' )->value() == true );
}
function formula_instagram_url( $control ) {
	return true === (
		$control->manager->get_setting( 'formula_topbar_enabled' )->value() == true &&
		$control->manager->get_setting( 'formula_instagram_link_disable' )->value() == true
	);
}

function formula_tumblr_link_disable( $control ) {
	return true === ( $control->manager->get_setting( 'formula_topbar_enabled' )->value() == true );
}
function formula_tumblr_url( $control ) {
	return true === (
		$control->manager->get_setting( 'formula_topbar_enabled' )->value() == true &&
		$control->manager->get_setting( 'formula_tumblr_link_disable' )->value() == true
	);
}

function formula_pintrest_link_disable( $control ) {
	return true === ( $control->manager->get_setting( 'formula_topbar_enabled' )->value() == true );
}
function formula_pintrest_url( $control ) {
	return true === (
		$control->manager->get_setting( 'formula_topbar_enabled' )->value() == true &&
		$control->manager->get_setting( 'formula_pintrest_link_disable' )->value() == true
	);
}

function formula_vimeo_link_disable( $control ) {
	return true === ( $control->manager->get_setting( 'formula_topbar_enabled' )->value() == true );
}
function formula_vimeo_url( $control ) {
	return true === (
		$control->manager->get_setting( 'formula_topbar_enabled' )->value() == true &&
		$control->manager->get_setting( 'formula_vimeo_link_disable' )->value() == true
	);
}