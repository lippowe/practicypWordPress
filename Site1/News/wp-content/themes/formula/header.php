<?php
/**
 * Header file for the formula WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package    WordPress
 * @subpackage formula
 * @since      formula 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>
	<?php
	$formula_layout_style = get_theme_mod( 'formula_layout_style', 'wide' );
	if ( $formula_layout_style == 'boxed' ) {
		$class_layout = 'boxed';
	} else {
		$class_layout = 'wide';
	}

	$formula_dark_theme_mode = get_theme_mod( 'formula_dark_theme_mode', false );
	if ( $formula_dark_theme_mode == true ) {
		function formula_theme_body_class( $classes ) {
			$classes[] = 'theme-dark';
			return $classes;
		}
		add_filter( 'body_class', 'formula_theme_body_class' );
	}
	?>

	<body <?php body_class( esc_attr( $class_layout ) ); ?> >
		<!-- Loading Icon -->
		<?php
		$formula_loading_icon_disabled = get_theme_mod( 'formula_loading_icon_disabled', true );
		if ( $formula_loading_icon_disabled == true ) {
			?>
			<!-- Page Loader Anim -->
			<div class="page-loader">
				<div class="ring"></div>
				<div class="ring"></div>
				<div class="ring"></div>
			</div>
			<!-- Page Loader Anim -->
		<?php } ?>
		<?php
		wp_body_open();
		?>

		<?php
		$formula_menu_container_size = get_theme_mod( 'formula_menu_container_size', 'container' );
		$formula_menu_style          = get_theme_mod( 'formula_menu_style', 'sticky' );
		?>

		<header id="site-header" class="header header-footer-group <?php echo esc_attr( formula_is_admin_bar() ); ?>  " role="banner">
			<div class="<?php echo esc_attr( $formula_menu_container_size ); ?>">
				<?php get_template_part( 'template-parts/site-top-bar' ); ?>
				<div class="header-inner section-inner nav-wrap not-sticky
					<?php
					if ( $formula_menu_style == 'sticky' ) {
						?>
						sticky-menu 
					<?php } ?>
					<?php echo esc_attr( formula_is_admin_bar_sticky() ); ?>">

					<div class="header-titles-wrapper wrapper">

						<?php

						// Check whether the header search is activated in the customizer.
						$enable_header_search = get_theme_mod( 'enable_header_search', true );

						?>

						<div class="header-titles">

							<?php
							// Site title or logo.
							formula_site_logo();
							if(display_header_text() == true ) { ?>
								<div class="site-title faux-heading" >
									<a href="<?php echo esc_url( get_home_url( null, '/' ) ); ?>"><?php echo esc_html(get_bloginfo('name')); ?></a>
								</div>
								<?php
								// Site description.
								formula_site_description();
							}
							?>

						</div><!-- .header-titles -->

						<button class="toggle nav-toggle mobile-nav-toggle opened-menu" data-toggle-target=".menu-modal"  data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".close-nav-toggle">

							<div class="opened-menu">
								<span></span>
								<span></span>
								<span></span>
								<span></span>
							</div>

						</button><!-- .nav-toggle -->

					</div><!-- .header-titles-wrapper -->

					<div class="header-navigation-wrapper">

						<?php
						if ( has_nav_menu( 'primary' ) || ! has_nav_menu( 'expanded' ) ) { 
							?>
								<nav class="primary-menu-wrapper" aria-label="<?php echo esc_attr_x( 'Horizontal', 'menu', 'formula' ); ?>" role="navigation">

									<ul class="primary-menu reset-list-style menu">

										<?php
										if ( has_nav_menu( 'primary' ) ) {

											wp_nav_menu(
												array(
													'container'      => '',
													'items_wrap'     => '%3$s',
													'theme_location' => 'primary',
												)
											);

										} elseif ( ! has_nav_menu( 'expanded' ) ) {

											wp_list_pages(
												array(
													'match_menu_classes' => true,
													'show_sub_menu_icons' => true,
													'title_li' => false,
													'walker'   => new formula_Walker_Page(),
												)
											);

										}
										?>

									</ul>

								</nav><!-- .primary-menu-wrapper -->

							<?php

						}
						?>

					</div><!-- .header-navigation-wrapper -->

				</div><!-- .header-inner -->

				<?php
				// Output the search modal (if it is activated in the customizer).
				if ( true === $enable_header_search ) {
					get_template_part( 'theme-menu/modal-search' );
				}
				?>
			</div>
		</header><!-- #site-header -->

		<?php
		// Output the menu modal.
		get_template_part( 'theme-menu/modal-menu' );
