<?php
/**
 * Title: Footer
 * Slug: inspiro-blocks/footer-default
 * Categories: inspiro-blocks-footer
 * Block Types: core/template-part/footer
 * Viewport Width: 1280
 */
?>
<!-- wp:group {"align":"full","style":{"spacing":{"padding":{"top":"40px","bottom":"40px"},"margin":{"top":"0px"}},"elements":{"link":{"color":{"text":"var:preset|color|white"}}}},"backgroundColor":"header-footer","textColor":"white","className":"is-style-default","layout":{"type":"constrained"},"fontSize":"small"} -->
<div class="wp-block-group alignfull is-style-default has-white-color has-header-footer-background-color has-text-color has-background has-link-color has-small-font-size" style="margin-top:0px;padding-top:40px;padding-bottom:40px"><!-- wp:columns -->
<div class="wp-block-columns"><!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}},"textColor":"white"} -->
<h2 class="has-white-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--50)">Inspiro</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color">This is some dummy copy. You’re not really supposed to read this dummy copy, it is just a place holder for people who need some type to visualize what the actual copy might look like if it were real content.</p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"level":3,"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}},"textColor":"white","fontSize":"small"} -->
<h3 class="has-white-color has-text-color has-small-font-size" style="margin-bottom:var(--wp--preset--spacing--50)">Our Address</h3>
<!-- /wp:heading -->

<!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color has-link-color">146 W 29th St,<br>New York,<br>NY 10011<br><a href="#">Contact us</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:column -->

<!-- wp:column -->
<div class="wp-block-column"><!-- wp:heading {"style":{"spacing":{"margin":{"bottom":"var:preset|spacing|50"}}},"textColor":"white"} -->
<h2 class="has-white-color has-text-color" style="margin-bottom:var(--wp--preset--spacing--50)">Follow us</h2>
<!-- /wp:heading -->

<!-- wp:paragraph {"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color">Let's stay in touch!</p>
<!-- /wp:paragraph -->

<!-- wp:social-links {"iconColor":"white","iconColorValue":"#ffffff","style":{"spacing":{"blockGap":{"top":"3px","left":"19px"}}},"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"left"}} -->
<ul class="wp-block-social-links has-icon-color is-style-logos-only"><!-- wp:social-link {"url":"#","service":"facebook"} /-->

<!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"linkedin"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:column --></div>
<!-- /wp:columns -->

<!-- wp:separator {"style":{"color":{"background":"#ffffff24"}},"className":"is-style-wide"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-wide" style="background-color:#ffffff24;color:#ffffff24"/>
<!-- /wp:separator -->

<!-- wp:group {"layout":{"type":"flex","allowOrientation":false,"justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color">Copyright © <?php echo esc_html( gmdate( 'Y' ) ); ?> <?php echo get_bloginfo( 'name' ); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"textColor":"tertiary"} -->
<p class="has-tertiary-color has-text-color">Powered by WordPress. Designed by <a href="https://www.wpzoom.com" data-type="URL" data-id="https://www.wpzoom.com" target="_blank" rel="noreferrer noopener">WPZOOM</a></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->