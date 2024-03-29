<?php
/**
 * Title: Sidebar
 * Slug: trekking-blocks/sidebar
 * Categories: trekking-blocks, sidebar
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"},"margin":{"bottom":"50px"}},"border":{"radius":"10px","top":{"color":"var:preset|color|primary","style":"solid","width":"4px"},"bottom":{"color":"var:preset|color|primary","style":"solid","width":"4px"}}},"backgroundColor":"section-bg","className":"wow zoomIn sidebar-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group wow zoomIn sidebar-box has-section-bg-background-color has-background" style="border-radius:10px;border-top-color:var(--wp--preset--color--primary);border-top-style:solid;border-top-width:4px;border-bottom-color:var(--wp--preset--color--primary);border-bottom-style:solid;border-bottom-width:4px;margin-bottom:50px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"7px","bottom":"7px","left":"8px","right":"8px"}},"border":{"width":"1px"}},"borderColor":"primary","backgroundColor":"base","className":"sidebar-heading","layout":{"type":"constrained"}} -->
<div class="wp-block-group sidebar-heading has-border-color has-primary-border-color has-base-background-color has-background" style="border-width:1px;padding-top:7px;padding-right:8px;padding-bottom:7px;padding-left:8px"><!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"letterSpacing":"1px"}}} -->
<h4 class="wp-block-heading has-text-align-center" style="letter-spacing:1px"><?php esc_html_e('Search','trekking-blocks'); ?></h4>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:search {"label":"Search","showLabel":false,"placeholder":"Search","buttonText":"Search","buttonPosition":"button-inside","buttonUseIcon":true} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"},"margin":{"bottom":"50px"}},"border":{"radius":"10px","top":{"color":"var:preset|color|primary","width":"4px"},"bottom":{"color":"var:preset|color|primary","width":"4px"}}},"backgroundColor":"section-bg","className":"wow zoomIn sidebar-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group wow zoomIn sidebar-box has-section-bg-background-color has-background" style="border-radius:10px;border-top-color:var(--wp--preset--color--primary);border-top-width:4px;border-bottom-color:var(--wp--preset--color--primary);border-bottom-width:4px;margin-bottom:50px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"8px","bottom":"8px","left":"8px","right":"8px"}},"border":{"width":"1px"}},"borderColor":"primary","backgroundColor":"base","className":"sidebar-heading","layout":{"type":"constrained"}} -->
<div class="wp-block-group sidebar-heading has-border-color has-primary-border-color has-base-background-color has-background" style="border-width:1px;padding-top:8px;padding-right:8px;padding-bottom:8px;padding-left:8px"><!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"letterSpacing":"1px"}}} -->
<h4 class="wp-block-heading has-text-align-center" style="letter-spacing:1px"><?php esc_html_e('Popular Posts','trekking-blocks'); ?></h4>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:query {"queryId":20,"query":{"perPage":"3","pages":0,"offset":0,"postType":"post","order":"desc","orderBy":"date","author":"","search":"","exclude":[],"sticky":"","inherit":false}} -->
<div class="wp-block-query"><!-- wp:post-template -->
<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|20","bottom":"var:preset|spacing|20","left":"var:preset|spacing|20","right":"var:preset|spacing|20"}},"border":{"color":"#dfdfdf","width":"1px"}},"layout":{"type":"constrained"}} -->
<div class="wp-block-group has-border-color" style="border-color:#dfdfdf;border-width:1px;padding-top:var(--wp--preset--spacing--20);padding-right:var(--wp--preset--spacing--20);padding-bottom:var(--wp--preset--spacing--20);padding-left:var(--wp--preset--spacing--20)"><!-- wp:post-featured-image {"isLink":true,"align":"wide"} /-->

<!-- wp:post-title {"level":6,"isLink":true,"className":"sidebar-post-title"} /-->

<!-- wp:post-excerpt {"excerptLength":10} /--></div>
<!-- /wp:group -->
<!-- /wp:post-template --></div>
<!-- /wp:query --></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"},"margin":{"bottom":"50px"}},"border":{"radius":"10px","top":{"color":"var:preset|color|primary","width":"4px"},"bottom":{"color":"var:preset|color|primary","width":"4px"}}},"backgroundColor":"section-bg","className":"wow zoomIn sidebar-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group wow zoomIn sidebar-box has-section-bg-background-color has-background" style="border-radius:10px;border-top-color:var(--wp--preset--color--primary);border-top-width:4px;border-bottom-color:var(--wp--preset--color--primary);border-bottom-width:4px;margin-bottom:50px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"8px","bottom":"8px","left":"8px","right":"8px"}},"border":{"width":"1px"}},"borderColor":"primary","backgroundColor":"base","className":"sidebar-heading","layout":{"type":"constrained"}} -->
<div class="wp-block-group sidebar-heading has-border-color has-primary-border-color has-base-background-color has-background" style="border-width:1px;padding-top:8px;padding-right:8px;padding-bottom:8px;padding-left:8px"><!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"letterSpacing":"1px"}}} -->
<h4 class="wp-block-heading has-text-align-center" style="letter-spacing:1px"><?php esc_html_e('Categories','trekking-blocks'); ?></h4>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:categories {"showOnlyTopLevel":true,"className":"sidebar-meta-list"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"},"margin":{"bottom":"50px"}},"border":{"radius":"10px","top":{"color":"var:preset|color|primary","width":"4px"},"bottom":{"color":"var:preset|color|primary","width":"4px"}}},"backgroundColor":"section-bg","className":"wow zoomIn sidebar-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group wow zoomIn sidebar-box has-section-bg-background-color has-background" style="border-radius:10px;border-top-color:var(--wp--preset--color--primary);border-top-width:4px;border-bottom-color:var(--wp--preset--color--primary);border-bottom-width:4px;margin-bottom:50px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"8px","bottom":"8px","left":"8px","right":"8px"}},"border":{"width":"1px"}},"borderColor":"primary","backgroundColor":"base","className":"sidebar-heading","layout":{"type":"constrained"}} -->
<div class="wp-block-group sidebar-heading has-border-color has-primary-border-color has-base-background-color has-background" style="border-width:1px;padding-top:8px;padding-right:8px;padding-bottom:8px;padding-left:8px"><!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"letterSpacing":"1px"}}} -->
<h4 class="wp-block-heading has-text-align-center" style="letter-spacing:1px"><?php esc_html_e('Archives','trekking-blocks'); ?></h4>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:archives {"className":"sidebar-meta-list"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"},"margin":{"bottom":"50px"}},"border":{"radius":"10px","top":{"color":"var:preset|color|primary","width":"4px"},"bottom":{"color":"var:preset|color|primary","width":"4px"}}},"backgroundColor":"section-bg","className":"wow zoomIn sidebar-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group wow zoomIn sidebar-box has-section-bg-background-color has-background" style="border-radius:10px;border-top-color:var(--wp--preset--color--primary);border-top-width:4px;border-bottom-color:var(--wp--preset--color--primary);border-bottom-width:4px;margin-bottom:50px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"8px","bottom":"8px","left":"8px","right":"8px"}},"border":{"width":"1px"}},"borderColor":"primary","backgroundColor":"base","className":"sidebar-heading","layout":{"type":"constrained"}} -->
<div class="wp-block-group sidebar-heading has-border-color has-primary-border-color has-base-background-color has-background" style="border-width:1px;padding-top:8px;padding-right:8px;padding-bottom:8px;padding-left:8px"><!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"letterSpacing":"1px"}}} -->
<h4 class="wp-block-heading has-text-align-center" style="letter-spacing:1px"><?php esc_html_e('Tags','trekking-blocks'); ?></h4>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:tag-cloud {"className":"is-style-outline"} /--></div>
<!-- /wp:group -->

<!-- wp:group {"style":{"spacing":{"padding":{"top":"20px","bottom":"20px","left":"20px","right":"20px"},"margin":{"bottom":"50px"}},"border":{"radius":"10px","top":{"color":"var:preset|color|primary","width":"4px"},"bottom":{"color":"var:preset|color|primary","width":"4px"}}},"backgroundColor":"section-bg","className":"wow zoomIn sidebar-box","layout":{"type":"constrained"}} -->
<div class="wp-block-group wow zoomIn sidebar-box has-section-bg-background-color has-background" style="border-radius:10px;border-top-color:var(--wp--preset--color--primary);border-top-width:4px;border-bottom-color:var(--wp--preset--color--primary);border-bottom-width:4px;margin-bottom:50px;padding-top:20px;padding-right:20px;padding-bottom:20px;padding-left:20px"><!-- wp:group {"style":{"spacing":{"padding":{"top":"8px","bottom":"8px","left":"8px","right":"8px"}},"border":{"width":"1px"}},"borderColor":"primary","backgroundColor":"base","className":"sidebar-heading","layout":{"type":"constrained"}} -->
<div class="wp-block-group sidebar-heading has-border-color has-primary-border-color has-base-background-color has-background" style="border-width:1px;padding-top:8px;padding-right:8px;padding-bottom:8px;padding-left:8px"><!-- wp:heading {"textAlign":"center","level":4,"style":{"typography":{"letterSpacing":"1px"}}} -->
<h4 class="wp-block-heading has-text-align-center" style="letter-spacing:1px"><?php esc_html_e('Follow Us','trekking-blocks'); ?></h4>
<!-- /wp:heading --></div>
<!-- /wp:group -->

<!-- wp:social-links {"className":"is-style-logos-only","layout":{"type":"flex","justifyContent":"center"}} -->
<ul class="wp-block-social-links is-style-logos-only"><!-- wp:social-link {"url":"#","service":"twitter"} /-->

<!-- wp:social-link {"url":"#","service":"instagram"} /-->

<!-- wp:social-link {"url":"#","service":"linkedin"} /-->

<!-- wp:social-link {"url":"#","service":"whatsapp"} /-->

<!-- wp:social-link {"url":"#","service":"facebook"} /--></ul>
<!-- /wp:social-links --></div>
<!-- /wp:group -->