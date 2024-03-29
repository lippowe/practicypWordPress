<?php
/**
 * Video Metabox settings class.
 *
 * @package Wpzoom_Portfolio
 */

// Exit if accessed directly.
defined( 'ABSPATH' ) || exit;

/**
 * Extends the functionality of the base plugin to add new features.
 *
 * @since 1.0.0
 */

 class WPZOOM_Portfolio_Metaboxes_Upsell {

	/**
	 * The Constructor.
	 */
	public function __construct() {

		add_action( 'add_meta_boxes', array( $this, 'add_meta_box' ) );
		add_action( 'admin_enqueue_scripts', array( $this, 'enqueue_admin_scripts' ) );

	}

	public function enqueue_admin_scripts() {

		$current_screen = get_current_screen();
		if( $current_screen->id !== 'portfolio_item' ) {
			return;
		}

        wp_enqueue_style(
            'wpzoom-video-embed',
            WPZOOM_PORTFOLIO_URL . 'assets/admin/css/admin-video.css',
            array(),
            WPZOOM_PORTFOLIO_VERSION
        );

	}

	public function add_meta_box( $post_type ) {

		global $wp_meta_boxes;

		if ( ! isset( $wp_meta_boxes['portfolio_item']['normal']['high']['wpzoom_portfolio_video_settings'] ) ) {
			add_meta_box(
				'wpzoom_portfolio_video_settings',
				'Video Settings [WPZOOM Portfolio] <span>PRO Feature</span>',
				array( $this, 'video_settings' ),
				'portfolio_item',
				'normal',
				'high'
			);
		}

	}


	public function video_settings( $post ) {

		$this->get_tabs_inline_style();	

		?>
		<div class="portfolio-tabs">
			<ul class="metabox-tabs">
				<li data-tab-order="0" class="tab ui-tabs-tab ui-corner-top ui-state-default ui-tab ui-tabs-active ui-state-active">
					<a class="active" href="#portfolio-popup"><?php _e( 'Video Lightbox', 'wpzoom-portfolio'); ?></a>
				</li>
				<li data-tab-order="1" class="tab">
					<a href="#portfolio-background"><?php _e( 'Video Background on Hover', 'wpzoom-portfolio'); ?></a>
				</li>
			</ul>

			<div class="zoom-tab" id="portfolio-popup">

				<div class="radio-switcher">

					<p class="description">Using this option you can display a video in a lightbox which can be opened clicking on the <strong>Play</strong> button in galleries.</p>

					<h3><?php _e('Select Video Source:', 'wpzoom-portfolio'); ?></h3>

					<input type="radio" name="wpzoom_portfolio_popup_video_type" id="video_6" value="self_hosted">
					<label for="video_6" class="label_vid_self"><?php _e( 'Self-Hosted Video', 'wpzoom-portfolio' ) ?></label>

					&nbsp;&nbsp;&nbsp;<input type="radio" id="video_7" name="wpzoom_portfolio_popup_video_type" value="external_hosted" checked>
					<label class="label_vid_url" for="video_7"><strong class="wpz_video_embed_icons"><span class="wpzoom-youtube-play-icon"><svg height="100%" style="fill-rule:evenodd;clip-rule:evenodd;stroke-linejoin:round;stroke-miterlimit:2;" version="1.1" viewBox="0 0 512 512" width="100%" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:serif="http://www.serif.com/" xmlns:xlink="http://www.w3.org/1999/xlink"><g><path d="M501.299,132.766c-5.888,-22.03 -23.234,-39.377 -45.264,-45.264c-39.932,-10.701 -200.037,-10.701 -200.037,-10.701c0,0 -160.105,0 -200.038,10.701c-22.025,5.887 -39.376,23.234 -45.264,45.264c-10.696,39.928 -10.696,123.236 -10.696,123.236c0,0 0,83.308 10.696,123.232c5.888,22.03 23.239,39.381 45.264,45.268c39.933,10.697 200.038,10.697 200.038,10.697c0,0 160.105,0 200.037,-10.697c22.03,-5.887 39.376,-23.238 45.264,-45.268c10.701,-39.924 10.701,-123.232 10.701,-123.232c0,0 0,-83.308 -10.701,-123.236Z" style="fill:#ed1f24;fill-rule:nonzero;"/><path d="M204.796,332.803l133.018,-76.801l-133.018,-76.801l0,153.602Z" style="fill:#fff;fill-rule:nonzero;"/></g></svg></span><?php _e( 'YouTube', 'wpzoom-portfolio' ) ?> <span class="wpz_embed_sep">/</span> <span class="wpzoom-vimeo-icon"><svg enable-background="new 0 0 32 32" height="18px" id="Layer_1" version="1.0" viewBox="0 0 32 32" width="18px" xml:space="preserve" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink"><path clip-rule="evenodd" d="M31.862,7.204c0.239-1.359,0.233-2.759-0.593-3.815  c-1.155-1.482-3.612-1.537-5.296-1.275c-1.371,0.212-6.002,2.287-7.578,7.252c2.792-0.216,4.257,0.204,3.988,3.324  c-0.114,1.307-0.764,2.737-1.488,4.108c-0.838,1.58-2.409,4.685-4.469,2.447c-1.855-2.014-1.716-5.865-2.141-8.43  c-0.236-1.439-0.485-3.232-0.95-4.712c-0.4-1.273-1.318-2.808-2.44-3.14c-1.206-0.36-2.697,0.202-3.573,0.725  C4.535,5.352,2.412,7.717,0,9.668v0.183c0.479,0.463,0.605,1.224,1.311,1.327c1.659,0.248,3.241-1.569,4.346,0.321  c0.67,1.156,0.879,2.424,1.31,3.669c0.574,1.659,1.019,3.467,1.489,5.375c0.793,3.231,1.771,8.062,4.523,9.244  c1.405,0.604,3.516-0.205,4.584-0.848c2.896-1.739,5.151-4.26,7.082-6.824C29.06,16.046,31.496,9.17,31.862,7.204z" fill="#00ADEF" fill-rule="evenodd"/><g/><g/><g/><g/><g/><g/></svg></span><?php _e( 'Vimeo', 'wpzoom-portfolio' ) ?></strong></label>

				</div>

				<div class="wpzoom_external_hosted switch-wrapper" style="display: inline-block; width: 100%;">
					<p>
						<label for="wpzoom_portfolio_video_popup_url"><strong><?php _e( 'Insert Video URL', 'wpzoom-portfolio' ); ?></strong>
							<em><?php _e( '(YouTube and Vimeo only)', 'wpzoom-portfolio' ); ?></em>
						</label>

						<span class="preview-video-input-span">
							<input type="text" id="wpzoom_portfolio_video_popup_url" class="preview-video-input widefat" name="wpzoom_portfolio_video_popup_url" data-response-type="thumb" value="https://vimeo.com/211672238"/>
						</span>
					</p>
					<div class="wpzoom_video_external_preview">
						<?php if( has_post_thumbnail() ) { ?>
						<div style="float: left;">
							<img style="float: left;" src="https://www.wpzoom.com/wp-content/uploads/2023/05/vimeo.jpeg" width="400">
							<small style="float: left; clear: both; margin-top: 10px;" class="button button-disabled">This is the Featured Image</small>
						</div>
						<?php } ?>
					</div>
				</div>

			</div>
		</div>
		<div class="wpzoom-overlay-metabox-upsell">
			<a href="https://www.wpzoom.com/plugins/portfolio-pro/?utm_source=wpadmin&utm_medium=portfolio-free&utm_campaign=video-metabox-free" target="_blank">Get WPZOOM Portfolio PRO &rarr;</a>
		</div>
	<?php
	}

	/**
	 * Inline styles for tabs that a rendered in metaboxes.
	 */
	public function get_tabs_inline_style(){
		?>
		<style type="text/css">

            .wpz_list {
                font-size: 12px;
            }

            .wpz_border {
                border-bottom: 1px solid #EEEEEE;
                padding: 0 0 10px;
            }

			ul.metabox-tabs {
				margin-bottom: 25px;
				padding: 0;
                display: flex;
                border-bottom: 1px solid #e1e1e1;
                justify-content: flex-start;
			}
			ul.metabox-tabs li {
				list-style: none;
                padding: 15px;
                margin: 0 10px 0 0;
			}
			ul.metabox-tabs li.tab a {
 				outline: none;
                font-weight: 600;
				text-decoration: none;
 			}

            ul.metabox-tabs li a:hover {
                color: var(--wp-admin-theme-color);
            }

			ul.metabox-tabs li.ui-tabs-active  {
                border-bottom: 1px solid var(--wp-admin-theme-color);
                box-shadow: inset 0 0 0 var(--wp-admin-border-width-focus) transparent,inset 0 -1.5px 0 0 var(--wp-admin-theme-color)
			}

			ul.metabox-tabs li.link {
				margin-left: 4px;
			}
			ul.metabox-tabs li.link a {
				text-decoration: none;
			}
			ul.metabox-tabs li.link a:hover {
				text-decoration: underline;
			}
			ul.metabox-tabs {
			}
			ul.metabox-tabs li a {
				color: #454545;
			}

			.zoom-tab {
				padding: 10px 0 15px;
			}
			.zoom-tab .dnt{
				display: none;
			}
			.preview-video-input-span {
				position: relative;
			}
			.preview-video-input-span img.wpzoom-preloader {
				position: absolute;
				right: 6px;
				top: 0;
			}
			.wpz_video_embed_icons i {
				font-size: 20px;
				margin: 0 5px 0 0;
				vertical-align: middle;
			}
			.wpz_video_embed_icons .fa-youtube-play {
				color: #cc181e;
			}
			.wpz_video_embed_icons .fa-vimeo {
				color: #1ab7ea;
			}
			.wpz_embed_sep {
				color: #ccc;
				font-weight: normal;
				margin: 0 5px;
			}
		</style>
		<?php
	}
 }
 
new WPZOOM_Portfolio_Metaboxes_Upsell;