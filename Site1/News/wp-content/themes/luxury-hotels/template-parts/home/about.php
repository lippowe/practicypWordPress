<?php
/**
 * Template part for displaying about section
 *
 * @package Luxury Hotels
 * @subpackage luxury_hotels
 */

?>
<?php if( get_theme_mod( 'luxury_hotels_about_show_hide') != '') { ?>
<section id="about">
  <div class="container">
    <div class="row">
      <?php $luxury_hotels_about_page = array();
        $luxury_hotels_mod = absint( get_theme_mod( 'luxury_hotels_about_page' ));
        if ( 'page-none-selected' != $luxury_hotels_mod ) {
          $luxury_hotels_about_page[] = $luxury_hotels_mod;
        }
      if( !empty($luxury_hotels_about_page) ) :
        $luxury_hotels_args = array(
          'post_type' => 'page',
          'post__in' => $luxury_hotels_about_page,
          'orderby' => 'post__in'
        );
        $luxury_hotels_query = new WP_Query( $luxury_hotels_args );
        if ( $luxury_hotels_query->have_posts() ) :
          while ( $luxury_hotels_query->have_posts() ) : $luxury_hotels_query->the_post(); ?>
            <div class="col-lg-6 col-md-6 align-self-center">
              <div class="about-img">
                <?php the_post_thumbnail(); ?>
                <div class="more-btn-2">
                  <a href="<?php the_permalink(); ?>"><?php esc_html_e('Know More','luxury-hotels'); ?><i class="fas fa-arrow-right"></i></a>
                </div>
              </div>
            </div>
            <div class="col-lg-6 col-md-6 about-box align-self-center">
              <?php if( get_theme_mod('luxury_hotels_about_short_heading') != ''){ ?>
                <h3><?php echo esc_html(get_theme_mod('luxury_hotels_about_short_heading','')); ?></h3>
              <?php }?>
              <h4><?php the_title(); ?></h4>
              <p><?php echo wp_trim_words( get_the_content(),20 );?></p>
              <div class="row">
                <?php $luxury_hotels_about_point = get_theme_mod('luxury_hotels_about_points','');
                for ( $luxury_hotels_m = 1; $luxury_hotels_m <= $luxury_hotels_about_point; $luxury_hotels_m++ ){ ?>
                  <div class="col-lg-6 col-md-6">
                    <?php if(get_theme_mod('luxury_hotels_about_points_text'.$luxury_hotels_m,'') != ''){ ?>
                    <h6><i class="fas fa-check mr-2"></i><?php echo esc_html(get_theme_mod('luxury_hotels_about_points_text'.$luxury_hotels_m,'')); ?></h6>
                  <?php } ?>
                  </div>
              <?php } ?>
              </div> 
            </div>
          <?php endwhile; ?>
        <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
      endif;
      wp_reset_postdata()?>
      <div class="clearfix"></div>
    </div>
  </div>
</section>
 <?php } ?>