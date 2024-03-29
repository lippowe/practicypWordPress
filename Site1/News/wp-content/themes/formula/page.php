<?php
/**
 * The main template file
 */
get_header();
?>
<!--Page Title-->
<?php get_template_part( 'breadcrumb' ); ?>
<!--/End of Page Title-->
<!-- page.php -->
<section id="section" class="section site-content blog-page
	<?php
	$formula_dark_theme_mode = get_theme_mod( 'formula_dark_theme_mode', false );
	if ( $formula_dark_theme_mode == false ) {
		?>
			theme-grey 
		<?php } else { ?> 
			theme-dark 
		<?php } ?>">
	<div class="container top-margin m-top-30">
		<div class="row">
			<!--Blog Section-->
			<?php
			if ( class_exists( 'WooCommerce' ) ) {

				if ( is_account_page() || is_cart() || is_checkout() ) {
						echo '<div class="col-md-' . ( ! is_active_sidebar( 'woocommerce' ) ? '12' : '8' ) . ' col-xs-12">';
				} else {

					echo '<div class="blog col-md-' . ( ! is_active_sidebar( 'sidebar_primary' ) ? '12' : '8' ) . ' col-xs-12">';

				}
			} else {

				echo '<div class="blog col-md-' . ( ! is_active_sidebar( 'sidebar_primary' ) ? '12' : '8' ) . ' col-xs-12">';

			}
			?>
				<?php
				if ( class_exists( 'WooCommerce' ) ) {

					if ( is_account_page() || is_cart() || is_checkout() ) {

						while ( have_posts() ) :
							the_post();
							// include the page.
							get_template_part( 'template-parts/content', 'page' );
							comments_template( '', true ); // show comments.

						endwhile;

					} else {

						while ( have_posts() ) :
							the_post();
							// include the page
							get_template_part( 'template-parts/content', 'page' );
							comments_template( '', true ); // show comments.
						endwhile;

					}
				} else {
					while ( have_posts() ) :
						the_post();
						// include the page
						get_template_part( 'template-parts/content', 'page' );

						comments_template( '', true ); // show comments.
					endwhile;
				}

				// Start the Loop.
				?>
			</div>	
			<!--/Blog Section-->
			<?php
			if ( class_exists( 'WooCommerce' ) ) {

				if ( is_account_page() || is_cart() || is_checkout() ) {
						get_sidebar( 'woocommerce' );
				} else {

					get_sidebar();

				}
			} else {

				get_sidebar();

			}
			?>
		</div>
	</div>
</section>
<!-- /Blog & Sidebar Section -->

<?php get_footer(); ?>
