<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Rock Blog
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<div class="post-item">
        <div class="featured-image" style="background-image: url('<?php the_post_thumbnail_url( 'full' ); ?>');">
            <a href="<?php the_permalink();?>" class="post-thumbnail-link"></a>
        </div><!-- .featured-image -->

		<div class="entry-container">   
			<?php rock_blog_entry_meta(); ?>             
			<header class="entry-header">
				<?php
				if ( is_single() ) :
					the_title( '<h1 class="entry-title">', '</h1>' );
				else :
					the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
				endif; ?>
			</header><!-- .entry-header -->

			<div class="entry-meta">
                <?php rock_blog_posted_on(); ?>
            </div><!-- .entry-meta -->
		</div><!-- .entry-container -->
	</div><!-- .post-item -->
</article><!-- #post-## -->