<?php
/**
 * Template part for displaying category section
 *
 * @package Electronic Supermarket
 * @subpackage electronic_supermarket
 */
?>

<?php if( get_theme_mod( 'electronic_supermarket_show_hide_category_section') != '') { ?>
    
<section id="category" class="my-4">
	<div class="row">
        <?php if (class_exists('woocommerce')) { ?>
            <?php
                $electronic_supermarket_prod_categories = get_terms('product_cat', array(
                  'number'     => get_theme_mod('electronic_supermarket_products_category_number'),
                  'orderby'    => 'name',
                  'order'      => 'ASC',
                  'hide_empty' => 0
                ));
                foreach ($electronic_supermarket_prod_categories as $electronic_supermarket_prod_cat) :
                $electronic_supermarket_cat_thumb_id = get_term_meta($electronic_supermarket_prod_cat->term_id, 'thumbnail_id', true);
                $electronic_supermarket_cat_thumb_url = $electronic_supermarket_cat_thumb_id ? wp_get_attachment_thumb_url($electronic_supermarket_cat_thumb_id) : ''; 
                $electronic_supermarket_term_link = get_term_link($electronic_supermarket_prod_cat, 'product_cat');
            ?>
            <div class="col-lg-2 col-md-4 align-self-center my-3">
                <div class="product_cat_box">
                    <div class="row">
                        <div class="col-lg-4 col-md-4 col-sm-4 col-4 align-self-center">
                            <?php if ($electronic_supermarket_cat_thumb_url) : ?>
                                <img src="<?php echo esc_url($electronic_supermarket_cat_thumb_url); ?>" alt="<?php echo esc_html($electronic_supermarket_prod_cat->name); ?>" />
                            <?php endif; ?>
                        </div>
                        <div class="col-lg-8 col-md-8 col-sm-8 col-8 align-self-center">
                            <p class="mb-0"><a href="<?php echo esc_url($electronic_supermarket_term_link); ?>"><?php echo esc_html($electronic_supermarket_prod_cat->name); ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
        <?php endforeach; wp_reset_query(); ?>
        <?php } ?>
	</div>
</section>

<?php } ?>