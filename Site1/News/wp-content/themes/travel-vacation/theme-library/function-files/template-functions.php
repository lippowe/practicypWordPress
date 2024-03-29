<?php

/**
 * Functions which enhance the theme by hooking into WordPress
 *
 * @package travel_vacation
 */

function travel_vacation_body_classes( $classes ) {
	// Adds a class of hfeed to non-singular pages.
	if ( ! is_singular() ) {
		$classes[] = 'hfeed';
	}

	// Adds a class of no-sidebar when there is no sidebar present.
	if ( ! is_active_sidebar( 'sidebar-1' ) ) {
		$classes[] = 'no-sidebar';
	}

	$classes[] = travel_vacation_sidebar_layout();

	return $classes;
}
add_filter( 'body_class', 'travel_vacation_body_classes' );

/**
 * Add a pingback url auto-discovery header for single posts, pages, or attachments.
 */
function travel_vacation_pingback_header() {
	if ( is_singular() && pings_open() ) {
		printf( '<link rel="pingback" href="%s">', esc_url( get_bloginfo( 'pingback_url' ) ) );
	}
}
add_action( 'wp_head', 'travel_vacation_pingback_header' );


/**
 * Get all posts for customizer Post content type.
 */
function travel_vacation_get_post_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'travel-vacation' ) );
	$travel_vacation_args    = array( 'numberposts' => -1 );
	$travel_vacation_posts   = get_posts( $travel_vacation_args );

	foreach ( $travel_vacation_posts as $travel_vacation_post ) {
		$id             = $travel_vacation_post->ID;
		$title          = $travel_vacation_post->post_title;
		$choices[ $id ] = $title;
	}

	return $choices;
}

/**
 * Get all pages for customizer Page content type.
 */
function travel_vacation_get_page_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'travel-vacation' ) );
	$pages   = get_pages();

	foreach ( $pages as $page ) {
		$choices[ $page->ID ] = $page->post_title;
	}

	return $choices;
}

/**
 * Get all categories for customizer Category content type.
 */
function travel_vacation_get_post_cat_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'travel-vacation' ) );
	$cats    = get_categories();

	foreach ( $cats as $cat ) {
		$choices[ $cat->term_id ] = $cat->name;
	}

	return $choices;
}

/**
 * Get all donation forms for customizer form content type.
 */
function travel_vacation_get_post_donation_form_choices() {
	$choices = array( '' => esc_html__( '--Select--', 'travel-vacation' ) );
	$travel_vacation_posts   = get_posts(
		array(
			'post_type'   => 'give_forms',
			'numberposts' => -1,
		)
	);
	foreach ( $travel_vacation_posts as $travel_vacation_post ) {
		$choices[ $travel_vacation_post->ID ] = $travel_vacation_post->post_title;
	}
	return $choices;
}

if ( ! function_exists( 'travel_vacation_excerpt_length' ) ) :
	/**
	 * Excerpt length.
	 */
	function travel_vacation_excerpt_length( $length ) {
		if ( is_admin() ) {
			return $length;
		}

		return get_theme_mod( 'travel_vacation_excerpt_length', 20 );
	}
endif;
add_filter( 'excerpt_length', 'travel_vacation_excerpt_length', 999 );

if ( ! function_exists( 'travel_vacation_excerpt_more' ) ) :
	/**
	 * Excerpt more.
	 */
	function travel_vacation_excerpt_more( $more ) {
		if ( is_admin() ) {
			return $more;
		}

		return '&hellip;';
	}
endif;
add_filter( 'excerpt_more', 'travel_vacation_excerpt_more' );

if ( ! function_exists( 'travel_vacation_sidebar_layout' ) ) {
	/**
	 * Get sidebar layout.
	 */
	function travel_vacation_sidebar_layout() {
		$travel_vacation_sidebar_position      = get_theme_mod( 'travel_vacation_sidebar_position', 'right-sidebar' );
		$travel_vacation_sidebar_position_post = get_theme_mod( 'travel_vacation_post_sidebar_position', 'right-sidebar' );
		$travel_vacation_sidebar_position_page = get_theme_mod( 'travel_vacation_page_sidebar_position', 'right-sidebar' );

		if ( is_single() ) {
			$travel_vacation_sidebar_position = $travel_vacation_sidebar_position_post;
		} elseif ( is_page() ) {
			$travel_vacation_sidebar_position = $travel_vacation_sidebar_position_page;
		}

		return $travel_vacation_sidebar_position;
	}
}

