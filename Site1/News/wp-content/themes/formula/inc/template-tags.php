<?php
/**
 * Custom template tags for this theme.
 *
 * @package WordPress
 * @subpackage formula
 * @since formula 1.0
 */

/**
 * Table of Contents:
 * Logo & Description
 * Comments
 * Post Meta
 * Menus
 * Classes
 * Archives
 * Miscellaneous
 */

/**
 * Logo & Description
 */

/**
 * Displays the site logo, either text or image.
 *
 * @since formula 1.0
 *
 * @param array $args Arguments for displaying the site logo either as an image or text.
 * @param bool  $echo Echo or return the HTML.
 * @return string Compiled HTML based on our arguments.
 */
function formula_site_logo( $args = array(), $echo = true ) {
	$logo       = get_custom_logo();
	$site_title = get_bloginfo( 'name' );
	$contents   = '';
	$classname  = '';

	$defaults = array(
		'logo'        => '%1$s<span class="screen-reader-text">%2$s</span>',
		'logo_class'  => 'site-logo',
		'title'       => '<a href="%1$s">%2$s</a>',
		'title_class' => 'site-title',
		'home_wrap'   => '<h1 class="%1$s">%2$s</h1>',
		'single_wrap' => '<div class="%1$s faux-heading">%2$s</div>',
		'condition'   => ( is_front_page() || is_home() ) && ! is_page(),
	);

	$args = wp_parse_args( $args, $defaults );

	/**
	 * Filters the arguments for `formula_site_logo()`.
	 *
	 * @since formula 1.0
	 *
	 * @param array $args     Parsed arguments.
	 * @param array $defaults Function's default arguments.
	 */
	$args = apply_filters( 'formula_site_logo_args', $args, $defaults );

	if ( has_custom_logo() ) {
		$contents  = sprintf( $args['logo'], $logo, '' );
		$classname = $args['logo_class'];
	} else {
		$contents  = sprintf( $args['title'], esc_url( get_home_url( null, '/' ) ), '' );
		$classname = $args['title_class'];
	}

	$wrap = $args['condition'] ? 'home_wrap' : 'single_wrap';

	$html = sprintf( $args[ $wrap ], $classname, $contents );

	/**
	 * Filters the arguments for `formula_site_logo()`.
	 *
	 * @since formula 1.0
	 *
	 * @param string $html      Compiled HTML based on our arguments.
	 * @param array  $args      Parsed arguments.
	 * @param string $classname Class name based on current view, home or single.
	 * @param string $contents  HTML for site title or logo.
	 */
	$html = apply_filters( 'formula_site_logo', $html, $args, $classname, $contents );

	if ( ! $echo ) {
		return $html;
	}

	echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped

	$formula_sticky_bar_logo = get_theme_mod('formula_sticky_bar_logo');
	if($formula_sticky_bar_logo != null) : ?>	
	<a class="sticky-navbar-brand" href="<?php echo esc_url( home_url( '/' ) ); ?>" >
		<img src="<?php echo esc_url($formula_sticky_bar_logo); ?>" class="custom-logo" alt="<?php esc_attr(bloginfo("name")); ?>">
	</a>
	<?php
	endif;
}

/**
 * Displays the site description.
 *
 * @since formula 1.0
 *
 * @param bool $echo Echo or return the html.
 * @return string The HTML to display.
 */
function formula_site_description( $echo = true ) {
	$description = get_bloginfo( 'description' );

	if ( ! $description ) {
		return;
	}

	$wrapper = '<div class="site-description">%s</div><!-- .site-description -->';

	$html = sprintf( $wrapper, esc_html( $description ) );

	/**
	 * Filters the HTML for the site description.
	 *
	 * @since formula 1.0
	 *
	 * @param string $html        The HTML to display.
	 * @param string $description Site description via `bloginfo()`.
	 * @param string $wrapper     The format used in case you want to reuse it in a `sprintf()`.
	 */
	$html = apply_filters( 'formula_site_description', $html, $description, $wrapper );

	if ( ! $echo ) {
		return $html;
	}

	echo $html; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
}

/**
 * Comments
 */

/**
 * Checks if the specified comment is written by the author of the post commented on.
 *
 * @since formula 1.0
 *
 * @param object $comment Comment data.
 * @return bool
 */
function formula_is_comment_by_post_author( $comment = null ) {

	if ( is_object( $comment ) && $comment->user_id > 0 ) {

		$user = get_userdata( $comment->user_id );
		$post = get_post( $comment->comment_post_ID );

		if ( ! empty( $user ) && ! empty( $post ) ) {

			return $comment->user_id === $post->post_author;

		}
	}
	return false;

}

/**
 * Filters comment reply link to not JS scroll.
 *
 * Filter the comment reply link to add a class indicating it should not use JS slow-scroll, as it
 * makes it scroll to the wrong position on the page.
 *
 * @since formula 1.0
 *
 * @param string $link Link to the top of the page.
 * @return string Link to the top of the page.
 */
function formula_filter_comment_reply_link( $link ) {

	$link = str_replace( 'class=\'', 'class=\'do-not-scroll ', $link );
	return $link;

}

add_filter( 'comment_reply_link', 'formula_filter_comment_reply_link' );

/**
 * Post Meta
 */

