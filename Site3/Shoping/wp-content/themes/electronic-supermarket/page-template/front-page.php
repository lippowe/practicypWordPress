<?php
/**
 * Template Name: Custom Home Page
 *
 * @package Electronic Supermarket
 * @subpackage electronic_supermarket
 */

get_header(); ?>

<main id="tp_content" role="main">
	<div class="container">
		<?php get_template_part( 'template-parts/home/category' ); ?>
		<?php do_action( 'electronic_supermarket_after_category' ); ?>
		<div class="row">
			<?php
				$electronic_supermarket_slider_option = get_theme_mod( 'electronic_supermarket_slider_option','defaut-layout');
				if($electronic_supermarket_slider_option == 'defaut-layout'){ ?>
			<div class="col-lg-8 col-md-12">
				<?php do_action( 'electronic_supermarket_before_slider' ); ?>

				<?php get_template_part( 'template-parts/home/slider' ); ?>
				<?php do_action( 'electronic_supermarket_after_slider' ); ?>
			</div>
			<div class="col-lg-4 col-md-12">
				<?php get_template_part( 'template-parts/home/slider-banner' ); ?>
				<?php do_action( 'electronic_supermarket_after_slider-banner' ); ?>
				
			</div>
		<?php }
		else if($electronic_supermarket_slider_option == 'custom-layout'){ ?>
			<div class=" slider2 col-lg-12 col-md-12">
				<?php do_action( 'electronic_supermarket_before_slider' ); ?>

				<?php get_template_part( 'template-parts/home/slider' ); ?>
				<?php do_action( 'electronic_supermarket_after_slider' ); ?>

			</div>
		<?php }?>
		</div>
	</div>
	<?php get_template_part( 'template-parts/home/shop-product' ); ?>
	<?php do_action( 'electronic_supermarket_after_shop-product' ); ?>

	<?php get_template_part( 'template-parts/home/home-content' ); ?>
	<?php do_action( 'electronic_supermarket_after_home_content' ); ?>
</main>
<?php get_footer();
