<?php
/**
 * Template for displaying search forms in Electronic Supermarket
 *
 * @package Electronic Supermarket
 * @subpackage electronic_supermarket
 */
?>

<?php $unique_id = esc_attr( uniqid( 'search-form-' ) ); ?>

<form method="get" class="search-form" action="<?php echo esc_url( home_url( '/' ) ); ?>">	
	<input type="search" id="<?php echo esc_attr( $unique_id ); ?>" class="search-field" placeholder="<?php echo esc_attr_x( 'Search &hellip;', 'placeholder', 'electronic-supermarket' ); ?>" value="<?php echo get_search_query(); ?>" name="s" />
	<button type="submit" class="search-submit"><?php echo esc_html_x( 'Search', 'submit button', 'electronic-supermarket' ); ?></button>
</form>
