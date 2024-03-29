<?php
/**
 * Title: Header
 * Slug: trekking-blocks/header
 * Categories: trekking-blocks, header
 */
?>

<!-- wp:group {"style":{"spacing":{"padding":{"top":"var:preset|spacing|30","bottom":"var:preset|spacing|30"}}},"backgroundColor":"white","className":"menu-header","layout":{"type":"constrained","contentSize":"90%"}} -->
<div class="wp-block-group menu-header has-white-background-color has-background" style="padding-top:var(--wp--preset--spacing--30);padding-bottom:var(--wp--preset--spacing--30)"><!-- wp:columns {"verticalAlignment":"center","className":"inner-menu-header wow bounceInDown delay-1000"} -->
<div class="wp-block-columns are-vertically-aligned-center inner-menu-header wow bounceInDown delay-1000"><!-- wp:column {"verticalAlignment":"center","width":"15%","className":"logo-block"} -->
<div class="wp-block-column is-vertically-aligned-center logo-block" style="flex-basis:15%"><!-- wp:group {"textColor":"primary","className":"logodiv","layout":{"type":"flex","flexWrap":"wrap"}} -->
<div class="wp-block-group logodiv has-primary-color has-text-color"><!-- wp:site-logo {"width":43,"shouldSyncIcon":true} /-->

<!-- wp:site-title {"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading"}}},"typography":{"textTransform":"capitalize"}},"textColor":"heading","fontSize":"extra-large","fontFamily":"outfit"} /--></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"25%","className":"info-block"} -->
<div class="wp-block-column is-vertically-aligned-center info-block" style="flex-basis:25%"><!-- wp:group {"className":"info-row","layout":{"type":"flex","flexWrap":"nowrap"}} -->
<div class="wp-block-group info-row"><!-- wp:image {"align":"right","id":54,"sizeSlug":"full","linkDestination":"none"} -->
<figure class="wp-block-image alignright size-full"><img src="<?php echo esc_url( get_template_directory_uri() . '/images/mail.png'); ?>" alt="" class="wp-image-54"/></figure>
<!-- /wp:image -->

<!-- wp:group {"layout":{"type":"default"}} -->
<div class="wp-block-group"><!-- wp:paragraph {"style":{"elements":{"link":{"color":{"text":"var:preset|color|heading"}}}},"textColor":"heading"} -->
<p class="has-heading-color has-text-color has-link-color"><?php esc_html_e('Address','trekking-blocks'); ?></p>
<!-- /wp:paragraph -->

<!-- wp:paragraph {"style":{"spacing":{"margin":{"top":"0","bottom":"0"}},"elements":{"link":{"color":{"text":"var:preset|color|primary"}}},"typography":{"fontStyle":"normal","fontWeight":"500"}},"textColor":"primary"} -->
<p class="has-primary-color has-text-color has-link-color" style="margin-top:0;margin-bottom:0;font-style:normal;font-weight:500"><?php esc_html_e('4545 LaJolla Village,San Diego, California','trekking-blocks'); ?></p>
<!-- /wp:paragraph --></div>
<!-- /wp:group --></div>
<!-- /wp:group --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"40%","style":{"spacing":{"padding":{"left":"var:preset|spacing|40"}}},"className":"nav-block"} -->
<div class="wp-block-column is-vertically-aligned-center nav-block" style="padding-left:var(--wp--preset--spacing--40);flex-basis:40%"><!-- wp:navigation {"customTextColor":"#222222","overlayBackgroundColor":"primary","overlayTextColor":"white","layout":{"type":"flex","justifyContent":"right"},"style":{"typography":{"fontStyle":"normal","fontWeight":"500","textTransform":"capitalize","letterSpacing":"1px"}}}  -->
<!-- wp:navigation-link {"label":"Home","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"About","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Services","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Blog","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Pages","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- wp:navigation-link {"label":"Contact Us","type":"","url":"#","kind":"custom","isTopLevelLink":true} /-->

<!-- /wp:navigation --></div>
<!-- /wp:column -->

<!-- wp:column {"verticalAlignment":"center","width":"20%","className":"button-block"} -->
<div class="wp-block-column is-vertically-aligned-center button-block" style="flex-basis:20%"><!-- wp:buttons {"layout":{"type":"flex","justifyContent":"right"}} -->
<div class="wp-block-buttons"><!-- wp:button {"backgroundColor":"primary","style":{"typography":{"textTransform":"none","fontStyle":"normal","fontWeight":"700"}},"className":"has-source-sans-3-font-family","fontSize":"medium","fontFamily":"outfit"} -->
<div class="wp-block-button has-custom-font-size has-source-sans-3-font-family has-outfit-font-family has-medium-font-size" style="font-style:normal;font-weight:700;text-transform:none"><a class="wp-block-button__link has-primary-background-color has-background wp-element-button"><?php esc_html_e('Register','trekking-blocks'); ?></a></div>
<!-- /wp:button --></div>
<!-- /wp:buttons --></div>
<!-- /wp:column --></div>
<!-- /wp:columns --></div>
<!-- /wp:group -->