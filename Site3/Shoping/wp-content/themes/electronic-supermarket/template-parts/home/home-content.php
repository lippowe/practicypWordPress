<?php
/**
 * Template part for displaying home page content
 *
 * @package Electronic Supermarket
 * @subpackage electronic_supermarket
 */

?>

<div id="main-content" class="container py-5">
  	<?php while ( have_posts() ) : the_post(); ?>
  		<?php the_content(); ?>
  	<?php endwhile; // end of the loop. ?>
</div>
