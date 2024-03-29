<?php
/**
 * Template part for displaying slider section
 *
 * @package Luxury Hotels
 * @subpackage luxury_hotels
 */

?>
<?php $static_image= get_stylesheet_directory_uri() . '/assets/images/sliderimage.png'; ?>
<?php if( get_theme_mod( 'luxury_hotels_slider_arrows',false) != '') { ?>

<section id="slider">
  <div class="owl-carousel">
      <?php $luxury_hotels_slide_pages = array();
        for ( $luxury_hotels_count = 1; $luxury_hotels_count <= 4; $luxury_hotels_count++ ) {
          $luxury_hotels_mod = intval( get_theme_mod( 'luxury_hotels_slider_page' . $luxury_hotels_count ));
          if ( 'page-none-selected' != $luxury_hotels_mod ) {
            $luxury_hotels_slide_pages[] = $luxury_hotels_mod;
          }
        }
        if( !empty($luxury_hotels_slide_pages) ) :
          $luxury_hotels_args = array(
            'post_type' => 'page',
            'post__in' => $luxury_hotels_slide_pages,
            'orderby' => 'post__in'
          );
          $luxury_hotels_query = new WP_Query( $luxury_hotels_args );
          if ( $luxury_hotels_query->have_posts() ) :
            $i = 1;
      ?>
      <?php  while ( $luxury_hotels_query->have_posts() ) : $luxury_hotels_query->the_post(); ?>
      <div class="slide-box">
          <div class="inner_content">
            <?php if( get_theme_mod( 'luxury_hotels_slider_short_heading' ) != '' ) { ?>
              <h6><?php echo esc_html( get_theme_mod( 'luxury_hotels_slider_short_heading','' ) ); ?></h6>
            <?php } ?>
              <h2><a href="<?php echo esc_url( get_permalink() ); ?>"><?php the_title(); ?></a></h2>
              <p><?php echo esc_html( wp_trim_words( get_the_content(), 25 ) );?></p>
              <div class="more-btn">
                    <?php if( get_theme_mod( 'luxury_hotels_slider_button_link'.$i ) ) { ?>
                      <a class="btn-1" href="<?php echo esc_url( get_theme_mod('luxury_hotels_slider_button_link' .$i) ); ?>" target="_blank"><?php esc_html_e('Know More About Hotel','luxury-hotels'); ?><i class="fas fa-play"></i></a>
                    <?php }?>          
              </div>
          </div>
          <div class="img-box">
            <?php if(has_post_thumbnail()){ ?>
              <img src="<?php the_post_thumbnail_url('full'); ?>"/> <?php } else {echo ('<img src="'.esc_url( $static_image ).'">'); } ?>
          </div>
      </div>
      <?php $i++; endwhile;
          wp_reset_postdata();?>
      <?php else : ?>
          <div class="no-postfound"></div>
        <?php endif;
      endif;?>
  </div>
  <div class="clearfix"></div>
</section>

<?php } ?>
