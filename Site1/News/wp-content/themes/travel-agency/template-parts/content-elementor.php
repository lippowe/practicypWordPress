<?php
/**
 * The Elementor main template file
 *
 * @package Travel_Agency
 */
?>
<div class="elementor-wrapper">
	<?php
		/* Start the Loop */
		while ( have_posts() ) : the_post();
			the_content();
		endwhile;
	 ?>
</div><!-- #primary -->
