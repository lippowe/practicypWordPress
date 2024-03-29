<?php
/**
 * Template Name: Custom Home Page
 *
 * @package Luxury Hotels
 * @subpackage luxury_hotels
 */

get_header(); ?>

<main id="tp_content" role="main">
	<?php do_action( 'luxury_hotels_before_slider' ); ?>

	<?php get_template_part( 'template-parts/home/slider' ); ?>
	<?php do_action( 'luxury_hotels_after_slider' ); ?>

	<?php get_template_part( 'template-parts/home/about' ); ?>
	<?php do_action( 'luxury_hotels_after_about' ); ?>

	<?php get_template_part( 'template-parts/home/blog-post' ); ?>
	<?php do_action( 'luxury_hotels_after_blog-post' ); ?>

	<?php get_template_part( 'template-parts/home/home-content' ); ?>
	<?php do_action( 'luxury_hotels_after_home_content' ); ?>
</main>

<?php get_footer();