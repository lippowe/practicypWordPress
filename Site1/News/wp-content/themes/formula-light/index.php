<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 */

get_header();
?>

	<!--Page Title-->
	<?php get_template_part( 'breadcrumb' ); ?>
	<!--/End of Page Title-->

	<!-- Blog Grid View -->
	<section id="section" class="section blog-grid blog
		<?php
		$formula_light_dark_theme_mode = get_theme_mod( 'formula_dark_theme_mode', true );
		if ( $formula_light_dark_theme_mode == false ) {
		?>
			theme-grey 
			<?php
		} else {
			?>
	theme-dark <?php } ?>">
		<div class="container">
			<div class="row">
				<?php
				if ( have_posts() ) :
					// Start the Loop.
					while ( have_posts() ) :
						the_post();
						// includelude the post format template for the content.
						?>
						<div class="col-xl-4 col-lg-4">
							<?php
							$formula_light_blog_content_ordering = get_theme_mod( 'formula_blog_content_ordering', array( 'meta-one', 'title', 'meta-two' ) );
							?>
							<!--content.php-->
							<article id="main-content" class="post">					

								<?php
								if ( has_post_thumbnail() ) {
									if ( is_single() ) {
										?>
											<figure class="post-thumbnail">
												<?php
												the_post_thumbnail(
													'',
													array(
														'class' => '',
														'alt' => get_the_title(),
													)
												);
												?>
											</figure>
										<?php } else { ?>
										<figure class="post-thumbnail">
											<a class="" href="<?php the_permalink(); ?>">
												<?php the_post_thumbnail( '', array( 'class' => '' ) ); ?>
											</a>
										</figure>
										<?php
										}
								}
								?>

								<div class="blog-head">
									<div class="news-date">
										<a href="<?php echo esc_url( get_month_link( get_post_time( 'Y' ), get_post_time( 'm' ) ) ); ?>">
											<span><?php echo esc_html( get_the_date( 'j M' ) ); ?></span>
										</a>
									</div>

									<?php foreach ( $formula_light_blog_content_ordering as $formula_light_blog_content_order ) : ?>
										<?php if ( 'meta-one' === $formula_light_blog_content_order ) : ?>
											<div class="entry-meta">
												<span class="byline"><?php esc_html_e( 'By', 'formula-light' ); ?>
													<span class="author vcard">
														<a class="url fn n" href="<?php echo esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ); ?>"><?php echo esc_html( get_the_author() ); ?></a>	
													</span>
												</span>
											</div>
										<?php elseif ( 'title' === $formula_light_blog_content_order ) : ?>
											<header class="entry-header">
												<?php
												if ( is_single() ) :
													the_title( '<h3 class="entry-title">', '</h3>' );
												else :
													the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' );
												endif;
												?>
											</header>
										<?php endif; ?>
									<?php endforeach; ?>
								</div>

								<div class="full-content">
									<div class="entry-content">
										<?php the_excerpt(); ?>
									</div>
								</div>
							</article>
						</div>
						<?php
					endwhile;

				endif;
					// Pagination.
					the_posts_pagination(
						array(
							'prev_text' => '<i class="fa fa-angle-double-left"></i>',
							'next_text' => '<i class="fa fa-angle-double-right"></i>',
						)
					);
					?>
			</div>
		</div>
	</section>
	<!-- End of Blog Grid View -->

	<div class="clearfix"></div>
	<?php get_footer(); ?>
