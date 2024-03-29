<?php
/**
 * Luxury Hotels functions and definitions
 *
 * @package Luxury Hotels
 * @subpackage luxury_hotels
 */

function luxury_hotels_setup() {

	add_theme_support( 'automatic-feed-links' );
	add_theme_support( 'woocommerce' );
	add_theme_support( 'title-tag' );
	add_theme_support( "responsive-embeds" );
	add_theme_support( 'wp-block-styles' );
	add_theme_support( 'align-wide' );
	add_theme_support( 'post-thumbnails' );
	add_image_size( 'luxury-hotels-featured-image', 2000, 1200, true );
	add_image_size( 'luxury-hotels-thumbnail-avatar', 100, 100, true );

	// Set the default content width.
	$GLOBALS['content_width'] = 525;

	// This theme uses wp_nav_menu() in two locations.
	register_nav_menus( array(
		'primary-menu'    => __( 'Primary Menu', 'luxury-hotels' ),
	) );

	// Add theme support for Custom Logo.
	add_theme_support( 'custom-logo', array(
		'width'       => 250,
		'height'      => 250,
		'flex-width'  => true,
		'flex-height'  => true,
	) );

	// Add theme support for selective refresh for widgets.
	add_theme_support( 'customize-selective-refresh-widgets' );

	add_theme_support( 'custom-background', array(
		'default-color' => 'ffffff'
	) );

	/*
	 * Enable support for Post Formats.
	 *
	 * See: https://codex.wordpress.org/Post_Formats
	 */
	add_theme_support( 'post-formats', array('image','video','gallery','audio',) );

	add_theme_support( 'html5', array('comment-form','comment-list','gallery','caption',) );

	/*
	 * This theme styles the visual editor to resemble the theme style,
	 * specifically font, colors, and column width.
 	 */
	add_editor_style( array( 'assets/css/editor-style.css', luxury_hotels_fonts_url() ) );
}
add_action( 'after_setup_theme', 'luxury_hotels_setup' );

/**
 * Register custom fonts.
 */
