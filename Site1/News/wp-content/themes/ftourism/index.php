<?php get_header(); ?>

<div class="clear">
</div>

<div id="main-content-wrapper">
	<div id="main-content">
	<?php if ( have_posts() ) : 
				// starts the loop
				while ( have_posts() ) :

					the_post();

					/*
					 * Include the post format-specific template for the content.
					 */
					get_template_part( 'template-parts/content', get_post_format() );

				endwhile;
	
				the_posts_pagination( array(
		                        'prev_next' => '',
		                    ) );
				  
		 else :

				// if no content is loaded, show the 'no found' template
				get_template_part( 'template-parts/content', 'none' );
			
		  endif; ?>
	</div>

	<?php get_sidebar(); ?>
</div>

<?php get_footer(); ?>