/**
 * Retrieves and displays the post meta.
 *
 * If it's a single post, outputs the post meta values specified in the Customizer settings.
 *
 * @since formula 1.0
 *
 * @param int    $post_id  The ID of the post for which the post meta should be output.
 * @param string $location Which post meta location to output – single or preview.
 */
function formula_the_post_meta( $post_id = null, $location = 'single-top' ) {

	echo formula_get_post_meta( $post_id, $location ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped -- Escaped in formula_get_post_meta().

}

/**
 * Filters the edit post link to add an icon and use the post meta structure.
 *
 * @since formula 1.0
 *
 * @param string $link    Anchor tag for the edit link.
 * @param int    $post_id Post ID.
 * @param string $text    Anchor text.
 */
function formula_edit_post_link( $link, $post_id, $text ) {
	if ( is_admin() ) {
		return $link;
	}

	$edit_url = get_edit_post_link( $post_id );

	if ( ! $edit_url ) {
		return;
	}

	$text = sprintf(
		wp_kses(
			/* translators: %s: Post title. Only visible to screen readers. */
			__( 'Edit <span class="screen-reader-text">%s</span>', 'formula' ),
			array(
				'span' => array(
					'class' => array(),
				),
			)
		),
		get_the_title( $post_id )
	);

	return '<div class="post-meta-wrapper post-meta-edit-link-wrapper"><ul class="post-meta"><li class="post-edit meta-wrapper"><span class="meta-icon">' . formula_get_theme_svg( 'edit' ) . '</span><span class="meta-text"><a href="' . esc_url( $edit_url ) . '">' . $text . '</a></span></li></ul><!-- .post-meta --></div><!-- .post-meta-wrapper -->';

}

add_filter( 'edit_post_link', 'formula_edit_post_link', 10, 3 );

/**
 * Retrieves the post meta.
 *
 * @since formula 1.0
 *
 * @param int    $post_id  The ID of the post.
 * @param string $location The location where the meta is shown.
 */
function formula_get_post_meta( $post_id = null, $location = 'single-top' ) {

	// Require post ID.
	if ( ! $post_id ) {
		return;
	}

	/**
	 * Filters post types array.
	 *
	 * This filter can be used to hide post meta information of post, page or custom post type
	 * registered by child themes or plugins.
	 *
	 * @since formula 1.0
	 *
	 * @param array Array of post types.
	 */
	$disallowed_post_types = apply_filters( 'formula_disallowed_post_types_for_meta_output', array( 'page' ) );

	// Check whether the post type is allowed to output post meta.
	if ( in_array( get_post_type( $post_id ), $disallowed_post_types, true ) ) {
		return;
	}

	$post_meta_wrapper_classes = '';
	$post_meta_classes         = '';

	// Get the post meta settings for the location specified.
	if ( 'single-top' === $location ) {
		/**
		 * Filters post meta info visibility.
		 *
		 * Use this filter to hide post meta information like Author, Post date, Comments, Is sticky status.
		 *
		 * @since formula 1.0
		 *
		 * @param array $args {
		 *     @type string $author
		 *     @type string $post-date
		 *     @type string $comments
		 *     @type string $sticky
		 * }
		 */
		$post_meta = apply_filters(
			'formula_post_meta_location_single_top',
			array(
				'author',
				'post-date',
				'comments',
				'sticky',
			)
		);

		$post_meta_wrapper_classes = ' post-meta-single post-meta-single-top';

	} elseif ( 'single-bottom' === $location ) {

		/**
		 * Filters post tags visibility.
		 *
		 * Use this filter to hide post tags.
		 *
		 * @since formula 1.0
		 *
		 * @param array $args {
		 *     @type string $tags
		 * }
		 */
		$post_meta = apply_filters(
			'formula_post_meta_location_single_bottom',
			array(
				'tags',
			)
		);

		$post_meta_wrapper_classes = ' post-meta-single post-meta-single-bottom';

	}

	// If the post meta setting has the value 'empty', it's explicitly empty and the default post meta shouldn't be output.
	if ( $post_meta && ! in_array( 'empty', $post_meta, true ) ) {

		// Make sure we don't output an empty container.
		$has_meta = false;

		global $post;
		$the_post = get_post( $post_id );
		setup_postdata( $the_post );

		ob_start();

		?>

		<div class="post-meta-wrapper<?php echo esc_attr( $post_meta_wrapper_classes ); ?>">

			<ul class="post-meta<?php echo esc_attr( $post_meta_classes ); ?>">

				<?php

				/**
				 * Fires before post meta HTML display.
				 *
				 * Allow output of additional post meta info to be added by child themes and plugins.
				 *
				 * @since formula 1.0
				 * @since formula 1.1 Added the `$post_meta` and `$location` parameters.
				 *
				 * @param int    $post_id   Post ID.
				 * @param array  $post_meta An array of post meta information.
				 * @param string $location  The location where the meta is shown.
				 *                          Accepts 'single-top' or 'single-bottom'.
				 */
				do_action( 'formula_start_of_post_meta_list', $post_id, $post_meta, $location );

				// Author.
				if ( post_type_supports( get_post_type( $post_id ), 'author' ) && in_array( 'author', $post_meta, true ) ) {

					$has_meta = true;
					?>
					<li class="post-author meta-wrapper">
						<span class="meta-icon">
							<span class="screen-reader-text"><?php _e( 'Post author', 'formula' ); ?></span>
							<?php formula_the_theme_svg( 'user' ); ?>
						</span>
						<span class="meta-text">
							<?php
							printf(
								/* translators: %s: Author name. */
								__( 'By %s', 'formula' ),
								'<a href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '">' . esc_html( get_the_author_meta( 'display_name' ) ) . '</a>'
							);
							?>
						</span>
					</li>
					<?php

				}

				// Post date.
				if ( in_array( 'post-date', $post_meta, true ) ) {

					$has_meta = true;
					?>
					<li class="post-date meta-wrapper">
						<span class="meta-icon">
							<span class="screen-reader-text"><?php _e( 'Post date', 'formula' ); ?></span>
							<?php formula_the_theme_svg( 'calendar' ); ?>
						</span>
						<span class="meta-text">
							<a href="<?php the_permalink(); ?>"><?php the_time( get_option( 'date_format' ) ); ?></a>
						</span>
					</li>
					<?php

				}

				// Categories.
				if ( in_array( 'categories', $post_meta, true ) && has_category() ) {

					$has_meta = true;
					?>
					<li class="post-categories meta-wrapper">
						<span class="meta-icon">
							<span class="screen-reader-text"><?php _e( 'Categories', 'formula' ); ?></span>
							<?php formula_the_theme_svg( 'folder' ); ?>
						</span>
						<span class="meta-text">
							<?php _ex( 'In', 'A string that is output before one or more categories', 'formula' ); ?> <?php the_category( ', ' ); ?>
						</span>
					</li>
					<?php

				}

				// Tags.
				if ( in_array( 'tags', $post_meta, true ) && has_tag() ) {

					$has_meta = true;
					?>
					<li class="post-tags meta-wrapper">
						<span class="meta-icon">
							<span class="screen-reader-text"><?php _e( 'Tags', 'formula' ); ?></span>
							<?php formula_the_theme_svg( 'tag' ); ?>
						</span>
						<span class="meta-text">
							<?php the_tags( '', ', ', '' ); ?>
						</span>
					</li>
					<?php

				}

				// Comments link.
				if ( in_array( 'comments', $post_meta, true ) && ! post_password_required() && ( comments_open() || get_comments_number() ) ) {

					$has_meta = true;
					?>
					<li class="post-comment-link meta-wrapper">
						<span class="meta-icon">
							<?php formula_the_theme_svg( 'comment' ); ?>
						</span>
						<span class="meta-text">
							<?php comments_popup_link(); ?>
						</span>
					</li>
					<?php

				}

				// Sticky.
				if ( in_array( 'sticky', $post_meta, true ) && is_sticky() ) {

					$has_meta = true;
					?>
					<li class="post-sticky meta-wrapper">
						<span class="meta-icon">
							<?php formula_the_theme_svg( 'bookmark' ); ?>
						</span>
						<span class="meta-text">
							<?php _e( 'Sticky post', 'formula' ); ?>
						</span>
					</li>
					<?php

				}

				/**
				 * Fires after post meta HTML display.
				 *
				 * Allow output of additional post meta info to be added by child themes and plugins.
				 *
				 * @since formula 1.0
				 * @since formula 1.1 Added the `$post_meta` and `$location` parameters.
				 *
				 * @param int    $post_id   Post ID.
				 * @param array  $post_meta An array of post meta information.
				 * @param string $location  The location where the meta is shown.
				 *                          Accepts 'single-top' or 'single-bottom'.
				 */
				do_action( 'formula_end_of_post_meta_list', $post_id, $post_meta, $location );

				?>

			</ul><!-- .post-meta -->

		</div><!-- .post-meta-wrapper -->

		<?php

		wp_reset_postdata();

		$meta_output = ob_get_clean();

		// If there is meta to output, return it.
		if ( $has_meta && $meta_output ) {

			return $meta_output;

		}
	}

}

/**
 * Menus
 */

/**
 * Filters classes of wp_list_pages items to match menu items.
 *
 * Filter the class applied to wp_list_pages() items with children to match the menu class, to simplify.
 * styling of sub levels in the fallback. Only applied if the match_menu_classes argument is set.
 *
 * @since formula 1.0
 *
 * @param string[] $css_class    An array of CSS classes to be applied to each list item.
 * @param WP_Post  $page         Page data object.
 * @param int      $depth        Depth of page, used for padding.
 * @param array    $args         An array of arguments.
 * @param int      $current_page ID of the current page.
 * @return array CSS class names.
 */
function formula_filter_wp_list_pages_item_classes( $css_class, $page, $depth, $args, $current_page ) {

	// Only apply to wp_list_pages() calls with match_menu_classes set to true.
	$match_menu_classes = isset( $args['match_menu_classes'] );

	if ( ! $match_menu_classes ) {
		return $css_class;
	}

	// Add current menu item class.
	if ( in_array( 'current_page_item', $css_class, true ) ) {
		$css_class[] = 'current-menu-item';
	}

	// Add menu item has children class.
	if ( in_array( 'page_item_has_children', $css_class, true ) ) {
		$css_class[] = 'menu-item-has-children';
	}

	return $css_class;

}

add_filter( 'page_css_class', 'formula_filter_wp_list_pages_item_classes', 10, 5 );

/**
 * Adds a Sub Nav Toggle to the Expanded Menu and Mobile Menu.
 *
 * @since formula 1.0
 *
 * @param stdClass $args  An object of wp_nav_menu() arguments.
 * @param WP_Post  $item  Menu item data object.
 * @param int      $depth Depth of menu item. Used for padding.
 * @return stdClass An object of wp_nav_menu() arguments.
 */
function formula_add_sub_toggles_to_main_menu( $args, $item, $depth ) {

	// Add sub menu toggles to the Expanded Menu with toggles.
	if ( isset( $args->show_toggles ) && $args->show_toggles ) {

		// Wrap the menu item link contents in a div, used for positioning.
		$args->before = '<div class="ancestor-wrapper">';
		$args->after  = '';

		// Add a toggle to items with children.
		if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {

			$toggle_target_string = '.menu-modal .menu-item-' . $item->ID . ' > .sub-menu';
			$toggle_duration      = formula_toggle_duration();

			// Add the sub menu toggle.
			$args->after .= '<button class="toggle sub-menu-toggle fill-children-current-color" data-toggle-target="' . $toggle_target_string . '" data-toggle-type="slidetoggle" data-toggle-duration="' . absint( $toggle_duration ) . '" aria-expanded="false"><span class="screen-reader-text">' . __( 'Show sub menu', 'formula' ) . '</span>' . formula_get_theme_svg( 'chevron-down' ) . '</button>';

		}

		// Close the wrapper.
		$args->after .= '</div><!-- .ancestor-wrapper -->';

		// Add sub menu icons to the primary menu without toggles.
	} elseif ( 'primary' === $args->theme_location ) {
		if ( in_array( 'menu-item-has-children', $item->classes, true ) ) {
			$args->after = '<span class="icon"></span>';
		} else {
			$args->after = '';
		}
	}

	return $args;

}

add_filter( 'nav_menu_item_args', 'formula_add_sub_toggles_to_main_menu', 10, 3 );

/**
 * Displays SVG icons in social links menu.
 *
 * @since formula 1.0
 *
 * @param string   $item_output The menu item's starting HTML output.
 * @param WP_Post  $item        Menu item data object.
 * @param int      $depth       Depth of the menu. Used for padding.
 * @param stdClass $args        An object of wp_nav_menu() arguments.
 * @return string The menu item output with social icon.
 */
function formula_nav_menu_social_icons( $item_output, $item, $depth, $args ) {
	// Change SVG icon inside social links menu if there is supported URL.
	if ( 'social' === $args->theme_location ) {
		$svg = formula_SVG_Icons::get_social_link_svg( $item->url );
		if ( empty( $svg ) ) {
			$svg = formula_get_theme_svg( 'link' );
		}
		$item_output = str_replace( $args->link_after, '</span>' . $svg, $item_output );
	}

	return $item_output;
}

add_filter( 'walker_nav_menu_start_el', 'formula_nav_menu_social_icons', 10, 4 );

/**
 * Classes
 */

/**
 * Adds 'no-js' class.
 *
 * If we're missing JavaScript support, the HTML element will have a 'no-js' class.
 *
 * @since formula 1.0
 */
function formula_no_js_class() {

	?>
	<script>document.documentElement.className = document.documentElement.className.replace( 'no-js', 'js' );</script>
	<?php

}

add_action( 'wp_head', 'formula_no_js_class' );

/**
 * Adds conditional body classes.
 *
 * @since formula 1.0
 *
 * @param array $classes Classes added to the body tag.
 * @return array Classes added to the body tag.
 */
function formula_body_classes( $classes ) {

	global $post;
	$post_type = isset( $post ) ? $post->post_type : false;

	// Check whether we're singular.
	if ( is_singular() ) {
		$classes[] = 'singular';
	}

	// Check whether the current page should have an overlay header.
	if ( is_page_template( array( 'templates/template-cover.php' ) ) ) {
		$classes[] = 'overlay-header';
	}

	// Check whether the current page has full-width content.
	if ( is_page_template( array( 'templates/template-full-width.php' ) ) ) {
		$classes[] = 'has-full-width-content';
	}

	// Check for enabled search.
	if ( true === get_theme_mod( 'enable_header_search', true ) ) {
		$classes[] = 'enable-search-modal';
	}

	// Check for post thumbnail.
	if ( is_singular() && has_post_thumbnail() ) {
		$classes[] = 'has-post-thumbnail';
	} elseif ( is_singular() ) {
		$classes[] = 'missing-post-thumbnail';
	}

	// Check whether we're in the customizer preview.
	if ( is_customize_preview() ) {
		$classes[] = 'customizer-preview';
	}

	// Check if posts have single pagination.
	if ( is_single() && ( get_next_post() || get_previous_post() ) ) {
		$classes[] = 'has-single-pagination';
	} else {
		$classes[] = 'has-no-pagination';
	}

	// Check if we're showing comments.
	if ( $post && ( ( 'post' === $post_type || comments_open() || get_comments_number() ) && ! post_password_required() ) ) {
		$classes[] = 'showing-comments';
	} else {
		$classes[] = 'not-showing-comments';
	}

	// Check if avatars are visible.
	$classes[] = get_option( 'show_avatars' ) ? 'show-avatars' : 'hide-avatars';

	// Slim page template class names (class = name - file suffix).
	if ( is_page_template() ) {
		$classes[] = basename( get_page_template_slug(), '.php' );
	}

	// Check for the elements output in the top part of the footer.
	$has_footer_menu = has_nav_menu( 'footer' );
	$has_social_menu = has_nav_menu( 'social' );
	$has_sidebar_1   = is_active_sidebar( 'sidebar-1' );
	$has_sidebar_2   = is_active_sidebar( 'sidebar-2' );

	// Add a class indicating whether those elements are output.
	if ( $has_footer_menu || $has_social_menu || $has_sidebar_1 || $has_sidebar_2 ) {
		$classes[] = 'footer-top-visible';
	} else {
		$classes[] = 'footer-top-hidden';
	}

	// Get header/footer background color.
	$header_footer_background = get_theme_mod( 'header_footer_background_color', '#ffffff' );
	$header_footer_background = strtolower( '#' . ltrim( $header_footer_background, '#' ) );

	// Get content background color.
	$background_color = get_theme_mod( 'background_color', 'f5efe0' );
	$background_color = strtolower( '#' . ltrim( $background_color, '#' ) );

	// Add extra class if main background and header/footer background are the same color.
	if ( $background_color === $header_footer_background ) {
		$classes[] = 'reduced-spacing';
	}

	return $classes;

}

add_filter( 'body_class', 'formula_body_classes' );

/**
 * Archives
 */

/**
 * Filters the archive title and styles the word before the first colon.
 *
 * @since formula 1.0
 *
 * @param string $title Current archive title.
 * @return string Current archive title.
 */
function formula_get_the_archive_title( $title ) {

	/**
	 * Filters the regular expression used to style the word before the first colon.
	 *
	 * @since formula 1.0
	 *
	 * @param array $regex An array of regular expression pattern and replacement.
	 */
	$regex = apply_filters(
		'formula_get_the_archive_title_regex',
		array(
			'pattern'     => '/(\A[^\:]+\:)/',
			'replacement' => '<span class="color-accent">$1</span>',
		)
	);

	if ( empty( $regex ) ) {

		return $title;

	}

	return preg_replace( $regex['pattern'], $regex['replacement'], $title );

}

add_filter( 'get_the_archive_title', 'formula_get_the_archive_title' );

/**
 * Miscellaneous
 */

/**
 * Toggles animation duration in milliseconds.
 *
 * @since formula 1.0
 *
 * @return int Duration in milliseconds
 */
function formula_toggle_duration() {
	/**
	 * Filters the animation duration/speed used usually for submenu toggles.
	 *
	 * @since formula 1.0
	 *
	 * @param int $duration Duration in milliseconds.
	 */
	$duration = apply_filters( 'formula_toggle_duration', 250 );

	return $duration;
}

/**
 * Gets unique ID.
 *
 * This is a PHP implementation of Underscore's uniqueId method. A static variable
 * contains an integer that is incremented with each call. This number is returned
 * with the optional prefix. As such the returned value is not universally unique,
 * but it is unique across the life of the PHP process.
 *
 * @since formula 1.0
 *
 * @see wp_unique_id() Themes requiring WordPress 5.0.3 and greater should use this instead.
 *
 * @param string $prefix Prefix for the returned ID.
 * @return string Unique ID.
 */
function formula_unique_id( $prefix = '' ) {
	static $id_counter = 0;
	if ( function_exists( 'wp_unique_id' ) ) {
		return wp_unique_id( $prefix );
	}
	return $prefix . (string) ++$id_counter;
}


/**
 * Functions which enhance the theme into WordPress
 *
 * @package formula
 */

/**
 * Theme Logo Class
*/
function formula_header_logo_class($html)
{
	$html = str_replace('custom-logo-link', 'navbar-brand', $html);
	return $html;
}
add_filter('get_custom_logo','formula_header_logo_class');

/**
 *  Admin bar padding
 */

function formula_is_admin_bar() {

	if ( is_admin_bar_showing() ) {
		return 'admin-bar-padding';
	}

	return '';
}
/**
 *  Admin bar sticky padding
 */

function formula_is_admin_bar_sticky() {

	if ( is_admin_bar_showing() ) {
		return 'admin-bar-sticky-padding';
	}

	return '';
}

/**
 * Select sanitization callback
 *
 */
function formula_sanitize_select( $value ){    
    if ( is_array( $value ) ) {
		foreach ( $value as $key => $subvalue ) {
			$value[ $key ] = sanitize_text_field( $subvalue );
		}
		return $value;
	}
	return sanitize_text_field( $value );    
}

function formula_sanitize_text( $input ) {
		return wp_kses_post( force_balance_tags( $input ) );
}

/**
* Displays the author name
*/
function formula_get_author_name( $post ){
  $user_id = $post->post_author;
  if( empty( $user_id ) ){
    return;
  }
  $user_info = get_userdata( $user_id );
  echo esc_html( $user_info->display_name );
}

function formula_read_more_button_class($read_class)
	{  global $post;
		return '<p><a href="' . esc_url(get_permalink()) . "#more-{$post->ID}\" class=\"more-link\">" .esc_html__('Read More','formula')."</a></p>";
	}
add_filter( 'the_content_more_link', 'formula_read_more_button_class' );

function formula_post_thumbnail() {
    if(has_post_thumbnail()){
	    echo '<figure class="post-thumbnail"><a href="'.esc_url( get_the_permalink() ).'">';
		the_post_thumbnail( '', array( 'class'=>'img-fluid' ) );
		echo '</a></figure>';
	}
}

/**
 * Theme Page Header Title
*/
function formula_theme_page_header_title(){
	if( is_archive() )
	{
		echo '<div class="page-header-title text-center"><h1 class="text-white">';
		if ( is_day() ) :
		/* translators: %1$s %2$s: date */	
		  printf( esc_html__( '%1$s %2$s', 'formula' ), esc_html__('Archives','formula'), get_the_date() );  
        elseif ( is_month() ) :
		/* translators: %1$s %2$s: month */	
		  printf( esc_html__( '%1$s %2$s', 'formula' ), esc_html__('Archives','formula'), get_the_date( 'F Y' ) );
        elseif ( is_year() ) :
		/* translators: %1$s %2$s: year */	
		  printf( esc_html__( '%1$s %2$s', 'formula' ), esc_html__('Archives','formula'), get_the_date( 'Y' ) );
		elseif( is_author() ):
		/* translators: %1$s %2$s: author */	
			printf( esc_html__( '%1$s %2$s', 'formula' ), esc_html__('All posts by','formula'), get_the_author() );
        elseif( is_category() ):
		/* translators: %1$s %2$s: category */	
			printf( esc_html__( '%1$s %2$s', 'formula' ), esc_html__('Category','formula'), single_cat_title( '', false ) );
		elseif( is_tag() ):
		/* translators: %1$s %2$s: tag */	
			printf( esc_html__( '%1$s %2$s', 'formula' ), esc_html__('Tag','formula'), single_tag_title( '', false ) );
		elseif( class_exists( 'WooCommerce' ) && is_shop() ):
		/* translators: %1$s %2$s: WooCommerce */	
			printf( esc_html__( '%1$s %2$s', 'formula' ), esc_html__('Shop','formula'), single_tag_title( '', false ));
        elseif( is_archive() ): 
		the_archive_title( '<h1 class="text-white">', '</h1>' ); 
		endif;
		echo '</h1></div>';
	}
	elseif( is_404() )
	{
		echo '<div class="page-header-title text-center"><h1 class="text-white">';
		/* translators: %1$s: 404 */	
		echo esc_html__( 'Error 404','formula');
		echo '</h1></div>';
	}
	elseif( is_search() )
	{
		echo '<div class="page-header-title text-center"><h1 class="text-white">';
		/* translators: %1$s %2$s: search */
		printf( esc_html__( '%1$s %2$s', 'formula' ), esc_html__('Search results for','formula'), get_search_query() );
		echo '</h1></div>';
	}
	else
	{
		echo '<div class="page-header-title text-center"><h1 class="text-white">'.esc_html( get_the_title() ).'</h1></div>';
	}
}

function formula_bootstrap_menu_notitle( $menu ){
  return $menu = preg_replace('/ title=\"(.*?)\"/', '', $menu );
}
add_filter( 'wp_nav_menu', 'formula_bootstrap_menu_notitle' );

/**
 * Theme Breadcrumbs Url
*/
function formula_page_url() {
	$page_url = 'http';
	if ( key_exists("HTTPS", $_SERVER) && ( $_SERVER["HTTPS"] == "on" ) ){
		$page_url .= "s";
	}
	$page_url .= "://";
	if ($_SERVER["SERVER_PORT"] != "80") {
		$page_url .= $_SERVER["SERVER_NAME"].":".$_SERVER["SERVER_PORT"].$_SERVER["REQUEST_URI"];
	} else {
		$page_url .= $_SERVER["SERVER_NAME"].$_SERVER["REQUEST_URI"];
 }
 return $page_url;
}

/**
 * Theme Breadcrumbs
*/
if( !function_exists('formula_page_header_breadcrumbs') ):
	function formula_page_header_breadcrumbs() { 	
		global $post;
		$homeLink = home_url();
		$formula_page_header_layout = get_theme_mod('formula_page_header_layout', 'formula_page_header_layout1');
		if($formula_page_header_layout == 'formula_page_header_layout1'):
			$breadcrumb_class = 'text-center';	
		else: $breadcrumb_class = 'text-right'; 
		endif;
		
		echo '<ul id="content" class="page-breadcrumb '.esc_attr( $breadcrumb_class ).'">';			
			if (is_home() || is_front_page()) :
					echo '<li><a href="'.esc_url($homeLink).'">'.esc_html__('Home','formula').'</a></li>';
					    echo '<li class="active">'; echo single_post_title(); echo '</li>';
						else:
						echo '<li><a href="'.esc_url($homeLink).'">'.esc_html__('Home','formula').'</a></li>';
						if ( is_category() ) {
							echo '<li class="active"><a href="'. esc_url( formula_page_url() ) .'">' . esc_html__('Archive by category','formula').' "' . single_cat_title('', false) . '"</a></li>';
						} elseif ( is_day() ) {
							echo '<li class="active"><a href="'. esc_url(get_year_link(esc_attr(get_the_time('Y')))) . '">'. esc_html(get_the_time('Y')) .'</a>';
							echo '<li class="active"><a href="'. esc_url(get_month_link(esc_attr(get_the_time('Y')),esc_attr(get_the_time('m')))) .'">'. esc_html(get_the_time('F')) .'</a>';
							echo '<li class="active"><a href="'. esc_url( formula_page_url() ) .'">'. esc_html(get_the_time('d')) .'</a></li>';
						} elseif ( is_month() ) {
							echo '<li class="active"><a href="' . esc_url( get_year_link(esc_attr(get_the_time('Y'))) ) . '">' . esc_html(get_the_time('Y')) . '</a>';
							echo '<li class="active"><a href="'. esc_url( formula_page_url() ) .'">'. esc_html(get_the_time('F')) .'</a></li>';
						} elseif ( is_year() ) {
							echo '<li class="active"><a href="'. esc_url( formula_page_url() ) .'">'. esc_html(get_the_time('Y')) .'</a></li>';
                        } elseif ( is_single() && !is_attachment() && is_page('single-product') ) {
						if ( get_post_type() != 'post' ) {
							$cat = get_the_category(); 
							$cat = $cat[0];
							echo '<li>';
								echo esc_html( get_category_parents($cat, TRUE, '') );
							echo '</li>';
							echo '<li class="active"><a href="' . esc_url( formula_page_url() ) . '">'. wp_title( '',false ) .'</a></li>';
						} }  
						elseif ( is_page() && $post->post_parent ) {
							$parent_id  = $post->post_parent;
							$breadcrumbs = array();
							while ($parent_id) {
							$page = get_page($parent_id);
							$breadcrumbs[] = '<li class="active"><a href="' . esc_url(get_permalink($page->ID)) . '">' . get_the_title($page->ID) . '</a>';
							$parent_id  = $page->post_parent;
                            }
							$breadcrumbs = array_reverse($breadcrumbs);
							foreach ($breadcrumbs as $crumb) echo $crumb;
							echo '<li class="active"><a href="' . esc_url( formula_page_url() ) . '">'. esc_html( get_the_title() ) .'</a></li>';
                        }
						elseif( is_search() )
						{
							echo '<li class="active"><a href="' . esc_url( formula_page_url() ) . '">'. get_search_query() .'</a></li>';
						}
						elseif( is_404() )
						{
							echo '<li class="active"><a href="' . esc_url( formula_page_url() ) . '">'.esc_html__('Error 404','formula').'</a></li>';
						}
						else { 
						    echo '<li class="active"><a href="' . esc_url( formula_page_url() ) . '">'. esc_html( get_the_title() ) .'</a></li>';
						}
					endif;
			echo '</ul>';
        }
endif;

if( ! function_exists( 'formula_custom_customizer_options' ) ):
    function formula_custom_customizer_options() {

        $output_css = '';

		$formula_custom_logo_size = get_theme_mod('formula_custom_logo_size', array('slider' => 210,'suffix' => 'px',));
		if($formula_custom_logo_size['slider'] != null) :
            $output_css .=".site-logo img {
			max-width: ".$formula_custom_logo_size['slider']."px;
			height: auto;
			}\n";
        endif;

		$formula_sticky_bar_logo = get_theme_mod('formula_sticky_bar_logo');
		if($formula_sticky_bar_logo != null) :
            $output_css .=".sticky-fixed .navbar-brand {
				display: none !important;
			}
            .not-sticky .sticky-navbar-brand {
				display: none !important;
			}\n";
        endif;
		
		if ( has_header_image() ) :
			$output_css .=".page-title-module {
				background: #17212c url(" .esc_url( get_header_image() ). ");
				background-attachment: scroll;
				background-position: top center;
				background-repeat: no-repeat;
				background-size: cover;
				background-attachment: fixed;
			}\n";

			$formula_page_header_background_color = get_theme_mod('formula_page_header_background_color');
			$output_css .=".page-title-module:before {
				background-color: $formula_page_header_background_color !important;
			}\n";
		endif;

		$formula_page_header_disabled = get_theme_mod('formula_page_header_disabled', true);
		$formula_main_slider_disabled = get_theme_mod('formula_main_slider_disabled', true);
		//Page header CCS for Pages + Front page
		if ( $formula_main_slider_disabled != true && $formula_page_header_disabled != true ):
			$output_css .=".site-content{
				padding-top:6%;
			}\n";
		endif;

		//Menu css
		if ($formula_page_header_disabled != true):
			$output_css .=".site-content {
			    padding-top: 10% !important;
			}\n";
		endif;

		if ( is_user_logged_in() && is_admin_bar_showing() ) {
            $output_css .="@media (min-width: 600px){
                .navbar-fixed{top:32px;}
            }\n";
        }

        wp_add_inline_style( 'formula-style', $output_css );
    }
