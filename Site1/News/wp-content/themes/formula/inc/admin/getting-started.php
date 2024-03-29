<?php
/**
 * Getting Started Page.
 *
 * @package formula
 */

require get_template_directory() . '/inc/admin/class-getting-start-plugin-helper.php';

// Adding Getting Started Page in admin menu.

if ( ! function_exists( 'formula_getting_started_menu' ) ) :
	function formula_getting_started_menu() {
		$formula_plugin_count = null;
		if ( ! is_plugin_active( 'awp-companion/awp-companion.php' ) || ! is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) ) :
			$formula_plugin_count = '<span class="awaiting-mod action-count">1</span>';
			endif;
		/* translators: %1$s %2$s: about */
		$title = sprintf( esc_html__( 'About %1$s %2$s', 'formula' ), esc_html( FORMULA_THEME_NAME ), $formula_plugin_count );
		/* translators: %1$s: welcome page */
		add_theme_page( sprintf( esc_html__( 'Welcome to %1$s', 'formula' ), esc_html( FORMULA_THEME_NAME ), esc_html( FORMULA_THEME_VERSION ) ), $title, 'edit_theme_options', 'formula-getting-started', 'formula_getting_started_page' );
	}
endif;
add_action( 'admin_menu', 'formula_getting_started_menu' );

// Load Getting Started styles in the admin.
if ( ! function_exists( 'formula_getting_started_admin_scripts' ) ) :
	function formula_getting_started_admin_scripts( $hook ) {
		// Load styles only on our page.
		if ( 'appearance_page_formula-getting-started' != $hook ) {
			return;
		}

		wp_enqueue_style( 'formula-getting-started', get_template_directory_uri() . '/inc/admin/css/getting-started.css', false, FORMULA_THEME_VERSION );
		wp_enqueue_script( 'plugin-install' );
		wp_enqueue_script( 'updates' );
		wp_enqueue_script( 'formula-getting-started', get_template_directory_uri() . '/inc/admin/js/getting-started.js', array( 'jquery' ), FORMULA_THEME_VERSION, true );
		wp_enqueue_script( 'formula-recommended-plugin-install', get_template_directory_uri() . '/inc/admin/js/recommended-plugin-install.js', array( 'jquery' ), FORMULA_THEME_VERSION, true );
		wp_localize_script( 'formula-recommended-plugin-install', 'formula_start_page', array( 'activating' => __( 'Activating ', 'formula' ) ) );
	}
endif;
add_action( 'admin_enqueue_scripts', 'formula_getting_started_admin_scripts' );


// Plugin API.
if ( ! function_exists( 'formula_call_plugin_api' ) ) :
	function formula_call_plugin_api( $slug ) {
		require_once ABSPATH . 'wp-admin/includes/plugin-install.php';
		$call_api = get_transient( 'formula_about_plugin_info_' . $slug );

		if ( false === $call_api ) {
				$call_api = plugins_api(
					'plugin_information',
					array(
						'slug'   => $slug,
						'fields' => array(
							'downloaded'        => false,
							'rating'            => false,
							'description'       => false,
							'short_description' => true,
							'donate_link'       => false,
							'tags'              => false,
							'sections'          => true,
							'homepage'          => true,
							'added'             => false,
							'last_updated'      => false,
							'compatibility'     => false,
							'tested'            => false,
							'requires'          => false,
							'downloadlink'      => false,
							'icons'             => true,
						),
					)
				);
				set_transient( 'formula_about_plugin_info_' . $slug, $call_api, 30 * MINUTE_IN_SECONDS );
		}

			return $call_api;
	}
endif;

// Callback function for admin page.
if ( ! function_exists( 'formula_getting_started_page' ) ) :
	function formula_getting_started_page() { ?>
	<div class="wrap getting-started">
		<h2 class="notices"></h2>
		<div class="intro-wrap">
			<div class="intro">
				<h3>
					<?php
					/* translators: %1$s %2$s: welcome message */
					printf( esc_html__( 'Welcome to %1$s - Version %2$s', 'formula' ), esc_html( FORMULA_THEME_NAME ), esc_html( FORMULA_THEME_VERSION ) );
					?>
				</h3>
				<p><?php esc_html_e( 'formula is a creative and professional multipurpose WordPress theme. Which is Best for Business, Finance, Consultant, Marketing, Digital Agency, Industries, Online Shops and many other various website types.', 'formula' ); ?></p>
			</div>
			<div class="intro right">
				<iframe width="100%" height="315" src="https://www.youtube.com/embed/N43HKCGVRVg" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
			</div>
		</div>
		<div class="panels">
			<ul class="inline-list">
				<li class="current">
					<a id="getting-started-panel" href="#">
						<?php
							esc_html_e( 'Getting Started', 'formula' );
							if ( ( ! is_plugin_active( 'awp-companion/awp-companion.php' ) ) ) :
								?>
							<span class="plugin-not-active">1</span>
							<?php endif; ?>
					</a>
				</li>
				<li class="recommended-plugins-active">
					<a id="plugins" href="#">
							<?php
							esc_html_e( 'Recommended Actions', 'formula' );
							if ( ( ! is_plugin_active( 'one-click-demo-import/one-click-demo-import.php' ) ) ) :
								?>
							<span class="plugin-not-active">1</span>
							<?php endif; ?>
					</a>
				</li>
				<li>
					<a id="useful-plugin-panel" href="#">
							<?php esc_html_e( 'Useful Plugins', 'formula' ); ?>
					</a>
				</li>
			</ul>
			<div id="panel" class="panel">
					<?php require get_template_directory() . '/inc/admin/tabs/getting-started-panel.php'; ?>
					<?php require get_template_directory() . '/inc/admin/tabs/recommended-plugins-panel.php'; ?>
					<?php require get_template_directory() . '/inc/admin/tabs/useful-plugin-panel.php'; ?>
			</div>
		</div>
	</div>
		<?php
	}
endif;