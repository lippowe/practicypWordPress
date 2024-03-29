<?php

$luxury_hotels_tp_theme_css = '';

//preloader

$luxury_hotels_tp_preloader_color1_option = get_theme_mod('luxury_hotels_tp_preloader_color1_option');
$luxury_hotels_tp_preloader_color2_option = get_theme_mod('luxury_hotels_tp_preloader_color2_option');
$luxury_hotels_tp_preloader_bg_color_option = get_theme_mod('luxury_hotels_tp_preloader_bg_color_option');

if($luxury_hotels_tp_preloader_color1_option != false){
$luxury_hotels_tp_theme_css .='.center1{';
	$luxury_hotels_tp_theme_css .='border-color: '.esc_attr($luxury_hotels_tp_preloader_color1_option).' !important;';
$luxury_hotels_tp_theme_css .='}';
}
if($luxury_hotels_tp_preloader_color1_option != false){
$luxury_hotels_tp_theme_css .='.center1 .ring::before{';
	$luxury_hotels_tp_theme_css .='background: '.esc_attr($luxury_hotels_tp_preloader_color1_option).' !important;';
$luxury_hotels_tp_theme_css .='}';
}
if($luxury_hotels_tp_preloader_color2_option != false){
$luxury_hotels_tp_theme_css .='.center2{';
	$luxury_hotels_tp_theme_css .='border-color: '.esc_attr($luxury_hotels_tp_preloader_color2_option).' !important;';
$luxury_hotels_tp_theme_css .='}';
}
if($luxury_hotels_tp_preloader_color2_option != false){
$luxury_hotels_tp_theme_css .='.center2 .ring::before{';
	$luxury_hotels_tp_theme_css .='background: '.esc_attr($luxury_hotels_tp_preloader_color2_option).' !important;';
$luxury_hotels_tp_theme_css .='}';
}
if($luxury_hotels_tp_preloader_bg_color_option != false){
$luxury_hotels_tp_theme_css .='.loader{';
	$luxury_hotels_tp_theme_css .='background: '.esc_attr($luxury_hotels_tp_preloader_bg_color_option).';';
$luxury_hotels_tp_theme_css .='}';
}


$luxury_hotels_tp_footer_bg_color_option = get_theme_mod('luxury_hotels_tp_footer_bg_color_option');


if($luxury_hotels_tp_footer_bg_color_option != false){
$luxury_hotels_tp_theme_css .='#footer{';
	$luxury_hotels_tp_theme_css .='background: '.esc_attr($luxury_hotels_tp_footer_bg_color_option).';';
$luxury_hotels_tp_theme_css .='}';
}

 // slider hide css
  $luxury_hotels_slider_arrows = get_theme_mod( 'luxury_hotels_slider_arrows', false);
  if($luxury_hotels_slider_arrows != true){
    $luxury_hotels_tp_theme_css .='.page-template-front-page .headerbox {';
      $luxury_hotels_tp_theme_css .='position:static;';
    $luxury_hotels_tp_theme_css .='}';
    $luxury_hotels_tp_theme_css .='.page-template-front-page .headerbox{';
      $luxury_hotels_tp_theme_css .='color:#3c3c3c;';
    $luxury_hotels_tp_theme_css .='}';
  }