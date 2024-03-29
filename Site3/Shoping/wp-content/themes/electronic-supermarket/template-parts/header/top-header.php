<?php
/*
* Display contact details
*/
?>
<div class="topbar">
  <div class="container">
    <div class="row">
      <div class="col-lg-4 col-md-4 col-12 align-self-center">
        <div class="top-header py-2">
          <?php if( get_theme_mod( 'electronic_supermarket_topbar_text' ) != '') { ?>
            <p class="mb-0"><?php echo esc_html( get_theme_mod('electronic_supermarket_topbar_text','')); ?></p>
          <?php } ?>
        </div>
      </div>
      <div class="col-lg-2 col-12 col-md-1 align-self-center"></div>
      <div class="col-lg-4 col-12 col-md-4 align-self-center">
        <?php if(get_theme_mod('electronic_supermarket_about_us_link' ) != '' || get_theme_mod('electronic_supermarket_about_us_text') != ""){?>
        <span><i class="<?php echo esc_attr(get_theme_mod('electronic_supermarket_about_us_icon','fas fa-info-circle')); ?> phone-info mr-2"></i><a href="<?php echo esc_url( get_theme_mod('electronic_supermarket_about_us_link','') ); ?>"> <?php echo esc_html( get_theme_mod('electronic_supermarket_about_us_text','') ); ?></a></span>
        <?php } ?>
        <?php if(get_theme_mod('electronic_supermarket_order_tracking_link' ) != '' || get_theme_mod('electronic_supermarket_order_tracking_text') != ""){?>
        <span><i class="<?php echo esc_attr(get_theme_mod('electronic_supermarket_order_tracking_icon','fas fa-truck')); ?> phone-info mr-2"></i><a href="<?php echo esc_url( get_theme_mod('electronic_supermarket_order_tracking_link','') ); ?>"> <?php echo esc_html( get_theme_mod('electronic_supermarket_order_tracking_text','') ); ?></a></span>
        <?php } ?>
      </div>
      <div class="col-lg-2 col-12 col-md-3 align-self-center text-lg-left">
        <div class="social-media">
<?php                 
            $electronic_supermarket_header_fb_new_tab = esc_attr(get_theme_mod('electronic_supermarket_header_fb_new_tab','true'));
            $electronic_supermarket_header_twt_new_tab = esc_attr(get_theme_mod('electronic_supermarket_header_twt_new_tab','true'));
            $electronic_supermarket_header_ins_new_tab = esc_attr(get_theme_mod('electronic_supermarket_header_ins_new_tab','true'));
            $electronic_supermarket_header_ut_new_tab = esc_attr(get_theme_mod('electronic_supermarket_header_ut_new_tab','true'));
            $electronic_supermarket_header_pint_new_tab = esc_attr(get_theme_mod('electronic_supermarket_header_pint_new_tab','true'));
            ?>
          <?php if( get_theme_mod( 'electronic_supermarket_facebook_url' ) != '') { ?>
            <a <?php if($electronic_supermarket_header_fb_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'electronic_supermarket_facebook_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('electronic_supermarket_facebook_icon','fab fa-facebook-f')); ?>"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'electronic_supermarket_twitter_url' ) != '') { ?>
            <a <?php if($electronic_supermarket_header_twt_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'electronic_supermarket_twitter_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('electronic_supermarket_twitter_icon','fab fa-twitter')); ?>"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'electronic_supermarket_instagram_url' ) != '') { ?>
            <a <?php if($electronic_supermarket_header_ins_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'electronic_supermarket_instagram_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('electronic_supermarket_instagram_icon','fab fa-instagram')); ?>"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'electronic_supermarket_youtube_url' ) != '') { ?>
            <a <?php if($electronic_supermarket_header_ut_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'electronic_supermarket_youtube_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('electronic_supermarket_youtube_icon','fab fa-youtube')); ?>"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'electronic_supermarket_pint_url' ) != '') { ?>
            <a <?php if($electronic_supermarket_header_pint_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'electronic_supermarket_pint_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('electronic_supermarket_pinterest_icon','fab fa-pinterest')); ?>"></i></a>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>