endif;
add_action( 'wp_enqueue_scripts', 'formula_custom_customizer_options' );

/**
 * Admin notice
 */
class formula_screen {
	public function __construct() {
		/* notice  Lines*/
		add_action( 'switch_theme', array( $this, 'flush_dismiss_status' ) );
		add_action( 'admin_init', array( $this, 'getting_started_notice_dismissed' ) );
		add_action( 'load-themes.php', array( $this, 'formula_activation_admin_notice' ) );
	}
	public function formula_activation_admin_notice() {
		global $pagenow;

		if ( is_admin() && ( 'themes.php' == $pagenow ) ) {
            add_action( 'admin_notices', array( $this, 'formula_admin_notice' ), 99 );
        }
	}
	/**
	 * Display an admin notice linking to the welcome screen
	 *
	 * @sfunctionse 1.8.2.4
	 */
	public function formula_admin_notice() {
		if ( is_admin() && ! get_user_meta( get_current_user_id(), 'gs_notice_dismissed' ) ){ ?>
			<div class="updated notice notice-get-started-class is-dismissible" data-notice="get_started">
					<?php
						echo '<div><a href="' . esc_url( wp_nonce_url( add_query_arg( 'gs-notice-dismissed', 'dismiss_admin_notices' ) ) ) . '" class="getting-started-notice-dismiss"> Dismiss this notice </a></div>';
					?>
					<div class="formula-getting-started-notice clearfix">
						<div class="formula-theme-screenshot">
							<img src="<?php echo esc_url( get_stylesheet_directory_uri() ); ?>/screenshot.png" class="screenshot" alt="<?php esc_attr_e( 'Theme Screenshot', 'formula' ); ?>" />
						</div><!-- /.formula-theme-screenshot -->
						<div class="formula-theme-notice-content">
							<h2 class="formula-notice-h2">
								<?php
								printf(
								/* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
									esc_html__( 'Welcome! Thank you for choosing %1$s!', 'formula' ),
									'<strong>' . wp_get_theme()->get( 'Name' ) . '</strong>'
								);
								?>
							</h2>

							<p class="plugin-install-notice"><?php echo sprintf( __( 'To begin the installation process, activation, and importing of demo data, simply click on the <strong>Get Started</strong> button. then enjoy this theme.', 'formula' ) ); ?></p>

							<a class="formula-btn-get-started button button-primary button-hero formula-button-padding" href="#" data-name="" data-slug="">
							<?php
							printf(
							/* translators: 1: welcome page link starting html tag, 2: welcome page link ending html tag. */
								esc_html__( 'Get started with %1$s', 'formula' ),
								'<strong>' . wp_get_theme()->get( 'Name' ) . '</strong>'
							);
							?>

							</a><span class="formula-push-down">
							<?php
								/* translators: %1$s: Anchor link start %2$s: Anchor link end */
								printf(
									'or %1$sCustomize theme%2$s</a></span>',
									'<a target="_blank" href="' . esc_url( admin_url( 'customize.php' ) ) . '">',
									'</a>'
								);
							?>
						</div><!-- /.formula-theme-notice-content -->
					</div>
				</div>
			<?php
		}
	}

