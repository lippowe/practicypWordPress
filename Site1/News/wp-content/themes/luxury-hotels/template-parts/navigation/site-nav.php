<?php
/*
* Display Theme menus
*/
?>

<div class="menubar">
  	<div class="container">
  	<div class="row">
  		<div class="col-lg-10 col-md-6 col-12 align-self-center">
  			<div class="innermenubox">
	          	<div class="toggle-nav mobile-menu">
        			<button onclick="luxury_hotels_menu_open()" class="responsivetoggle"><i class="fas fa-bars"></i><span class="screen-reader-text"><?php esc_html_e('Open Button','luxury-hotels'); ?></span></button>
      			</div>
     	 		<div id="mySidenav" class="nav sidenav">
        			<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Top Menu', 'luxury-hotels' ); ?>">
		              	<?php
		                  	wp_nav_menu( array(
			                    'theme_location' => 'primary-menu',
			                    'container_class' => 'main-menu clearfix' ,
			                    'menu_class' => 'clearfix',
			                    'items_wrap' => '<ul id="%1$s" class="%2$s mobile_nav">%3$s</ul>',
			                    'fallback_cb' => 'wp_page_menu',
		                  	) );
		              	 ?>
          				<a href="javascript:void(0)" class="closebtn mobile-menu" onclick="luxury_hotels_menu_close()"><i class="fas fa-times"></i><span class="screen-reader-text"><?php esc_html_e('Close Button','luxury-hotels'); ?></span></a>
            		</nav>
          		</div>
  			<div class="clearfix"></div>
		</div>
  		</div>
  		<div class="col-lg-2 col-md-6 col-12 align-self-center ">
  			 <?php if( get_theme_mod( 'luxury_hotels_header_button_link' ) != '' || get_theme_mod( 'luxury_hotels_header_button' ) != '') { ?>
  			 	<div class="header-more-button">
	            	<a href="<?php echo esc_url( get_theme_mod( 'luxury_hotels_header_button_link','' ) ); ?>" class="register-btn"><?php echo esc_html( get_theme_mod( 'luxury_hotels_header_button','' ) ); ?></a> 
	            </div>
	        <?php } ?>
  		</div>
  	</div>		
    </div>
</div>
