<!-- Footer Section -->
	<footer id="footer" class="footer theme-dark
		<?php $formula_dark_theme_mode = get_theme_mod( 'formula_dark_theme_mode', false );
		if ( $formula_dark_theme_mode === false ) { ?> 
			theme-grey 
		<?php } else { ?>
			 theme-dark 
		<?php } ?>">

		<div class="footer-shape"></div>

		<?php
			$formula_footer_widgets_enabled = get_theme_mod( 'formula_footer_widgets_enabled', true );
			$formula_footer_container_size  = get_theme_mod( 'formula_footer_container_size', 'container' );
		?>
		<?php if ( $formula_footer_widgets_enabled === true ) : ?>
		<div class="<?php echo esc_attr( $formula_footer_container_size ); ?> site-footer">	
			<div class="row">
				<?php get_template_part( 'sidebar', 'footer' ); ?>
			</div>
		</div>
		<?php endif; ?>		
		<!-- /Footer Widgets -->					

		<!-- Footer Copyrights -->
		<?php
			$formula_footer_copright_enabled = get_theme_mod( 'formula_footer_copright_enabled', true );
			$formula_footer_copyright_text   = get_theme_mod(
				'formula_footer_copyright_text',
				__(
					'Copyright &copy; 2023 | Powered by 
					<a href="//wordpress.org/">WordPress</a> <span class="sep"> | </span> formula theme by A WP Life',
					'formula'
				)
			);
			?>
		<?php if ( $formula_footer_copright_enabled == true ) : ?>
			<div class="footer-copyrights">
				<div class="container">	
					<div class="text-center">
						<div class="col-xl-12 col-lg-12 col-md-12">
							<ul class="social-icons">
								<?php
									// Enable / Disable.
									$formula_tweet_link_disable     = get_theme_mod( 'formula_tweet_link_disable', '' );
									$formula_fb_link_disable        = get_theme_mod( 'formula_fb_link_disable', '' );
									$formula_dribbble_link_disable  = get_theme_mod( 'formula_dribbble_link_disable', '' );
									$formula_instagram_link_disable = get_theme_mod( 'formula_instagram_link_disable', '' );
									// URL.
									$formula_twitter_url   = get_theme_mod( 'formula_twitter_url', '' );
									$formula_facebook_url  = get_theme_mod( 'formula_facebook_url', '' );
									$formula_dribbble_url  = get_theme_mod( 'formula_dribbble_url', '' );
									$formula_instagram_url = get_theme_mod( 'formula_instagram_url', '' );
								?>
								<?php if ( $formula_tweet_link_disable == true ) { ?>
									<li><a href="<?php echo esc_url( $formula_twitter_url ); ?>" class="fab fa-twitter"></a></li>
								<?php } if ( $formula_fb_link_disable == true ) { ?>
									<li><a href="<?php echo esc_url( $formula_facebook_url ); ?>" class="fab fa-facebook"></a></li>
								<?php } if ( $formula_dribbble_link_disable == true ) { ?>
									<li><a href="<?php echo esc_url( $formula_linkedin_url ); ?>" class="fab fa-dribbble"></a></li>
								<?php } if ( $formula_instagram_link_disable == true ) { ?>
									<li><a href="<?php echo esc_url( $formula_instagram_url ); ?>" class="fab fa-instagram"></a></li>
								<?php } ?>
							</ul>
							<div class="site-info">
								<?php echo wp_kses_post( $formula_footer_copyright_text ); ?>	
							</div>
						</div>
					</div>
				</div>
			</div>
		<?php endif; ?>
	</footer>
	<!-- /Footer Copyrights -->		
	<div class="clearfix"></div>
</div>	
<!--/Wrapper-->

<!-- Scroll To Top -->
<?php
$formula_goto_top_icon_enabled = get_theme_mod( 'formula_goto_top_icon_enabled', true );
if ( $formula_goto_top_icon_enabled == true ) {
	?>
	<a href="#" class="page-scroll-up" style="display: inline;"><i class="fa fa-chevron-up"></i></a>
<?php }; ?>
<!-- /Scroll To Top -->

<?php wp_footer(); ?>
</body>
</html>
