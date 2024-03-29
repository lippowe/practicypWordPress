<?php
/**
 * Template part for displaying slider banner
 *
 * @package Electronic Supermarket
 * @subpackage electronic_supermarket
 */

?>

<div class="slide-banner">
    <div class="row">
        <div class="banner-1 py-3 col-sm-12 col-md-12">
        <?php
          $electronic_supermarket_postdata = get_theme_mod('electronic_supermarket_static_blog_2');
            if($electronic_supermarket_postdata){
            $electronic_supermarket_args = array( 'name' => esc_html( $electronic_supermarket_postdata ,'electronic-supermarket'));
          $electronic_supermarket_query = new WP_Query( $electronic_supermarket_args );
          if ( $electronic_supermarket_query->have_posts() ) :
            while ( $electronic_supermarket_query->have_posts() ) : $electronic_supermarket_query->the_post(); ?>
                <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                  <div class="blog-info-1">
                      <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                        <p><?php echo wp_trim_words( get_the_content(),10 );?></p>  
                        <div class="read-more-btn">
                          <a href="<?php the_permalink(); ?>"><?php esc_html_e('Shop Now','electronic-supermarket'); ?> <i class="fas fa-arrow-right"></i></a>
                        </div>
                  </div>
            <?php endwhile;
            wp_reset_postdata();?>
            <?php else : ?>
              <div class="no-postfound"></div>
            <?php
        endif; }?>  
        </div>
         <div class="banner-1 py-3 col-sm-12 col-md-12">
            <?php
              $electronic_supermarket_postdata_blog_3 = get_theme_mod('electronic_supermarket_static_blog_3');
                if($electronic_supermarket_postdata_blog_3){
                $electronic_supermarket_args_blog_3 = array( 'name' => esc_html( $electronic_supermarket_postdata_blog_3 ,'electronic-supermarket'));
                $electronic_supermarket_query_blog_3 = new WP_Query( $electronic_supermarket_args_blog_3 );
                if ( $electronic_supermarket_query_blog_3->have_posts() ) :
                  while ( $electronic_supermarket_query_blog_3->have_posts() ) : $electronic_supermarket_query_blog_3->the_post(); ?>
              <img src="<?php the_post_thumbnail_url('full'); ?>"/>
              <div class="blog-info-2">
                  <h4><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></h4>
                    <p><?php echo wp_trim_words( get_the_content(),10 );?></p>  
                    <div class="read-more-btn">
                      <a href="<?php the_permalink(); ?>"><?php esc_html_e('Shop Now','electronic-supermarket'); ?> <i class="fas fa-arrow-right"></i></a>
                    </div>
              </div>
            <?php endwhile;
            wp_reset_postdata();?>
            <?php else : ?>
              <div class="no-postfound"></div>
            <?php
              endif; }?>
        </div>
    </div> 
</div>