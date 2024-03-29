<?php

/**
 * The main template file
 * 
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package travel_vacation
 */

get_header();

$travel_vacation_column = get_theme_mod( 'travel_vacation_archive_column_layout', 'column-3' );
?>
<main id="primary" class="site-main">

	<?php

	if ( is_home() && ! is_front_page() ) {

		do_action( 'travel_vacation_breadcrumb' );

	}

	if ( have_posts() ) :

		if ( is_home() && ! is_front_page() ) :
			?>
			<header>
				<h1 class="page-title"><?php single_post_title(); ?></h1>
			</header>
			<?php
		endif;
		?>

		<div class="travel_vacation-archive-layout grid-layout <?php echo esc_attr( $travel_vacation_column ); ?>">
			<?php
			/* Start the Loop */
			while ( have_posts() ) :
				the_post();

				get_template_part( 'template-parts/content', get_post_type() );

			endwhile;
			?>
		</div>
		<?php
		do_action( 'travel_vacation_posts_pagination' );

	else :

		get_template_part( 'template-parts/content', 'none' );

	endif;
	?>

</main><!-- #main -->

<?php
if ( travel_vacation_is_sidebar_enabled() ) {
	get_sidebar();
}

get_footer();