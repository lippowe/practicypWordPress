<?php 
/*
* Display Top Bar
*/
?>

<div class="top-header">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-4 align-self-center text-lg-right">
        <div class="timebox">
          <?php if( get_theme_mod( 'luxury_hotels_call') != '') { ?>
            <i class="<?php echo esc_attr(get_theme_mod('luxury_hotels_phone_icon','fas fa-phone')); ?>"></i><span class="phone"><?php echo esc_html( get_theme_mod('luxury_hotels_call','')); ?></span>
           <?php } ?>
        </div>
      </div>
      <div class="col-lg-5 col-md-4 align-self-center text-lg-right">
        <div class="timebox">
          <?php if( get_theme_mod( 'luxury_hotels_mail') != '') { ?>
            <i class="<?php echo esc_attr(get_theme_mod('luxury_hotels_mail_icon','fas fa-envelope-open')); ?>"></i><span class="phone"><?php echo esc_html( get_theme_mod('luxury_hotels_mail','')); ?></span>
           <?php } ?>
        </div>
      </div>
      <div class="col-lg-4 col-md-4 align-self-center text-lg-right">
        <div class="social-media">
          <?php                 
            $luxury_hotels_header_fb_new_tab = esc_attr(get_theme_mod('luxury_hotels_header_fb_new_tab','true'));
            $luxury_hotels_header_twt_new_tab = esc_attr(get_theme_mod('luxury_hotels_header_twt_new_tab','true'));
            $luxury_hotels_header_ins_new_tab = esc_attr(get_theme_mod('luxury_hotels_header_ins_new_tab','true'));
            $luxury_hotels_header_ut_new_tab = esc_attr(get_theme_mod('luxury_hotels_header_ut_new_tab','true'));
            $luxury_hotels_header_pint_new_tab = esc_attr(get_theme_mod('luxury_hotels_header_pint_new_tab','true'));
            ?>
          <?php if( get_theme_mod( 'luxury_hotels_facebook_url' ) != '') { ?>
            <a <?php if($luxury_hotels_header_fb_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'luxury_hotels_facebook_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('luxury_hotels_facebook_icon','fab fa-facebook-f')); ?>"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'luxury_hotels_twitter_url' ) != '') { ?>
            <a <?php if($luxury_hotels_header_twt_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'luxury_hotels_twitter_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('luxury_hotels_twitter_icon','fab fa-twitter')); ?>"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'luxury_hotels_instagram_url' ) != '') { ?>
            <a <?php if($luxury_hotels_header_ins_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'luxury_hotels_instagram_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('luxury_hotels_instagram_icon','fab fa-instagram')); ?>"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'luxury_hotels_youtube_url' ) != '') { ?>
            <a <?php if($luxury_hotels_header_ut_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'luxury_hotels_youtube_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('luxury_hotels_youtube_icon','fab fa-youtube')); ?>"></i></a>
          <?php } ?>
          <?php if( get_theme_mod( 'luxury_hotels_pint_url' ) != '') { ?>
            <a <?php if($luxury_hotels_header_pint_new_tab != false ) { ?>target="_blank" <?php } ?>href="<?php echo esc_url( get_theme_mod( 'luxury_hotels_pint_url','' ) ); ?>"><i class="<?php echo esc_attr(get_theme_mod('luxury_hotels_pinterest_icon','fab fa-pinterest')); ?>"></i></a>
          <?php } ?>
        </div>
      </div>
      <div class="clearfix"></div>
    </div>
  </div>
</div>