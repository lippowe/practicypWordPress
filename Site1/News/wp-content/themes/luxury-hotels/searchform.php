<?php
/**
 * Template for displaying search forms in Luxury Hotels
 *
 * @package Luxury Hotels
 * @subpackage luxury_hotels
 */

?>

<?php $luxury_hotels_unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">
	<input type="search" id="<?php echo esc_attr( $luxury_hotels_unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'luxury-hotels' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo esc_html_x( 'Search', 'submit button', 'luxury-hotels' ); ?></button>
</form>