<?php
get_header();
?>
	<!--Page Title-->
	<?php get_template_part( 'breadcrumb' ); ?>
	<!--/End of Page Title-->

	<div class="clearfix"></div>
	<!--404 Error Page-->
	<section id="section" class="section contact">
		<div class="container">
			<div class="row">
				<div id="notfound">
					<div class="notfound">
						<div class="notfound-404">
							<h1><?php esc_html_e( '4', 'formula' ); ?>
							<span><?php esc_html_e( '0', 'formula' ); ?></span>
							<?php esc_html_e( '4', 'formula' ); ?></h1>
						</div>
						<h2><?php esc_html_e( 'Oops! Page Not Found..', 'formula' ); ?></h2>
						<p><?php esc_html_e( 'We are sorry, but the page you are looking for does not exist', 'formula' ); ?></p>
						<div class="btn-block text-center">
							<a href="<?php echo esc_url( home_url() ); ?>" class="thm-btn" target="_blank">
								<?php esc_html_e( 'Back To Homepage', 'formula' ); ?>
							</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>	
	<!--/End of 404 Error Page-->		
	<div class="clearfix"></div>
<?php get_footer(); ?>
