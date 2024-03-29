<?php
/**
 *
 * Template Name: Full-Width Page
 *
 * Displays the Full Width page.
 *
 * @package formula
 */

get_header();

?>
<!--Page Title-->
<?php get_template_part( 'breadcrumb' ); ?>
<!--/End of Page Title-->
<!-- Blog & Sidebar Section -->
<section id="main-content" class="section site-content theme-grey">
	<div class="container top-margin m-top-30">
		<div class="row">	
			<!--Blog Section-->
			<?php
			if ( class_exists( 'WooCommerce' ) ) {

				if ( is_account_page() || is_cart() || is_checkout() ) {
					echo '<div class="col-md-12" col-xs-12">';
				} else {
					echo '<div class="blog col-md-12" col-xs-12">';
				}
			} else {

				echo '<div class="blog col-md-12" col-xs-12">';

			}
			?>
				<?php
				if ( class_exists( 'WooCommerce' ) ) {

					if ( is_account_page() || is_cart() || is_checkout() ) {

						while ( have_posts() ) :
							the_post();
							// Include the page.
							get_template_part( 'template-parts/content', 'page' );
							comments_template( '', true ); // show comments.

						endwhile;

					} else {

						while ( have_posts() ) :
							the_post();
							// Include the page.
							get_template_part( 'template-parts/content', 'page' );
							comments_template( '', true ); // show comments.
						endwhile;

					}
				} else {
					while ( have_posts() ) :
						the_post();
						// Include the page.
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
				}
			}
			?>
		</div>
	</div>
</section>
<!-- /Blog & Sidebar Section -->

<?php get_footer(); ?>