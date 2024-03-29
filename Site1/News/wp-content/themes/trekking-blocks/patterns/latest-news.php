<?php
/**
 * Title: Latest News
 * Slug: trekking-blocks/latest-news
 * Categories: trekking-blocks, latest-news
 */
?>

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"}}},"className":"blog-section","layout":{"type":"constrained","contentSize":"70%"}} -->
<div class="wp-block-group blog-section" style="margin-top:0px;margin-bottom:0px"><!-- wp:spacer {"height":"23px"} -->
<div style="height:23px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"className":"short-heading","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group short-heading"><!-- wp:heading {"level":6,"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"textTransform":"capitalize"}},"textColor":"primary"} -->
<h6 class="wp-block-heading has-primary-color has-text-color has-link-color" style="text-transform:capitalize"><?php esc_html_e('Latest News','trekking-blocks'); ?></h6>
<!-- /wp:heading -->

<!-- wp:separator {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"layout":{"selfStretch":"fit","flexSize":null}},"backgroundColor":"primary","className":"is-style-default"} -->
<hr class="wp-block-separator has-text-color has-primary-color has-alpha-channel-opacity has-primary-background-color has-background is-style-default" style="margin-top:0;margin-bottom:0"/>
<!-- /wp:separator --></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"align":"center"} -->
<p class="has-text-align-center"><?php esc_html_e('Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed dsdeso eiusmod tempor incididunt ut labore et dolore magna aliqua. Quis ipsum suspendisse ultrices gravida. Risus commodo viverra maecenas accumsan ladsdecus vel facilisis','trekking-blocks'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"28px"} -->
<div style="height:28px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query {"queryId":36,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
<div class="wp-block-query"><!-- wp:post-template {"layout":{"type":"grid","columnCount":3}} -->
<!-- wp:group {"style":{"border":{"radius":"10px","color":"#f1edf8","width":"2px"},"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30","left":"var:preset|spacing|30","right":"var:preset|spacing|30"}}},"backgroundColor":"white","className":"wow swing","layout":{"type":"default"}} -->
<div class="wp-block-group wow swing has-border-color has-white-background-color has-background" style="border-color:#f1edf8;border-width:2px;border-radius:10px;padding-top:var(--wp--preset--spacing--30);padding-right:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30);padding-left:var(--wp--preset--spacing--30)"><!-- wp:post-featured-image {"isLink":true,"align":"center","style":{"border":{"radius":"10px"}}} /-->

<!-- wp:post-date {"format":"M j, Y","style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"primary","fontSize":"small"} /-->

<!-- wp:post-title {"textAlign":"left","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|secondary"}}}},"textColor":"secondary"} /-->

<!-- wp:post-excerpt {"excerptLength":20,"className":"blog-excerpt"} /-->

<!-- wp:read-more {"style":{"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontStyle":"normal","fontWeight":"600"}},"textColor":"primary","fontSize":"small"} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"align":"center","placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p class="has-text-align-center"><?php esc_html_e('There is no post found.','trekking-blocks'); ?></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->