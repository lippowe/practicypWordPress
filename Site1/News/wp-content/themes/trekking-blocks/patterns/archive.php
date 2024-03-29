<?php
/**
 * Title: Archives
 * Slug: trekking-blocks/archive
 * Categories: trekking-blocks, archive
 */
?>

<!-- wp:cover {"url":"<?php echo esc_url( get_template_directory_uri() . '/images/inner-banner.png'); ?>","id":19,"dimRatio":50,"minHeight":300,"isDark":false} -->
<div class="wp-block-cover is-light" style="min-height:300px"><span aria-hidden="true" class="wp-block-cover__background has-background-dim"></span><img class="wp-block-cover__image-background wp-image-19" alt="" src="<?php echo esc_url( get_template_directory_uri() . '/images/inner-banner.png'); ?>" data-object-fit="cover"/><div class="wp-block-cover__inner-container"><!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:query-title {"type":"archive","style":{"typography":{"textTransform":"uppercase","letterSpacing":"1px"}},"textColor":"white","className":"wow slideInDown"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover -->

<!-- wp:group {"style":{"spacing":{"margin":{"top":"0px","bottom":"0px"},"padding":{"top":"60px","right":"20px","bottom":"40px","left":"20px"}}},"layout":{"type":"constrained","contentSize":"80%"}} -->
<div class="wp-block-group" style="margin-top:0px;margin-bottom:0px;padding-top:60px;padding-right:20px;padding-bottom:40px;padding-left:20px"><!-- wp:group {"align":"wide","layout":{"type":"default"}} -->
<div class="wp-block-group alignwide"><!-- wp:query {"queryId":10,"query":{"perPage":10,"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":true}} -->
<div class="wp-block-query"><!-- wp:post-template {"className":"post-grid-layout","layout":{"type":"grid","columnCount":3},"fontSize":"small"} -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"2em","right":"2em","bottom":"2em","left":"2em"}},"border":{"radius":"10px","top":{"color":"var:preset|color|primary","width":"4px"},"right":[],"bottom":{"color":"var:preset|color|primary","width":"4px"},"left":[]}},"backgroundColor":"section-bg","className":"inner-post-box lite-shadow wow zoomInDown delay-1000","layout":{"type":"default"}} -->
<div class="wp-block-group inner-post-box lite-shadow wow zoomInDown delay-1000 has-section-bg-background-color has-background" style="border-radius:10px;border-top-color:var(--wp--preset--color--primary);border-top-width:4px;border-bottom-color:var(--wp--preset--color--primary);border-bottom-width:4px;padding-top:2em;padding-right:2em;padding-bottom:2em;padding-left:2em"><!-- wp:post-featured-image {"style":{"border":{"radius":"10px"}}} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"var:preset|spacing|20"}},"className":"post-title","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group post-title"><!-- wp:separator {"backgroundColor":"primary"} -->
<hr class="wp-block-separator has-text-color has-primary-color has-alpha-channel-opacity has-primary-background-color has-background"/>
<!-- /wp:separator -->

<!-- wp:post-title {"textAlign":"left","level":4,"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"space-between"}} -->
<div class="wp-block-group"><!-- wp:post-date {"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading","fontSize":"small"} /-->

<!-- wp:post-author-name {"isLink":true,"style":{"typography":{"fontStyle":"normal","fontWeight":"600"},"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading","fontSize":"small"} /--></div>
<!-- /wp:group -->

<!-- wp:post-excerpt {"textAlign":"left","moreText":"","excerptLength":20} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"0"}},"className":"archieve-readmore","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group archieve-readmore"><!-- wp:separator {"backgroundColor":"primary"} -->
<hr class="wp-block-separator has-text-color has-primary-color has-alpha-channel-opacity has-primary-background-color has-background"/>
<!-- /wp:separator -->

<!-- wp:read-more {"content":"Read More","style":{"typography":{"textDecoration":"none"},"spacing":{"padding":{"right":"var:preset|spacing|20","left":"var:preset|spacing|20"}},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}}},"textColor":"primary","fontSize":"small"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group -->
<!-- /wp:post-template -->

<!-- wp:spacer {"height":"16px"} -->
<div style="height:16px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:query-pagination {"layout":{"type":"flex","justifyContent":"center"},"fontSize":"medium"} -->
<!-- wp:query-pagination-previous /-->

<!-- wp:query-pagination-numbers /-->

<!-- wp:query-pagination-next /-->
<!-- /wp:query-pagination -->

<!-- wp:query-no-results -->
<!-- wp:heading {"textAlign":"center","level":3} -->
<h3 class="wp-block-heading has-text-align-center"><?php esc_html_e('Sorry, no post exist...','trekking-blocks'); ?></h3>
<!-- /wp:heading -->
<!-- /wp:query-no-results --></div>
<!-- /wp:query --></div>
<!-- /wp:group --></div>
<!-- /wp:group -->