if ( ! function_exists( 'travel_vacation_is_sidebar_enabled' ) ) {
	/**
	 * Check if sidebar is enabled.
	 */
	function travel_vacation_is_sidebar_enabled() {
		$travel_vacation_sidebar_position      = get_theme_mod( 'travel_vacation_sidebar_position', 'right-sidebar' );
		$travel_vacation_sidebar_position_post = get_theme_mod( 'travel_vacation_post_sidebar_position', 'right-sidebar' );
		$travel_vacation_sidebar_position_page = get_theme_mod( 'travel_vacation_page_sidebar_position', 'right-sidebar' );

		$travel_vacation_sidebar_enabled = true;
		if ( is_home() || is_archive() || is_search() ) {
			if ( 'no-sidebar' === $travel_vacation_sidebar_position ) {
				$travel_vacation_sidebar_enabled = false;
			}
		} elseif ( is_single() ) {
			if ( 'no-sidebar' === $travel_vacation_sidebar_position || 'no-sidebar' === $travel_vacation_sidebar_position_post ) {
				$travel_vacation_sidebar_enabled = false;
			}
		} elseif ( is_page() ) {
			if ( 'no-sidebar' === $travel_vacation_sidebar_position || 'no-sidebar' === $travel_vacation_sidebar_position_page ) {
				$travel_vacation_sidebar_enabled = false;
			}
		}
		return $travel_vacation_sidebar_enabled;
	}
}

if ( ! function_exists( 'travel_vacation_get_homepage_sections ' ) ) {
	/**
	 * Returns homepage sections.
	 */
	function travel_vacation_get_homepage_sections() {
		$travel_vacation_sections = array(
			'banner'  => esc_html__( 'Banner Section', 'travel-vacation' ),
			'places' => esc_html__( 'travel-vacation Section', 'travel-vacation' ),
		);
		return $travel_vacation_sections;
	}
}

/**
 * Renders customizer section link
 */
function travel_vacation_section_link( $travel_vacation_section_id ) {
	$travel_vacation_section_name      = str_replace( 'travel_vacation_', ' ', $travel_vacation_section_id );
	$travel_vacation_section_name      = str_replace( '_', ' ', $travel_vacation_section_name );
	$travel_vacation_starting_notation = '#';
	?>
	<span class="section-link">
		<span class="section-link-title"><?php echo esc_html( $travel_vacation_section_name ); ?></span>
	</span>
	<style type="text/css">
		<?php echo $travel_vacation_starting_notation . $travel_vacation_section_id; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>:hover .section-link {
			visibility: visible;
		}
	</style>
	<?php
}

/**
 * Adds customizer section link css
 */
function travel_vacation_section_link_css() {
	if ( is_customize_preview() ) {
		?>
		<style type="text/css">
			.section-link {
				visibility: hidden;
				background-color: black;
				position: relative;
				top: 80px;
				z-index: 99;
				left: 40px;
				color: #fff;
				text-align: center;
				font-size: 20px;
				border-radius: 10px;
				padding: 20px 10px;
				text-transform: capitalize;
			}

			.section-link-title {
				padding: 0 10px;
			}

			.banner-section {
				position: relative;
			}

			.banner-section .section-link {
				position: absolute;
				top: 100px;
			}
		</style>
		<?php
	}
}
add_action( 'wp_head', 'travel_vacation_section_link_css' );

/**
 * Breadcrumb.
 */
