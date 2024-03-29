<?php
/**
 * The template for displaying all pages
 *
 * @package Luxury Hotels
 * @subpackage luxury_hotels
 */

get_header(); ?>

	<main id="tp_content" role="main">
		<div class="container">
			<div id="primary" class="content-area">
				<?php $luxury_hotels_sidebar_layout = get_theme_mod( 'luxury_hotels_sidebar_page_layout','right');
			    if($luxury_hotels_sidebar_layout == 'left'){ ?>
			        <div class="row">
			          	<div class="col-md-4 col-sm-4" id="theme-sidebar"><?php dynamic_sidebar('sidebar-2');?></div>
				          	<div class="col-md-8 col-sm-8">
				          		<?php while ( have_posts() ) : the_post(); ?>
			  					<h2><?php the_title();?></h2>
			  					 <?php
						           if(has_post_thumbnail()){ 
						            	the_post_thumbnail();
							        } 
										the_content();
										
										wp_link_pages( array(
											'before' => '<div class="page-links">' . __( 'Pages:', 'luxury-hotels' ),
											'after'  => '</div>',
										) );

										// If comments are open or we have at least one comment, load up the comment template.
										if ( comments_open() || get_comments_number() ) :
											comments_template();
										endif;

										endwhile; // End of the loop.
									?>
				          	</div>
			        </div>
			        <div class="clearfix"></div>
			    <?php }else if($luxury_hotels_sidebar_layout == 'right'){ ?>
			        <div class="row">
			          	<div class="col-md-8 col-sm-8">
				            <?php while ( have_posts() ) : the_post(); ?>
							<h2><?php the_title();?></h2>
								<?php
				            	if(has_post_thumbnail()){ 
					            	the_post_thumbnail();
						        } 
								the_content();
								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'luxury-hotels' ),
									'after'  => '</div>',
								) );

								// If comments are open or we have at least one comment, load up the comment template.
								if ( comments_open() || get_comments_number() ) :
									comments_template();
								endif;

								endwhile; // End of the loop.
							?>
			          	</div>
			          	<div class="col-md-4 col-sm-4" id="theme-sidebar"><?php dynamic_sidebar('sidebar-2');?></div>
			        </div>
			    <?php }else if($luxury_hotels_sidebar_layout == 'full'){ ?>
			        <div class="full">
			            <?php while ( have_posts() ) : the_post(); ?>
			            	<h2><?php the_title();?></h2>
								<?php
				            	if(has_post_thumbnail()){ 
					            	the_post_thumbnail();
						        } 
								the_content();

								wp_link_pages( array(
									'before' => '<div class="page-links">' . __( 'Pages:', 'luxury-hotels' ),
									'after'  => '</div>',
								) );

							// If comments are open or we have at least one comment, load up the comment template.
							if ( comments_open() || get_comments_number() ) :
								comments_template();
							endif;

							endwhile; // End of the loop.
						?>
			      	</div>
				<?php }?>
			</div>
		</div>
	</main>


<?php get_footer();