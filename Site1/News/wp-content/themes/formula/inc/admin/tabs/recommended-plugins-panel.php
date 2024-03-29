<?php
/**
 * Recommended Plugins Panel
 *
 * @package formula
 */
?>
<div id="recommended-plugins-panel" class="panel-left">
	<?php
	$formula_free_plugins = array(
		'one-click-demo-import' => array(
			'name'     => 'one-click-demo-import',
			'slug'     => 'one-click-demo-import',
			'filename' => 'one-click-demo-import.php',
		),
	);
	if ( ! empty( $formula_free_plugins ) ) {
		?>
		<div class="recomended-plugin-wrap">

			<div class="recom-plugin-wrap mb-0">
				<div class="plugin-title-install clearfix">
					<span class="title" title="">
						<?php esc_html_e( 'Recommended Plugin', 'formula' ); ?>
					</span>
					<p><?php esc_html_e( 'Formula Theme is highly recommended OCDI Plugin for formula Theme, After installing it, you will be able to show all the Front-Page features and Multiple Pre-Defined Templates for your Website.', 'formula' ); ?></p>
					<?php
					foreach ( $formula_free_plugins as $formula_plugin ) {
						$formula_info = formula_call_plugin_api( $formula_plugin['slug'] );
						echo '<div class="button-wrap">';
						echo formula_Getting_Started_Page_Plugin_Helper::instance()->get_button_html( $formula_plugin['slug'] );
						echo '</div>';
					}
					?>
				</div>
			</div>
			</br>

		</div>
		<?php
	}
	?>
</div>
