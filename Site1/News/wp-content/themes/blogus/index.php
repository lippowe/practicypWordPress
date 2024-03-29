<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 * @package Blogus
 */
get_header(); ?>
<main id="content" class="index-class">
    <!--container-->
    <div class="container">
        <!--row-->
        <div class="row">
            <?php 
            $blogus_content_layout = esc_attr(get_theme_mod('blogus_content_layout','align-content-right'));
            if($blogus_content_layout == "align-content-left") { ?>
                <!--col-lg-4-->
                <aside class="col-lg-4 sidebar-left">
                    <?php get_sidebar();?>
                </aside>
                <!--/col-lg-4-->
            <?php } elseif($blogus_content_layout == "grid-left-sidebar") { ?>
                <!--col-lg-4-->
                <aside class="col-lg-4 sidebar-left">
                    <?php get_sidebar();?>
                </aside>
                <!--/col-lg-4-->
            <?php } ?>
                <!--col-lg-8-->
            <?php if($blogus_content_layout == "align-content-right"){ ?>
                <div class="col-lg-8 content-right">
                    <?php get_template_part('template-parts/content', get_post_format()); ?>
                </div>
            <?php } elseif($blogus_content_layout == "align-content-left") { ?>
                <div class="col-lg-8 content-right">
                    <?php get_template_part('template-parts/content', get_post_format()); ?>
                </div>
            <?php } elseif($blogus_content_layout == "full-width-content") { ?>
                <div class="col-lg-12 content-full">
                    <?php get_template_part('template-parts/content', get_post_format()); ?>
                </div>
            <?php }  if($blogus_content_layout == "grid-left-sidebar"){ ?>
                <div class="col-lg-8 content-right">
                    <?php get_template_part('content','grid'); ?>
                </div>
            <?php } elseif($blogus_content_layout == "grid-right-sidebar") { ?>
                <div class="col-lg-8 content-right">
                    <?php get_template_part('content','grid'); ?>
                </div>
            <?php } elseif($blogus_content_layout == "grid-fullwidth") { ?>
                <div class="col-lg-12 content-full">
                    <?php get_template_part('content','grid'); ?>
                </div>
            <?php }  ?>
                <!--/col-lg-8-->
                
            <?php if($blogus_content_layout == "align-content-right")  { ?>
                <!--col-lg-4-->
                <aside class="col-lg-4 sidebar-right">
                    <?php get_sidebar();?>
                </aside>
                <!--/col-lg-4-->
            <?php } elseif($blogus_content_layout == "grid-right-sidebar") { ?>
                <!--col-lg-4-->
                <aside class="col-lg-4 sidebar-right">
                    <?php get_sidebar();?>
                </aside>
                <!--/col-lg-4-->
            <?php }?>
        </div><!--/row-->
    </div><!--/container-->
</main>                
<?php
get_footer();
?>