function travel_vacation_breadcrumb( $travel_vacation_args = array() ) {
	if ( ! get_theme_mod( 'travel_vacation_enable_breadcrumb', true ) ) {
		return;
	}

	$travel_vacation_args = array(
		'show_on_front' => false,
		'show_title'    => true,
		'show_browse'   => false,
	);
	breadcrumb_trail( $travel_vacation_args );
}
add_action( 'travel_vacation_breadcrumb', 'travel_vacation_breadcrumb', 10 );

/**
 * Add separator for breadcrumb trail.
 */
function travel_vacation_breadcrumb_trail_print_styles() {
	$travel_vacation_breadcrumb_separator = get_theme_mod( 'travel_vacation_breadcrumb_separator', '/' );

	$style = '
		.trail-items li::after {
			content: "' . $travel_vacation_breadcrumb_separator . '";
		}'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	$style = apply_filters( 'travel_vacation_breadcrumb_trail_inline_style', trim( str_replace( array( "\r", "\n", "\t", '  ' ), '', $style ) ) );

	if ( $style ) {
		echo "\n" . '<style type="text/css" id="breadcrumb-trail-css">' . $style . '</style>' . "\n"; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
	}
}
add_action( 'wp_head', 'travel_vacation_breadcrumb_trail_print_styles' );

/**
 * Pagination for archive.
 */
function travel_vacation_render_posts_pagination() {
	$is_pagination_enabled = get_theme_mod( 'travel_vacation_enable_pagination', true );
	if ( $is_pagination_enabled ) {
		$travel_vacation_pagination_type = get_theme_mod( 'travel_vacation_pagination_type', 'default' );
		if ( 'default' === $travel_vacation_pagination_type ) :
			the_posts_navigation();
		else :
			the_posts_pagination();
		endif;
	}
}
add_action( 'travel_vacation_posts_pagination', 'travel_vacation_render_posts_pagination', 10 );

/**
 * Pagination for single post.
 */
function travel_vacation_render_post_navigation() {
	the_post_navigation(
		array(
			'prev_text' => '<span>&#10229;</span> <span class="nav-title">%title</span>',
			'next_text' => '<span class="nav-title">%title</span> <span>&#10230;</span>',
		)
	);
}
add_action( 'travel_vacation_post_navigation', 'travel_vacation_render_post_navigation' );

/**
 * Adds footer copyright text.
 */
function travel_vacation_output_footer_copyright_content() {
    $travel_vacation_theme_data = wp_get_theme();
    $travel_vacation_copyright_text = get_theme_mod('travel_vacation_footer_copyright_text');

    if (!empty($travel_vacation_copyright_text)) {
        $travel_vacation_text = $travel_vacation_copyright_text;
    } else {
        $travel_vacation_default_text = '<a href="'. esc_url(__('https://asterthemes.com/products/free-travel-wordpress-theme/','travel-vacation')) . '" target="_blank"> ' . esc_html($travel_vacation_theme_data->get('Name')) . '</a>' . '&nbsp;' . esc_html__('by', 'travel-vacation') . '&nbsp;<a target="_blank" href="' . esc_url($travel_vacation_theme_data->get('AuthorURI')) . '">' . esc_html(ucwords($travel_vacation_theme_data->get('Author'))) . '</a>';
        $travel_vacation_default_text .= sprintf(esc_html__(' | Powered by %s', 'travel-vacation'), '<a href="' . esc_url(__('https://wordpress.org/', 'travel-vacation')) . '" target="_blank">WordPress</a>. ');

        $travel_vacation_text = $travel_vacation_default_text;
    }
    ?>
    <span><?php echo wp_kses_post($travel_vacation_text); ?></span>
    <?php
}
add_action('travel_vacation_footer_copyright', 'travel_vacation_output_footer_copyright_content');


/**
 * GET START FUNCTION
 */

