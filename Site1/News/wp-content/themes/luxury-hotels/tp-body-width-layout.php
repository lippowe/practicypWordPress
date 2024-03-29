 <?php


 	$luxury_hotels_theme_lay = get_theme_mod( 'luxury_hotels_tp_body_layout_settings','Full');
    if($luxury_hotels_theme_lay == 'Container'){
		$luxury_hotels_tp_theme_css .='body{';
			$luxury_hotels_tp_theme_css .='max-width: 1140px; width: 100%; padding-right: 15px; padding-left: 15px; margin-right: auto; margin-left: auto;';
		$luxury_hotels_tp_theme_css .='}';
		$luxury_hotels_tp_theme_css .='.scrolled{';
			$luxury_hotels_tp_theme_css .='width: auto; left:0; right:0;';
		$luxury_hotels_tp_theme_css .='}';
		$luxury_hotels_tp_theme_css .='@media screen and (max-width:575px){';
		$luxury_hotels_tp_theme_css .='body{';
			$luxury_hotels_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left:0px';
		$luxury_hotels_tp_theme_css .='} }';
	}else if($luxury_hotels_theme_lay == 'Container Fluid'){
		$luxury_hotels_tp_theme_css .='body{';
			$luxury_hotels_tp_theme_css .='width: 100%;padding-right: 15px;padding-left: 15px;margin-right: auto;margin-left: auto;';
		$luxury_hotels_tp_theme_css .='}';
		$luxury_hotels_tp_theme_css .='@media screen and (max-width:575px){';
		$luxury_hotels_tp_theme_css .='body{';
			$luxury_hotels_tp_theme_css .='max-width: 100%; padding-right:0px; padding-left:0px';
		$luxury_hotels_tp_theme_css .='} }';
		$luxury_hotels_tp_theme_css .='.scrolled{';
			$luxury_hotels_tp_theme_css .='width: auto; left:0; right:0;';
		$luxury_hotels_tp_theme_css .='}';
	}else if($luxury_hotels_theme_lay == 'Full'){
		$luxury_hotels_tp_theme_css .='body{';
			$luxury_hotels_tp_theme_css .='max-width: 100%;';
		$luxury_hotels_tp_theme_css .='}';
	}
	
    $luxury_hotels_scroll_position = get_theme_mod( 'luxury_hotels_scroll_top_position','Right');
    if($luxury_hotels_scroll_position == 'Right'){
        $luxury_hotels_tp_theme_css .='#return-to-top{';
            $luxury_hotels_tp_theme_css .='right: 20px;';
        $luxury_hotels_tp_theme_css .='}';
    }else if($luxury_hotels_scroll_position == 'Left'){
        $luxury_hotels_tp_theme_css .='#return-to-top{';
            $luxury_hotels_tp_theme_css .='left: 20px;';
        $luxury_hotels_tp_theme_css .='}';
    }else if($luxury_hotels_scroll_position == 'Center'){
        $luxury_hotels_tp_theme_css .='#return-to-top{';
            $luxury_hotels_tp_theme_css .='right: 50%;left: 50%;';
        $luxury_hotels_tp_theme_css .='}';
    }

	// related post
	$luxury_hotels_related_post_mob = get_theme_mod('luxury_hotels_related_post_mob', true);
	$luxury_hotels_related_post = get_theme_mod('luxury_hotels_remove_related_post', true);
	$luxury_hotels_tp_theme_css .= '.related-post-block {';
	if ($luxury_hotels_related_post == false) {
	    $luxury_hotels_tp_theme_css .= 'display: none;';
	}
	$luxury_hotels_tp_theme_css .= '}';
	$luxury_hotels_tp_theme_css .= '@media screen and (max-width: 575px) {';
	if ($luxury_hotels_related_post == false || $luxury_hotels_related_post_mob == false) {
	    $luxury_hotels_tp_theme_css .= '.related-post-block { display: none; }';
	}
	$luxury_hotels_tp_theme_css .= '}';

	//return to header mobile				
	$luxury_hotels_return_to_header_mob = get_theme_mod('luxury_hotels_return_to_header_mob', true);
	$luxury_hotels_return_to_header = get_theme_mod('luxury_hotels_return_to_header', true);
	$luxury_hotels_tp_theme_css .= '.return-to-header{';
	if ($luxury_hotels_return_to_header == false) {
	    $luxury_hotels_tp_theme_css .= 'display: none;';
	}
	$luxury_hotels_tp_theme_css .= '}';
	$luxury_hotels_tp_theme_css .= '@media screen and (max-width: 575px) {';
	if ($luxury_hotels_return_to_header == false || $luxury_hotels_return_to_header_mob == false) {
	    $luxury_hotels_tp_theme_css .= '.return-to-header{ display: none; }';
	}
	$luxury_hotels_tp_theme_css .= '}';


	$luxury_hotels_footer_widget_image = get_theme_mod('luxury_hotels_footer_widget_image');
	if($luxury_hotels_footer_widget_image != false){
		$luxury_hotels_tp_theme_css .='#footer{';
			$luxury_hotels_tp_theme_css .='background: url('.esc_attr($luxury_hotels_footer_widget_image).');';
		$luxury_hotels_tp_theme_css .='}';
	}

	//Social icon Font size
