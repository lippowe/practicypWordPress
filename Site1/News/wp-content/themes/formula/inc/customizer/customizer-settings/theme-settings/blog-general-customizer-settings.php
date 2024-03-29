<?php
/**
 * General Blog.
 *
 * @package     formula
 */

defined( 'ABSPATH' ) || exit;

if ( ! class_exists( 'formula_Customize_Blog_General_Option' ) ) :

	/**
	 * General Blog..
	 */
	class formula_Customize_Blog_General_Option extends formula_Customize_Base_Option {

		public function elements() {

			return array(
			
			    'formula_general_arcive_single_blog_heading'     => array(
					'setting'	=> array(),
					'control'	=> array(
						'type'    => 'heading',
				   		'priority'        => 1,
						'label'   => esc_html__( 'Blog/Archive Page Settings', 'formula' ),
						'section' => 'formula_blog_general',
					),
				),

				'formula_blog_content_ordering'        => array(
					'setting'	=> array(
						'default'           => array(
							'meta-one',
							'title',
							'meta-two',
							//'image',
						),
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_sortable' ),
					),
					'control'	=> array(
						'type'        => 'sortable',
						'priority'    => 5,
						'label'       => esc_html__( 'Post Settings', 'formula' ),
						'description' => esc_html__( 'Drag & Drop Post Meta to re-arrange the Order. + You can also hide Blog Meta by click on Eye icon.', 'formula' ),
						'section'     => 'formula_blog_general',
						'choices'     => array(
							'meta-one' => esc_attr__( 'Meta One', 'formula' ),
							'title'    => esc_attr__( 'Title', 'formula' ),
							'meta-two' => esc_attr__( 'Meta Two', 'formula' ),
							//'image'    => esc_attr__( 'Image', 'formula' ),
						),
					),
				),
				
				'formula_archive_blog_heading'     => array(
					'setting'	=> array(),
					'control'	=> array(
						'type'     => 'heading',
				   		'priority' => 15,
						'label'    => esc_html__( 'Archive Blog Pages', 'formula' ),
						'section'  => 'formula_blog_general',
					),
				),
				'formula_archive_blog_pages_layout'                    => array(
					'setting'	=> array(
						'default'           => 'formula_right_sidebar',
						'sanitize_callback' => array( 'formula_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'		=> 'radio_image',
						'priority'	=> 20,
						'label'		=> esc_html__( 'Layout', 'formula' ),
						'section'	=> 'formula_blog_general',
						'choices'	=> array(
							'formula_no_sidebar'	=> FORMULA_THEME_URL . '/assets/images/icons/fullwidth.png',
							'formula_left_sidebar'	=> FORMULA_THEME_URL . '/assets/images/icons/left-sidebar.png',
							'formula_right_sidebar'	=> FORMULA_THEME_URL . '/assets/images/icons/right-sidebar.png',
						),
					),
				),

				'formula_single_blog_heading'     => array(
					'setting'	=> array(),
					'control'	=> array(
						'type'	=> 'heading',
				   		'priority'	=> 30,
						'label'		=> esc_html__( 'Single Blog Pages', 'formula' ),
						'section'	=> 'formula_blog_general',
					),
				),

				'formula_single_blog_pages_layout'                    => array(
					'setting'		=> array(
						'default'			=> 'formula_right_sidebar',
						'sanitize_callback'	=> array( 'formula_Customizer_Sanitize', 'sanitize_radio' ),
					),
					'control' => array(
						'type'		=> 'radio_image',
						'priority'	=> 35,
						'label'		=> esc_html__( 'Layout', 'formula' ),
						'section'	=> 'formula_blog_general',
						'choices'	=> array(
							'formula_no_sidebar'	=> FORMULA_THEME_URL . '/assets/images/icons/fullwidth.png',
							'formula_left_sidebar'	=> FORMULA_THEME_URL . '/assets/images/icons/left-sidebar.png',
							'formula_right_sidebar'	=> FORMULA_THEME_URL . '/assets/images/icons/right-sidebar.png',
						),
					),
				),
			);
		}
	}

	new formula_Customize_Blog_General_Option();
endif;
