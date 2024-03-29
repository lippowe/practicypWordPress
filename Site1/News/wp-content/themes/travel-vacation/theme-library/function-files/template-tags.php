<?php

/**
 * Custom template tags for this theme
 *
 * @package travel_vacation
 */

if ( ! function_exists( 'travel_vacation_posted_on_single' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time on single posts.
     */
    function travel_vacation_posted_on_single() {
        if ( get_theme_mod( 'travel_vacation_single_post_hide_date', false ) ) {
            return;
        }

        $travel_vacation_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $travel_vacation_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $travel_vacation_time_string = sprintf(
            $travel_vacation_time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_html( get_the_modified_date() )
        );

        $travel_vacation_posted_on = '<span class="post-date"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="far fa-clock"></i>' . $travel_vacation_time_string . '</a></span>';

        echo $travel_vacation_posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;

if ( ! function_exists( 'travel_vacation_posted_on' ) ) :
    /**
     * Prints HTML with meta information for the current post-date/time.
     */
    function travel_vacation_posted_on() {
        if ( get_theme_mod( 'travel_vacation_post_hide_date', false ) ) {
            return;
        }

        $travel_vacation_time_string = '<time class="entry-date published updated" datetime="%1$s">%2$s</time>';
        if ( get_the_time( 'U' ) !== get_the_modified_time( 'U' ) ) {
            $travel_vacation_time_string = '<time class="entry-date published" datetime="%1$s">%2$s</time><time class="updated" datetime="%3$s">%4$s</time>';
        }

        $travel_vacation_time_string = sprintf(
            $travel_vacation_time_string,
            esc_attr( get_the_date( DATE_W3C ) ),
            esc_html( get_the_date() ),
            esc_attr( get_the_modified_date( DATE_W3C ) ),
            esc_html( get_the_modified_date() )
        );

        $travel_vacation_posted_on = '<span class="post-date"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark"><i class="far fa-clock"></i>' . $travel_vacation_time_string . '</a></span>';

        echo $travel_vacation_posted_on; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;


if ( ! function_exists( 'travel_vacation_posted_by_single' ) ) :
    /**
     * Prints HTML with meta information for the current author on single posts.
     */
    function travel_vacation_posted_by_single() {
        if ( get_theme_mod( 'travel_vacation_single_post_hide_author', false ) ) {
            return;
        }
        $travel_vacation_byline = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fas fa-user"></i>' . esc_html( get_the_author() ) . '</a>';

        echo '<span class="post-author"> ' . $travel_vacation_byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;

if ( ! function_exists( 'travel_vacation_posted_by' ) ) :
    /**
     * Prints HTML with meta information for the current author.
     */
    function travel_vacation_posted_by() {
        if ( get_theme_mod( 'travel_vacation_post_hide_author', false ) ) {
            return;
        }
        $travel_vacation_byline = '<a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '"><i class="fas fa-user"></i>' . esc_html( get_the_author() ) . '</a>';

        echo '<span class="post-author"> ' . $travel_vacation_byline . '</span>'; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
    }
endif;

if ( ! function_exists( 'travel_vacation_categories_single_list' ) ) :
    function travel_vacation_categories_single_list( $with_background = false ) {
        if ( is_singular( 'post' ) ) {
            $travel_vacation_hide_category = get_theme_mod( 'travel_vacation_single_post_hide_category', false );

            if ( ! $travel_vacation_hide_category ) {
                $travel_vacation_categories = get_the_category();
                $travel_vacation_separator  = '';
                $travel_vacation_output     = '';
                if ( ! empty( $travel_vacation_categories ) ) {
                    foreach ( $travel_vacation_categories as $category ) {
                        $travel_vacation_output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>' . $travel_vacation_separator;
                    }
                    echo trim( $travel_vacation_output, $travel_vacation_separator );
                }
            }
        }
    }
endif;

if ( ! function_exists( 'travel_vacation_categories_list' ) ) :
    function travel_vacation_categories_list( $with_background = false ) {
        $travel_vacation_hide_category = get_theme_mod( 'travel_vacation_post_hide_category', true );

        if ( ! $travel_vacation_hide_category ) {
            $travel_vacation_categories = get_the_category();
            $travel_vacation_separator  = '';
            $travel_vacation_output     = '';
            if ( ! empty( $travel_vacation_categories ) ) {
                foreach ( $travel_vacation_categories as $category ) {
                    $travel_vacation_output .= '<a href="' . esc_url( get_category_link( $category->term_id ) ) . '">' . esc_html( $category->name ) . '</a>' . $travel_vacation_separator;
                }
                echo trim( $travel_vacation_output, $travel_vacation_separator );
            }
        }
    }
endif;

if ( ! function_exists( 'travel_vacation_entry_footer' ) ) :
	/**
	 * Prints HTML with meta information for the tags and comments.
	 */
	function travel_vacation_entry_footer() {
		// Hide category and tag text for pages.
		if ( 'post' === get_post_type() && is_singular() ) {
            $travel_vacation_hide_tag = get_theme_mod( 'travel_vacation_post_hide_tags', false );

            if ( ! $travel_vacation_hide_tag ) {
                /* translators: used between list items, there is a space after the comma */
                $travel_vacation_tags_list = get_the_tag_list( '', esc_html_x( ', ', 'list item separator', 'travel-vacation' ) );
                if ( $travel_vacation_tags_list ) {
                    /* translators: 1: list of tags. */
                    printf( '<span class="tags-links">' . esc_html__( 'Tagged %1$s', 'travel-vacation' ) . '</span>', $travel_vacation_tags_list ); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
                }
            }
        }

		edit_post_link(
			sprintf(
				wp_kses(
					/* translators: %s: Name of current post. Only visible to screen readers */
					__( 'Edit <span class="screen-reader-text">%s</span>', 'travel-vacation' ),
					array(
						'span' => array(
							'class' => array(),
						),
					)
				),
				wp_kses_post( get_the_title() )
			),
			'<span class="edit-link">',
			'</span>'
		);
	}
endif;

if ( ! function_exists( 'travel_vacation_post_thumbnail' ) ) :
	function travel_vacation_post_thumbnail() {
		if ( post_password_required() || is_attachment() || ! has_post_thumbnail() ) {
			return;
		}

		if ( is_singular() ) :
			if ( get_theme_mod( 'travel_vacation_single_post_hide_feature_image', false ) ) {
			return;
		}
			?>

			<div class="post-thumbnail">
			<?php the_post_thumbnail(); ?>
			</div><!-- .post-thumbnail -->

		<?php else : 
			if ( get_theme_mod( 'travel_vacation_post_hide_feature_image', false ) ) {
			return;
		}
		?>

			<a class="post-thumbnail" href="<?php the_permalink(); ?>" aria-hidden="true">
				<?php
				the_post_thumbnail(
					'post-thumbnail',
					array(
						'alt' => the_title_attribute(
							array(
								'echo' => false,
							)
						),
					)
				);
				?>
			</a>

			<?php
		endif; // End is_singular().
	}
endif;

if ( ! function_exists( 'wp_body_open' ) ) :
	function wp_body_open() {
		do_action( 'wp_body_open' );
	}
endif;
