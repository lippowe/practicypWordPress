<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package Luxury Hotels
 * @subpackage luxury_hotels
 */

/**
 * Returns true if a blog has more than 1 category.
 *
 * @return bool
 */
function luxury_hotels_categorized_blog() {
	$luxury_hotels_category_count = get_transient( 'luxury_hotels_categories' );

	if ( false === $luxury_hotels_category_count ) {
		// Create an array of all the categories that are attached to posts.
		$luxury_hotels_categories = get_categories( array(
			'fields'     => 'ids',
			'hide_empty' => 1,
			// We only need to know if there is more than one category.
			'number'     => 2,
		) );

		// Count the number of categories that are attached to the posts.
		$luxury_hotels_category_count = count( $luxury_hotels_categories );

		set_transient( 'luxury_hotels_categories', $luxury_hotels_category_count );
	}

	// Allow viewing case of 0 or 1 categories in post preview.
	if ( is_preview() ) {
		return true;
	}

	return $luxury_hotels_category_count > 1;
}

if ( ! function_exists( 'luxury_hotels_the_custom_logo' ) ) :
/**
 * Displays the optional custom logo.
 *
 * Does nothing if the custom logo is not available.
 *
 * @since Luxury Hotels
 */
function luxury_hotels_the_custom_logo() {
	if ( function_exists( 'the_custom_logo' ) ) {
		the_custom_logo();
	}
}
endif;

/**
 * Flush out the transients used in luxury_hotels_categorized_blog.
 */
function luxury_hotels_category_transient_flusher() {
	if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
		return;
	}
	// Like, beat it. Dig?
	delete_transient( 'luxury_hotels_categories' );
}
add_action( 'edit_category', 'luxury_hotels_category_transient_flusher' );
add_action( 'save_post',     'luxury_hotels_category_transient_flusher' );
