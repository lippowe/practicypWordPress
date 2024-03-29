<?php
/**
 * Template part for displaying product section
 *
 * @package Electronic Supermarket
 * @subpackage electronic_supermarket
 */

?>
<?php if( get_theme_mod( 'electronic_supermarket_show_hide_product_section') != '') { ?>
<section id="product" class="my-5">
	<div class="container">
		<div class="row">
			<div class="col-lg-3 px-lg-0">
				<?php $electronic_supermarket_about_page = array();
        $electronic_supermarket_mod = absint( get_theme_mod( 'electronic_supermarket_about_page' ));
        if ( 'page-none-selected' != $electronic_supermarket_mod ) {
          $electronic_supermarket_about_page[] = $electronic_supermarket_mod;
        }
	      if( !empty($electronic_supermarket_about_page) ) :
	        $electronic_supermarket_args = array(
	          'post_type' => 'page',
	          'post__in' => $electronic_supermarket_about_page,
	          'orderby' => 'post__in'
	        );
        $electronic_supermarket_query = new WP_Query( $electronic_supermarket_args );
        if ( $electronic_supermarket_query->have_posts() ) :
          while ( $electronic_supermarket_query->have_posts() ) : $electronic_supermarket_query->the_post(); ?>
          	<div class="product-main-img">
          		<?php the_post_thumbnail(); ?>
          	</div>
   					<div class="product-info">
   						<h4><?php the_title(); ?></h4>
	            <div class="more-btn">
	              <a href="<?php the_permalink(); ?>"><?php esc_html_e('View All Product','electronic-supermarket'); ?></a>
	            </div>
   					</div>
          <?php endwhile; ?>
        	<?php else : ?>
          <div class="no-postfound"></div>
        	<?php endif;
      		endif;
      				wp_reset_postdata()?>
      		<div class="clearfix"></div>
			</div>
			<div class="col-lg-9">
				<?php if(class_exists('woocommerce')){ ?> 
				<div class="product_kit">
		      <div class="row">
	          <?php
	            $electronic_supermarket_args = array(
	              'post_type'      => 'product',
	              'posts_per_page' => 10,
	              'product_cat'    => get_theme_mod('electronic_supermarket_recent_product_category')
	            );
	            $loop = new WP_Query( $electronic_supermarket_args );
	            while ( $loop->have_posts() ) : $loop->the_post();
							?>
								<div class="col-lg-3 col-md-6 col-sm-6 p-0 m-0">
									<div class="product-box">
										<?php	global $product; ?>
										<div class="row">
											<div class="col-lg-8 col-4 align-self-center">
												<div class="product-content">
													<h3><?php echo esc_html(get_the_title()); ?></h3>
													<p class="mb-0"><?php echo $product->get_price_html(); ?></p>
												</div>
											</div>
											<div class="col-lg-4 pl-lg-0 col-8 align-self-center">
												<div class="product-image">
													<?php echo woocommerce_get_product_thumbnail(); ?>
												</div>
											</div>
										</div>
									</div>
								</div>
								<?php
								endwhile;
								wp_reset_query();
	          	?>
		      </div>
				</div>
					<?php }?>
			</div>
		</div>		
	</div>
</section>
<?php }?>