	/**
	 * Register dismissal of the getting started notification.
	 * Acts on the dismiss link.
	 * If clicked, the admin notice disappears and will no longer be visible to this user.
	 */
	public function getting_started_notice_dismissed() {

		if ( isset( $_GET['gs-notice-dismissed'] ) ) {
			add_user_meta( get_current_user_id(), 'gs_notice_dismissed', 'true' );
		}
	}

	/**
	 * Deletes the getting started notice's dismiss status upon theme switch.
	 */
	public function flush_dismiss_status() {
		delete_user_meta( get_current_user_id(), 'gs_notice_dismissed', 'true' );
	}

}
$GLOBALS['formula_screen'] = new formula_screen();

/**
* Plugin installer
*/

add_action( 'wp_ajax_install_act_plugin', 'formula_admin_install_plugin' );

function formula_admin_install_plugin() {
	/**
	 * Install Plugin.
	 */
	include_once ABSPATH . '/wp-admin/includes/file.php';
	include_once ABSPATH . 'wp-admin/includes/class-wp-upgrader.php';
	include_once ABSPATH . 'wp-admin/includes/plugin-install.php';

	if ( ! file_exists( WP_PLUGIN_DIR . '/one-click-demo-import' ) ) {
		$api = plugins_api(
			'plugin_information',
			array(
				'slug'   => sanitize_key( wp_unslash( 'one-click-demo-import' ) ),
				'fields' => array(
					'sections' => false,
				),
			)
		);

		$skin     = new WP_Ajax_Upgrader_Skin();
		$upgrader = new Plugin_Upgrader( $skin );
		$result   = $upgrader->install( $api->download_link );
	}
	if ( ! file_exists( WP_PLUGIN_DIR . '/awp-companion' ) ) {
		$api = plugins_api(
			'plugin_information',
			array(
				'slug'   => sanitize_key( wp_unslash( 'awp-companion' ) ),
				'fields' => array(
					'sections' => false,
				),
			)
		);

		$skin     = new WP_Ajax_Upgrader_Skin();
		$upgrader = new Plugin_Upgrader( $skin );
		$result   = $upgrader->install( $api->download_link );
	}

	// Activate plugin.
	if ( current_user_can( 'activate_plugin' ) ) {
		$result = activate_plugin( 'one-click-demo-import/one-click-demo-import.php' );
		$result = activate_plugin( 'awp-companion/awp-companion.php' );
	}
	
}