<?php
	$formula_font_size = array();
for ( $formula_i = 9; $formula_i <= 100; $formula_i++ ) {
	$formula_font_size[ $formula_i ] = $formula_i;
}

	$formula_line_height = array();
for ( $formula_i = 1; $formula_i <= 100; $formula_i++ ) {
	$formula_line_height[ $formula_i ] = $formula_i;
}

/**
*   All Callback Files.
*/
	// Header Callback.
	require 'customizer-callback/typography-callback/header-typo.php';
	require 'customizer-callback/typography-callback/slider-typo.php';
	require 'customizer-callback/typography-callback/homepage-typo.php';
	require 'customizer-callback/typography-callback/heading-typo.php';
	require 'customizer-callback/typography-callback/blog-archive-typo.php';
	require 'customizer-callback/typography-callback/sidebar-typo.php';
	require 'customizer-callback/typography-callback/footer-typo.php';


	// (B) Header typography Settings Start.
		// 1. Site Title Typography Settings Start----
class formula_Sitetitle_Typography_Customize_Control extends WP_Customize_Control {
	public $type = 'formula_typography_header_site_title';
	/**
	 * Render the control's content.
	 */
	public function render_content() {
		?>
				 <h3 class="customize-control-formula-heading"><?php esc_html_e( 'Site Title Typography', 'formula' ); ?></h3>
				<?php
	}
}
			// a. Site Title Heading-Text
			$wp_customize->add_setting(
				'formula_typography_header_site_title',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_Sitetitle_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_header_site_title',
					array(
						'section'         => 'formula_header_typography',
						'setting'         => 'formula_typography_header_site_title',
						'priority'        => 5,
						'active_callback' => 'formula_typography_header_site_title',
					)
				)
			);

			// b. Site Title Font-Family
			$wp_customize->add_setting(
				'formula_typography_header_site_title_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_header_site_title_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_header_typography',
						'settings'        => 'formula_typography_header_site_title_ff',
						'priority'        => 10,
						'active_callback' => 'formula_typography_header_site_title_ff',
					)
				)
			);

			// c. Site Title font-size
			$wp_customize->add_setting(
				'formula_typography_header_site_title_fs',
				array(
					'default'           => 30,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_header_site_title_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_header_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 15,
					'active_callback' => 'formula_typography_header_site_title_fs',
				)
			);

			// d. Site Title line-height
			$wp_customize->add_setting(
				'formula_typography_header_site_title_lh',
				array(
					'default'           => 39,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_header_site_title_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_header_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 20,
					'active_callback' => 'formula_typography_header_site_title_lh',
				)
			);

			// 1. Site Title Typography Settings End----


			// 2. Site Tagline Typography Settings Start----
			class formula_Sitetagline_Typography_Customize_Control extends WP_Customize_Control {
				public $type = 'formula_typography_header_site_tagline';
				/**
				 * Render the control's content.
				 */
				public function render_content() {
					?>
				 <h3 class="customize-control-formula-heading"><?php esc_html_e( 'Site Tagline Typography', 'formula' ); ?></h3>
					<?php
				}
			}
			// a. Site Tagline Heading-Text
			$wp_customize->add_setting(
				'formula_typography_header_site_tagline',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_Sitetagline_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_header_site_tagline',
					array(
						'section'         => 'formula_header_typography',
						'setting'         => 'formula_typography_header_site_tagline',
						'priority'        => 30,
						'active_callback' => 'formula_typography_header_site_tagline',
					)
				)
			);
			// b. Site Tagline Font-Family
			$wp_customize->add_setting(
				'formula_typography_header_site_tagline_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_header_site_tagline_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_header_typography',
						'settings'        => 'formula_typography_header_site_tagline_ff',
						'priority'        => 40,
						'active_callback' => 'formula_typography_header_site_tagline_ff',
					)
				)
			);
			// c. Site Tagline font-size
			$wp_customize->add_setting(
				'formula_typography_header_site_tagline_fs',
				array(
					'default'           => 20,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_header_site_tagline_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_header_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 50,
					'active_callback' => 'formula_typography_header_site_tagline_fs',
				)
			);
			// d. Site Tagline line-height
			$wp_customize->add_setting(
				'formula_typography_header_site_tagline_lh',
				array(
					'default'           => 30,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_header_site_tagline_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_header_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 60,
					'active_callback' => 'formula_typography_header_site_tagline_lh',
				)
			);
			// 2. Site Title Typography Settings End----


			// 3. Site Menu Typography Settings Start----
			class formula_Menus_Typography_Customize_Control extends WP_Customize_Control {
				public $type = 'formula_typography_header_menus';
				/**
				 * Render the control's content.
				 */
				public function render_content() {
					?>
				 <h3 class="customize-control-formula-heading"><?php esc_html_e( 'Site Menus Typography', 'formula' ); ?></h3>
					<?php
				}
			}
			// a. Menus Heading-Text
			$wp_customize->add_setting(
				'formula_typography_header_menus',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_Menus_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_header_menus',
					array(
						'section'         => 'formula_header_typography',
						'setting'         => 'formula_typography_header_menus',
						'priority'        => 70,
						'active_callback' => 'formula_typography_header_menus',
					)
				)
			);
			// b. Menus Font-Family
			$wp_customize->add_setting(
				'formula_typography_header_menus_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_header_menus_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_header_typography',
						'settings'        => 'formula_typography_header_menus_ff',
						'priority'        => 80,
						'active_callback' => 'formula_typography_header_menus_ff',
					)
				)
			);
			// c. Menus font-size
			$wp_customize->add_setting(
				'formula_typography_header_menus_fs',
				array(
					'default'           => 15,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_header_menus_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_header_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 90,
					'active_callback' => 'formula_typography_header_menus_fs',
				)
			);
			// d. Menus line-height
			$wp_customize->add_setting(
				'formula_typography_header_menus_lh',
				array(
					'default'           => 24,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_header_menus_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_header_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 100,
					'active_callback' => 'formula_typography_header_menus_lh',
				)
			);
			// 3. Menus Typography Settings End----


			// 4. Sub Menu Typography Settings Start----
			class formula_SubMenus_Typography_Customize_Control extends WP_Customize_Control {
				public $type = 'formula_typography_header_submenus';
				/**
				 * Render the control's content.
				 */
				public function render_content() {
					?>
				 <h3 class="customize-control-formula-heading"><?php esc_html_e( 'Site Sub Menus Typography', 'formula' ); ?></h3>
					<?php
				}
			}
			// a. Sub-Menus Heading-Text
			$wp_customize->add_setting(
				'formula_typography_header_submenus',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_SubMenus_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_header_submenus',
					array(
						'section'         => 'formula_header_typography',
						'setting'         => 'formula_typography_header_submenus',
						'priority'        => 120,
						'active_callback' => 'formula_typography_header_submenus',
					)
				)
			);
			// b. Sub-Menus Font-Family
			$wp_customize->add_setting(
				'formula_typography_header_submenus_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_header_submenus_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_header_typography',
						'settings'        => 'formula_typography_header_submenus_ff',
						'priority'        => 130,
						'active_callback' => 'formula_typography_header_submenus_ff',
					)
				)
			);
			// c. Sub-Menus font-size
			$wp_customize->add_setting(
				'formula_typography_header_submenus_fs',
				array(
					'default'           => 15,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_header_submenus_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_header_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 140,
					'active_callback' => 'formula_typography_header_submenus_fs',
				)
			);
			// d. Sub-Menus line-height
			$wp_customize->add_setting(
				'formula_typography_header_submenus_lh',
				array(
					'default'           => 24,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_header_submenus_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_header_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 150,
					'active_callback' => 'formula_typography_header_submenus_lh',
				)
			);
			// 4. Sub-Menus Typography Settings End----
			// (B) Header typo Settings End


			// (C) Slider Typography Settings Start
			// 1. Slider Title Typography Settings Start----
			class formula_Slider_Title_Typography_Customize_Control extends WP_Customize_Control {
				public $type = 'formula_typography_homepage_slider_title';
				/**
				 * Render the control's content.
				 */
				public function render_content() {
					?>
				 <h3 class="customize-control-formula-heading"><?php esc_html_e( 'Slider Title Typography', 'formula' ); ?></h3>
					<?php
				}
			}
			// a. Slider Heading-Text
			$wp_customize->add_setting(
				'formula_typography_homepage_slider_title',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_Slider_Title_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_homepage_slider_title',
					array(
						'section'         => 'formula_slider_typography',
						'setting'         => 'formula_typography_homepage_slider_title',
						'priority'        => 10,
						'active_callback' => 'formula_typography_homepage_slider_title',
					)
				)
			);
			// b. Slider Title Font-Family
			$wp_customize->add_setting(
				'formula_typography_homepage_slider_title_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_homepage_slider_title_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_slider_typography',
						'settings'        => 'formula_typography_homepage_slider_title_ff',
						'priority'        => 20,
						'active_callback' => 'formula_typography_homepage_slider_title_ff',
					)
				)
			);
			// c. Slider Title font-size
			$wp_customize->add_setting(
				'formula_typography_homepage_slider_title_fs',
				array(
					'default'           => 46,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_homepage_slider_title_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_slider_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 30,
					'active_callback' => 'formula_typography_homepage_slider_title_fs',
				)
			);
			// d. Slider Title line-height
			$wp_customize->add_setting(
				'formula_typography_homepage_slider_title_lh',
				array(
					'default'           => 60,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_homepage_slider_title_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_slider_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 40,
					'active_callback' => 'formula_typography_homepage_slider_title_lh',
				)
			);

			// 1. Slider Title Typography Settings End----

			// 2. Slider SubTitle Typography Settings Start----
			class formula_Slider_SubTitle_Typography_Customize_Control extends WP_Customize_Control {
				public $type = 'formula_typography_homepage_slider_subtitle';
				/**
				 * Render the control's content.
				 */
				public function render_content() {
					?>
				 <h3 class="customize-control-formula-heading"><?php esc_html_e( 'Slider SubTitle Typography', 'formula' ); ?></h3>
					<?php
				}
			}
			// a. Slider Heading-Text
			$wp_customize->add_setting(
				'formula_typography_homepage_slider_subtitle',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_Slider_SubTitle_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_homepage_slider_subtitle',
					array(
						'section'         => 'formula_slider_typography',
						'setting'         => 'formula_typography_homepage_slider_subtitle',
						'priority'        => 50,
						'active_callback' => 'formula_typography_homepage_slider_subtitle',
					)
				)
			);
			// b. Slider Title Font-Family
			$wp_customize->add_setting(
				'formula_typography_homepage_slider_subtitle_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_homepage_slider_subtitle_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_slider_typography',
						'settings'        => 'formula_typography_homepage_slider_subtitle_ff',
						'priority'        => 60,
						'active_callback' => 'formula_typography_homepage_slider_subtitle_ff',
					)
				)
			);
			// c. Slider Sub Title font-size
			$wp_customize->add_setting(
				'formula_typography_homepage_slider_subtitle_fs',
				array(
					'default'           => 18,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_homepage_slider_subtitle_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_slider_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 80,
					'active_callback' => 'formula_typography_homepage_slider_subtitle_fs',
				)
			);
			// d. Slider Title line-height
			$wp_customize->add_setting(
				'formula_typography_homepage_slider_subtitle_lh',
				array(
					'default'           => 26,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_homepage_slider_subtitle_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_slider_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 100,
					'active_callback' => 'formula_typography_homepage_slider_subtitle_lh',
				)
			);

			// 2. Slider Subtitle Typography Settings End----

			// 3. Slider Description Typography Settings Start----
			class formula_Slider_Description_Typography_Customize_Control extends WP_Customize_Control {
				public $type = 'formula_typography_homepage_slider_description';
				/**
				 * Render the control's content.
				 */
				public function render_content() {
					?>
				 <h3 class="customize-control-formula-heading"><?php esc_html_e( 'Slider Description Typography', 'formula' ); ?></h3>
					<?php
				}
			}
			// a. Slider Heading-Text
			$wp_customize->add_setting(
				'formula_typography_homepage_slider_description',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_Slider_Description_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_homepage_slider_description',
					array(
						'section'         => 'formula_slider_typography',
						'setting'         => 'formula_typography_homepage_slider_description',
						'priority'        => 150,
						'active_callback' => 'formula_typography_homepage_slider_description',
					)
				)
			);
			// b. Slider Title Font-Family
			$wp_customize->add_setting(
				'formula_typography_homepage_slider_description_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_homepage_slider_description_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_slider_typography',
						'settings'        => 'formula_typography_homepage_slider_description_ff',
						'priority'        => 160,
						'active_callback' => 'formula_typography_homepage_slider_description_ff',
					)
				)
			);
			// c. Slider Title font-size
			$wp_customize->add_setting(
				'formula_typography_homepage_slider_description_fs',
				array(
					'default'           => 16,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_homepage_slider_description_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_slider_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 180,
					'active_callback' => 'formula_typography_homepage_slider_description_fs',
				)
			);
			// d. Slider Title line-height
			$wp_customize->add_setting(
				'formula_typography_homepage_slider_description_lh',
				array(
					'default'           => 24,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_homepage_slider_description_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_slider_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 200,
					'active_callback' => 'formula_typography_homepage_slider_description_lh',
				)
			);

			// 3. Slider Subtitle Typography Settings End----
			// (C). Slider Typography Settings End----

			// (D). Homepage Typography Settings End----
			// 1. Sections Title Typography Settings Start----
			class formula_HomepageTitle_Typography_Customize_Control extends WP_Customize_Control {
				public $type = 'formula_typography_homepage_sections_title';
				/**
				 * Render the control's content.
				 */
				public function render_content() {
					?>
				 <h3 class="customize-control-formula-heading"><?php esc_html_e( 'Sections Title', 'formula' ); ?></h3>
					<?php
				}
			}
			// a. Section Title Heading-Text
			$wp_customize->add_setting(
				'formula_typography_homepage_sections_title',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_HomepageTitle_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_homepage_sections_title',
					array(
						'section'         => 'formula_homepage_typography',
						'setting'         => 'formula_typography_homepage_sections_title',
						'priority'        => 50,
						'active_callback' => 'formula_typography_homepage_sections_title',
					)
				)
			);
			// b. Section Title Font-Family
			$wp_customize->add_setting(
				'formula_typography_homepage_sections_title_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_homepage_sections_title_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_homepage_typography',
						'settings'        => 'formula_typography_homepage_sections_title_ff',
						'priority'        => 60,
						'active_callback' => 'formula_typography_homepage_sections_title_ff',
					)
				)
			);
			// c. Section Title font-size
			$wp_customize->add_setting(
				'formula_typography_homepage_sections_title_fs',
				array(
					'default'           => 42,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_homepage_sections_title_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_homepage_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 70,
					'active_callback' => 'formula_typography_homepage_sections_title_fs',
				)
			);
			// d. Section Title line-height
			$wp_customize->add_setting(
				'formula_typography_homepage_sections_title_lh',
				array(
					'default'           => 58,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_homepage_sections_title_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_homepage_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 80,
					'active_callback' => 'formula_typography_homepage_sections_title_lh',
				)
			);
			// 1. Sections Title Typography Settings End----

			// 2. Sections Sub-Title Typography Settings Start----
			class formula_HomepageSubTitle_Typography_Customize_Control extends WP_Customize_Control {
				public $type = 'formula_typography_homepage_sections_subtitle';
				/**
				 * Render the control's content.
				 */
				public function render_content() {
					?>
				 <h3 class="customize-control-formula-heading"><?php esc_html_e( 'Sections Sub Title', 'formula' ); ?></h3>
					<?php
				}
			}
			// a. Section SubTitle Heading-Text
			$wp_customize->add_setting(
				'formula_typography_homepage_sections_subtitle',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_HomepageSubTitle_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_homepage_sections_subtitle',
					array(
						'section'         => 'formula_homepage_typography',
						'setting'         => 'formula_typography_homepage_sections_subtitle',
						'priority'        => 100,
						'active_callback' => 'formula_typography_homepage_sections_subtitle',
					)
				)
			);
			// b. Section SubTitle Font-Family
			$wp_customize->add_setting(
				'formula_typography_homepage_sections_subtitle_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_homepage_sections_subtitle_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_homepage_typography',
						'settings'        => 'formula_typography_homepage_sections_subtitle_ff',
						'priority'        => 120,
						'active_callback' => 'formula_typography_homepage_sections_subtitle_ff',
					)
				)
			);
			// c. Section SubTitle font-size
			$wp_customize->add_setting(
				'formula_typography_homepage_sections_subtitle_fs',
				array(
					'default'           => 16,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_homepage_sections_subtitle_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_homepage_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 130,
					'active_callback' => 'formula_typography_homepage_sections_subtitle_fs',
				)
			);
			// d. Section SubTitle line-height
			$wp_customize->add_setting(
				'formula_typography_homepage_sections_subtitle_lh',
				array(
					'default'           => 26,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_homepage_sections_subtitle_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_homepage_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 140,
					'active_callback' => 'formula_typography_homepage_sections_subtitle_lh',
				)
			);

			// 3. Sections Paragraph Typography Settings Start----
			class formula_Paragraph_Typography_Customize_Control extends WP_Customize_Control {
				public $type = 'formula_typography_paragraph';
				/**
				 * Render the control's content.
				 */
				public function render_content() {
					?>
				 <h3 class="customize-control-formula-heading"><?php esc_html_e( 'Paragraph Typography', 'formula' ); ?></h3>
					<?php
				}
			}
			// a. p Heading-Text
			$wp_customize->add_setting(
				'formula_typography_paragraph',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_Paragraph_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_paragraph',
					array(
						'section'         => 'formula_homepage_typography',
						'setting'         => 'formula_typography_paragraph',
						'priority'        => 200,
						'active_callback' => 'formula_typography_paragraph',
					)
				)
			);
			// b. p Font-Family
			$wp_customize->add_setting(
				'formula_typography_paragraph_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_paragraph_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_homepage_typography',
						'settings'        => 'formula_typography_paragraph_ff',
						'priority'        => 220,
						'active_callback' => 'formula_typography_paragraph_ff',
					)
				)
			);
			// c. p font-size
			$wp_customize->add_setting(
				'formula_typography_paragraph_fs',
				array(
					'default'           => 14,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_paragraph_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_homepage_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 230,
					'active_callback' => 'formula_typography_paragraph_fs',
				)
			);
			// d. p line-height
			$wp_customize->add_setting(
				'formula_typography_paragraph_lh',
				array(
					'default'           => 21,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_paragraph_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_homepage_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 240,
					'active_callback' => 'formula_typography_paragraph_lh',
				)
			);
			// 3. Paragraph Typography Settings End----

			// 4. Sections Button Typography Settings Start----
			class formula_Button_Typography_Customize_Control extends WP_Customize_Control {
				public $type = 'formula_typography_button';
				/**
				 * Render the control's content.
				 */
				public function render_content() {
					?>
				 <h3 class="customize-control-formula-heading"><?php esc_html_e( 'Button Text Typography', 'formula' ); ?></h3>
					<?php
				}
			}
			// a. button Heading-Text
			$wp_customize->add_setting(
				'formula_typography_button',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_Button_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_button',
					array(
						'section'         => 'formula_homepage_typography',
						'setting'         => 'formula_typography_button',
						'priority'        => 300,
						'active_callback' => 'formula_typography_button',
					)
				)
			);
			// b. button Font-Family
			$wp_customize->add_setting(
				'formula_typography_button_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_button_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_homepage_typography',
						'settings'        => 'formula_typography_button_ff',
						'priority'        => 320,
						'active_callback' => 'formula_typography_button_ff',
					)
				)
			);
			// c. button font-size
			$wp_customize->add_setting(
				'formula_typography_button_fs',
				array(
					'default'           => 15,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_button_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_homepage_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 330,
					'active_callback' => 'formula_typography_button_fs',
				)
			);
			// d. button line-height
			$wp_customize->add_setting(
				'formula_typography_button_lh',
				array(
					'default'           => 24,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_button_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_homepage_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 340,
					'active_callback' => 'formula_typography_button_lh',
				)
			);
			// 4. Button Typography Settings End----

			// (D)Homepage Sections typo Settings End

			// (E)Homepage Sections typo Settings Start

			// 1. H1 Heading typo Settings
			class formula_Headings_Typography_Customize_Control extends WP_Customize_Control {
				public $type = 'formula_typography_headings_h1';
				/**
				 * Render the control's content.
				 */
				public function render_content() {
					?>
				 <h3 class="customize-control-formula-heading"><?php esc_html_e( 'H1 Typography', 'formula' ); ?></h3>
					<?php
				}
			}
			// a. h1 Heading-Text
			$wp_customize->add_setting(
				'formula_typography_headings_h1',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_Headings_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_headings_h1',
					array(
						'section'         => 'formula_headings_typography',
						'setting'         => 'formula_typography_headings_h1',
						'priority'        => 10,
						'active_callback' => 'formula_typography_headings_h1',
					)
				)
			);
			// b. h1 Font-Family
			$wp_customize->add_setting(
				'formula_typography_h1_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_h1_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_headings_typography',
						'settings'        => 'formula_typography_h1_ff',
						'priority'        => 20,
						'active_callback' => 'formula_typography_h1_ff',
					)
				)
			);
			// c. h1 font-size
			$wp_customize->add_setting(
				'formula_typography_h1_fs',
				array(
					'default'           => 36,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_h1_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_headings_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 30,
					'active_callback' => 'formula_typography_h1_fs',
				)
			);
			// d. h1 line-height
			$wp_customize->add_setting(
				'formula_typography_h1_lh',
				array(
					'default'           => 54,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_h1_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_headings_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 40,
					'active_callback' => 'formula_typography_h1_lh',
				)
			);

			// 2. H2 Heading typo Settings
			class formula_Headings2_Typography_Customize_Control extends WP_Customize_Control {
				public $type = 'formula_typography_headings_h2';
				/**
				 * Render the control's content.
				 */
				public function render_content() {
					?>
				 <h3 class="customize-control-formula-heading"><?php esc_html_e( 'H2 Typography', 'formula' ); ?></h3>
					<?php
				}
			}
			// a. h2 Heading-Text
			$wp_customize->add_setting(
				'formula_typography_headings_h2',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_Headings2_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_headings_h2',
					array(
						'section'         => 'formula_headings_typography',
						'setting'         => 'formula_typography_headings_h2',
						'priority'        => 60,
						'active_callback' => 'formula_typography_headings_h2',
					)
				)
			);
			// b. h2 Font-Family
			$wp_customize->add_setting(
				'formula_typography_h2_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_h2_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_headings_typography',
						'settings'        => 'formula_typography_h2_ff',
						'priority'        => 70,
						'active_callback' => 'formula_typography_h2_ff',
					)
				)
			);
			// c. h2 font-size
			$wp_customize->add_setting(
				'formula_typography_h2_fs',
				array(
					'default'           => 30,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_h2_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_headings_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 80,
					'active_callback' => 'formula_typography_h2_fs',
				)
			);
			// d. h2 line-height
			$wp_customize->add_setting(
				'formula_typography_h2_lh',
				array(
					'default'           => 45,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_h2_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_headings_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 90,
					'active_callback' => 'formula_typography_h2_lh',
				)
			);

			// 3. H3 Heading typo Settings
			class formula_Headings3_Typography_Customize_Control extends WP_Customize_Control {
				public $type = 'formula_typography_headings_h3';
				/**
				 * Render the control's content.
				 */
				public function render_content() {
					?>
				 <h3 class="customize-control-formula-heading"><?php esc_html_e( 'H3 Typography', 'formula' ); ?></h3>
					<?php
				}
			}
			// a. h3 Heading-Text
			$wp_customize->add_setting(
				'formula_typography_headings_h3',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_Headings3_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_headings_h3',
					array(
						'section'         => 'formula_headings_typography',
						'setting'         => 'formula_typography_headings_h3',
						'priority'        => 160,
						'active_callback' => 'formula_typography_headings_h3',
					)
				)
			);
			// b. h3 Font-Family
			$wp_customize->add_setting(
				'formula_typography_h3_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_h3_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_headings_typography',
						'settings'        => 'formula_typography_h3_ff',
						'priority'        => 170,
						'active_callback' => 'formula_typography_h3_ff',
					)
				)
			);
			// c. h3 font-size
			$wp_customize->add_setting(
				'formula_typography_h3_fs',
				array(
					'default'           => 24,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_h3_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_headings_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 180,
					'active_callback' => 'formula_typography_h3_fs',
				)
			);
			// d. h3 line-height
			$wp_customize->add_setting(
				'formula_typography_h3_lh',
				array(
					'default'           => 36,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_h3_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_headings_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 190,
					'active_callback' => 'formula_typography_h3_lh',
				)
			);

			// 4. H4 Heading typo Settings
			class formula_Headings4_Typography_Customize_Control extends WP_Customize_Control {
				public $type = 'formula_typography_headings_h4';
				/**
				 * Render the control's content.
				 */
				public function render_content() {
					?>
				 <h3 class="customize-control-formula-heading"><?php esc_html_e( 'H4 Typography', 'formula' ); ?></h3>
					<?php
				}
			}
			// a. h4 Heading-Text
			$wp_customize->add_setting(
				'formula_typography_headings_h4',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_Headings4_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_headings_h4',
					array(
						'section'         => 'formula_headings_typography',
						'setting'         => 'formula_typography_headings_h4',
						'priority'        => 260,
						'active_callback' => 'formula_typography_headings_h4',
					)
				)
			);
			// b. h4 Font-Family
			$wp_customize->add_setting(
				'formula_typography_h4_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_h4_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_headings_typography',
						'settings'        => 'formula_typography_h4_ff',
						'priority'        => 270,
						'active_callback' => 'formula_typography_h4_ff',
					)
				)
			);
			// c. h4 font-size
			$wp_customize->add_setting(
				'formula_typography_h4_fs',
				array(
					'default'           => 24,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_h4_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_headings_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 280,
					'active_callback' => 'formula_typography_h4_fs',
				)
			);
			// d. h4 line-height
			$wp_customize->add_setting(
				'formula_typography_h4_lh',
				array(
					'default'           => 30,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_h4_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_headings_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 290,
					'active_callback' => 'formula_typography_h4_lh',
				)
			);

			// 5. H5 Heading typo Settings
			class formula_Headings5_Typography_Customize_Control extends WP_Customize_Control {
				public $type = 'formula_typography_headings_h5';
				/**
				 * Render the control's content.
				 */
				public function render_content() {
					?>
				 <h3 class="customize-control-formula-heading"><?php esc_html_e( 'H5 Typography', 'formula' ); ?></h3>
					<?php
				}
			}
			// a. h5 Heading-Text
			$wp_customize->add_setting(
				'formula_typography_headings_h5',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_Headings5_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_headings_h5',
					array(
						'section'         => 'formula_headings_typography',
						'setting'         => 'formula_typography_headings_h5',
						'priority'        => 360,
						'active_callback' => 'formula_typography_headings_h5',
					)
				)
			);
			// b. h5 Font-Family
			$wp_customize->add_setting(
				'formula_typography_h5_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_h5_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_headings_typography',
						'settings'        => 'formula_typography_h5_ff',
						'priority'        => 370,
						'active_callback' => 'formula_typography_h5_ff',
					)
				)
			);
			// c. h5 font-size
			$wp_customize->add_setting(
				'formula_typography_h5_fs',
				array(
					'default'           => 20,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_h5_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_headings_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 380,
					'active_callback' => 'formula_typography_h5_fs',
				)
			);
			// d. h5 line-height
			$wp_customize->add_setting(
				'formula_typography_h5_lh',
				array(
					'default'           => 24,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_h5_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_headings_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 390,
					'active_callback' => 'formula_typography_h5_lh',
				)
			);

			// 5. H6 Heading typo Settings
			class formula_Headings6_Typography_Customize_Control extends WP_Customize_Control {
				public $type = 'formula_typography_headings_h6';
				/**
				 * Render the control's content.
				 */
				public function render_content() {
					?>
				 <h3 class="customize-control-formula-heading"><?php esc_html_e( 'H6 Typography', 'formula' ); ?></h3>
					<?php
				}
			}
			// a. h6 Heading-Text
			$wp_customize->add_setting(
				'formula_typography_headings_h6',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_Headings6_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_headings_h6',
					array(
						'section'         => 'formula_headings_typography',
						'setting'         => 'formula_typography_headings_h6',
						'priority'        => 460,
						'active_callback' => 'formula_typography_headings_h6',
					)
				)
			);
			// b. h6 Font-Family
			$wp_customize->add_setting(
				'formula_typography_h6_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_h6_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_headings_typography',
						'settings'        => 'formula_typography_h6_ff',
						'priority'        => 470,
						'active_callback' => 'formula_typography_h6_ff',
					)
				)
			);
			// c. h6 font-size
			$wp_customize->add_setting(
				'formula_typography_h6_fs',
				array(
					'default'           => 15,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_h6_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_headings_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 480,
					'active_callback' => 'formula_typography_h6_fs',
				)
			);
			// d. h6 line-height
			$wp_customize->add_setting(
				'formula_typography_h6_lh',
				array(
					'default'           => 30,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_h6_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_headings_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 490,
					'active_callback' => 'formula_typography_h6_lh',
				)
			);

			// (E)Homepage Sections typo Settings End


			// (F)Blog Archive Sections typo Settings Start
			// 1. Blog Archive typo Settings
			class formula_BlogArchive_Typography_Customize_Control extends WP_Customize_Control {
				public $type = 'formula_typography_blog_archive';
				/**
				 * Render the control's content.
				 */
				public function render_content() {
					?>
				<h3 class="customize-control-formula-heading"><?php esc_html_e( 'Font Family', 'formula' ); ?></h3>
					<?php
				}
			}
			// a. blog archive Heading-Text
			$wp_customize->add_setting(
				'formula_typography_blog_archive',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_BlogArchive_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_blog_archive',
					array(
						'section'         => 'formula_blog_archive_typography',
						'setting'         => 'formula_typography_blog_archive',
						'priority'        => 10,
						'active_callback' => 'formula_typography_blog_archive',
					)
				)
			);
			// b. blog archive Font-Family
			$wp_customize->add_setting(
				'formula_typography_blog_archive_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_blog_archive_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_blog_archive_typography',
						'settings'        => 'formula_typography_blog_archive_ff',
						'priority'        => 20,
						'active_callback' => 'formula_typography_blog_archive_ff',
					)
				)
			);
			// c. blog archive font-size
			$wp_customize->add_setting(
				'formula_typography_blog_archive_fs',
				array(
					'default'           => 15,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_blog_archive_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_blog_archive_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 30,
					'active_callback' => 'formula_typography_blog_archive_fs',
				)
			);
			// d. blog archive line-height
			$wp_customize->add_setting(
				'formula_typography_blog_archive_lh',
				array(
					'default'           => 30,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_blog_archive_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_blog_archive_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 40,
					'active_callback' => 'formula_typography_blog_archive_lh',
				)
			);

			// (F)Blog Archive Sections typo Settings End


			// (G)Sidebar widget Sections typo Settings Start
			// 1. Sidebar Widget Title typo Settings
			class formula_Sidebar_Typography_Customize_Control extends WP_Customize_Control {
				public $type = 'formula_typography_sidebar_title';
				/**
				 * Render the control's content.
				 */
				public function render_content() {
					?>
				<h3 class="customize-control-formula-heading"><?php esc_html_e( 'Sidebar Widget Title', 'formula' ); ?></h3>
					<?php
				}
			}
			// a. Widget Title Heading-Text
			$wp_customize->add_setting(
				'formula_typography_sidebar_title',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_Sidebar_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_sidebar_title',
					array(
						'section'         => 'formula_sidebar_widget_typography',
						'setting'         => 'formula_typography_sidebar_title',
						'priority'        => 10,
						'active_callback' => 'formula_typography_sidebar_title',
					)
				)
			);
			// b. Widget Title Font-Family
			$wp_customize->add_setting(
				'formula_typography_sidebar_title_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_sidebar_title_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_sidebar_widget_typography',
						'settings'        => 'formula_typography_sidebar_title_ff',
						'priority'        => 20,
						'active_callback' => 'formula_typography_sidebar_title_ff',
					)
				)
			);
			// c. Widget Title font-size
			$wp_customize->add_setting(
				'formula_typography_sidebar_title_fs',
				array(
					'default'           => 15,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_sidebar_title_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_sidebar_widget_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 30,
					'active_callback' => 'formula_typography_sidebar_title_fs',
				)
			);
			// d. Widget Title line-height
			$wp_customize->add_setting(
				'formula_typography_sidebar_title_lh',
				array(
					'default'           => 30,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_sidebar_title_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_sidebar_widget_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 40,
					'active_callback' => 'formula_typography_sidebar_title_lh',
				)
			);

			// 2. Sidebar Widget Content typo Settings
			class formula_Sidebar_Content_Typography_Customize_Control extends WP_Customize_Control {
				public $type = 'formula_typography_sidebar_content';
				/**
				 * Render the control's content.
				 */
				public function render_content() {
					?>
				<h3 class="customize-control-formula-heading"><?php esc_html_e( 'Sidebar Widget Content', 'formula' ); ?></h3>
					<?php
				}
			}
			// a. Widget Content Heading-Text
			$wp_customize->add_setting(
				'formula_typography_sidebar_content',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_Sidebar_Content_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_sidebar_content',
					array(
						'section'         => 'formula_sidebar_widget_typography',
						'setting'         => 'formula_typography_sidebar_content',
						'priority'        => 110,
						'active_callback' => 'formula_typography_sidebar_content',
					)
				)
			);
			// b. Widget Content Font-Family
			$wp_customize->add_setting(
				'formula_typography_sidebar_content_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_sidebar_content_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_sidebar_widget_typography',
						'settings'        => 'formula_typography_sidebar_content_ff',
						'priority'        => 120,
						'active_callback' => 'formula_typography_sidebar_content_ff',
					)
				)
			);
			// c. Widget Content font-size
			$wp_customize->add_setting(
				'formula_typography_sidebar_content_fs',
				array(
					'default'           => 15,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_sidebar_content_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_sidebar_widget_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 130,
					'active_callback' => 'formula_typography_sidebar_content_fs',
				)
			);
			// d. Widget Content line-height
			$wp_customize->add_setting(
				'formula_typography_sidebar_content_lh',
				array(
					'default'           => 30,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_sidebar_content_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_sidebar_widget_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 140,
					'active_callback' => 'formula_typography_sidebar_content_lh',
				)
			);

			// (G)Sidebar Widget typo Settings End

			// (H)footer widget Sections typo Settings Start
			// 1. footer Widget Title typo Settings
			class formula_Footer_Typography_Customize_Control extends WP_Customize_Control {
				public $type = 'formula_typography_footer_title';
				/**
				 * Render the control's content.
				 */
				public function render_content() {
					?>
				<h3 class="customize-control-formula-heading"><?php esc_html_e( 'Footer Widget Title', 'formula' ); ?></h3>
					<?php
				}
			}
			// a. Widget Title Heading-Text
			$wp_customize->add_setting(
				'formula_typography_footer_title',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_Footer_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_footer_title',
					array(
						'section'         => 'formula_footer_widget_typography',
						'setting'         => 'formula_typography_footer_title',
						'priority'        => 10,
						'active_callback' => 'formula_typography_footer_title',
					)
				)
			);
			// b. Widget Title Font-Family
			$wp_customize->add_setting(
				'formula_typography_footer_title_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_footer_title_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_footer_widget_typography',
						'settings'        => 'formula_typography_footer_title_ff',
						'priority'        => 20,
						'active_callback' => 'formula_typography_footer_title_ff',
					)
				)
			);
			// c. Widget Title font-size
			$wp_customize->add_setting(
				'formula_typography_footer_title_fs',
				array(
					'default'           => 15,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_footer_title_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_footer_widget_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 30,
					'active_callback' => 'formula_typography_footer_title_fs',
				)
			);
			// d. Widget Title line-height
			$wp_customize->add_setting(
				'formula_typography_footer_title_lh',
				array(
					'default'           => 30,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_footer_title_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_footer_widget_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 40,
					'active_callback' => 'formula_typography_footer_title_lh',
				)
			);

			// 2. footer Widget Content typo Settings
			class formula_Footer_Content_Typography_Customize_Control extends WP_Customize_Control {
				public $type = 'formula_typography_footer_content';
				/**
				 * Render the control's content.
				 */
				public function render_content() {
					?>
				<h3 class="customize-control-formula-heading"><?php esc_html_e( 'Footer Widget Content', 'formula' ); ?></h3>
					<?php
				}
			}
			// a. Widget Content Heading-Text
			$wp_customize->add_setting(
				'formula_typography_footer_content',
				array(
					'capability'        => 'edit_theme_options',
					'sanitize_callback' => 'sanitize_text_field',
				)
			);
			$wp_customize->add_control(
				new formula_Footer_Content_Typography_Customize_Control(
					$wp_customize,
					'formula_typography_footer_content',
					array(
						'section'         => 'formula_footer_widget_typography',
						'setting'         => 'formula_typography_footer_content',
						'priority'        => 110,
						'active_callback' => 'formula_typography_footer_content',
					)
				)
			);
			// b. Widget Content Font-Family
			$wp_customize->add_setting(
				'formula_typography_footer_content_ff',
				array(
					'sanitize_callback' => 'formula_sanitize_select',
					'capability'        => 'edit_theme_options',
					'default'           => 'Open Sans',
				)
			);
			$wp_customize->add_control(
				new formula_Customizer_Typography_Control(
					$wp_customize,
					'formula_typography_footer_content_ff',
					array(
						'label'           => esc_html__( 'Font Family', 'formula' ),
						'section'         => 'formula_footer_widget_typography',
						'settings'        => 'formula_typography_footer_content_ff',
						'priority'        => 120,
						'active_callback' => 'formula_typography_footer_content_ff',
					)
				)
			);
			// c. Widget Content font-size
			$wp_customize->add_setting(
				'formula_typography_footer_content_fs',
				array(
					'default'           => 24,
					'sanitize_callback' => 'formula_sanitize_text',
				)
			);
			$wp_customize->add_control(
				'formula_typography_footer_content_fs',
				array(
					'label'           => esc_html__( 'Font Size (px)', 'formula' ),
					'section'         => 'formula_footer_widget_typography',
					'type'            => 'select',
					'choices'         => $formula_font_size,
					'priority'        => 130,
					'active_callback' => 'formula_typography_footer_content_fs',
				)
			);
			// d. Widget Content line-height
			$wp_customize->add_setting(
				'formula_typography_footer_content_lh',
				array(
					'default'           => 30,
					'sanitize_callback' => 'absint',
					'capability'        => 'edit_theme_options',
				)
			);
			$wp_customize->add_control(
				'formula_typography_footer_content_lh',
				array(
					'label'           => esc_html__( 'Line height (px)', 'formula' ),
					'section'         => 'formula_footer_widget_typography',
					'type'            => 'select',
					'choices'         => $formula_line_height,
					'priority'        => 140,
					'active_callback' => 'formula_typography_footer_content_lh',
				)
			);

			// (H)Footer Widget typo Settings End
