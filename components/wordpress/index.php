<?php
/**
 * The main template file
 * 
 * @package Ravandeh_Studio
 * @since 1.0.0
 */

get_header();
?>

<div class="site-content py-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <?php
        if (have_posts()):
            ?>
            <div class="posts-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
                <?php
                while (have_posts()):
                    the_post();
                    get_template_part('template-parts/content', get_post_type());
                endwhile;
                ?>
            </div>
            
            <?php
            ravandeh_pagination();
        else:
            get_template_part('template-parts/content', 'none');
        endif;
        ?>
    </div>
</div>

<?php
get_footer();
