<?php
/**
 * The main template file
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 */
 
get_header();
$formula_homepage_template_design = get_theme_mod('formula_homepage_template_design','formula_homepage_template_1');
?>

	<!--Page Title-->
	<?php get_template_part('breadcrumb'); ?>
	<!--/End of Page Title-->

	<!-- index.php-->
	<section id="section" class="section site-content 
		<?php $formula_dark_theme_mode = get_theme_mod('formula_dark_theme_mode', false); 
		if($formula_dark_theme_mode == false ){ ?> theme-grey <?php } else { ?> theme-dark <?php } ?>">
		<div class="container">
			<div class="row">
				<!--Blog Section-->
				<div class="col-md-<?php echo ( !is_active_sidebar( 'sidebar_primary' ) ? '12' :'8' ); ?> col-sm-7 col-xs-12">
					<div class="blog">
						<?php 
							if ( have_posts() ) :
								// Start the Loop.
								while ( have_posts() ) : the_post();
									// includelude the post format template for the content.
									get_template_part( 'template-parts/content', get_post_type() );
								endwhile;

								// Pagination.
								the_posts_pagination( array(
									'prev_text'          => '<i class="fa fa-angle-double-left"></i>',
									'next_text'          => '<i class="fa fa-angle-double-right"></i>'
								) );
							endif;
						?>
					</div>	
				</div>	
				<!--/Blog Section-->
				<?php get_sidebar(); ?>
			</div>
		</div>
	</section>
	<!-- /Blog & Sidebar Section -->
	<?php get_footer(); ?>