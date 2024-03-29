<?php
/**
 * formula functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package WordPress
 * @subpackage formula
 * @since formula 1.0
 */

/**
 * Table of Contents:
 * Theme Support
 * Required Files
 * Register Styles
 * Register Scripts
 * Register Menus
 * Custom Logo
 * WP Body Open
 * Register Sidebars
 * Enqueue Block Editor Assets
 * Enqueue Classic Editor Styles
 * Block Editor Settings
 */

/**
 * Sets up theme defaults and registers support for various WordPress features.
 *
 * Note that this function is hooked into the after_setup_theme hook, which
 * runs before the init hook. The init hook is too late for some features, such
 * as indicating support for post thumbnails.
 */


/**
 * REQUIRED FILES
 * Include required files.
 */
require get_template_directory() . '/inc/template-tags.php';

// Handle SVG icons.
require get_template_directory() . '/theme-menu/classes/class-formula-svg-icons.php';
require get_template_directory() . '/inc/svg-icons.php';

// Require Separator Control class.
require get_template_directory() . '/theme-menu/classes/class-formula-separator-control.php';

// Custom comment walker.
//require get_template_directory() . '/theme-menu/classes/class-formula-walker-comment.php';

// Custom page walker.
require get_template_directory() . '/theme-menu/classes/class-formula-walker-page.php';

// Custom script loader class.
require get_template_directory() . '/theme-menu/classes/class-formula-script-loader.php';

// Non-latin language handling.
require get_template_directory() . '/theme-menu/classes/class-formula-non-latin-languages.php';

/**
 * Register and Enqueue Scripts.
 */
function formula_register_scripts() {

	$theme_version = wp_get_theme()->get( 'Version' );

	if ( ( ! is_admin() ) && is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}

	wp_enqueue_script( 'formula-js', get_template_directory_uri() . '/assets/js/index.js', array(), $theme_version, false );
	wp_script_add_data( 'formula-js', 'async', true );

}

add_action( 'wp_enqueue_scripts', 'formula_register_scripts' );

/**
 * Fix skip link focus in IE11.
 *
 * This does not enqueue the script because it is tiny and because it is only for IE11,
 * thus it does not warrant having an entire dedicated blocking script being loaded.
 *
 * @link https://git.io/vWdr2
 */
function formula_skip_link_focus_fix() {
	// The following is minified via `terser --compress --mangle -- assets/js/skip-link-focus-fix.js`.
	?>
	<script>
	/(trident|msie)/i.test(navigator.userAgent)&&document.getElementById&&window.addEventListener&&window.addEventListener("hashchange",function(){var t,e=location.hash.substring(1);/^[A-z0-9_-]+$/.test(e)&&(t=document.getElementById(e))&&(/^(?:a|select|input|button|textarea)$/i.test(t.tagName)||(t.tabIndex=-1),t.focus())},!1);
	</script>
	<?php
}
add_action( 'wp_print_footer_scripts', 'formula_skip_link_focus_fix' );

/** Enqueue non-latin language styles
 *
 * @since formula 1.0
 *
 * @return void
 */
function formula_non_latin_languages() {
	$custom_css = formula_Non_Latin_Languages::get_non_latin_css( 'front-end' );

	if ( $custom_css ) {
		wp_add_inline_style( 'twentytwenty-style', $custom_css );
	}
}

add_action( 'wp_enqueue_scripts', 'formula_non_latin_languages' );

/**
 * Register navigation menus uses wp_nav_menu in five places.
 */
function formula_menus() {

	$locations = array(
		'primary'  => __( 'Desktop Horizontal Menu', 'formula' ),
		//'expanded' => __( 'Desktop Expanded Menu', 'formula' ),
		'mobile'   => __( 'Mobile Menu', 'formula' ),
		'footer'   => __( 'Footer Menu', 'formula' ),
		//'social'   => __( 'Social Menu', 'formula' ),
	);

	register_nav_menus( $locations );
}

add_action( 'init', 'formula_menus' );

/**
 * Get the information about the logo.
 *
 * @param string $html The HTML output from get_custom_logo (core function).
 * @return string
 */
function formula_get_custom_logo( $html ) {

	$logo_id = get_theme_mod( 'custom_logo' );

	if ( ! $logo_id ) {
		return $html;
	}

	$logo = wp_get_attachment_image_src( $logo_id, 'full' );

	if ( $logo ) {
		// For clarity.
		$logo_width  = esc_attr( $logo[1] );
		$logo_height = esc_attr( $logo[2] );

		// If the retina logo setting is active, reduce the width/height by half.
		if ( get_theme_mod( 'retina_logo', false ) ) {
			$logo_width  = floor( $logo_width / 2 );
			$logo_height = floor( $logo_height / 2 );

			$search = array(
				'/width=\"\d+\"/iU',
				'/height=\"\d+\"/iU',
			);

			$replace = array(
				"width=\"{$logo_width}\"",
				"height=\"{$logo_height}\"",
			);

			// Add a style attribute with the height, or append the height to the style attribute if the style attribute already exists.
			if ( strpos( $html, ' style=' ) === false ) {
				$search[]  = '/(src=)/';
				$replace[] = "style=\"height: {$logo_height}px;\" src=";
			} else {
				$search[]  = '/(style="[^"]*)/';
				$replace[] = "$1 height: {$logo_height}px;";
			}

			$html = preg_replace( $search, $replace, $html );

		}
	}

	return $html;

}

add_filter( 'get_custom_logo', 'formula_get_custom_logo' );

if ( ! function_exists( 'formula_wp_body_open' ) ) {

	/**
	 * Shim for wp_body_open, ensuring backward compatibility with versions of WordPress older than 5.2.
	 */
	function formula_wp_body_open() {
		do_action( 'formula_wp_body_open' );
	}
}

/**
 * Include a skip to content link at the top of the page so that users can bypass the menu.
 */
function formula_skip_link() {
	echo '<a class="skip-link screen-reader-text" href="#section">' . __( 'Skip to the content', 'formula' ) . '</a>';
}

add_action( 'wp_body_open', 'formula_skip_link', 5 );