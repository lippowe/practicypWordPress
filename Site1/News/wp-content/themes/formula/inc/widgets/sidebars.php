<?php	
add_action( 'widgets_init', 'formula_widgets_init');
function formula_widgets_init() {

	/*sidebar*/
	register_sidebar( array(
		'name' => __('Sidebar widget area','formula'),
		'id' => 'sidebar_primary',
		'description' => __('Sidebar widget area','formula'),
		'before_widget' => '<div class="base card-holder double wow fadeInUp animated" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;"><aside id="%1$s" class="widget %2$s  card__image widget_categories" >',
		'after_widget' => '</aside></div>',
		'before_title' => '<h4 class="widget-title">',
		'after_title' => '</h4>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget First Column', 'formula' ),
		'id' => 'footer_widget_area_left',
		'description' => __( 'Footer Widget First Column', 'formula' ),
		'before_widget' => '<aside class="widget %2$s wow fadeInUp animated" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">',
		'after_widget' => '</aside>',
		'before_title' => '<div class=""><h4 class="widget-title">',
		'after_title' => '</h4><span></span></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Second Column', 'formula' ),
		'id' => 'footer_widget_area_center',
		'description' => __( 'Footer Widget Second Column', 'formula' ),
		'before_widget' => '<aside class="widget %2$s wow fadeInUp animated" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">',
		'after_widget' => '</aside>',
		'before_title' => '<div class=""><h4 class="widget-title">',
		'after_title' => '</h4><span></span></div>',
	) );
	
	register_sidebar( array(
		'name' => __( 'Footer Widget Third Column', 'formula' ),
		'id' => 'footer_widget_area_right',
		'description' => __( 'Footer Widget Third Column', 'formula' ),
		'before_widget' => '<aside class="widget %2$s wow fadeInUp animated" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">',
		'after_widget' => '</aside>',
		'before_title' => '<div class=""><h4 class="widget-title">',
		'after_title' => '</h4><span></span></div>',
	) );
	
	register_sidebar( array(
		'name' => __('WooCommerce sidebar widget area', 'formula' ),
		'id' => 'woocommerce',
		'description' => __( 'WooCommerce sidebar widget area', 'formula' ),
		'before_widget' => '<aside id="%1$s" class="widget %2$s wow fadeInUp animated" data-wow-delay="100ms" style="visibility: visible; animation-delay: 100ms; animation-name: fadeInUp;">',
		'after_widget' => '</aside>',
		'before_title' => '<div class=""><h4 class="widget-title">',
		'after_title' => '</h4></div>',
	) );
}	                     
