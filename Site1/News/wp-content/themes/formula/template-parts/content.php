<?php
/**
 * The default template for displaying content
 */
 
$formula_blog_content_ordering = get_theme_mod( 'formula_blog_content_ordering', array( 'meta-one', 'title', 'meta-two')); ?>
<!--content.php-->
<article id="main-content" class="post">					

	<?php 
		if(has_post_thumbnail()){
			if ( is_single() ) { ?>
				<figure class="post-thumbnail">
					<?php the_post_thumbnail( '', array( 'class'=>'','alt' => get_the_title() ) ); ?>
				</figure>
			<?php } else { ?>
			<figure class="post-thumbnail">
				<a class="" href="<?php the_permalink(); ?>">
					<?php the_post_thumbnail( '', array( 'class'=>'' ) ); ?>
				</a>
				<span class="entry-date"><a href="<?php the_permalink(); ?>"><time datetime="2018-06-25"><?php echo esc_html(get_the_date('M j, Y')); ?></time></a></span>
			</figure>
			<?php }
		} ?>

	<div class="full-content">
		<?php foreach ( $formula_blog_content_ordering as $formula_blog_content_order ) : ?>
			<?php if ( 'meta-one' === $formula_blog_content_order ) : ?>
				<div class="entry-meta">
					<span class="byline"><?php esc_html_e('By','formula'); ?>
					<span class="author vcard">
						<a class="url fn n" href="<?php echo esc_url(get_author_posts_url( get_the_author_meta( 'ID' )) );?>"><?php echo esc_html(get_the_author());?></a>	
					</span></span>
					<span class="comment"><a href="<?php the_permalink(); ?>">
						<?php comments_number( '0', '1', '%' ); ?> <?php esc_html_e('Comment', 'formula'); ?>
					</a></span>
				</div>
			<?php elseif ( 'title' === $formula_blog_content_order ) : ?>
				<header class="entry-header">
					<?php if ( is_single() ) :
					the_title( '<h3 class="entry-title">', '</h3>' );
					else :
					the_title( '<h3 class="entry-title"><a href="' . esc_url( get_permalink() ) . '">', '</a></h3>' );
					endif; 
					?>
				</header>
			<?php elseif ( 'meta-two' === $formula_blog_content_order ) :
				$formula_cat_list = get_the_category_list();
					if(!empty($formula_cat_list)) { ?>
					<div class="entry-meta">
						<span class="cat-links"><i class="fa fa-thin fa-list"></i> <?php the_category(', '); ?></span>
					</div>
				<?php } 
				$formula_tag_list = get_the_tag_list();
					if(!empty($formula_tag_list)) { ?>
					<div class="entry-meta">
						<span class="tag-links"><i class="fa fa-solid fa-tags"></i> <?php  the_tags('', ', ', ''); ?></span>
					</div>
				<?php }	?>
			<?php endif; ?>
		<?php endforeach; ?>	
		<div class="entry-content content-typo">
			<?php the_excerpt(); ?>
		</div>
	</div>
</article>