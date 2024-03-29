<?php
/**
 * The default template for displaying page content
 *
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="page-content">
		<?php echo '<h1 class="entry-title">'.get_the_title().'</h1>'; ?>
		<?php
			/**
			 * Display Thumbnails if thumbnail is set for the post
			 */
			if ( has_post_thumbnail() ) :

				the_post_thumbnail();

			endif;
			
			the_content( __( 'Read More...', 'ftourism') );
		?>
	</div>
	<div class="page-after-content">
		
		<?php if ( ! post_password_required() ) : ?>

	<?php if ('open' == $post->comment_status) : ?>
			<span class="icon comments-icon">
				<?php comments_popup_link(__( 'No Comments', 'ftourism' ), __( '1 Comment', 'ftourism' ), __( '% Comments', 'ftourism' ), '', __( 'Comments are closed.', 'ftourism' )); ?>
			</span>
		<?php endif; ?>
		<?php edit_post_link( __( 'Edit', 'ftourism' ), '<span class="edit-icon">', '</span>' ); ?>


<?php endif; ?>
	</div>
</article>