function luxury_hotels_fonts_url(){
	$luxury_hotels_font_url = '';
	$luxury_hotels_font_family = array();
	$luxury_hotels_font_family[] = 'Nunito Sans:ital,opsz,wght@0,6..12,200;0,6..12,300;0,6..12,400;0,6..12,500;0,6..12,600;0,6..12,700;0,6..12,800;0,6..12,900;0,6..12,1000;1,6..12,200;1,6..12,300;1,6..12,400;1,6..12,500;1,6..12,600;1,6..12,700;1,6..12,800;1,6..12,900;1,6..12,1000';
	$luxury_hotels_font_family[] = 'Sriracha';

	$luxury_hotels_font_family[] = 'Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$luxury_hotels_font_family[] = 'Bad Script';
	$luxury_hotels_font_family[] = 'Bebas Neue';
	$luxury_hotels_font_family[] = 'Fjalla One';
	$luxury_hotels_font_family[] = 'PT Sans:ital,wght@0,400;0,700;1,400;1,700';
	$luxury_hotels_font_family[] = 'PT Serif:ital,wght@0,400;0,700;1,400;1,700';
	$luxury_hotels_font_family[] = 'Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900';
	$luxury_hotels_font_family[] = 'Roboto Condensed:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700';
	$luxury_hotels_font_family[] = 'Alex Brush';
	$luxury_hotels_font_family[] = 'Overpass:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$luxury_hotels_font_family[] = 'Montserrat:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$luxury_hotels_font_family[] = 'Playball';
	$luxury_hotels_font_family[] = 'Alegreya:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$luxury_hotels_font_family[] = 'Julius Sans One';
	$luxury_hotels_font_family[] = 'Arsenal:ital,wght@0,400;0,700;1,400;1,700';
	$luxury_hotels_font_family[] = 'Slabo 13px';
	$luxury_hotels_font_family[] = 'Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900';
	$luxury_hotels_font_family[] = 'Overpass Mono:wght@300;400;500;600;700';
	$luxury_hotels_font_family[] = 'Source Sans Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,200;1,300;1,400;1,600;1,700;1,900';
	$luxury_hotels_font_family[] = 'Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$luxury_hotels_font_family[] = 'Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900';
	$luxury_hotels_font_family[] = 'Rubik:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$luxury_hotels_font_family[] = 'Lora:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$luxury_hotels_font_family[] = 'Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700';
	$luxury_hotels_font_family[] = 'Cabin:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$luxury_hotels_font_family[] = 'Arimo:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$luxury_hotels_font_family[] = 'Playfair Display:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$luxury_hotels_font_family[] = 'Quicksand:wght@300;400;500;600;700';
	$luxury_hotels_font_family[] = 'Padauk:wght@400;700';
	$luxury_hotels_font_family[] = 'Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$luxury_hotels_font_family[] = 'Inconsolata:wght@200;300;400;500;600;700;800;900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$luxury_hotels_font_family[] = 'Bitter:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Mulish:ital,wght@0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;0,1000;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900;1,1000';
	$luxury_hotels_font_family[] = 'Pacifico';
	$luxury_hotels_font_family[] = 'Indie Flower';
	$luxury_hotels_font_family[] = 'VT323';
	$luxury_hotels_font_family[] = 'Dosis:wght@200;300;400;500;600;700;800';
	$luxury_hotels_font_family[] = 'Frank Ruhl Libre:wght@300;400;500;700;900';
	$luxury_hotels_font_family[] = 'Fjalla One';
	$luxury_hotels_font_family[] = 'Figtree:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$luxury_hotels_font_family[] = 'Oxygen:wght@300;400;700';
	$luxury_hotels_font_family[] = 'Arvo:ital,wght@0,400;0,700;1,400;1,700';
	$luxury_hotels_font_family[] = 'Noto Serif:ital,wght@0,400;0,700;1,400;1,700';
	$luxury_hotels_font_family[] = 'Lobster';
	$luxury_hotels_font_family[] = 'Crimson Text:ital,wght@0,400;0,600;0,700;1,400;1,600;1,700';
	$luxury_hotels_font_family[] = 'Yanone Kaffeesatz:wght@200;300;400;500;600;700';
	$luxury_hotels_font_family[] = 'Anton';
	$luxury_hotels_font_family[] = 'Libre Baskerville:ital,wght@0,400;0,700;1,400';
	$luxury_hotels_font_family[] = 'Bree Serif';
	$luxury_hotels_font_family[] = 'Gloria Hallelujah';
	$luxury_hotels_font_family[] = 'Abril Fatface';
	$luxury_hotels_font_family[] = 'Varela Round';
	$luxury_hotels_font_family[] = 'Vampiro One';
	$luxury_hotels_font_family[] = 'Shadows Into Light';
	$luxury_hotels_font_family[] = 'Cuprum:ital,wght@0,400;0,500;0,600;0,700;1,400;1,500;1,600;1,700';
	$luxury_hotels_font_family[] = 'Rokkitt:wght@100;200;300;400;500;600;700;800;900';
	$luxury_hotels_font_family[] = 'Vollkorn:ital,wght@0,400;0,500;0,600;0,700;0,800;0,900;1,400;1,500;1,600;1,700;1,800;1,900';
	$luxury_hotels_font_family[] = 'Francois One';
	$luxury_hotels_font_family[] = 'Orbitron:wght@400;500;600;700;800;900';
	$luxury_hotels_font_family[] = 'Patua One';
	$luxury_hotels_font_family[] = 'Acme';
	$luxury_hotels_font_family[] = 'Satisfy';
	$luxury_hotels_font_family[] = 'Josefin Slab:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;1,100;1,200;1,300;1,400;1,500;1,600;1,700';
	$luxury_hotels_font_family[] = 'Quattrocento Sans:ital,wght@0,400;0,700;1,400;1,700';
	$luxury_hotels_font_family[] = 'Architects Daughter';
	$luxury_hotels_font_family[] = 'Russo One';
	$luxury_hotels_font_family[] = 'Monda:wght@400;700';
	$luxury_hotels_font_family[] = 'Righteous';
	$luxury_hotels_font_family[] = 'Lobster Two:ital,wght@0,400;0,700;1,400;1,700';
	$luxury_hotels_font_family[] = 'Hammersmith One';
	$luxury_hotels_font_family[] = 'Courgette';
	$luxury_hotels_font_family[] = 'Permanent Marke';
	$luxury_hotels_font_family[] = 'Cherry Swash:wght@400;700';
	$luxury_hotels_font_family[] = 'Cormorant Garamond:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700';
	$luxury_hotels_font_family[] = 'Poiret One';
	$luxury_hotels_font_family[] = 'BenchNine:wght@300;400;700';
	$luxury_hotels_font_family[] = 'Economica:ital,wght@0,400;0,700;1,400;1,700';
	$luxury_hotels_font_family[] = 'Handlee';
	$luxury_hotels_font_family[] = 'Cardo:ital,wght@0,400;0,700;1,400';
	$luxury_hotels_font_family[] = 'Alfa Slab One';
	$luxury_hotels_font_family[] = 'Averia Serif Libre:ital,wght@0,300;0,400;0,700;1,300;1,400;1,700';
	$luxury_hotels_font_family[] = 'Cookie';
	$luxury_hotels_font_family[] = 'Chewy';
	$luxury_hotels_font_family[] = 'Great Vibes';
	$luxury_hotels_font_family[] = 'Coming Soon';
	$luxury_hotels_font_family[] = 'Philosopher:ital,wght@0,400;0,700;1,400;1,700';
	$luxury_hotels_font_family[] = 'Days One';
	$luxury_hotels_font_family[] = 'Kanit:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$luxury_hotels_font_family[] = 'Shrikhand';
	$luxury_hotels_font_family[] = 'Tangerine:wght@400;700';
	$luxury_hotels_font_family[] = 'IM Fell English SC';
	$luxury_hotels_font_family[] = 'Boogaloo';
	$luxury_hotels_font_family[] = 'Bangers';
	$luxury_hotels_font_family[] = 'Fredoka One';
	$luxury_hotels_font_family[] = 'Volkhov:ital,wght@0,400;0,700;1,400;1,700';
	$luxury_hotels_font_family[] = 'Shadows Into Light Two';
	$luxury_hotels_font_family[] = 'Marck Script';
	$luxury_hotels_font_family[] = 'Sacramento';
	$luxury_hotels_font_family[] = 'Unica One';
	$luxury_hotels_font_family[] = 'Dancing Script:wght@400;500;600;700';
	$luxury_hotels_font_family[] = 'Exo 2:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$luxury_hotels_font_family[] = 'Archivo:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$luxury_hotels_font_family[] = 'Jost:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900';
	$luxury_hotels_font_family[] = 'DM Serif Display:ital@0;1';
	$luxury_hotels_font_family[] = 'Open Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;0,800;1,300;1,400;1,500;1,600;1,700;1,800';
	
	$luxury_hotels_query_args = array(
		'family'	=> rawurlencode(implode('|',$luxury_hotels_font_family)),
	);
	$luxury_hotels_font_url = add_query_arg($luxury_hotels_query_args,'//fonts.googleapis.com/css');
	return $luxury_hotels_font_url;
	$contents = wptt_get_webfont_url( esc_url_raw( $luxury_hotels_font_url ) );
}

