<?php
/*
* Display Logo and nav
*/
?>

<div class="headerbox">
  <div class="container">
    <div class="row">
      <div class="col-lg-3 col-md-6 align-self-center py-md-2">
        <?php $electronic_supermarket_logo_settings = get_theme_mod( 'electronic_supermarket_logo_settings','Different Line');
          if($electronic_supermarket_logo_settings == 'Different Line'){ ?>
            <div class="logo mb-md-0 text-center text-lg-left">
              <?php if( has_custom_logo() ) electronic_supermarket_the_custom_logo(); ?>
              <?php if(get_theme_mod('electronic_supermarket_site_title',true) == 1){ ?>
                <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
              <?php }?>
              <?php $description = get_bloginfo( 'description', 'display' );
              if ( $description || is_customize_preview() ) : ?>
                <?php if(get_theme_mod('electronic_supermarket_site_tagline',false)){ ?>
                  <p class="site-description mb-0"><?php echo esc_html($description); ?></p>
                <?php }?>
              <?php endif; ?>
            </div>
          <?php }else if($electronic_supermarket_logo_settings == 'Same Line'){ ?>
            <div class="logo logo-same-line mb-md-0 text-center text-lg-left">
              <div class="row">
                <div class="col-lg-5 col-md-5 align-self-md-center">
                  <?php if( has_custom_logo() ) electronic_supermarket_the_custom_logo(); ?>
                </div>
                <div class="col-lg-7 col-md-7 align-self-md-center">
                  <?php if(get_theme_mod('electronic_supermarket_site_title',true) == 1){ ?>
                    <h1><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
                  <?php }?>
                  <?php $description = get_bloginfo( 'description', 'display' );
                  if ( $description || is_customize_preview() ) : ?>
                    <?php if(get_theme_mod('electronic_supermarket_site_tagline',false)){ ?>
                      <p class="site-description mb-0"><?php echo esc_html($description); ?></p>
                    <?php }?>
                  <?php endif; ?>
                </div>
              </div>
            </div>
          <?php }?>
      </div>
      <div class="col-lg-2 col-md-6 align-self-center">
        <?php if(class_exists('woocommerce')){ ?>
          <button class="category-btn"><i class="fa fa-bars" aria-hidden="true"></i><?php echo esc_html(get_theme_mod('electronic_supermarket_category_text','All Categories','electronic-supermarket')); ?></button>
          <div class="category-dropdown">
            <?php
              $args = array(
                'number'     => get_theme_mod('electronic_supermarket_product_category_number'),
                'orderby'    => 'title',
                'order'      => 'ASC',
                'hide_empty' => 0,
                'parent'  => 0
              );
              $product_categories = get_terms( 'product_cat', $args );
              $count = count($product_categories);
              if ( $count > 0 ){
                foreach ( $product_categories as $product_category ) {
                  $electronic_supermarket_cat_id   = $product_category->term_id;
                  $cat_link = get_category_link( $electronic_supermarket_cat_id );
                  if ($product_category->category_parent == 0) { ?>
                <li class="drp_dwn_menu"><a href="<?php echo esc_url(get_term_link( $product_category ) ); ?>">
                <?php
              }
                echo esc_html( $product_category->name ); ?></a></li>
                <?php
                }
              }
            ?>
          </div>
        <?php }?>
      </div>
      <div class="product-search col-lg-4 col-md-6 align-self-center">
        <?php if(get_theme_mod('electronic_supermarket_search_icon',true) != ''){ ?>
          <div class="search_inner my-3 my-md-0">
            <?php if(class_exists('woocommerce')){ ?>
              <?php get_product_search_form(); ?>
            <?php }?>
          </div>
        <?php }?>
      </div>
      <div class="col-lg-3 col-md-6 align-self-center">
        <div class="header-details">
          <?php if(get_theme_mod('electronic_supermarket_user_icon',true) != ''){ ?>
            <p class="mb-0">
              <?php if(class_exists('woocommerce')){ ?>
                <?php if (is_user_logged_in()) : ?>
                  <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="fas fa-sign-out-alt"></i><?php esc_html_e( 'User', 'electronic-supermarket' ); ?></a>
                <?php else : ?>
                  <a href="<?php echo esc_url( get_permalink( get_option('woocommerce_myaccount_page_id') ) ); ?>"><i class="far fa-user"></i><?php esc_html_e( 'User', 'electronic-supermarket' ); ?></a>
                <?php endif;?>
              <?php } ?>
            </p>
          <?php }?>
          <?php if(get_theme_mod('electronic_supermarket_notification','') != ''){ ?>
            <p class="mb-0"><i class="fas fa-comment-alt"></i><a href="<?php echo esc_url( get_theme_mod('electronic_supermarket_notification','') ); ?>"><?php esc_html_e( 'Notification', 'electronic-supermarket' ); ?></a></p>
          <?php }?>
          <?php if(get_theme_mod('electronic_supermarket_like_option','') != ''){ ?>
            <p class="mb-0"><i class="fas fa-heart"></i><a href="<?php echo esc_url( get_theme_mod('electronic_supermarket_like_option','') ); ?>"><?php esc_html_e( 'Like', 'electronic-supermarket' ); ?></a></p>
          <?php }?>
          <?php if(get_theme_mod('electronic_supermarket_cart_icon',true) != ''){ ?>
            <p class="mb-0">
              <?php if(class_exists('woocommerce')){ ?>
              <span class="cartbox"><a href="<?php if(function_exists('wc_get_cart_url')){ echo esc_url(wc_get_cart_url()); } ?>"><i class="fas fa-shopping-basket"></i><?php esc_html_e( 'Cart', 'electronic-supermarket' ); ?></a>
                <span class="cart-value simplep"> <?php echo esc_html(wp_kses_data( WC()->cart->get_cart_contents_count()));?></span>
              </span>
              <?php } ?>
            </p>
          <?php } ?>
        </div>
      </div>
    </div>
  </div>
</div>