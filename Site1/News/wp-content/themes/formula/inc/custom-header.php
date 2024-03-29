<?php
/**
 * Sample implementation of the Custom Header feature
 *
 * You can add an optional custom header image to header.php like so ...
 *
    <?php the_header_image_tag(); ?>
 *
 * @link https://developer.wordpress.org/themes/functionality/custom-headers/
 *
 * @package formula
 */

/**
 * Set up the WordPress core custom header feature.
 */

function formula_custom_header_setup()
{
    add_theme_support(
        'custom-header', apply_filters(
            'formula_custom_header_args', array(
            'default-image'            =>  get_stylesheet_directory_uri() . '/assets/images/page-header.jpg',
            'default-text-color'    => '#fff',
            'width'                    => 1920,
            'height'                => 1080,
            'flex-height'            => true,
            'flex-width'            => true,
            'wp-head-callback'        => 'formula_header_style',
            ) 
        ) 
    );
}
add_action('after_setup_theme', 'formula_custom_header_setup');

function formula_header_style()
{
    $header_text_color = get_header_textcolor();

    /*
    * If no custom options for text are set, let's bail.
    * get_header_textcolor() options: Any hex value, 'blank' to hide text. Default: HEADER_TEXTCOLOR.
    */
    if (get_theme_support('custom-header', 'default-text-color') === $header_text_color ) {
        return;
    }
    
    // If we get this far, we have custom styles. Let's do this.
    // Has the text been hidden?
    if (! display_header_text() ) :
        $custom_css = ".site-title, .site-description { position: absolute; clip: rect(1px, 1px, 1px, 1px); }";
        // If the user has set a custom color for the text use that.
    else :
        $custom_css = ".site-title a, .site-description { color: #" . esc_attr($header_text_color) . "}";
    endif;
    
    wp_add_inline_style('formula-style', $custom_css);
}
add_action('wp_enqueue_scripts', 'formula_header_style');
