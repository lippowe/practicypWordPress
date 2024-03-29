<?php
if( ! function_exists( 'formula_custom_typography_css' ) ):
	function formula_custom_typography_css() {
		$output_css = '';

		$formula_typography_header_disable = get_theme_mod('formula_typography_header_disable', false);
		If($formula_typography_header_disable == true):
			//B. Header Typography Settings Start
				//1. Site Title typography
					$output_css .=".site-title{
						font-family: " . esc_attr( get_theme_mod('formula_typography_header_site_title_ff', 'Open Sans') )." !important; 						
						font-size: " . intval( get_theme_mod('formula_typography_header_site_title_fs', '30') )."px !important;
						line-height: " . intval( get_theme_mod('formula_typography_header_site_title_lh', '39' ) ). "px !important; 
					}\n";
				//2. Site Tagline typography
					$output_css .=".site-description{
						font-family: " . esc_attr( get_theme_mod('formula_typography_header_site_tagline_ff', 'Open Sans') )." !important; 						
						font-size: " . intval( get_theme_mod('formula_typography_header_site_tagline_fs', '20') )."px !important;
						line-height: " . intval( get_theme_mod('formula_typography_header_site_tagline_lh', '30') ). "px !important; 
					}\n";
				//3. Site Menu typography
					$output_css .=".menu > li > a{
						font-family: " . esc_attr( get_theme_mod('formula_typography_header_menus_ff', 'Open Sans') )." !important; 						
						font-size: " . intval( get_theme_mod('formula_typography_header_menus_fs', '15') )."px !important;
						line-height: " . intval( get_theme_mod('formula_typography_header_menus_lh', '24') ). "px !important; 
					}\n";
				//4. Site Sub-Menu typography
					$output_css .=".menu-item .sub-menu > li > a {
						font-family: " . esc_attr( get_theme_mod('formula_typography_header_submenus_ff', 'Open Sans') )." !important; 						
						font-size: " . intval( get_theme_mod('formula_typography_header_submenus_fs', '15') )."px !important;
						line-height: " . intval( get_theme_mod('formula_typography_header_submenus_lh', '24') ). "px !important; 
					}\n";		
			//B. Header Typography Settings End	
		endif;
		
		$formula_typography_slider_disable = get_theme_mod('formula_typography_slider_disable', false);
		If($formula_typography_slider_disable == true):
			//C. Slider Typography Settings Start

				//1. Slider Title Typography Settings
				$output_css .="@media screen and (min-width: 768px) { .slider-caption .title {
					font-family: " . esc_attr( get_theme_mod('formula_typography_homepage_slider_title_ff', 'Open Sans') )." !important; 						
					font-size: " . intval( get_theme_mod('formula_typography_homepage_slider_title_fs', '46') )."px !important;
					line-height: " . intval( get_theme_mod('formula_typography_homepage_slider_title_lh', '60') ). "px !important; 
				}}\n";
				
				//2. Slider Subtitle Typography Settings
				$output_css .="@media screen and (min-width: 768px) {.slider-caption .subtitle {
					font-family: " . esc_attr( get_theme_mod('formula_typography_homepage_slider_subtitle_ff', 'Open Sans') )." !important; 						
					font-size: " . intval( get_theme_mod('formula_typography_homepage_slider_subtitle_fs', '18') )."px !important;
					line-height: " . intval( get_theme_mod('formula_typography_homepage_slider_subtitle_lh', '26') ). "px !important; 
				}}\n";
				
				//3. Slider Description Typography Settings
				$output_css .="@media screen and (min-width: 768px) { .slider-caption .description {
					font-family: " . esc_attr( get_theme_mod('formula_typography_homepage_slider_description_ff', 'Open Sans') )." !important; 						
					font-size: " . intval( get_theme_mod('formula_typography_homepage_slider_description_fs', '16') )."px !important;
					line-height: " . intval( get_theme_mod('formula_typography_homepage_slider_description_lh', '24') ). "px !important; 
				}}\n";		
			//C. Slider Typography Settings End		
		endif;
		
		$formula_typography_homepage_disable = get_theme_mod('formula_typography_homepage_disable', false);
		If($formula_typography_homepage_disable == true):
			//D. Homepage Section Typography Settings Start

				//1. Section Title Typography Settings
				$output_css .=".section-header .section-title, .callout-to-action .title{
					font-family: " . esc_attr( get_theme_mod('formula_typography_homepage_sections_title_ff', 'Open Sans') )." !important; 						
					font-size: " . intval( get_theme_mod('formula_typography_homepage_sections_title_fs', '42') )."px !important;
					line-height: " . intval( get_theme_mod('formula_typography_homepage_sections_title_lh', '58') ). "px !important; 
				}\n";
				
				//2. Section Subtitle Typography Settings
				$output_css .=".section-header .section-subtitle, .callout-to-action .subtitle{
					font-family: " . esc_attr( get_theme_mod('formula_typography_homepage_sections_subtitle_ff', 'Open Sans') )." !important; 						
					font-size: " . intval( get_theme_mod('formula_typography_homepage_sections_subtitle_fs', '16') )."px !important;
					line-height: " . intval( get_theme_mod('formula_typography_homepage_sections_subtitle_lh', '26') ). "px !important; 
				}\n";
				
				//3. Homepage Paragraph
				$output_css .=".header-top, .service .entry-content, .about p, .about li, .funfact p, .testimonial p, .testimonial .designation, .client-name, .client-designation,
				#portfolio-demo p, .home-news .entry-meta, .home-news .entry-content, .team-caption p, #section .post-content p, .wpcf7 .wpcf7-form p label, .entry-content li, .contact address, 
				.contact p, .sponsors p, .comment-form-section p, .woocommerce-product-details__short-description p, .site-info, .product_meta, .woocommerce label{
					font-family: " .esc_attr( get_theme_mod('formula_typography_paragraph_ff', 'Open Sans') )." !important;
					font-size: " . intval( get_theme_mod('formula_typography_paragraph_fs', '14') )."px !important;
					line-height: " . intval( get_theme_mod('formula_typography_paragraph_lh', '21') ). "px !important; 
				}\n";
				
				//4. Homepage Button Text
				$output_css .=".slider-caption .btn-large, .service .more-link, .home-news .more-link, .home-news .btn-large, .callout-button,
				.woocommerce .button, .sidebar .woocommerce button[type='submit'], .site-footer .woocommerce button[type='submit'], .sidebar .widget .search-submit,
				#commentform input[type='submit'], .wpcf7-submit, .woocommerce .added_to_cart, .wp-block-button__link, .more-link {
					font-family: " .esc_attr( get_theme_mod('formula_typography_button_ff') )." !important;
					font-size: " . intval( get_theme_mod('formula_typography_button_fs', '15') )."px !important;
					line-height: " . intval( get_theme_mod('formula_typography_button_lh', '24') ). "px !important; 
				}\n";
			//D. Homepage Section Typography Settings End	
		endif;
		
		
		$formula_typography_heading_disable = get_theme_mod('formula_typography_heading_disable', false);
		If($formula_typography_heading_disable == true):
			//E. Headings Typography Settings start	
				//H1 Typo 
				$output_css .="h1 {
					font-family: " .esc_attr( get_theme_mod('formula_typography_h1_ff') )." !important;
					font-size: " . intval( get_theme_mod('formula_typography_h1_fs', '36') )."px !important;
					line-height: " . intval( get_theme_mod('formula_typography_h1_lh', '54') ). "px !important; 
				}\n";
				
				//H2 Typo 
				$output_css .="h2 {
					font-family: " .esc_attr( get_theme_mod('formula_typography_h2_ff') )." !important;
					font-size: " . intval( get_theme_mod('formula_typography_h2_fs', '30') )."px !important;
					line-height: " . intval( get_theme_mod('formula_typography_h2_lh', '45') ). "px !important; 
				}\n";
				
				//H2 Typo 
				$output_css .="h3 {
					font-family: " .esc_attr( get_theme_mod('formula_typography_h3_ff') )." !important;
					font-size: " . intval( get_theme_mod('formula_typography_h3_fs', '24') )."px !important;
					line-height: " . intval( get_theme_mod('formula_typography_h3_lh', '36') ). "px !important; 
				}\n";
			
				//H2 Typo 
				$output_css .="h4 {
					font-family: " .esc_attr( get_theme_mod('formula_typography_h4_ff') )." !important;
					font-size: " . intval( get_theme_mod('formula_typography_h4_fs', '24') )."px !important;
					line-height: " . intval( get_theme_mod('formula_typography_h4_lh', '30') ). "px !important; 
				}\n";
			
				//H2 Typo 
				$output_css .="h5 {
					font-family: " .esc_attr( get_theme_mod('formula_typography_h5_ff') )." !important;
					font-size: " . intval( get_theme_mod('formula_typography_h5_fs', '20') )."px !important;
					line-height: " . intval( get_theme_mod('formula_typography_h5_lh', '24') ). "px !important; 
				}\n";
				
				//H2 Typo 
				$output_css .="h6 {
					font-family: " .esc_attr( get_theme_mod('formula_typography_h6_ff') )." !important;
					font-size: " . intval( get_theme_mod('formula_typography_h6_fs', '15') )."px !important;
					line-height: " . intval( get_theme_mod('formula_typography_h6_lh', '21') ). "px !important; 
				}\n";
			//E. Headings Typography Settings start	
		endif;
		
		
		$formula_typography_blog_archive_disable = get_theme_mod('formula_typography_blog_archive_disable', false);
		If($formula_typography_blog_archive_disable == true):	
			//F. Blog / Archive / Single Post Typography Settings start
				$output_css .=".meta-typo, .content-typo {
					font-family: " .esc_attr( get_theme_mod('formula_typography_blog_archive_ff', 'Open Sans') )." !important;
					font-size: " . intval( get_theme_mod('formula_typography_blog_archive_fs', '14') )."px !important;
					line-height: " . intval( get_theme_mod('formula_typography_blog_archive_lh', '21') ). "px !important; 
				}\n";
				
			//F. Blog / Archive / Single Post Typography Settings end
		endif;
		
		
		$formula_typography_sidebar_widget_disable = get_theme_mod('formula_typography_sidebar_widget_disable', false);
		If($formula_typography_sidebar_widget_disable == true):
			//G. Sidebar Typography Settings start
				$output_css .=".sidebar .widget-title, .sidebar .widget {
					font-family: " .esc_attr( get_theme_mod('formula_typography_sidebar_title_ff', 'Open Sans') )." !important;
					font-size: " . intval( get_theme_mod('formula_typography_sidebar_title_fs', '14') )."px !important;
					line-height: " . intval( get_theme_mod('formula_typography_sidebar_title_lh', '21') ). "px !important; 
				}\n";
				
				$output_css .=".sidebar .widget_recent_entries a, .sidebar a, .sidebar p {
					font-family: " .esc_attr( get_theme_mod('formula_typography_sidebar_content_ff', 'Open Sans') )." !important;
					font-size: " . intval( get_theme_mod('formula_typography_sidebar_content_fs', '14') )."px !important;
					line-height: " . intval( get_theme_mod('formula_typography_sidebar_content_lh', '21') ). "px !important; 
				}\n";
			//G. Sidebar Typography Settings end
		endif;
		
		
		$formula_typography_sidebar_footer_disable = get_theme_mod('formula_typography_sidebar_footer_disable', false);
		If($formula_typography_sidebar_footer_disable == true):
			//H. Footer Typography Settings start
				$output_css .=".footer .widget .widget-title, .footer .widget {
					font-family: " .esc_attr( get_theme_mod('formula_typography_footer_title_ff', 'Open Sans') )." !important;
					font-size: " . intval( get_theme_mod('formula_typography_footer_title_fs', '24') )."px !important;
					line-height: " . intval( get_theme_mod('formula_typography_footer_title_lh', '21') ). "px !important; 
				}\n";
				
				$output_css .=".footer .widget_recent_entries a, .footer a, .footer p {
					font-family: " .esc_attr( get_theme_mod('formula_typography_footer_content_ff', 'Open Sans') )." !important;
					font-size: " . intval( get_theme_mod('formula_typography_footer_content_fs', '14') )."px !important;
					line-height: " . intval( get_theme_mod('formula_typography_footer_content_lh', '21') ). "px !important; 
				}\n";
			//H. Footer Typography Settings end
		endif;
		
		
		wp_add_inline_style( 'formula-style', $output_css );
	}
endif;
add_action( 'wp_enqueue_scripts', 'formula_custom_typography_css' );