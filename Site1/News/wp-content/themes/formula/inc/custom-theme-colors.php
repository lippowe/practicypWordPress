<?php
if( ! function_exists( 'formula_custom_theme_colors_options' ) ):
function formula_custom_theme_colors_options() {

    $custom_color_css = '';

	/**
	 * 1. Primary Menu Color Settings
	*/
	if(get_theme_mod('formula_colors_menu_disable', false) == true):
		// a. Menu Color.
		if(get_theme_mod('formula_colors_menu_text') != null):
			$custom_color_css .=".header .menu>li>a , .header .menu>li>span.icon{
			color: " .esc_attr( get_theme_mod('formula_colors_menu_text', '#000') )."; }\n";
		endif;
		if(get_theme_mod('formula_colors_menu_hover') != null):
			$custom_color_css .=".header .menu>.menu-item:hover>a, .header .menu>.menu-item:hover>span.icon {
			color: " .esc_attr( get_theme_mod('formula_colors_menu_hover', '#9cd0ff') )." !important; }\n";
		endif;
		if(get_theme_mod('formula_colors_menu_active') != null):
			$custom_color_css .= ".primary-menu li.current-menu-item>a,
			.primary-menu li.current-menu-item>.link-icon-wrapper>a	{
			color: " . esc_attr( get_theme_mod('formula_colors_menu_active', '#000') ) . " !important; }\n";
		endif;

		// b. SubMenu Color.
		if(get_theme_mod('formula_colors_submenu_text') != null):
			$custom_color_css .=".header .menu>.menu-item>.sub-menu>.menu-item>a{
			color: " .esc_attr( get_theme_mod('formula_colors_submenu_text', '#000') )." !important; }\n";
		endif;
		if(get_theme_mod('formula_colors_submenu_hover') != null):
			$custom_color_css .=".header .menu>.menu-item>.sub-menu>.menu-item>a:hover,
			.header .menu>.menu-item>.sub-menu>.menu-item>a:focus {
			color: " .esc_attr( get_theme_mod('formula_colors_submenu_hover', '#fff') )." !important; }\n";
		endif;
		if(get_theme_mod('formula_colors_submenu_bg') != null):
			$custom_color_css .= ".header .menu>.menu-item>.sub-menu {
			background-color: " . esc_attr( get_theme_mod('formula_colors_submenu_bg', '#fff') ) . "; }\n";
		endif;
	endif;

	/**
	 * 2. Content Colors Settings
	*/
	if(get_theme_mod('formula_colors_content_disable', false) == true):
		// a. Content Color headings + Paragraph
		if(get_theme_mod('formula_colors_content_h1') != null):
			$custom_color_css .= "body h1, .section-header .section-title {
			color: " . esc_attr( get_theme_mod('formula_colors_content_h1', '#000') ) . "; }\n";
		endif;
		if(get_theme_mod('formula_colors_content_h2') != null):
			$custom_color_css .= "body h2, .section-header .section-title, .callout-to-action .title {
			color: " . esc_attr( get_theme_mod('formula_colors_content_h2', '#000') ) . "; }\n";
		endif;
		if(get_theme_mod('formula_colors_content_h3') != null):
			$custom_color_css .= "body h3, .section h3 .entry-title a {
			color: " . esc_attr( get_theme_mod('formula_colors_content_h3', '#000') ) . "; }\n";
		endif;
		if(get_theme_mod('formula_colors_content_h4') != null):
			$custom_color_css .= "body h4, .service .post .entry-header .entry-title a, .team-caption h4 .name {
			color: " . esc_attr( get_theme_mod('formula_colors_content_h4', '#000') ) . "; }\n";
		endif;
		if(get_theme_mod('formula_colors_content_h5') != null):
			$custom_color_css .= "body h5, .portfolio .entry-title{
			color: " . esc_attr( get_theme_mod('formula_colors_content_h5', '#000') ) . "; }\n";
		endif;
		if(get_theme_mod('formula_colors_content_h6') != null):
			$custom_color_css .= "body h6 , .top-contact-info .desc-1{
			color: " . esc_attr( get_theme_mod('formula_colors_content_h6', '#000') ) . "; }\n";
		endif;
		// b. Paragraph
		if(get_theme_mod('formula_colors_content_p') != null):
			$custom_color_css .= "body .section p, .post .entry-content, .section span, .section-header .section-subtitle,
			.callout-to-action .callout-inner-txt .subtitle, .client-designation, .funfact-inner .description, 
			.team-module .designation, .footer-copyrights .site-info, .post .branding {
			color: " . esc_attr( get_theme_mod('formula_colors_content_p', '#000') ) . " !important; }\n";
		endif;
	endif;

	/**
	 * 3. Sidebar Widgets Colors Settings
	*/
	if (get_theme_mod('formula_colors_sidebar_disable', false) == true):
		if(get_theme_mod('formula_colors_sidebar_title') != null):
			$custom_color_css .= "body .sidebar h2 {
			color: " . esc_attr( get_theme_mod('formula_colors_sidebar_title', '#000') ) . "; }\n";
		endif;
		if(get_theme_mod('formula_colors_sidebar_text') != null):
			$custom_color_css .= "body .sidebar p {
			color: " . esc_attr( get_theme_mod('formula_colors_sidebar_text', '#000') ) . " !important; }\n";
		endif;
		if(get_theme_mod('formula_colors_sidebar_link') != null):
			$custom_color_css .= "body .sidebar a {
			color: " . esc_attr( get_theme_mod('formula_colors_sidebar_link', '#000') ) . " !important; }\n";
		endif;
		if(get_theme_mod('formula_colors_sidebar_hover') != null):
			$custom_color_css .= "body .sidebar a:hover, body .sidebar .widget a:hover, body .sidebar .widget a:focus {
			color: " . esc_attr( get_theme_mod('formula_colors_sidebar_hover', '#0074da') ) . " !important; }\n";
		endif;
	endif;

	/**
	 * 4. Footer Widgets Colors Settings
	*/
	if (get_theme_mod('formula_colors_footer_disable', false) == true):
		if(get_theme_mod('formula_colors_footer_title') != null):
			$custom_color_css .= ".footer h1 span, .footer h2 span, .footer h3 span, .footer h4 span, .footer h5 span,
			.site-footer .widget .widget-title{
			color: " . esc_attr( get_theme_mod('formula_colors_footer_title', '#fff') ) . " !important; }\n";
		endif;
		if(get_theme_mod('formula_colors_footer_text') != null):
			$custom_color_css .= "body .footer p, .site-info, .site-footer p, .site-footer .widget address > a,
			.site-footer .widget address > p > a, .site-footer .widget .post .entry-title a {
			color: " . esc_attr( get_theme_mod('formula_colors_footer_text', '#e0e0e0') ) . " !important; }\n";
		endif;
		if(get_theme_mod('formula_colors_footer_link') != null):
			$custom_color_css .= "body .footer a, .site-footer .widget li a {
			color: " . esc_attr( get_theme_mod('formula_colors_footer_link', '#5CA2DF') ) . " !important; }\n";
		endif;
		if(get_theme_mod('formula_colors_footer_hover') != null):
			$custom_color_css .= "body .footer a:hover, body .footer .widget a:hover, body .footer .widget a:focus {
			color: " . esc_attr( get_theme_mod('formula_colors_footer_hover', '#0074da') ) . " !important; }\n";
		endif;
	endif;

	wp_add_inline_style( 'formula-style', $custom_color_css );
}
endif;
add_action( 'wp_enqueue_scripts', 'formula_custom_theme_colors_options' );
