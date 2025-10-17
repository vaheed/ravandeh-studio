<?php
/**
 * Template for displaying collection archive
 * 
 * @package Ravandeh_Studio
 * @since 1.0.0
 */

get_header();

$lang = get_ravandeh_current_language();
?>

<section class="archive-collections py-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <header class="archive-header text-center mb-16">
            <h1 class="archive-title mb-4">
                <?php echo $lang === 'fa' ? 'همه مجموعه‌ها' : 'All Collections'; ?>
            </h1>
            <p class="archive-description text-foreground/70 max-w-2xl mx-auto">
                <?php echo esc_html(get_option("ravandeh_collections_description_{$lang}", $lang === 'fa' ? 'نمایشگاه‌های منتخب که تقاطع سنت و نوآوری را کاوش می‌کنند' : 'Curated exhibitions exploring the intersection of tradition and innovation')); ?>
            </p>
        </header>
        
        <?php if (have_posts()): ?>
        <div class="collections-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            while (have_posts()):
                the_post();
                $collection_data = get_collection_data(get_the_ID(), $lang);
                get_template_part('template-parts/content', 'collection', array('data' => $collection_data));
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
