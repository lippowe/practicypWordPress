<?php
/**
 * Getting Started Panel.
 *
 * @package formula
 */
?>
<div id="getting-started-panel" class="panel-left visible">
	<div class="panel-aside panel-column">
	<?php
	$formula_free_plugins = array(
		'awp-companion' => array(
			'name'     => 'AWP Companion',
			'slug'     => 'awp-companion',
			'filename' => 'awp-companion.php',
		),
	);
	if ( ! empty( $formula_free_plugins ) ) {
	?>
		<div class="recomended-plugin-wrap">
		<?php
		foreach ( $formula_free_plugins as $formula_plugin ) {
			$formula_info = formula_call_plugin_api( $formula_plugin['slug'] ); 
		?>
			<h4 title="">
				<?php esc_html_e( 'Companion Plugin', 'formula' ); ?>
			</h4>
			<p class="mt-0"><?php esc_html_e( 'AWP Companion Plugin requires to show all the front page features and Customization setting of Front Page.', 'formula' ); ?></p>
			<?php
			echo '<div class="mt-12">';
			echo formula_Getting_Started_Page_Plugin_Helper::instance()->get_button_html( $formula_plugin['slug'] );
			echo '</div>';
			?>

			</br>
			<?php
		}
		?>
		</div>
		<?php
	}
	?>
	</div> 
	<div class="panel-aside panel-column">
		<h4><?php esc_html_e( 'Go to the Customizer', 'formula' ); ?></h4>
		<p><?php esc_html_e( 'Using the WordPress Customizer you can easily customize every single aspect of the theme. Because this theme provides advanced settings to control the theme layout through the customizer.', 'formula' ); ?></p>
		<a class="button button-primary" target="_blank" href="<?php echo esc_url( admin_url( 'customize.php' ) ); ?>" title="<?php esc_attr_e( 'Visit the Support', 'formula' ); ?>"><?php esc_html_e( 'Go to the Customizer', 'formula' ); ?></a>
	</div>
</div>