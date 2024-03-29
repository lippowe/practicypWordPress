<?php

add_action( 'admin_menu', 'trekking_blocks_gettingstarted' );
function trekking_blocks_gettingstarted() {
	add_theme_page( esc_html__('Theme Documentation', 'trekking-blocks'), esc_html__('Theme Documentation', 'trekking-blocks'), 'edit_theme_options', 'trekking-blocks-guide-page', 'trekking_blocks_guide');
}

function trekking_blocks_admin_theme_style() {
   wp_enqueue_style('trekking-blocks-custom-admin-style', esc_url(get_template_directory_uri()) . '/inc/dashboard/dashboard.css');
}
add_action('admin_enqueue_scripts', 'trekking_blocks_admin_theme_style');

if ( ! defined( 'TREKKING_BLOCKS_SUPPORT' ) ) {
define('TREKKING_BLOCKS_SUPPORT',__('https://wordpress.org/support/theme/trekking-blocks/','trekking-blocks'));
}
if ( ! defined( 'TREKKING_BLOCKS_REVIEW' ) ) {
define('TREKKING_BLOCKS_REVIEW',__('https://wordpress.org/support/theme/trekking-blocks/reviews/','trekking-blocks'));
}
if ( ! defined( 'TREKKING_BLOCKS_LIVE_DEMO' ) ) {
define('TREKKING_BLOCKS_LIVE_DEMO',__('https://www.ovationthemes.com/demos/adventure-trekking-camp/','trekking-blocks'));
}
if ( ! defined( 'TREKKING_BLOCKS_BUY_PRO' ) ) {
define('TREKKING_BLOCKS_BUY_PRO',__('https://www.ovationthemes.com/wordpress/trekking-wordpress-theme/','trekking-blocks'));
}
if ( ! defined( 'TREKKING_BLOCKS_PRO_DOC' ) ) {
define('TREKKING_BLOCKS_PRO_DOC',__('https://www.ovationthemes.com/docs/ot-adventure-trekking-camp-pro-doc/','trekking-blocks'));
}
if ( ! defined( 'TREKKING_BLOCKS_FREE_DOC' ) ) {
define('TREKKING_BLOCKS_FREE_DOC',__('https://ovationthemes.com/docs/ot-adventure-trekking-camp-free-doc/','trekking-blocks'));
}
if ( ! defined( 'TREKKING_BLOCKS_THEME_NAME' ) ) {
define('TREKKING_BLOCKS_THEME_NAME',__('Premium Trekking Blocks Theme','trekking-blocks'));
}

/**
 * Theme Info Page
 */
function trekking_blocks_guide() {

	// Theme info
	$return = add_query_arg( array()) ;
	$trekking_blocks_theme = wp_get_theme( '' ); ?>

	<div class="getting-started__header">
		<div class="col-md-10">
			<h2><?php echo esc_html( $trekking_blocks_theme ); ?></h2>
			<p><?php esc_html_e('Version: ', 'trekking-blocks'); ?><?php echo esc_html($trekking_blocks_theme['Version']);?></p>
		</div>
		<div class="col-md-2">
			<div class="btn_box">
				<a class="button-primary" href="<?php echo esc_url( TREKKING_BLOCKS_SUPPORT ); ?>" target="_blank"><?php esc_html_e('Support', 'trekking-blocks'); ?></a>
				<a class="button-primary" href="<?php echo esc_url( TREKKING_BLOCKS_REVIEW ); ?>" target="_blank"><?php esc_html_e('Review', 'trekking-blocks'); ?></a>
			</div>
		</div>
	</div>

	<div class="wrap getting-started">
		<div class="container">
			<div class="col-md-9">
				<div class="leftbox">
					<h3><?php esc_html_e('Documentation','trekking-blocks'); ?></h3>
					<p><?php $trekking_blocks_theme = wp_get_theme(); 
						echo wp_kses_post( apply_filters( 'description', esc_html( $trekking_blocks_theme->get( 'Description' ) ) ) );
					?></p>

					<h4><?php esc_html_e('Edit Your Site','trekking-blocks'); ?></h4>
					<p><?php esc_html_e('Now create your website with easy drag and drop powered by gutenburg.','trekking-blocks'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( admin_url() . 'site-editor.php' ); ?>" target="_blank"><?php esc_html_e('Edit Your Site','trekking-blocks'); ?></a>

					<h4><?php esc_html_e('Visit Your Site','trekking-blocks'); ?></h4>
					<p><?php esc_html_e('To check your website click here','trekking-blocks'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( home_url() ); ?>" target="_blank"><?php esc_html_e('Visit Your Site','trekking-blocks'); ?></a>

					<h4><?php esc_html_e('Theme Documentation','trekking-blocks'); ?></h4>
					<p><?php esc_html_e('Check the theme documentation to easily set up your website.','trekking-blocks'); ?></p>
					<a class="button-primary" href="<?php echo esc_url( TREKKING_BLOCKS_FREE_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation','trekking-blocks'); ?></a>
				</div>
       	</div>
			<div class="col-md-3">
				<h3><?php echo esc_html(TREKKING_BLOCKS_THEME_NAME); ?></h3>
				<img class="trekking_blocks_img_responsive" style="width: 100%;" src="<?php echo esc_url( $trekking_blocks_theme->get_screenshot() ); ?>" />
				<div class="pro-links">
					<hr>
			    	<a class="button-primary livedemo" href="<?php echo esc_url( TREKKING_BLOCKS_LIVE_DEMO ); ?>" target="_blank"><?php esc_html_e('Live Demo', 'trekking-blocks'); ?></a>
					<a class="button-primary buynow" href="<?php echo esc_url( TREKKING_BLOCKS_BUY_PRO ); ?>" target="_blank"><?php esc_html_e('Buy Now', 'trekking-blocks'); ?></a>
					<a class="button-primary docs" href="<?php echo esc_url( TREKKING_BLOCKS_PRO_DOC ); ?>" target="_blank"><?php esc_html_e('Documentation', 'trekking-blocks'); ?></a>
					<hr>
				</div>
				<ul style="padding-top:10px">
					<li class="upsell-trekking_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Responsive Design', 'trekking-blocks');?> </li>                 
					<li class="upsell-trekking_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Demo Importer', 'trekking-blocks');?> </li>
					<li class="upsell-trekking_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Section Reordering', 'trekking-blocks');?> </li>
					<li class="upsell-trekking_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Contact Page Template', 'trekking-blocks');?> </li>
					<li class="upsell-trekking_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Multiple Blog Layouts', 'trekking-blocks');?> </li>
					<li class="upsell-trekking_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Unlimited Color Options', 'trekking-blocks');?> </li>
					<li class="upsell-trekking_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Cross Browser Support', 'trekking-blocks');?> </li>
					<li class="upsell-trekking_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Detailed Documentation Included', 'trekking-blocks');?> </li>
					<li class="upsell-trekking_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('WPML Compatible (Translation Ready)', 'trekking-blocks');?> </li>
					<li class="upsell-trekking_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Woo-commerce Compatible', 'trekking-blocks');?> </li>
					<li class="upsell-trekking_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Full Support', 'trekking-blocks');?> </li>
					<li class="upsell-trekking_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('10+ Sections', 'trekking-blocks');?> </li>
					<li class="upsell-trekking_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('SEO Friendly', 'trekking-blocks');?> </li>
               <li class="upsell-trekking_blocks"> <div class="dashicons dashicons-yes"></div> <?php esc_html_e('Supper Fast', 'trekking-blocks');?> </li>
            </ul>
        	</div>
		</div>
	</div>

<?php }?>