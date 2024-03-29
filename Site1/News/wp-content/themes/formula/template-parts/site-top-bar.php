<?php
$formula_topbar_enabled = get_theme_mod( 'formula_topbar_enabled', 'true' );
if ( $formula_topbar_enabled == true ) :
	$formula_topbar_num  = get_theme_mod( 'formula_topbar_num', '(901)-2345-6789' );
	$formula_topbar_text = get_theme_mod( 'formula_topbar_text', 'Request a Callback' );
	?>
<div class="header-top">
	<div class="header-top-info">
		
		<div class="topheader_bg">	
			<div class="top_header_add">
				<ul>
					<li><i class="fa fa-envelope phone-text" aria-hidden="true"></i> <?php echo esc_html( $formula_topbar_text ); ?></li>
					<?php if ( $formula_topbar_num != '' ) { ?>
					<li><i class="fa fa-phone phone-num" aria-hidden="true"></i> <?php echo esc_html( $formula_topbar_num ); ?></li>
					<?php } ?>
				</ul>
			</div>		

			<div class="social_links_wrapper">
			
				<ul class="social-icons square spin-icon text-end">
					<?php
						// Enable / Disable
						$formula_tweet_link_disable     = get_theme_mod( 'formula_tweet_link_disable', '' );
						$formula_fb_link_disable        = get_theme_mod( 'formula_fb_link_disable', '' );
						$formula_youtube_link_disable   = get_theme_mod( 'formula_youtube_link_disable', '' );
						$formula_linkedin_link_disable  = get_theme_mod( 'formula_linkedin_link_disable', '' );
						$formula_tumblr_link_disable    = get_theme_mod( 'formula_tumblr_link_disable', '' );
						$formula_instagram_link_disable = get_theme_mod( 'formula_instagram_link_disable', '' );

						// URL
						$formula_twitter_url   = get_theme_mod( 'formula_twitter_url', '' );
						$formula_facebook_url  = get_theme_mod( 'formula_facebook_url', '' );
						$formula_youtube_url   = get_theme_mod( 'formula_youtube_url', '' );
						$formula_linkedin_url  = get_theme_mod( 'formula_linkedin_url', '' );
						$formula_tumblr_url    = get_theme_mod( 'formula_tumblr_url', '' );
						$formula_instagram_url = get_theme_mod( 'formula_instagram_url', '' );
					?>
					<?php if ( $formula_tweet_link_disable == true ) { ?>
						<li><a href="<?php echo esc_url( $formula_twitter_url ); ?>" class="fab fa-twitter"></a></li>
					<?php } if ( $formula_fb_link_disable == true ) { ?>
						<li><a href="<?php echo esc_url( $formula_facebook_url ); ?>" class="fab fa-facebook"></a></li>
					<?php } if ( $formula_youtube_link_disable == true ) { ?>
						<li><a href="<?php echo esc_url( $formula_youtube_url ); ?>" class="fab fa-youtube"></a></li>
					<?php } if ( $formula_linkedin_link_disable == true ) { ?>
						<li><a href="<?php echo esc_url( $formula_linkedin_url ); ?>" class="fab fa-linkedin"></a></li>
					<?php } if ( $formula_tumblr_link_disable == true ) { ?>
						<li><a href="<?php echo esc_url( $formula_tumblr_url ); ?>" class="fab fa-tumblr"></a></li>
					<?php } if ( $formula_instagram_link_disable == true ) { ?>
						<li><a href="<?php echo esc_url( $formula_instagram_url ); ?>" class="fab fa-instagram"></a></li>
					<?php } ?>
						
					<li>
						<div class="toggle-wrapper search-toggle-wrapper">

							<?php
							// Check whether the header search is activated in the customizer.
							$formula_enable_header_search = get_theme_mod( 'enable_header_search', true );

							if ( true === $formula_enable_header_search ) {

								?>
								<button class="toggle search-toggle desktop-search-toggle" data-toggle-target=".search-modal" data-toggle-body-class="showing-search-modal" data-set-focus=".search-modal .search-field" aria-expanded="false">
									<span class="toggle-inner">
										<a href="#" class="fas fa-search" aria-expanded="false"></a>
									</span>
								</button><!-- .search-toggle -->

							<?php } ?>

						</div>
					</li>

				</ul>					
			</div>
			<?php
			$formula_topbar_button_disable = get_theme_mod( 'formula_topbar_button_disable', true );
			$formula_topbar_button         = get_theme_mod( 'formula_topbar_button', 'Get Started' );
			$formula_topbar_button_link    = get_theme_mod( 'formula_topbar_button_link', '#' );
			if ( $formula_topbar_button_disable != '' ) {
				?>
				<div class="header_btn header2_btn float_left">
					<a href="<?php echo esc_url( $formula_topbar_button_link ); ?>">
						<?php echo esc_html( $formula_topbar_button ); ?>
					</a>
				</div>
			<?php } ?>

		</div>

	</div>
</div>
<?php endif; ?>