/**
 * Register widget area.
 */
function luxury_hotels_widgets_init() {
	register_sidebar( array(
		'name'          => __( 'Blog Sidebar', 'luxury-hotels' ),
		'id'            => 'sidebar-1',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'luxury-hotels' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Page Sidebar', 'luxury-hotels' ),
		'id'            => 'sidebar-2',
		'description'   => __( 'Add widgets here to appear in your sidebar on pages.', 'luxury-hotels' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Sidebar 3', 'luxury-hotels' ),
		'id'            => 'sidebar-3',
		'description'   => __( 'Add widgets here to appear in your sidebar on blog posts and archive pages.', 'luxury-hotels' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 1', 'luxury-hotels' ),
		'id'            => 'footer-1',
		'description'   => __( 'Add widgets here to appear in your footer.', 'luxury-hotels' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 2', 'luxury-hotels' ),
		'id'            => 'footer-2',
		'description'   => __( 'Add widgets here to appear in your footer.', 'luxury-hotels' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 3', 'luxury-hotels' ),
		'id'            => 'footer-3',
		'description'   => __( 'Add widgets here to appear in your footer.', 'luxury-hotels' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );

	register_sidebar( array(
		'name'          => __( 'Footer 4', 'luxury-hotels' ),
		'id'            => 'footer-4',
		'description'   => __( 'Add widgets here to appear in your footer.', 'luxury-hotels' ),
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget'  => '</section>',
		'before_title'  => '<h3 class="widget-title">',
		'after_title'   => '</h3>',
	) );
}
add_action( 'widgets_init', 'luxury_hotels_widgets_init' );

/**
 * Enqueue scripts and styles.
 */
function luxury_hotels_scripts() {
	// Add custom fonts, used in the main stylesheet.
	wp_enqueue_style( 'luxury-hotels-fonts', luxury_hotels_fonts_url(), array(), null );

	// Bootstrap
	wp_enqueue_style( 'bootstrap-css', get_theme_file_uri( '/assets/css/bootstrap.css' ) );

	// owl
	wp_enqueue_style( 'owl-carousel-css', get_theme_file_uri( '/assets/css/owl.carousel.css' ) );

	// Theme stylesheet.
	wp_enqueue_style( 'luxury-hotels-style', get_stylesheet_uri() );
	require get_parent_theme_file_path( '/tp-theme-color.php' );
	require get_parent_theme_file_path( '/tp-body-width-layout.php' );

	if ( get_header_image() ) :
	$luxury_hotels_custom_css = "
        .headerbox{
			background-image:url('".esc_url(get_header_image())."') !important;
			height: 500px;
			display: block;
			background-repeat: no-repeat;
    		background-size: 100% 100%;
		}";
	   	wp_add_inline_style( 'luxury-hotels-style', $luxury_hotels_custom_css );
	endif;

	wp_add_inline_style( 'luxury-hotels-style',$luxury_hotels_tp_theme_css );

	// Theme block stylesheet.
	wp_enqueue_style( 'luxury-hotels-block-style', get_theme_file_uri( '/assets/css/blocks.css' ), array( 'luxury-hotels-style' ), '1.0' );

	// Fontawesome
	wp_enqueue_style( 'fontawesome-css', get_theme_file_uri( '/assets/css/fontawesome-all.css' ) );

	wp_enqueue_script( 'owl-carousel-js', get_theme_file_uri( '/assets/js/owl.carousel.js' ), array( 'jquery' ), true );

	wp_enqueue_script( 'luxury-hotels-custom-scripts', esc_url( get_template_directory_uri() ) . '/assets/js/custom.js', array('jquery'), true );

	wp_enqueue_script( 'luxury-hotels-focus-nav', esc_url( get_template_directory_uri() ) . '/assets/js/focus-nav.js', array('jquery'), true);

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
	
	$luxury_hotels_body_font_family = get_theme_mod('luxury_hotels_body_font_family', '');

	$luxury_hotels_heading_font_family = get_theme_mod('luxury_hotels_heading_font_family', '');

	$luxury_hotels_menu_font_family = get_theme_mod('luxury_hotels_menu_font_family', '');

	$luxury_hotels_tp_theme_css = '
		body{
		    font-family: '.esc_html($luxury_hotels_body_font_family).';
		}
		h1{
		    font-family: '.esc_html($luxury_hotels_heading_font_family).';
		}
		h2{
		    font-family: '.esc_html($luxury_hotels_heading_font_family).';
		}
		h3{
		    font-family: '.esc_html($luxury_hotels_heading_font_family).';
		}
		h4{
		    font-family: '.esc_html($luxury_hotels_heading_font_family).';
		}
		h5{
		    font-family: '.esc_html($luxury_hotels_heading_font_family).';
		}
		h6{
		    font-family: '.esc_html($luxury_hotels_heading_font_family).';
		}
		#theme-sidebar .wp-block-search .wp-block-search__label{
		    font-family: '.esc_html($luxury_hotels_heading_font_family).';
		}
		.menubar{
		    font-family: '.esc_html($luxury_hotels_menu_font_family).';
		}
	';
	wp_add_inline_style('luxury-hotels-style', $luxury_hotels_tp_theme_css);
}
add_action( 'wp_enqueue_scripts', 'luxury_hotels_scripts' );

//Admin Enqueue for Admin
function luxury_hotels_admin_enqueue_scripts(){
	wp_enqueue_style('luxury-hotels-admin-style', get_template_directory_uri() . '/assets/css/admin.css');
	wp_enqueue_script( 'luxury-hotels-custom-scripts', get_template_directory_uri(). '/assets/js/custom.js', array('jquery'), true);
	wp_register_script( 'luxury-hotels-admin-script', get_template_directory_uri() . '/assets/js/luxury-hotels-admin.js', array( 'jquery' ), '', true );

	wp_localize_script(
		'luxury-hotels-admin-script',
		'luxury_hotels',
		array(
			'admin_ajax'	=>	admin_url('admin-ajax.php'),
			'wpnonce'			=>	wp_create_nonce('luxury_hotels_dismissed_notice_nonce')
		)
	);
	wp_enqueue_script('luxury-hotels-admin-script');

    wp_localize_script( 'luxury-hotels-admin-script', 'luxury_hotels_ajax_object',
        array( 'ajax_url' => admin_url( 'admin-ajax.php' ) )
    );
}
add_action( 'admin_enqueue_scripts', 'luxury_hotels_admin_enqueue_scripts' );
/*radio button sanitization*/
function luxury_hotels_sanitize_choices( $input, $setting ) {
    global $wp_customize;
    $control = $wp_customize->get_control( $setting->id );
    if ( array_key_exists( $input, $control->choices ) ) {
        return $input;
    } else {
        return $setting->default;
    }
}

function luxury_hotels_sanitize_dropdown_pages( $page_id, $setting ) {
	$page_id = absint( $page_id );
	return ( 'publish' == get_post_status( $page_id ) ? $page_id : $setting->default );
}


// Change number or products per row to 3
add_filter('loop_shop_columns', 'luxury_hotels_loop_columns');
if (!function_exists('luxury_hotels_loop_columns')) {
	function luxury_hotels_loop_columns() {
		$columns = get_theme_mod( 'luxury_hotels_per_columns', 3 );
		return $columns;
	}
}
// Sanitize Sortable control.
function luxury_hotels_sanitize_sortable( $val, $setting ) {
	if ( is_string( $val ) || is_numeric( $val ) ) {
		return array(
			esc_attr( $val ),
		);
	}
	$sanitized_value = array();
	foreach ( $val as $item ) {
		if ( isset( $setting->manager->get_control( $setting->id )->choices[ $item ] ) ) {
			$sanitized_value[] = esc_attr( $item );
		}
	}
	return $sanitized_value;
}

/* Excerpt Limit Begin */
function luxury_hotels_excerpt_function($excerpt_count = 35) {
    $luxury_hotels_excerpt = get_the_excerpt();

    $luxury_hotels_text_excerpt = wp_strip_all_tags($luxury_hotels_excerpt);

    $luxury_hotels_excerpt_limit = esc_attr(get_theme_mod('luxury_hotels_excerpt_count', $excerpt_count));

    $luxury_hotels_theme_excerpt = implode(' ', array_slice(explode(' ', $luxury_hotels_text_excerpt), 0, $luxury_hotels_excerpt_limit));

    return $luxury_hotels_theme_excerpt;
}

//Change number of products that are displayed per page (shop page)
add_filter( 'loop_shop_per_page', 'luxury_hotels_per_page', 20 );
function luxury_hotels_per_page( $luxury_hotels_cols ) {
  	$luxury_hotels_cols = get_theme_mod( 'luxury_hotels_product_per_page', 9 );
	return $luxury_hotels_cols;
}

function luxury_hotels_sanitize_phone_number( $phone ) {
	return preg_replace( '/[^\d+]/', '', $phone );
}

function luxury_hotels_sanitize_checkbox( $input ) {
	// Boolean check
	return ( ( isset( $input ) && true == $input ) ? true : false );
}

function luxury_hotels_sanitize_number_absint( $number, $setting ) {
	// Ensure $number is an absolute integer (whole number, zero or greater).
	$number = absint( $number );

	// If the input is an absolute integer, return it; otherwise, return the default
	return ( $number ? $number : $setting->default );
}
// Category count 
function luxury_hotels_display_post_category_count() {
    $luxury_hotels_category = get_the_category();
    $luxury_hotels_category_count = ($luxury_hotels_category) ? count($luxury_hotels_category) : 0;
    $luxury_hotels_category_text = ($luxury_hotels_category_count === 1) ? 'category' : 'categories'; // Check for pluralization
    echo $luxury_hotels_category_count . ' ' . $luxury_hotels_category_text;
}

//post tag
function custom_tags_filter($luxury_hotels_tag_list) {
    // Replace the comma (,) with an empty string
    $luxury_hotels_tag_list = str_replace(', ', '', $luxury_hotels_tag_list);

    return $luxury_hotels_tag_list;
}
add_filter('the_tags', 'custom_tags_filter');

function custom_output_tags() {
    $luxury_hotels_tags = get_the_tags();

    if ($luxury_hotels_tags) {
        $luxury_hotels_tags_output = '<div class="post_tag">Tags: ';

        $luxury_hotels_first_tag = reset($luxury_hotels_tags);

        foreach ($luxury_hotels_tags as $tag) {
            $luxury_hotels_tags_output .= '<a href="' . esc_url(get_tag_link($tag)) . '" rel="tag" class="mr-2">' . esc_html($tag->name) . '</a>';
            if ($tag !== $luxury_hotels_first_tag) {
                $luxury_hotels_tags_output .= ' ';
            }
        }

        $luxury_hotels_tags_output .= '</div>';

        echo $luxury_hotels_tags_output;
    }
}

function luxury_hotels_sanitize_number_range( $number, $setting ) {

	// Ensure input is an absolute integer.
	$number = absint( $number );

	// Get the input attributes associated with the setting.
	$atts = $setting->manager->get_control( $setting->id )->input_attrs;

	// Get minimum number in the range.
	$min = ( isset( $atts['min'] ) ? $atts['min'] : $number );

	// Get maximum number in the range.
	$max = ( isset( $atts['max'] ) ? $atts['max'] : $number );

	// Get step.
	$step = ( isset( $atts['step'] ) ? $atts['step'] : 1 );

	// If the number is within the valid range, return it; otherwise, return the default
	return ( $min <= $number && $number <= $max && is_int( $number / $step ) ? $number : $setting->default );
}

/**
 * Use front-page.php when Front page displays is set to a static page.
 */
function luxury_hotels_front_page_template( $template ) {
	return is_home() ? '' : $template;
}
add_filter( 'frontpage_template',  'luxury_hotels_front_page_template' );


define('LUXURY_HOTELS_CREDIT',__('https://www.themespride.com/themes/free-hotels-wordpress-theme/','luxury-hotels') );
if ( ! function_exists( 'luxury_hotels_credit' ) ) {
	function luxury_hotels_credit(){
		echo "<a href=".esc_url(LUXURY_HOTELS_CREDIT)." target='_blank'>".esc_html__(get_theme_mod('luxury_hotels_footer_text',__('Luxury Hotels WordPress Theme','luxury-hotels')))."</a>";
	}
}

add_action( 'wp_ajax_luxury_hotels_dismissed_notice_handler', 'luxury_hotels_ajax_notice_handler' );

function luxury_hotels_ajax_notice_handler() {
	if (!wp_verify_nonce($_POST['wpnonce'], 'luxury_hotels_dismissed_notice_nonce')) {
		exit;
	}
    if ( isset( $_POST['type'] ) ) {
        $type = sanitize_text_field( wp_unslash( $_POST['type'] ) );
        update_option( 'dismissed-' . $type, TRUE );
    }
}

function luxury_hotels_activation_notice() { 

	if ( ! get_option('dismissed-get_started', FALSE ) ) { ?>

    <div class="luxury-hotels-notice-wrapper updated notice notice-get-started-class is-dismissible" data-notice="get_started">
        <div class="luxury-hotels-getting-started-notice clearfix">
            <div class="luxury-hotels-theme-notice-content">
                <h2 class="luxury-hotels-notice-h2">
                    <?php
                printf(
                /* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
                    esc_html__( 'Welcome! Thank you for choosing %1$s!', 'luxury-hotels' ), '<strong>'. wp_get_theme()->get('Name'). '</strong>' );
                ?>
                </h2>

                <p class="plugin-install-notice"><?php echo sprintf(__('Click here to get started with the theme set-up.', 'luxury-hotels')) ?></p>

                <a class="luxury-hotels-btn-get-started button button-primary button-hero luxury-hotels-button-padding" href="<?php echo esc_url( admin_url( 'themes.php?page=luxury-hotels-about' )); ?>" ><?php esc_html_e( 'Get started', 'luxury-hotels' ) ?></a><span class="luxury-hotels-push-down">
                <?php
                    /* translators: %1$s: Anchor link start %2$s: Anchor link end */
                    printf(
                        'or %1$sCustomize theme%2$s</a></span>',
                        '<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
                        '</a>'
                    );
                ?>
            </div>
        </div>
    </div>
<?php }

}

add_action( 'admin_notices', 'luxury_hotels_activation_notice' );

add_action('after_switch_theme', 'luxury_hotels_setup_options');
function luxury_hotels_setup_options () {
    update_option('dismissed-get_started', FALSE );
}

/**
 * Logo Custamization.
 */

function luxury_hotels_logo_width(){

	$luxury_hotels_logo_width   = get_theme_mod( 'luxury_hotels_logo_width', 50 );

	echo "<style type='text/css' media='all'>"; ?>
		img.custom-logo{
		    width: <?php echo absint( $luxury_hotels_logo_width ); ?>px;
		    max-width: 100%;
		}
	<?php echo "</style>";
}

add_action( 'wp_head', 'luxury_hotels_logo_width' );

/**
 * Implement the Custom Header feature.
 */
require get_parent_theme_file_path( '/inc/custom-header.php' );

/**
 * Custom template tags for this theme.
 */
require get_parent_theme_file_path( '/inc/template-tags.php' );

/**
 * Additional features to allow styling of the templates.
 */
require get_parent_theme_file_path( '/inc/template-functions.php' );

/**
 * Customizer additions.
 */
require get_parent_theme_file_path( '/inc/customizer.php' );

/**
 * About Theme Page
 */
require get_parent_theme_file_path( '/inc/about-theme.php' );

/**
 * Load Theme Web File
 */
require get_parent_theme_file_path('/inc/wptt-webfont-loader.php' );

/**
 * Load Toggle file
 */
require get_parent_theme_file_path( '/inc/controls/customize-control-toggle.php' );

/**
 * load sortable file
 */
require get_parent_theme_file_path( '/inc/controls/sortable-control.php' );


if ( !function_exists('luxury_hotels_logo_shape') ) {
    function luxury_hotels_logo_shape(){ ?>

    
<svg class="logo-shape1" width="190" height="201" viewBox="0 0 190 201" fill="none" xmlns="http://www.w3.org/2000/svg">
<path d="M9.58769 200.058C4.63205 201.062 -0.00012207 197.274 -0.00012207 192.218L-0.00012207 8C-0.00012207 3.58173 3.5816 0 7.99988 0L182 0C186.418 0 190 3.58173 190 8L190 156.981C190 160.788 187.318 164.067 183.588 164.822L9.58769 200.058Z" fill="#FAFAFA"/>
</svg>

    <?php }
}
if ( !function_exists('luxury_hotels_logo_shape2') ) {
    function luxury_hotels_logo_shape2(){ ?>

    <svg class="logo-shape2" xmlns="http://www.w3.org/2000/svg" width="148" height="163" viewBox="0 0 148 163" fill="none">
      <path d="M6.03258 162.727C2.92415 163.383 0 161.011 0 157.834L0 5C0 2.23857 2.23858 0 5 0L143 0C145.761 0 148 2.23857 148 5L148 128.707C148 131.071 146.345 133.111 144.033 133.599L6.03258 162.727Z" fill="#FF8F50"/>
    </svg>

    <?php }
}

add_action( 'wp_enqueue_scripts', 'luxury_hotels_header_style' );
function luxury_hotels_header_style() {
	//Check if user has defined any header image.
	
}