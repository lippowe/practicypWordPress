<?php
/*
* Display Logo and contact details
*/
?>

<div class="headerbox">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-3 text-lg-left">
            <div class="logo_inner">
               <div class="logo-inner">
                <div class="logo">
                  <?php if( has_custom_logo() ) luxury_hotels_the_custom_logo(); ?>
                  <?php if( get_theme_mod('luxury_hotels_site_title_text',true) == 1){ ?>
                    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                  <?php }?>
                  <?php $luxury_hotels_description = get_bloginfo( 'description', 'display' );
                  if ( $luxury_hotels_description || is_customize_preview() ) : ?>
                    <?php if( get_theme_mod('luxury_hotels_site_tagline_text',false)){ ?>
                      <p class="site-description"><?php echo esc_html($luxury_hotels_description); ?></p>
                    <?php }?>
                  <?php endif; ?>
                  <div class="logo-shape-outer">
                  <div class="logo-shape">
                    <?php echo luxury_hotels_logo_shape(); ?>
                    <?php echo luxury_hotels_logo_shape2(); ?>
                  </div>
                </div>
                </div>
              </div>
            </div>
      </div>
      <div class="col-lg-9 col-md-9">
        <?php
        get_template_part( 'template-parts/header/top', 'bar' ); 
        get_template_part( 'template-parts/navigation/site', 'nav' );
        ?>
      </div>
      <div class="clear"></div>
    </div>
  </div>
</div>
