<?php
// formula Color scripts
if( !function_exists('formula_scripts_function')) {
	function formula_scripts_function(){
		// css
		//wp_enqueue_style('style', get_stylesheet_uri() );
		
		if(get_theme_mod('formula_custom_color') == true) {
			formula_custom_color_fun();
		} 
	}
}
add_action('wp_enqueue_scripts','formula_scripts_function');

function formula_custom_enqueue_scripts(){
	//Customizer custom Css for theme style (hide bullets/radio button)
	wp_enqueue_style('formula-customize-css', FORMULA_THEME_URL . '/assets/css/customize.css');
}
add_action( 'admin_enqueue_scripts', 'formula_custom_enqueue_scripts' );
 
// footer custom script
function formula_custom_script() {
	$formula_custom_color = get_theme_mod('formula_custom_color',false);
	if($formula_custom_color == true) {
		formula_custom_color_fun();
	}
}
add_action('wp_footer','formula_custom_script');
?>