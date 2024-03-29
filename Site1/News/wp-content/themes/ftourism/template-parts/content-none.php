<?php
/**
 * The default template for displaying content
 *
 * Used for single, index, archive, and search contents.
 *
 */
?>

<article>

	<?php if ( is_home() && current_user_can( 'publish_posts' ) ) : ?>

			<h1><?php esc_html_e( 'Oh no! Article not found! 404 error!', 'ftourism' ); ?></h1>
	
	<?php elseif ( is_search() ) : ?>

			<h1><?php esc_html_e( 'No Results Found!', 'ftourism' ); ?></h1>
			<?php get_search_form(); ?>

	<?php else : ?>

			<p><?php esc_html_e( 'It seems we can&rsquo;t find what you&rsquo;re looking for. Perhaps searching can help.', 'ftourism' ); ?></p>
			<?php get_search_form(); ?>

	<?php endif; ?>

</article>