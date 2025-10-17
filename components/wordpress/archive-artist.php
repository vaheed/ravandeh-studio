<?php
/**
 * Template for displaying artist archive
 * 
 * @package Ravandeh_Studio
 * @since 1.0.0
 */

get_header();

$lang = get_ravandeh_current_language();
?>

<section class="archive-artists py-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <header class="archive-header text-center mb-16">
            <h1 class="archive-title mb-4">
                <?php echo $lang === 'fa' ? 'همه هنرمندان' : 'All Artists'; ?>
            </h1>
            <p class="archive-description text-foreground/70 max-w-2xl mx-auto">
                <?php echo esc_html(get_option("ravandeh_artists_description_{$lang}", $lang === 'fa' ? 'با رویابینانی آشنا شوید که هنر معاصر ایرانی را شکل می‌دهند' : 'Meet the visionaries shaping contemporary Persian art')); ?>
            </p>
        </header>
        
        <?php if (have_posts()): ?>
        <div class="artists-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            while (have_posts()):
                the_post();
                $artist_data = get_artist_data(get_the_ID(), $lang);
                get_template_part('template-parts/content', 'artist', array('data' => $artist_data));
            endwhile;
            ?>
        </div>
        
        <?php ravandeh_pagination(); ?>
        
        <?php else: ?>
            <?php get_template_part('template-parts/content', 'none'); ?>
        <?php endif; ?>
    </div>
</section>

<?php
get_footer();
