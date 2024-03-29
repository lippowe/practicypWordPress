<?php
/**
 * The main template file
 *
 * @package formula
 */

get_header();  ?>
<!--Page Title-->
	<?php get_template_part( 'breadcrumb' ); ?>
<!--/End of Page Title -->

<!-- single.php-->
<?php
$formula_single_blog_pages_layout = get_theme_mod( 'formula_single_blog_pages_layout', 'formula_right_sidebar' );
?>
<section id="section" class="section site-content 
	<?php
	$formula_dark_theme_mode = get_theme_mod( 'formula_dark_theme_mode', false );
	if ( $formula_dark_theme_mode === false ) {
		?>
		 theme-grey 
		 <?php
	} else {
		?>
		 theme-dark <?php } ?>">
	<div class="container top-margin m-top-30">
		<div class="row">
			<!--Side bar-->
			<?php if ( $formula_single_blog_pages_layout === 'formula_left_sidebar' || ! $formula_single_blog_pages_layout === 'formula_no_sidebar' ) : ?>
				<?php get_sidebar(); ?>
			<?php endif; ?>

			<?php if ( $formula_single_blog_pages_layout === 'formula_no_sidebar' ) : ?>
			<div class="col-lg-12 col-md-12 col-sm-12">	
			<?php else : ?>
			<div class="col-lg-<?php echo ( ! is_active_sidebar( 'sidebar_primary' ) ? '12' : '8' ); ?> col-md-<?php echo ( ! is_active_sidebar( 'sidebar_primary' ) ? '12' : '8' ); ?> col-sm-12">
			<?php endif; ?>	
			
			<!--Blog Section-->
				<div class="blog">	
					<?php
					while ( have_posts() ) :
						the_post();

						get_template_part( 'template-parts/content-single', get_post_type() );

						// author meta.
						get_template_part( 'template-parts/auth-details' );

						// If comments are open or we have at least one comment, load up the comment template.
						if ( comments_open() || get_comments_number() ) :
							comments_template( '', true );
							endif;

						endwhile; // End of the loop.
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
