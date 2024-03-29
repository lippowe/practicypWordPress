<?php
/**
 * The default template for comments
 */
if ( post_password_required() ) : ?>
	<p class="nopassword"><?php esc_html_e( 'This post is password protected. Enter the password to view any comments.', 'formula' ); ?></p>
	<?php
	return;
endif;

// formula comment part
if ( ! function_exists( 'formula_comments' ) ) :
	function formula_comments( $comment, $args, $depth ) {

		// get theme data.
		global $comment_data;

		// translations.
		$leave_reply = isset($comment_data['translation_reply_to_coment']) ? $comment_data['translation_reply_to_coment'] : esc_html__( 'Reply', 'formula' );
		?>
<!--Comment-->
<div <?php comment_class( 'media comment-box' ); ?> id="comment-<?php comment_ID(); ?>">
	<a class="pull-left-comment" href="<?php the_author_meta( 'user_url' ); ?>">
		<?php echo get_avatar( $comment, $size = 70 ); ?>
	</a>
	<div class="media-body">
		<div class="comment-detail">
			<h5 class="comment-detail-title"><?php comment_author(); ?></h5>
			<time class="comment-date"><?php esc_html_e( 'Posted on ', 'formula' ); ?>
				<?php echo esc_html( comment_time( 'g:i a' ) ); ?>
				<?php
				echo ' - ';
				echo esc_html( comment_date( 'M j, Y' ) );
				?>
			</time>

			<?php comment_text(); ?>

			<?php edit_comment_link( esc_html__( 'Edit', 'formula' ), '<p class="edit-link">', '</p>' ); ?>
	
			<?php if ( $comment->comment_approved == '0' ) : ?>
				<em class="comment-awaiting-moderation"><?php esc_html_e( 'Your comment is awaiting moderation.', 'formula' ); ?></em><br/>
			<?php endif; ?>

			<div class="reply">
				<?php
				comment_reply_link(
					array_merge(
						$args,
						array(
							'reply_text' => $leave_reply,
							'depth'      => $depth,
							'max_depth'  => $args['max_depth'],
							'per_page'   => $args['per_page'],
						)
					)
				);
				?>
			</div>
		</div>	
	</div>
</div>
<!--/Comment-->
		<?php
	}
endif;
?>

<?php if ( have_comments() ) : ?>				
<!--Comment Section-->
<article class="comment-section wow fadeInDown animated" data-wow-delay="0.4s">
	<div class="comment-title"><h3><i class="fa fa-comment-o"></i> <?php comments_number( esc_html__( 'No comments so far', 'formula' ), esc_html__( '1 comment so far', 'formula' ), esc_html__( '% Comments', 'formula' ) ); ?></h3></div>				
	<?php wp_list_comments( array( 'callback' => 'formula_comments' ) ); ?>			
</article>
<!--/Comment Section-->
<?php endif; ?>

<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : ?>
<nav id="comment-nav-below">
	<h1 class="assistive-text"><?php esc_html_e( 'Comment navigation', 'formula' ); ?></h1>
	<div class="nav-previous"><?php previous_comments_link( esc_html__( '&larr; Older Comments', 'formula' ) ); ?></div>
	<div class="nav-next"><?php next_comments_link( esc_html__( 'Newer Comments &rarr;', 'formula' ) ); ?></div>
</nav>
<?php endif; ?>

<?php if ( ! comments_open() && get_comments_number() ) : ?>
	<p class="nocomments"><?php esc_html_e( 'Comments are closed.', 'formula' ); ?></p>
<?php endif; ?>


<?php
if ( 'open' == $post->comment_status ) :
	if ( get_option( 'comment_registration' ) && ! $user_ID ) :
		?>
		<p><?php echo sprintf( wp_kses( 'You must be <a href="%s">logged in</a> to post a comment', 'formula' ), esc_url( home_url( 'wp-login.php' ) ) . '?redirect_to=' . urlencode( get_permalink() ) ); ?></p>
		<?php else :

			echo '<article class="comment-form-section">';

			$formula_fields_value = array(
				'author' => '<label>' . esc_html__( 'Name', 'formula' ) . '<input type="text" name="author" id="author"  class="blog-form-control"></label>',
				'email'  => '<label>' . esc_html__( 'Email', 'formula' ) . '<input type="text" name="email" id="email" class="blog-form-control"><label>',
			);

			function formula_fields( $formula_fields_value ) {
				return $formula_fields_value;
			}
			add_filter( 'comment_form_default_fields', 'formula_fields' );

			$defaults = array(
				'fields'               => apply_filters( 'formula_comment_form_default_fields', $formula_fields_value ),
				'comment_field'        => '<label>' . esc_html__( 'Message', 'formula' ) . '<textarea id="comments" name="comment" class="blog-form-control-textarea" rows="5"></textarea></label>',
				'logged_in_as'         => '<p class="blog-post-info-detail">' . esc_html__( 'Logged in as', 'formula' ) . ' ' . '<a href="' . esc_url( admin_url( 'profile.php' ) ) . '">' . esc_html( $user_identity ) . '</a>' . ' <a href="' . esc_url( wp_logout_url( get_permalink() ) ) . '" title="' . esc_attr__( 'Log out of this account', 'formula' ) . '">' . esc_html__( 'Logout', 'formula' ) . '</a>' . '</p>',
				'id_submit'            => 'blogdetail-btn',
				'label_submit'         => esc_html__( 'Submit', 'formula' ),
				'class_submit'         => 'thm-btn',
				'comment_notes_after'  => '',
				'comment_notes_before' => '',
				'title_reply'          => '<div class="comment-title"><h3>' . esc_html__( 'Leave a Reply', 'formula' ) . '</h3></div>',
				'id_form'              => 'commentform',
			);
			ob_start();
			comment_form( $defaults );

			echo '</article>';

	endif;
endif;
?>
