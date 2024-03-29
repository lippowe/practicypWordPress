<?php
/**
 * Displays the menu icon and modal
 *
 * @package WordPress
 * @subpackage formula
 * @since formula 1.0
 */

?>

<div class="menu-modal cover-modal header-footer-group navbar" data-modal-target-string=".menu-modal">

	<div class="menu-modal-inner modal-inner">

		<div class="menu-wrapper section-inner">

			<div class="menu-top">
				<?php formula_site_logo(); ?>
				<button class="toggle close-nav-toggle fill-children-current-color closed-menu" data-toggle-target=".menu-modal" data-toggle-body-class="showing-menu-modal" aria-expanded="false" data-set-focus=".menu-modal">
				
					<?php 
					formula_the_theme_svg( 'cross' ); 
					?>
				</button><!-- .nav-toggle -->

				<?php

				$formula_mobile_menu_location = '';

				// If the mobile menu location is not set, use the primary and expanded locations as fallbacks, in that order.
				if ( has_nav_menu( 'mobile' ) ) {
					$formula_mobile_menu_location = 'mobile';
				} elseif ( has_nav_menu( 'primary' ) ) {
					$formula_mobile_menu_location = 'primary';
				} elseif ( has_nav_menu( 'expanded' ) ) {
					$formula_mobile_menu_location = 'expanded';
				}

				if ( has_nav_menu( 'expanded' ) ) {

					$formula_expanded_nav_classes = '';

					if ( 'expanded' === $formula_mobile_menu_location ) {
						$formula_expanded_nav_classes .= ' mobile-menu';
					}

					?>

					<nav class="expanded-menu<?php echo esc_attr( $formula_expanded_nav_classes ); ?>" aria-label="<?php echo esc_attr_x( 'Expanded', 'menu', 'formula' ); ?>" role="navigation">

						<ul class="modal-menu reset-list-style">
							<?php
							if ( has_nav_menu( 'expanded' ) ) {
								wp_nav_menu(
									array(
										'container'      => '',
										'items_wrap'     => '%3$s',
										'show_toggles'   => true,
										'theme_location' => 'expanded',
									)
								);
							}
							?>
						</ul>

					</nav>

					<?php
				}

				if ( 'expanded' !== $formula_mobile_menu_location ) {
					?>

					<nav class="mobile-menu" aria-label="<?php echo esc_attr_x( 'Mobile', 'menu', 'formula' ); ?>" role="navigation">

						<ul class="modal-menu reset-list-style menu">

						<?php
						if ( $formula_mobile_menu_location ) {

							wp_nav_menu(
								array(
									'container'      => '',
									'items_wrap'     => '%3$s',
									'show_toggles'   => true,
									'theme_location' => $formula_mobile_menu_location,
								)
							);

						} else {

							wp_list_pages(
								array(
									'match_menu_classes' => true,
									'show_toggles'       => true,
									'title_li'           => false,
									'walker'             => new formula_Walker_Page(),
								)
							);

						}
						?>

						</ul>

					</nav>

					<?php
				}
				?>

			</div><!-- .menu-top -->

			<div class="menu-bottom">

				<?php if ( has_nav_menu( 'social' ) ) { ?>

					<nav aria-label="<?php esc_attr_e( 'Expanded Social links', 'formula' ); ?>" role="navigation">
						<ul class="social-menu reset-list-style social-icons fill-children-current-color">

							<?php
							wp_nav_menu(
								array(
									'theme_location'  => 'social',
									'container'       => '',
									'container_class' => '',
									'items_wrap'      => '%3$s',
									'menu_id'         => '',
									'menu_class'      => '',
									'depth'           => 1,
									'link_before'     => '<span class="screen-reader-text">',
									'link_after'      => '</span>',
									'fallback_cb'     => '',
								)
							);
							?>

						</ul>
					</nav><!-- .social-menu -->

				<?php } ?>

			</div><!-- .menu-bottom -->

		</div><!-- .menu-wrapper -->

	</div><!-- .menu-modal-inner -->

</div><!-- .menu-modal -->
