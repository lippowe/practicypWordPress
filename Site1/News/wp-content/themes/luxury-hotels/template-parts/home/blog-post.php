<?php
/**
 * Template part for displaying latest news section
 *
 * @package Luxury Hotels
 * @subpackage luxury_hotels
 */

?>
<?php
$static_image = get_stylesheet_directory_uri() . '/assets/images/sliderimage.png';

if (get_theme_mod('luxury_hotels_latest_news_show_hide') != '') {
    ?>
    <div id="latest_blog" class="mt-5">
        <div class="container">
            <?php if (get_theme_mod('luxury_hotels_news_heading') != '') { ?>
                <h3 class="text-center mb-4"><?php echo esc_html(get_theme_mod('luxury_hotels_news_heading', '')); ?></h3>
            <?php } ?>
            <div class="row">
                <?php
                $post_category = get_theme_mod('luxury_hotels_latest_news_section_category');
                if ($post_category) {
                    $page_query = new WP_Query(array('category_name' => esc_html($post_category, 'luxury-hotels'), 'posts_per_page' => 6));
                    ?>
                    <?php while ($page_query->have_posts()) : $page_query->the_post(); ?>
                        <div class="col-lg-4 col-md-6 col-sm-6">
                            <div class="news-detail mb-4">
                                <div class="news-img">
                                    <?php if (has_post_thumbnail()) { ?>
                                        <img src="<?php the_post_thumbnail_url('full'); ?>"/>
                                    <?php } else {
                                        echo ('<img src="' . esc_url($static_image) . '">');
                                    } ?>
                                </div>
                                <div class="demo-box">
                                    <h5><?php the_title(); ?></h5>
                                    <p><?php echo esc_html(wp_trim_words(get_the_content(), 15)); ?></p>
                                    <span class="author-detail float-right"><span><i class="fas fa-user m-2"></i></span><?php the_author(); ?></span>
                                    <span class="blog-date"><span><i class="fas fa-calendar m-2"></i></span><?php echo get_the_date('j F, Y'); ?></span>
                                </div>
                            </div>
                        </div>
                    <?php endwhile;
                    wp_reset_postdata();
                }
                ?>
            </div>
        </div>
    </div>
<?php } ?>
