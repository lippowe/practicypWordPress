<?php
get_header();

global $woocommerce;
$formula_theid = wc_get_page_id('shop');
$formula_slider = get_post_meta( $formula_theid, 'slider_chkbx', true );
if ($formula_slider) :
    get_template_part('index-home/index','slider');
endif;

?>
	<!--breadcrumb Woocommerce.php-->
	<?php get_template_part('breadcrumb'); ?>
	<!--/breadcrumb-->
	
<!-- /Page Title Section -->
<div class="clearfix"></div>
<!-- Blog Section with Sidebar -->
<section id="section" class="section
	<?php $formula_dark_theme_mode = get_theme_mod('formula_dark_theme_mode', false); 
	if($formula_dark_theme_mode == false ){ ?> theme-grey <?php } else { ?> theme-dark <?php } ?>">
	<div class="container">
		<div class="row">	
			<!--Woocommerce-Blog Section-->
			<div class="col-md-<?php echo ( !is_active_sidebar( 'woocommerce' ) ? '12' :'8' ); ?> col-xs-12">
				<div class="blog">
					<div class="post-woocommerce">
						<?php woocommerce_content(); ?>
					</div>	
				</div>	
			</div>	
			<!--/Woocommerce-Blog Section-->
			<?php get_sidebar('woocommerce'); ?>
		</div>
	</div>
</section>
<!-- /Blog Section with Sidebar -->
<?php get_footer(); ?>