<?php

	$electronic_supermarket_tp_theme_css = "";

$electronic_supermarket_theme_lay = get_theme_mod( 'electronic_supermarket_tp_body_layout_settings','Full');
if($electronic_supermarket_theme_lay == 'Container'){
$electronic_supermarket_tp_theme_css .='body{';
	$electronic_supermarket_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
$electronic_supermarket_tp_theme_css .='}';
$electronic_supermarket_tp_theme_css .='@media screen and (max-width:575px){';
		$electronic_supermarket_tp_theme_css .='body{';
			$electronic_supermarket_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left: 0px';
		$electronic_supermarket_tp_theme_css .='} }';
$electronic_supermarket_tp_theme_css .='.page-template-front-page .menubar{';
	$electronic_supermarket_tp_theme_css .='position: static;';
$electronic_supermarket_tp_theme_css .='}';
$electronic_supermarket_tp_theme_css .='.scrolled{';
	$electronic_supermarket_tp_theme_css .='width: auto; left:0; right:0;';
$electronic_supermarket_tp_theme_css .='}';
}else if($electronic_supermarket_theme_lay == 'Container Fluid'){
$electronic_supermarket_tp_theme_css .='body{';
	$electronic_supermarket_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
$electronic_supermarket_tp_theme_css .='}';
$electronic_supermarket_tp_theme_css .='@media screen and (max-width:575px){';
		$electronic_supermarket_tp_theme_css .='body{';
			$electronic_supermarket_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left:0px';
		$electronic_supermarket_tp_theme_css .='} }';
$electronic_supermarket_tp_theme_css .='.page-template-front-page .menubar{';
	$electronic_supermarket_tp_theme_css .='width: 99%';
$electronic_supermarket_tp_theme_css .='}';		
$electronic_supermarket_tp_theme_css .='.scrolled{';
	$electronic_supermarket_tp_theme_css .='width: auto; left:0; right:0;';
$electronic_supermarket_tp_theme_css .='}';
}else if($electronic_supermarket_theme_lay == 'Full'){
$electronic_supermarket_tp_theme_css .='body{';
	$electronic_supermarket_tp_theme_css .='max-width: 100%;';
$electronic_supermarket_tp_theme_css .='}';
}

$electronic_supermarket_scroll_position = get_theme_mod( 'electronic_supermarket_scroll_top_position','Right');
if($electronic_supermarket_scroll_position == 'Right'){
$electronic_supermarket_tp_theme_css .='#return-to-top{';
    $electronic_supermarket_tp_theme_css .='right: 20px;';
$electronic_supermarket_tp_theme_css .='}';
}else if($electronic_supermarket_scroll_position == 'Left'){
$electronic_supermarket_tp_theme_css .='#return-to-top{';
    $electronic_supermarket_tp_theme_css .='left: 20px;';
$electronic_supermarket_tp_theme_css .='}';
}else if($electronic_supermarket_scroll_position == 'Center'){
$electronic_supermarket_tp_theme_css .='#return-to-top{';
    $electronic_supermarket_tp_theme_css .='right: 50%;left: 50%;';
$electronic_supermarket_tp_theme_css .='}';
}

    
//Social icon Font size
$electronic_supermarket_social_icon_fontsize = get_theme_mod('electronic_supermarket_social_icon_fontsize');
	$electronic_supermarket_tp_theme_css .='.media-links a i{';
$electronic_supermarket_tp_theme_css .='font-size: '.esc_attr($electronic_supermarket_social_icon_fontsize).'px;';
$electronic_supermarket_tp_theme_css .='}';

// site title font size option
$electronic_supermarket_site_title_font_size = get_theme_mod('electronic_supermarket_site_title_font_size', 25);{
$electronic_supermarket_tp_theme_css .='.logo h1 , .logo p a{';
	$electronic_supermarket_tp_theme_css .='font-size: '.esc_attr($electronic_supermarket_site_title_font_size).'px;';
$electronic_supermarket_tp_theme_css .='}';
}

//site tagline font size option
$electronic_supermarket_site_tagline_font_size = get_theme_mod('electronic_supermarket_site_tagline_font_size', 15);{
$electronic_supermarket_tp_theme_css .='.logo p{';
	$electronic_supermarket_tp_theme_css .='font-size: '.esc_attr($electronic_supermarket_site_tagline_font_size).'px;';
$electronic_supermarket_tp_theme_css .='}';
}


// related post
$electronic_supermarket_related_post_mob = get_theme_mod('electronic_supermarket_related_post_mob', true);
$electronic_supermarket_related_post = get_theme_mod('electronic_supermarket_remove_related_post', true);
$electronic_supermarket_tp_theme_css .= '.related-post-block {';
if ($electronic_supermarket_related_post == false) {
    $electronic_supermarket_tp_theme_css .= 'display: none;';
}
$electronic_supermarket_tp_theme_css .= '}';
$electronic_supermarket_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($electronic_supermarket_related_post == false || $electronic_supermarket_related_post_mob == false) {
    $electronic_supermarket_tp_theme_css .= '.related-post-block { display: none; }';
}
$electronic_supermarket_tp_theme_css .= '}';

