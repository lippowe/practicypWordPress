<?php if ( is_active_sidebar( 'footer_widget_area_left' ) || is_active_sidebar( 'footer_widget_area_center' ) ||  is_active_sidebar( 'footer_widget_area_right' )) : ?>

			<div class="col-md-4">
			<?php if ( is_active_sidebar( 'footer_widget_area_left' ) ) :  
					dynamic_sidebar( 'footer_widget_area_left' ); 
				  endif; ?>
			</div>
			
			<div class="col-md-4">		
			<?php if ( is_active_sidebar( 'footer_widget_area_center' ) ) : 
						dynamic_sidebar( 'footer_widget_area_center' ); 
				   endif; ?>			
			</div>
			
			<div class="col-md-4">		
			<?php if ( is_active_sidebar( 'footer_widget_area_right' ) ) : 
						dynamic_sidebar( 'footer_widget_area_right' ); 
					endif;?>		
			</div>
			
<?php endif; ?>