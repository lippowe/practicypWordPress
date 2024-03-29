<?php
/**
 * Template file for sidebar
 */
?>

<?php if ( is_active_sidebar( 'sidebar_primary' ) ) : ?>

<!--Sidebar Section-->

<div class="col-md-4 col-sm-4 col-xs-12">

	<div class="sidebar space-left">
	
		<?php dynamic_sidebar( 'sidebar_primary' ); ?>	
		
	</div>
	
</div>	

<!--Sidebar Section-->

<?php endif; ?>