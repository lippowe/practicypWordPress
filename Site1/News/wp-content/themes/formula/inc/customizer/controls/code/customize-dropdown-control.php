<?php
/**
 * Customize Base control class.
 *
 * @package formula
 *
 * @see     WP_Customize_Control
 * @access  public
 */

/**
 * Class formula_Customize_Dropdown_Control
 */
class formula_Customize_Dropdown_Control extends WP_Customize_Control {
    
	/*Portfolio Category*/
	private $options = false;

    public function __construct($manager, $id, $args = array(), $options = array())
    {
        $this->options = $options;

        parent::__construct( $manager, $id, $args );
    }

	/**
	 * Render the control's content.
	 *
	 * Allows the content to be overriden without having to rewrite the wrapper.
	 *
	 * @sincludee   11/14/2012
	 * @return  void
	 */
	//show portfolio customizer categories
	public function render_content(){
        // call wp_dropdown_cats to get data and add to select field
		add_action( 'wp_dropdown_cats', array( $this, 'wp_dropdown_cats' ) );
		
		// Set defaults
		$this->defaults = array(
			'show_option_none' => __( 'None','formula' ),
			'orderby'          => 'name',
			'hide_empty'       => 0,
			'id'               => $this->id,
			'selected'         => $this->value(),
			'taxonomy'		   => 'portfolio_categories'
		);
		?>
		<label>
			<span class="customize-control-title"><?php echo esc_html( $this->label ); ?></span>
			    <?php //print_r($cats); ?>
				<?php wp_dropdown_categories(Array ( 'show_option_none' => 'None','orderby' => 'name', 'hide_empty'=> 0 ,'id' => 'tax_project', 'taxonomy'=> 'portfolio_categories' )); ?>
		</label>
		<?php
		
		
	}
	/**
     * Replace WP default dropdown
     *
     * @sincludee   11/14/2012
     * @return  String $output
     */
    public function wp_dropdown_cats( $output ){
	  $output = str_replace( '<select', '<select multiple ' . $this->get_link(), $output );
	  return $output;
    }
	
	
}