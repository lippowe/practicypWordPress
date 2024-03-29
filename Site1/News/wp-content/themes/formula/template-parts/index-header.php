<?php
$formula_page_header_disabled = get_theme_mod('formula_page_header_disabled', true);
$formula_page_header_background_color = get_theme_mod('formula_page_header_background_color');
if($formula_page_header_disabled == true): ?>
	<!-- Page Title Section index.php-->
	<section id="main-content" class="page-title-module section theme-page-header-area">
		<?php if($formula_page_header_background_color != null): ?>
			<div class="overlay" style="background-color: <?php echo esc_attr($formula_page_header_background_color); ?>;"></div>
		<?php else: ?>
			<div class="overlay"></div>
		<?php endif; ?>
		<div class="container">
			<div class="row">
				<div class="col-md-12 col-sm-12 col-xs-12 content-center">
				   <?php
					$formula_allowed_html = array(
						'br'     => array(),
						'em'     => array(),
						'strong' => array(),
						'i'      => array(
							'class' => array(),
						),
						'span'   => array(),
					);	

				   $formula_our_title = get_the_title( get_option('page_for_posts', true) );
					echo '<div class="page-title text-center"><h1 class="text-white">'.wp_kses( force_balance_tags( $formula_our_title), $formula_allowed_html ).'</h1></div>';
				   ?>
					<ul class="page-breadcrumb text-center">
						<?php
							$formula_homeLink = home_url();
							$formula_our_title = get_the_title( get_option('page_for_posts', true) );
							echo '<li><a href="'.esc_url($formula_homeLink).'">'.wp_kses( force_balance_tags($formula_our_title), $formula_allowed_html ).'</a></li>';
							echo '<li class="active"><a href="'.wp_kses( force_balance_tags($formula_our_title), $formula_allowed_html ) .'">'. esc_attr(get_bloginfo( 'name' )) .'</a></li>';
						?>
					</ul>
				</div>
			</div>
		</div>	
	</section>

	<div class="clearfix"></div>

	<!-- /Page Title Section -->
	<?php endif; ?>