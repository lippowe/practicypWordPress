<?php if( !is_attachment() ): ?>
	<article class="blog-author">
		<figure class="avatar">
			<?php echo get_avatar( $post->post_author , 250 ); ?>
		</figure>
		<div class="media">
			<div class="media-body">
				<h5 class="name"><?php echo esc_html( get_the_author_meta( 'display_name' ) ); ?></h5>
				<?php
				$formula_user_link = get_the_author_meta( 'user_url' );
				if ( $formula_user_link ) {
					?>
				<h6 class="designation"><?php echo esc_url( $formula_user_link ); ?></h6>
				<?php } ?>
				<p><?php echo esc_html( get_the_author_meta( 'description' ) ); ?></p>
			</div>
		</div>
	</article>
<?php endif; ?>