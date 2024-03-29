<?php
/**
 * Upgrade to pro options
 */
function formula_upgrade_pro_options( $wp_customize ) {

	$wp_customize->add_section(
		'upgrade_premium',
		array(
			'title'    => __( 'About Theme', 'formula' ),
			'priority' => 1,
		)
	);

	class formula_Pro_Button_Customize_Control extends WP_Customize_Control {
		public $type = 'upgrade_premium';

		function render_content() {
			?>
			<div class="pro_info">
				<ul>
					<li><a class="upgrade-to-pro" href="<?php echo esc_url( 'https://awplife.com/wordpress-themes/formula-premium/' ); ?>" target="_blank"><i class="dashicons dashicons-cart"></i><?php esc_html_e( 'Go To Pro', 'formula' ); ?> </a></li>

					<!--<li><a class="documentation" href="<?php echo esc_url( 'https://awplife.com/docs/formula/' ); ?>" target="_blank"><i class="dashicons dashicons-visibility"></i><?php esc_html_e( 'Theme Documentation', 'formula' ); ?> </a></li>-->

					<li><a class="free-pro" href="<?php echo esc_url( 'https://awplife.com/wordpress-themes/formula-premium/#pricing-section' ); ?>" target="_blank"><i class="dashicons dashicons-admin-tools"></i><?php esc_html_e( 'Free Vs Pro', 'formula' ); ?> </a></li>

					<li><a class="support" href="<?php echo esc_url( 'https://awplife.com/contact' ); ?>" target="_blank"><i class="dashicons dashicons-lightbulb"></i><?php esc_html_e( 'Support Forum', 'formula' ); ?> </a></li>

					<li><a class="rate-us" href="<?php echo esc_url( 'https://wordpress.org/themes/formula/' ); ?>" target="_blank"><i class="dashicons dashicons-star-filled"></i><?php esc_html_e( 'Rate Us With Heart', 'formula' ); ?> </a></li>
				</ul>
			</div>
			<?php
		}
	}

	$wp_customize->add_setting(
		'pro_info_buttons',
		array(
			'capability'        => 'edit_theme_options',
			'sanitize_callback' => 'formula_sanitize_text',
		)
	);

	$wp_customize->add_control(
		new formula_Pro_Button_Customize_Control(
			$wp_customize,
			'pro_info_buttons',
			array(
				'section' => 'upgrade_premium',
			)
		)
	);
}
add_action( 'customize_register', 'formula_upgrade_pro_options' );
