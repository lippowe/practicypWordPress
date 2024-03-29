<?php
/**
 * The sidebar containing the main footer columns widget areas
 *
 * @subpackage fTourism
 * @author tishonator
 * @since fTourism 1.0.0
 *
 */
?>

<div id="footer-cols">

	<div id="footer-cols-inner">

		<?php 
			/**
			 * Display widgets dragged in 'Footer Columns 1' widget areas
			 */
		?>
		<div class="col2a">
			<?php dynamic_sidebar( 'footer-column-1-widget-area' ); ?>
		</div><!-- .col2a -->
		
		<?php 
			/**
			 * Display widgets dragged in 'Footer Columns 2' widget areas
			 */
		?>
		<div class="col2b">
			<?php dynamic_sidebar( 'footer-column-2-widget-area' ); ?>
		</div><!-- .col2b -->
		
		<div class="clear">
		</div><!-- .clear -->

	</div><!-- #footer-cols-inner -->

</div><!-- #footer-cols -->