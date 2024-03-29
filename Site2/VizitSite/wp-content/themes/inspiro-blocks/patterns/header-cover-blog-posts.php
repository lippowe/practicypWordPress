<?php
/**
 * Title: Header (single posts)
 * Slug: inspiro-blocks/header-cover-blog-posts
 * Categories: inspiro-blocks-header
 * Block Types: core/template-part/header
 * Viewport Width: 1280
 */
?>
<!-- wp:group {"tagName":"main","align":"full","style":{"spacing":{"margin":{"top":"0"}}},"className":"site-content","layout":{"type":"default"}} -->
<main class="wp-block-group alignfull site-content id="header" style="margin-top:0"><!-- wp:cover {"useFeaturedImage":true,"dimRatio":50,"overlayColor":"black","focalPoint":{"x":0.50,"y":0.50},"align":"full","className":"is-style-default","style":{"spacing":{"padding":{"top":"0px"}}}} -->
<div class="wp-block-cover alignfull is-style-default" style="padding-top:0px"><span aria-hidden="true" class="wp-block-cover__background has-black-background-color has-background-dim"></span><div class="wp-block-cover__inner-container"><!-- wp:template-part {"slug":"header-transparent","theme":"inspiro-blocks"} /-->

<!-- wp:group {"className":"is-style-default","layout":{"type":"constrained"}} -->
<div class="wp-block-group is-style-default"><!-- wp:spacer {"height":"251px"} -->
<div style="height:251px" aria-hidden="true" class="wp-block-spacer"></div>
<!-- /wp:spacer -->

<!-- wp:post-title /-->

<!-- wp:group {"style":{"spacing":{"blockGap":"5px","margin":{"bottom":"30px"}}},"className":"post-meta","layout":{"type":"flex","flexWrap":"nowrap","justifyContent":"left"}} -->
<div class="wp-block-group post-meta" style="margin-bottom:30px"><!-- wp:post-date /-->

<!-- wp:paragraph {"style":{"color":{"text":"#ffffff59"},"spacing":{"margin":{"right":"10px","left":"10px"}}},"fontSize":"x-small"} -->
<p class="has-text-color has-x-small-font-size" style="color:#ffffff59;margin-right:10px;margin-left:10px">/</p>
<!-- /wp:paragraph -->

<!-- wp:post-author {"showAvatar":false} /-->

<!-- wp:paragraph {"style":{"color":{"text":"#ffffff59"},"spacing":{"margin":{"right":"10px","left":"10px"}}},"fontSize":"x-small"} -->
<p class="has-text-color has-x-small-font-size" style="color:#ffffff59;margin-right:10px;margin-left:10px">/</p>
<!-- /wp:paragraph -->

<!-- wp:post-terms {"term":"category"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div></div>
<!-- /wp:cover --></main>
<!-- /wp:group -->