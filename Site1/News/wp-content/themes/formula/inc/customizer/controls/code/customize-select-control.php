<?php
/**
 * Customize select control class.
 *
 * @package formula
 *
 * @see     WP_Customize_Control
 * @access  public
 */

/**
 * Class formula_Customize_Select_Control
 */
class formula_Customize_Select_Control extends formula_Customize_Base_Control {

	/**
	 * Customize control type.
	 *
	 * @access public
	 * @var    string
	 */
	public $type = 'formula-select';

	/**
	 * Renders the Underscore template for this control.
	 *
	 * @see    WP_Customize_Control::print_template()
	 * @access protected
	 * @return void
	 */
	protected function content_template() {
		?>

		<# if ( ! data.choices ) {
			return;
		} #>

			<label>

				<# if ( data.label ) { #>
					<span class="customize-control-title">{{ data.label }}</span>
				<# } #>

				<# if ( data.description ) { #>
					<span class="description customize-control-description">{{{ data.description }}}</span>
				<# } #>

				<select {{{ data.link }}}>

					<# for ( key in data.choices ) { #>

						<option value="{{ key }}" <# if ( key === data.value ) { #> checked="checked" <# } #>>{{ data.choices[ key ] }}</option>

					<# } #>

				</select>

			</label>
		<?php
	}

	/**
	 * Render content is still called, so be sure to override it with an empty function in your subclass as well.
	 */
	protected function render_content() {

	}

}
