<?php
/** 
 * Customize Heading control class.
 *
 * @package formula
 * 
 * @see     WP_Customize_Control
 * @access  public
 */

/**
 * Class formula_Customize_Upgrade_Control
 */
class formula_Customize_Upgrade_Control extends formula_Customize_Base_Control {

	/**
	 * Customize control type.
	 *
	 * @access public
	 * @var    string
	 */
	public $type = 'formula-upgrade';

	/**
	 * Renders the Underscore template for this control.
	 *
	 * @see    WP_Customize_Control::print_template()
	 * @access protected
	 * @return void
	 */
	protected function content_template() {
		$upgrade_to_pro_link = 'https://awplife.com/wordpress-themes/formula-premium/';
		?>

		<div class="formula-upgrade-pro-message" style="display:none;";>
			<# if ( data.label ) { #><h4 class="customize-control-title"><?php echo wp_kses_post( 'Upgrade to <a href="'.$upgrade_to_pro_link.'" target="_blank" > Formula Pro </a> to add more', 'formula'); ?> {{{ data.label }}} <?php esc_html_e( 'and get the other premium features.', 'formula') ?></h4><# } #>
		</div>

		<?php
	}

	/**
	 * Render content is still called, so be sure to override it with an empty function in your subclass as well.
	 */
	protected function render_content() {

	}

}