// slider btn
$electronic_supermarket_slider_button_mob = get_theme_mod('electronic_supermarket_slider_button_mob', true);
$electronic_supermarket_slider_button = get_theme_mod('electronic_supermarket_slider_button', true);
$electronic_supermarket_tp_theme_css .= '#slider .more-btn {';
if ($electronic_supermarket_slider_button == false) {
    $electronic_supermarket_tp_theme_css .= 'display: none;';
}
$electronic_supermarket_tp_theme_css .= '}';
$electronic_supermarket_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($electronic_supermarket_slider_button == false || $electronic_supermarket_slider_button_mob == false) {
    $electronic_supermarket_tp_theme_css .= '#slider .more-btn { display: none; }';
}
$electronic_supermarket_tp_theme_css .= '}';

//return to header mobile				
$electronic_supermarket_return_to_header_mob = get_theme_mod('electronic_supermarket_return_to_header_mob', true);
$electronic_supermarket_return_to_header = get_theme_mod('electronic_supermarket_return_to_header', true);
$electronic_supermarket_tp_theme_css .= '.return-to-header{';
if ($electronic_supermarket_return_to_header == false) {
    $electronic_supermarket_tp_theme_css .= 'display: none;';
}
$electronic_supermarket_tp_theme_css .= '}';
$electronic_supermarket_tp_theme_css .= '@media screen and (max-width: 575px) {';
if ($electronic_supermarket_return_to_header == false || $electronic_supermarket_return_to_header_mob == false) {
    $electronic_supermarket_tp_theme_css .= '.return-to-header{ display: none; }';
}
$electronic_supermarket_tp_theme_css .= '}';

//footer image
$electronic_supermarket_footer_widget_image = get_theme_mod('electronic_supermarket_footer_widget_image');
if($electronic_supermarket_footer_widget_image != false){
$electronic_supermarket_tp_theme_css .='#footer{';
	$electronic_supermarket_tp_theme_css .='background: url('.esc_attr($electronic_supermarket_footer_widget_image).');';
$electronic_supermarket_tp_theme_css .='}';
}

// related product
$electronic_supermarket_related_product = get_theme_mod('electronic_supermarket_related_product',true);
if($electronic_supermarket_related_product == false){
$electronic_supermarket_tp_theme_css .='.related.products{';
	$electronic_supermarket_tp_theme_css .='display: none;';
$electronic_supermarket_tp_theme_css .='}';
}

//menu font size
$electronic_supermarket_menu_font_size = get_theme_mod('electronic_supermarket_menu_font_size', 14);{
$electronic_supermarket_tp_theme_css .='.main-navigation a, .main-navigation li.page_item_has_children:after,.main-navigation li.menu-item-has-children:after{';
	$electronic_supermarket_tp_theme_css .='font-size: '.esc_attr($electronic_supermarket_menu_font_size).'px;';
$electronic_supermarket_tp_theme_css .='}';
}

// menu text tranform
$electronic_supermarket_menu_text_tranform = get_theme_mod( 'electronic_supermarket_menu_text_tranform','Capitalize');
if($electronic_supermarket_menu_text_tranform == 'Uppercase'){
$electronic_supermarket_tp_theme_css .='.main-navigation a {';
	$electronic_supermarket_tp_theme_css .='text-transform: uppercase;';
$electronic_supermarket_tp_theme_css .='}';
}else if($electronic_supermarket_menu_text_tranform == 'Lowercase'){
$electronic_supermarket_tp_theme_css .='.main-navigation a {';
	$electronic_supermarket_tp_theme_css .='text-transform: lowercase;';
$electronic_supermarket_tp_theme_css .='}';
}
else if($electronic_supermarket_menu_text_tranform == 'Capitalize'){
$electronic_supermarket_tp_theme_css .='.main-navigation a {';
	$electronic_supermarket_tp_theme_css .='text-transform: capitalize;';
$electronic_supermarket_tp_theme_css .='}';
}

//======================= slider Content layout ===================== //

$electronic_supermarket_slider_content_layout = get_theme_mod('electronic_supermarket_slider_content_layout', 'LEFT-ALIGN'); 
$electronic_supermarket_tp_theme_css .= '#slider .carousel-caption{';
switch ($electronic_supermarket_slider_content_layout) {
    case 'LEFT-ALIGN':
        $electronic_supermarket_tp_theme_css .= 'text-align:left; right: 30%; left: 15%';
        break;
    case 'CENTER-ALIGN':
        $electronic_supermarket_tp_theme_css .= 'text-align:center; left: 15%; right: 15%';
        break;
    case 'RIGHT-ALIGN':
        $electronic_supermarket_tp_theme_css .= 'text-align:right; left: 30%; right: 15%';
        break;
    default:
        $electronic_supermarket_tp_theme_css .= 'text-align:left; right: 30%; left: 15%';
        break;
}
$electronic_supermarket_tp_theme_css .= '}';