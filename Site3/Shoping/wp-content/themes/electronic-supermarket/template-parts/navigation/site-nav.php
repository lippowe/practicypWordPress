<?php
/*
* Display Theme menus
 */
?>

<?php
$electronic_supermarket_sticky = get_theme_mod('electronic_supermarket_sticky');
    $electronic_supermarket_data_sticky = "false";
    if ($electronic_supermarket_sticky) {
    $electronic_supermarket_data_sticky = "true";
    }
    global $wp_customize;
?>

<div class="innermenuboxupper <?php if( is_user_logged_in() && !isset( $wp_customize ) ){ echo "login-user";} ?>" data-sticky="<?php echo esc_attr($electronic_supermarket_data_sticky); ?>">
	<div class="container">
		<div class="innermenubox">
			<div class="row">
				<div class="col-lg-8 col-md-4 col-sm-4 align-self-center">
					<div class="toggle-nav mobile-menu">
					<button onclick="electronic_supermarket_menu_open_nav()" class="responsivetoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','electronic-supermarket'); ?></span></button>
					</div>
					<div id="mySidenav" class="nav sidenav">
						<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'electronic-supermarket' ); ?>">
			      	<?php 
		          	wp_nav_menu( array(
	                'theme_location' => 'primary-menu',
	                'container_class' => 'main-menu clearfix' ,
	                'menu_class' => 'clearfix',
	                'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
	                'fallback_cb' => 'wp_page_menu',
		          	) );
			      	?>
							<a href="javascript:void(0)" class="closebtn mobile-menu" onclick="electronic_supermarket_menu_close_nav()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','electronic-supermarket'); ?></span></a>
						</nav>
					</div>
				</div>
				<div class="col-lg-2 col-md-4 col-sm-4 align-self-center g-translate">
	        		 <?php if(get_theme_mod('electronic_supermarket_cart_language_translator',false) != ''){ ?>
						<?php echo do_shortcode('[google-translator]'); ?>
					<?php }?>
	      		</div>
				<div class="col-lg-2 col-md-4 col-sm-4 align-self-center dropdown">
	        		<?php if(get_theme_mod('electronic_supermarket_currency_switcher',false) != ''){ ?>
						<?php echo do_shortcode('[woocommerce_currency_switcher_drop_down_box]'); ?>
					<?php }?>
	      		</div>
    		</div>
		</div>
	</div>
</div>
