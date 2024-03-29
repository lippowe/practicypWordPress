<?php
function formula_custom_color_fun() {
	// $footer_background_color = get_theme_mod('footer_background_color');
	$link_color      = get_theme_mod( 'link_color' );
	list($r, $g, $b) = sscanf( $link_color, '#%02x%02x%02x' );

	if ( $link_color != '#7b40c0' ) :
		?>
<style>
:root {
	--thm-primary: <?php echo esc_html($link_color); ?>;
}
</style>
	<?php endif;
} ?>