function travel_vacation_getpage_css($hook) {
	wp_enqueue_script( 'travel-vacation-admin-script', get_template_directory_uri() . '/resource/js/travel-vacation-admin-notice-script.js', array( 'jquery' ) );
    wp_localize_script( 'travel-vacation-admin-script', 'travel_vacation_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
    wp_enqueue_style( 'travel-vacation-notice-style', get_template_directory_uri() . '/resource/css/notice.css' );
}

add_action( 'admin_enqueue_scripts', 'travel_vacation_getpage_css' );


add_action('wp_ajax_travel_vacation_dismissable_notice', 'travel_vacation_dismissable_notice');
function travel_vacation_switch_theme() {
    delete_user_meta(get_current_user_id(), 'travel_vacation_dismissable_notice');
}
add_action('after_switch_theme', 'travel_vacation_switch_theme');
function travel_vacation_dismissable_notice() {
    update_user_meta(get_current_user_id(), 'travel_vacation_dismissable_notice', true);
    die();
}

function travel_vacation_deprecated_hook_admin_notice() {

    $travel_vacation_dismissed = get_user_meta(get_current_user_id(), 'travel_vacation_dismissable_notice', true);
    if ( !$travel_vacation_dismissed) { ?>
        <div class="getstrat updated notice notice-success is-dismissible notice-get-started-class">
	    	
	    	<div class="at-admin-content" ><h2><?php esc_html_e('Welcome to Travel Vacation', 'travel-vacation'); ?></h2>
                <p><?php _e('Explore the features of our Pro Theme and take your Travel journey to the next level.', 'travel-vacation'); ?></p>
                <p ><?php _e('Get Started With Theme By Clicking On Getting Started.', 'travel-vacation'); ?><p>
                <div style="display: flex; justify-content: center;">

	        	<a class="admin-notice-btn button button-primary button-hero" href="<?php echo esc_url( admin_url( 'themes.php?page=travel-vacation-getting-started' )); ?>"><?php esc_html_e( 'Get started', 'travel-vacation' ) ?></a>
                    <a  class="admin-notice-btn button button-primary button-hero" target="_blank" href="https://demo.asterthemes.com/travel-vacation/"><?php esc_html_e('View Demo', 'travel-vacation') ?></a>
                    <a  class="admin-notice-btn button button-primary button-hero" target="_blank" href="https://asterthemes.com/products/vacation-rental-wordpress-theme/"><?php esc_html_e('Buy Now', 'travel-vacation') ?></a>
                </div>
            </div>
            <div class="at-admin-image">
	    		<img style="width: 100%;max-width: 320px;line-height: 40px;display: inline-block;vertical-align: top;border: 2px solid #ddd;border-radius: 4px;" src="<?php echo esc_url(get_stylesheet_directory_uri()) .'/screenshot.png'; ?>" />
	    	</div>
        </div>
    <?php }
}

add_action( 'admin_notices', 'travel_vacation_deprecated_hook_admin_notice' );


//Admin Notice For Getstart
function travel_vacation_ajax_notice_handler() {
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

if ( ! function_exists( 'travel_vacation_footer_widget' ) ) :
function travel_vacation_footer_widget() {
	$travel_vacation_footer_widget_column	= get_theme_mod('travel_vacation_footer_widget_column','4'); 
		if ($travel_vacation_footer_widget_column == '4') {
			$travel_vacation_column = '3';
		} elseif ($travel_vacation_footer_widget_column == '3') {
			$travel_vacation_column = '4';
		} elseif ($travel_vacation_footer_widget_column == '2') {
			$travel_vacation_column = '6';
		} else{
			$travel_vacation_column = '12';
		}
	if($travel_vacation_footer_widget_column !==''): 
	?>
	<div class="dt_footer-widgets">
		
    <div class="footer-widgets-column">
    	<?php
		$travel_vacation_footer_widget_column = get_theme_mod('travel_vacation_footer_widget_column','4');
	for ($i=1; $i<=$travel_vacation_footer_widget_column; $i++) { ?>
        <?php if ( is_active_sidebar( 'travel-vacation-footer-widget-' .$i ) ) : ?>
            <div class="footer-one-column" >
                <?php dynamic_sidebar( 'travel-vacation-footer-widget-'.$i); ?>
            </div>
        <?php endif; ?>
        <?php  } ?>
    </div>

</div>
	<?php 
	endif; } 
endif;
add_action( 'travel_vacation_footer_widget', 'travel_vacation_footer_widget' );