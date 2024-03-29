<?php function blogus_header_default_section()
{ 
  ?>
    <!--header-->
    <header class="bs-default">
      <div class="clearfix"></div>
      <!-- Main Menu Area-->
      <div class="bs-header-main d-none d-lg-block" style="background-image: url('');">
        <div class="inner">
          <div class="container">
            <div class="row align-items-center">
              <div class="col-md-3">
                <?php do_action('blogus_action_header_social_section'); ?>
              </div>
              <div class="navbar-header col-md-6">
                    <?php the_custom_logo(); 
                    if (display_header_text()) { ?>
                    <div class="site-branding-text">
                    <?php } else { ?>
                    <div class="site-branding-text d-none">
                    <?php } if (is_front_page() || is_home()) { ?>
                    <h1 class="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></h1>
                    <?php } else { ?>
                    <p class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></p>
                    <?php } ?>
                    <p class="site-description"><?php echo esc_html(get_bloginfo( 'description' )); ?></p>
                    </div>
                </div>     
              <div class="col-md-3">
                <div class="info-right right-nav  d-flex align-items-center justify-content-center justify-content-md-end">
                 <?php $blogus_menu_search  = get_theme_mod('blogus_menu_search','true'); 
                    $blogus_subsc_link = get_theme_mod('blogus_subsc_link', '#'); 
                    $blogus_menu_subscriber  = get_theme_mod('blogus_menu_subscriber','true');
                    $blogus_subsc_open_in_new  = get_theme_mod('blogus_subsc_open_in_new', true);
                  if($blogus_menu_search == true) {
                  ?>
                <a class="msearch ml-auto"  data-bs-target="#exampleModal"  href="#" data-bs-toggle="modal">
                    <i class="fa fa-search"></i>
                  </a> 
               <?php } if($blogus_menu_subscriber == true) { ?>
              <a class="subscribe-btn" href="<?php echo esc_url($blogus_subsc_link); ?>" <?php if($blogus_subsc_open_in_new) { ?> target="_blank" <?php } ?>  ><i class="fas fa-bell"></i></a>
              <?php } $blogus_lite_dark_switcher = get_theme_mod('blogus_lite_dark_switcher','true');
                if($blogus_lite_dark_switcher == true){ ?>
               <label class="switch" for="switch">
                <input type="checkbox" name="theme" id="switch">
                <span class="slider"></span>
              </label>
              <?php } ?>              
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- /Main Menu Area-->
      <div class="bs-menu-full">
        <nav class="navbar navbar-expand-lg navbar-wp">
          <div class="container"> 
            <!-- Mobile Header -->
            <div class="m-header align-items-center">
                  <!-- navbar-toggle -->
                  <button class="navbar-toggler x collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#navbar-wp" aria-controls="navbar-wp" aria-expanded="false"
                    aria-label="<?php esc_attr_e('Toggle navigation','blogus'); ?>"> 
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                      <span class="icon-bar"></span>
                  </button>
                  <div class="navbar-header">
                   <?php the_custom_logo(); 
                  if (display_header_text()) { ?>
                  <div class="site-branding-text">
                  <?php } else { ?>
                  <div class="site-branding-text d-none">
                  <?php } ?>
                  <div class="site-title"> <a href="<?php echo esc_url( home_url( '/' ) ); ?>" rel="home"><?php echo esc_html(get_bloginfo( 'name' )); ?></a></div>
                  <p class="site-description"><?php echo esc_html(get_bloginfo( 'description' )); ?></p>
                  </div>
                  </div>
                  <div class="right-nav"> 
                  <!-- /navbar-toggle -->
                  <?php $blogus_menu_search  = get_theme_mod('blogus_menu_search','true'); 
                  if($blogus_menu_search == true) {
                  ?>
                    <a class="msearch ml-auto" href="#" data-bs-target="#exampleModal" data-bs-toggle="modal"> <i class="fa fa-search"></i> </a>
               
                  <?php } ?>
                   </div>
                </div>
            <!-- /Mobile Header -->
            <!-- Navigation -->
            <div class="collapse navbar-collapse" id="navbar-wp">
                  <?php 
                  if(is_rtl()) { wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container'  => 'nav-collapse collapse navbar-inverse-collapse',
                        'menu_class' => 'nav navbar-nav sm-rtl mx-auto',
                        'fallback_cb' => 'blogus_fallback_page_menu',
                        'walker' => new blogus_nav_walker()
                      ) ); 
                      } else
                      {
                         wp_nav_menu( array(
                        'theme_location' => 'primary',
                        'container'  => 'nav-collapse collapse',
                        'menu_class' => 'nav navbar-nav mx-auto',
                        'fallback_cb' => 'blogus_fallback_page_menu',
                        'walker' => new blogus_nav_walker()
                      ) );
                         

                      }
                    ?>
              </div>
            <!-- /Navigation -->
          </div>
        </nav>
      </div>
      <!--/main Menu Area-->
    </header>
    <!--/header-->
<?php } ?>