<?php get_header(); ?>

	<!--Page Title-->
	<?php get_template_part( 'breadcrumb' ); ?>
	<!--/End of Page Title -->
		
	<div class="clearfix"></div>
	
	<?php
		$formula_archive_blog_pages_layout = get_theme_mod( 'formula_archive_blog_pages_layout', 'formula_right_sidebar' );
	?>
	<!-- Blog & Sidebar Section archive.php -->
	<section id="section" class="section site-content 
		<?php
		$formula_dark_theme_mode = get_theme_mod( 'formula_dark_theme_mode', false );
		if ( $formula_dark_theme_mode == false ) {
			?>
			theme-grey 
			<?php
		} else {
			?>
		 theme-dark <?php } ?>">
		<div class="container">
			<div class="row">
				<!--Side bar-->
				<?php if ( $formula_archive_blog_pages_layout === 'formula_left_sidebar' || ! $formula_archive_blog_pages_layout === 'formula_no_sidebar' ) : ?>
					<?php get_sidebar(); ?>
				<?php endif; ?>

				<?php if ( $formula_archive_blog_pages_layout === 'formula_no_sidebar' ) : ?>
				<div class="col-lg-12 col-md-12 col-sm-12">	
				<?php else : ?>
				<div class="col-lg-<?php echo ( ! is_active_sidebar( 'sidebar_primary' ) ? '12' : '8' ); ?> col-md-<?php echo ( ! is_active_sidebar( 'sidebar_primary' ) ? '12' : '8' ); ?> col-sm-12">
				<?php endif; ?>			

				<!--Blog Section-->
				
					<div class="blog">
						<?php
						if ( have_posts() ) :
							// Start the Loop.
							while ( have_posts() ) :
								the_post();
								// Include the post format template for the content.
								get_template_part( 'template-parts/content', get_post_type() );
							endwhile;

							the_posts_pagination(
								array(
									'prev_text' => '<i class="fa fa-angle-left"></i>',
									'next_text' => '<i class="fa fa-angle-right"></i>',
								)
							);

						else :

							get_template_part( 'template-parts/content', 'none' );

						endif;
						?>
					</div>
				</div>
				<!--/Side Bar-->
				<?php if ( $formula_archive_blog_pages_layout === 'formula_right_sidebar' || ! $formula_archive_blog_pages_layout === 'formula_no_sidebar' ) : ?>
					<?php get_sidebar(); ?>
				<?php endif; ?>
			</div>			
		</div>
	</section>
	<!-- /Blog & Sidebar Section -->

<?php get_footer(); ?>
