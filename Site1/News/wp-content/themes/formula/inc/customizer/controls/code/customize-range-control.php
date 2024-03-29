<?php
/**
	formula Range
 */
  if ( ! class_exists( 'WP_Customize_Control' ) ) {
	return;
}
	class formula_Customize_Range_Control extends WP_Customize_Control {

		public $type = 'formula-range-slider';

		public function to_json() {
			if ( ! empty( $this->setting->default ) ) {
				$this->json['default'] = $this->setting->default;
			} else {
				$this->json['default'] = false;
			}
			parent::to_json();
		}

		public function enqueue() {
			wp_enqueue_script( 'formula-range-slider', FORMULA_THEME_URL . '/inc/customizer/controls/js/range-control.js', array( 'jquery' ), '', true );
			wp_enqueue_style( 'formula-range-slider', FORMULA_THEME_URL . '/inc/customizer/controls/css/range-control.css' );
		}

		public function render_content() {
		?>
			<label>
				<?php if ( ! empty( $this->label ) ) : ?>
					<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
				<?php endif;
				if ( ! empty( $this->description ) ) : ?>
					<span class="description customize-control-description"><?php echo esc_html( $this->description ); ?></span>
				<?php endif; ?>
				<div id="<?php echo esc_attr( $this->id ); ?>">
					<div class="formula-range-slider">
						<input class="formula-range-slider-range" type="range" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs(); $this->link(); ?> />
						<input class="formula-range-slider-value" type="number" value="<?php echo esc_attr( $this->value() ); ?>" <?php $this->input_attrs(); $this->link(); ?> />
						<?php if ( ! empty( $this->setting->default ) ) : ?>
							<span class="formula-range-reset-slider" title="<?php esc_attr_e( 'Reset', 'formula' ); ?>"><span class="dashicons dashicons-image-rotate"></span></span>
						<?php endif;?>
					</div>
				</div>
			</label>
		<?php }

	}
