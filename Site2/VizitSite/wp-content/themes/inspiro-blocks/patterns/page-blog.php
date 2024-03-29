<?php
/**
 * Title: Blog page
 * Slug: inspiro-blocks/page-blog
 * Categories: inspiro-blocks-query
 * Viewport Width: 1280
 */
?>
<!-- wp:spacer {"height":"64px"} -->
<div style="height:64px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:paragraph {"align":"center","textColor":"foreground","fontSize":"medium","fontFamily":"montserrat"} -->
<p class="has-text-align-center has-foreground-color has-text-color has-montserrat-font-family has-medium-font-size"><strong>OUR BLOG</strong></p>
<!-- /wp:paragraph -->

<!-- wp:spacer {"height":"64px"} -->
<div style="height:64px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:group {"tagName":"main","style":{"spacing":{"margin":{"top":"0"},"padding":{"top":"0px","bottom":"40px"}}},"className":"site-content","layout":{"type":"constrained","contentSize":"930px"}} -->
<main class="wp-block-group site-content" style="margin-top:0;padding-top:0px;padding-bottom:40px"><!-- wp:query {"queryId":0,"query":{"pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false,"perPage":3},"displayLayout":{"type":"list"},"layout":{"type":"constrained"}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:post-featured-image {"isLink":true,"width":"100%","height":"400px","style":{"border":{"radius":"0px","width":"0px","style":"none"}}} /-->

<!-- wp:post-terms {"term":"category","textAlign":"center","style":{"typography":{"textTransform":"uppercase"}},"fontSize":"small"} /-->

<!-- wp:post-title {"textAlign":"center","level":3,"isLink":true,"style":{"elements":{"link":{"color":{"text":"var:preset|color|foreground"}}},"spacing":{"margin":{"bottom":"20px","top":"15px"}},"typography":{"fontStyle":"normal","fontWeight":"700"}},"textColor":"tertiary","fontSize":"max-36"} /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"5px","margin":{"bottom":"30px"}}},"className":"post-meta","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"center"}} -->
<div class="wp-block-group post-meta" style="margin-bottom:30px"><!-- wp:paragraph -->
<p>by</p>
<!-- /wp:paragraph -->

<!-- wp:post-author {"showAvatar":false,"byline":""} /-->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"right":"10px","left":"10px"}}},"textColor":"lightgrey"} -->
<p class="has-lightgrey-color has-text-color" style="margin-right:10px;margin-left:10px">/</p>
<!-- /wp:paragraph -->

<!-- wp:post-date /--></div>
<!-- /wp:group -->

<!-- wp:post-excerpt {"textAlign":"center","style":{"spacing":{"margin":{"top":"20px"}}}} /-->

<!-- wp:group {"layout":{"type":"constrained"}} -->
<div class="wp-block-group"><!-- wp:read-more {"content":"READ MORE","style":{"typography":{"fontSize":"13px"}},"textColor":"foreground"} /--></div>
<!-- /wp:group -->

<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:separator {"style":{"color":{"background":"#6d6d7821"}},"className":"is-style-default"} -->
<hr class="wp-block-separator has-text-color has-alpha-channel-opacity has-background is-style-default" style="background-color:#6d6d7821;color:#6d6d7821"/>
<!-- /wp:separator -->

<!-- wp:spacer {"height":"50px"} -->
<div style="height:50px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->
<!-- /wp:post-template -->

<!-- wp:query-no-results -->
<!-- wp:paragraph {"placeholder":"Add text or blocks that will display when a query returns no results."} -->
<p></p>
<!-- /wp:paragraph -->
<!-- /wp:query-no-results -->

<!-- wp:query-pagination {"paginationArrow":"chevron","layout":{"type":"flex","justifyContent":"space-between","flexWrap":"wrap"}} -->
<!-- wp:query-pagination-previous {"fontSize":"medium"} /-->

<!-- wp:query-pagination-numbers {"fontSize":"medium"} /-->

<!-- wp:query-pagination-next {"fontSize":"medium"} /-->
<!-- /wp:query-pagination --></div>
<!-- /wp:query --></main>
<!-- /wp:group -->