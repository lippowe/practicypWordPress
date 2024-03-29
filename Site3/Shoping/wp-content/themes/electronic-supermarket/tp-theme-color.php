<?php

$electronic_supermarket_tp_theme_css = '';

//preloader

$electronic_supermarket_tp_preloader_color1_option = get_theme_mod('electronic_supermarket_tp_preloader_color1_option');
$electronic_supermarket_tp_preloader_color2_option = get_theme_mod('electronic_supermarket_tp_preloader_color2_option');
$electronic_supermarket_tp_preloader_bg_color_option = get_theme_mod('electronic_supermarket_tp_preloader_bg_color_option');

if($electronic_supermarket_tp_preloader_color1_option != false){
$electronic_supermarket_tp_theme_css .='.center1{';
	$electronic_supermarket_tp_theme_css .='border-color: '.esc_attr($electronic_supermarket_tp_preloader_color1_option).' !important;';
$electronic_supermarket_tp_theme_css .='}';
}
if($electronic_supermarket_tp_preloader_color1_option != false){
$electronic_supermarket_tp_theme_css .='.center1 .ring::before{';
	$electronic_supermarket_tp_theme_css .='background: '.esc_attr($electronic_supermarket_tp_preloader_color1_option).' !important;';
$electronic_supermarket_tp_theme_css .='}';
}
if($electronic_supermarket_tp_preloader_color2_option != false){
$electronic_supermarket_tp_theme_css .='.center2{';
	$electronic_supermarket_tp_theme_css .='border-color: '.esc_attr($electronic_supermarket_tp_preloader_color2_option).' !important;';
$electronic_supermarket_tp_theme_css .='}';
}
if($electronic_supermarket_tp_preloader_color2_option != false){
$electronic_supermarket_tp_theme_css .='.center2 .ring::before{';
	$electronic_supermarket_tp_theme_css .='background: '.esc_attr($electronic_supermarket_tp_preloader_color2_option).' !important;';
$electronic_supermarket_tp_theme_css .='}';
}
if($electronic_supermarket_tp_preloader_bg_color_option != false){
$electronic_supermarket_tp_theme_css .='.loader{';
	$electronic_supermarket_tp_theme_css .='background: '.esc_attr($electronic_supermarket_tp_preloader_bg_color_option).';';
$electronic_supermarket_tp_theme_css .='}';
}

// footer-bg-color
$electronic_supermarket_tp_footer_bg_color_option = get_theme_mod('electronic_supermarket_tp_footer_bg_color_option');

if($electronic_supermarket_tp_footer_bg_color_option != false){
$electronic_supermarket_tp_theme_css .='#footer{';
	$electronic_supermarket_tp_theme_css .='background: '.esc_attr($electronic_supermarket_tp_footer_bg_color_option).' !important;';
$electronic_supermarket_tp_theme_css .='}';
}