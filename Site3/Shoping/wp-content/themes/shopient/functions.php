<?php
/**
 * Define Theme Version
 */
define( 'SHOPIENT_THEME_VERSION', '7.9' );

function shopient_css() {
	$parent_style = 'storely-parent-style';
	wp_enqueue_style( $parent_style, get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'shopient-style', get_stylesheet_uri(), array( $parent_style ));
	
	wp_enqueue_style('shopient-media-query',get_stylesheet_directory_uri().'/assets/css/responsive.css');
	wp_dequeue_style('storely-media-query');

	wp_enqueue_script('shopient-custom-js', get_stylesheet_directory_uri() . '/assets/js/custom.js', array('jquery'), false, true);		
}
add_action( 'wp_enqueue_scripts', 'shopient_css',999);

require get_stylesheet_directory() . '/inc/customizer/customizer-options/shopient-header.php';
require get_stylesheet_directory() . '/inc/customizer/customizer-options/shopient-pro.php';

/**
 * Shopient Header My Account
 */
if ( ! function_exists( 'shopient_hdr_account' ) ) {
	function shopient_hdr_account() {
		$shopient_hide_show_acc = get_theme_mod( 'hide_show_account','1');
		$shopient_hdr_account_ttl	= get_theme_mod( 'hdr_account_ttl');
		$shopient_hdr_account_singout_ttl= get_theme_mod( 'hdr_account_singout_ttl');
		if($shopient_hide_show_acc=='1'  && class_exists( 'woocommerce' )): ?>
			<li class="user">
				<?php if(!empty($shopient_hdr_account_ttl) || !empty($shopient_hdr_account_singout_ttl)): ?>
					<?php if(is_user_logged_in()): ?>
						<a href="<?php echo esc_url(wp_logout_url( home_url())); ?>" class="user-btn"><i class="fa fa-sign-out"></i></a>
						<span class="icon-txt"><?php echo wp_kses_post($shopient_hdr_account_singout_ttl); ?></span>
					<?php else: ?>
						<a href="<?php echo esc_url(get_permalink( get_option('woocommerce_myaccount_page_id') )); ?>" class="user-btn"><i class="fa fa-sign-in"></i></a>
						<span class="icon-txt"><?php echo wp_kses_post($shopient_hdr_account_ttl); ?></span>
					<?php endif; ?>	
				<?php endif; ?>
			</li>
		<?php endif;
	}
}
add_action( 'shopient_hdr_account', 'shopient_hdr_account' );



/**
 * Shopient Header Cart
 */
if ( ! function_exists( 'shopient_hdr_cart' ) ) {
	function shopient_hdr_cart() {
		$shopient_hide_show_cart = get_theme_mod( 'hide_show_cart','1');
		$shopient_hdr_cart_ttl= get_theme_mod( 'hdr_cart_ttl');	
		if($shopient_hide_show_cart=='1' && class_exists( 'woocommerce' )): ?>
			<li class="cart-wrapper">
				<div class="cart-main">
					<button type="button" class="cart-icon-wrap header-cart cart-trigger">
						<i class="fa fa-shopping-cart"></i>
						<?php 
							if ( class_exists( 'woocommerce' ) ) {
								$count = WC()->cart->cart_contents_count;
								if ( $count > 0 ) {
								?>
									 <span class="cart-count"><?php echo esc_html( $count ); ?></span>
								<?php 
								}
								else {
									?>
									<span class="cart-count"><?php esc_html_e('0','shopient')?></span>
									<?php 
								}
							}
							?>
					</button>
					<?php if(!empty($shopient_hdr_cart_ttl)): ?>
						<span class="icon-txt"><?php echo wp_kses_post($shopient_hdr_cart_ttl); ?></span>
					<?php endif; ?>
				</div>
				<div class="cart-modal cart-modal-1">
					<div class="cart-container">
						<div class="cart-header">
							<div class="cart-top">
								<span class="cart-text"><?php esc_html_e('Shopping Cart','shopient'); ?></span>
								<a href="javascript:void(0);" class="cart-close"><?php esc_html_e('CLOSE','shopient'); ?></a>
							</div>
						</div>
						<div class="cart-data">
							<?php get_template_part('woocommerce/cart/mini','cart'); ?>
						</div>	
					</div>
					<div class="cart-overlay"></div>
				</div>
			</li>
			<?php endif;
	}
}
add_action( 'shopient_hdr_cart', 'shopient_hdr_cart' );

/**
 * Import Settings From Parent Theme
 *
 */
function shopient_parent_theme_options() {
	$storely_mods = get_option( 'theme_mods_storely' );
	if ( ! empty( $storely_mods ) ) {
		foreach ( $storely_mods as $storely_mod_k => $storely_mod_v ) {
			set_theme_mod( $storely_mod_k, $storely_mod_v );
		}
	}
}
add_action( 'after_switch_theme', 'shopient_parent_theme_options' );