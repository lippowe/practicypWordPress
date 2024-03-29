<?php
/**
 * Useful Plugin Panel
 *
 * @package formula
 */
?>
<div id="useful-plugin-panel" class="panel-left">
	<?php
	$formula_free_plugins = array(
		'contact-form-7'               => array(
			'name'     => 'Contact form 7',
			'slug'     => 'contact-form-7',
			'filename' => 'contact-form-7.php',
		),
		'team-builder-member-showcase' => array(
			'name'     => 'Team Builder',
			'slug'     => 'team-builder-member-showcase',
			'filename' => 'team-builder-member-showcase.php',
		),
		'blog-filter'                  => array(
			'name'     => 'Blog Filter',
			'slug'     => 'blog-filter',
			'filename' => 'blog-filter.php',
		),
	);
	if ( ! empty( $formula_free_plugins ) ) {
		?>
		<div class="recomended-plugin-wrap">
		<?php
		foreach ( $formula_free_plugins as $formula_plugin ) {
			$formula_info = formula_call_plugin_api( $formula_plugin['slug'] );
			?>
			<div class="recom-plugin-wrap w-3-col">
				<div class="plugin-title-install clearfix">
					<span class="title" title="<?php echo esc_attr( $formula_plugin['name'] ); ?>">
						<?php echo esc_html( $formula_plugin['name'] ); ?>	
					</span>
					<?php if ( $formula_plugin['slug'] == 'contact-form-7' ) : ?>
					<p><?php esc_html_e( 'Contact form 7 is popular plugin. And formula theme is fully compatible with this popular plugin. you can make an amazing contact form on your website by using it.', 'formula' ); ?></p>
					<?php endif; ?>

					<?php if ( $formula_plugin['slug'] == 'team-builder-member-showcase' ) : ?>
					<p><?php esc_html_e( 'Team Builder Member Showcase is a responsive block builder plugin that can help you create “Meet the Team” page or section for your WordPress website.', 'formula' ); ?></p>
					<?php endif; ?>

					<?php if ( $formula_plugin['slug'] == 'blog-filter' ) : ?>
					<p><?php esc_html_e( 'The Blog Filter is best post filtering plugin for WordPress.  It can filter your blog posts according to categories and tags. All your posts will be shown in beautiful grid layout.', 'formula' ); ?></p>
					<?php endif; ?>

					<?php
					echo '<div class="button-wrap">';
					echo formula_Getting_Started_Page_Plugin_Helper::instance()->get_button_html( $formula_plugin['slug'] );
					echo '</div>';
					?>
				</div>
			</div>
			</br>
			<?php
		}
		?>
		</div>
		<?php
	}
	?>
</div>
