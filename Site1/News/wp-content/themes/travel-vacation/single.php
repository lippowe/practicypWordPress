<?php

/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package travel_vacation
 */

get_header();
?>
<main id="primary" class="site-main">

	<?php
	while ( have_posts() ) :
		the_post();
		get_template_part( 'template-parts/content', 'single' );

		do_action( 'travel_vacation_post_navigation' );

		if ( is_singular( 'post' ) ) {
			$travel_vacation_related_posts_label = get_theme_mod( 'travel_vacation_post_related_post_label', __( 'Related Posts', 'travel-vacation' ) );
			$travel_vacation_cat_content_id      = get_the_category( $post->ID )[0]->term_id;
			$travel_vacation_args                = array(
				'cat'            => $travel_vacation_cat_content_id,
				'posts_per_page' => 3,
			);

			$query = new WP_Query( $travel_vacation_args );

			if ( $query->have_posts() ) :
				?>
				<div class="related-posts">
					<?php if ( get_theme_mod( 'travel_vacation_post_hide_related_posts', false ) === false ) : ?>
						<h2><?php echo esc_html( $travel_vacation_related_posts_label ); ?></h2>
						<div class="row">
							<?php
							while ( $query->have_posts() ) :
								$query->the_post();
								?>
								<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
									<div class="mag-post-single">
										<div class="mag-post-img">
											<?php travel_vacation_post_thumbnail(); ?>
										</div>
										<div class="mag-post-detail">
											<?php the_title( '<h5 class="entry-title mag-post-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h5>' ); ?>
											<div class="mag-post-excerpt">
												<?php the_excerpt(); ?>
											</div>
										</div>
									</div>
								</article>
								<?php
							endwhile;
							wp_reset_postdata();
							?>
						</div>
					<?php endif; ?>
				</div>
				<?php
			endif;
		}

		// If comments are open or we have at least one comment, load up the comment template.
		if ( comments_open() || get_comments_number() ) :
			comments_template();
		endif;

	endwhile; // End of the loop.
	?>

</main>
<?php
if ( travel_vacation_is_sidebar_enabled() ) {
	get_sidebar();
}
get_footer();