$luxury_hotels_social_icon_fontsize = get_theme_mod('luxury_hotels_social_icon_fontsize','20');
$luxury_hotels_tp_theme_css .='.social-media a i{';
$luxury_hotels_tp_theme_css .='font-size: '.esc_attr($luxury_hotels_social_icon_fontsize).'px;';
$luxury_hotels_tp_theme_css .='}';

// site title and tagline font size option
$luxury_hotels_site_title_font_size = get_theme_mod('luxury_hotels_site_title_font_size', 30); {
$luxury_hotels_tp_theme_css .='.logo h1 a, .logo p a{';
$luxury_hotels_tp_theme_css .='font-size: '.esc_attr($luxury_hotels_site_title_font_size).'px !important;';
	$luxury_hotels_tp_theme_css .='}';
}

$luxury_hotels_site_tagline_font_size = get_theme_mod('luxury_hotels_site_tagline_font_size', 15);{
$luxury_hotels_tp_theme_css .='.logo p{';
$luxury_hotels_tp_theme_css .='font-size: '.esc_attr($luxury_hotels_site_tagline_font_size).'px;';
	$luxury_hotels_tp_theme_css .='}';
}

	$luxury_hotels_related_product = get_theme_mod('luxury_hotels_related_product',true);
		if($luxury_hotels_related_product == false){
			$luxury_hotels_tp_theme_css .='.related.products{';
				$luxury_hotels_tp_theme_css .='display: none;';
			$luxury_hotels_tp_theme_css .='}';
		}


	//======================= MENU TYPOGRAPHY ===================== //


$luxury_hotels_menu_font_size = get_theme_mod('luxury_hotels_menu_font_size', 15);{
$luxury_hotels_tp_theme_css .='.main-navigation a, .main-navigation li.page_item_has_children:after,.main-navigation li.menu-item-has-children:after{';
$luxury_hotels_tp_theme_css .='font-size: '.esc_attr($luxury_hotels_menu_font_size).'px;';
	$luxury_hotels_tp_theme_css .='}';
}

$luxury_hotels_menu_text_tranform = get_theme_mod( 'luxury_hotels_menu_text_tranform','Capitalize');
    if($luxury_hotels_menu_text_tranform == 'Uppercase'){
		$luxury_hotels_tp_theme_css .='.main-navigation a {';
			$luxury_hotels_tp_theme_css .='text-transform: uppercase;';
		$luxury_hotels_tp_theme_css .='}';
	}else if($luxury_hotels_menu_text_tranform == 'Lowercase'){
		$luxury_hotels_tp_theme_css .='.main-navigation a {';
			$luxury_hotels_tp_theme_css .='text-transform: lowercase;';
		$luxury_hotels_tp_theme_css .='}';
	}
	else if($luxury_hotels_menu_text_tranform == 'Capitalize'){
		$luxury_hotels_tp_theme_css .='.main-navigation a {';
			$luxury_hotels_tp_theme_css .='text-transform: capitalize;';
		$luxury_hotels_tp_theme_css .='}';
	}