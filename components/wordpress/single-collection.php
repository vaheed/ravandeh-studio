<?php
/**
 * Template for displaying single collection posts
 * 
 * @package Ravandeh_Studio
 * @since 1.0.0
 */

get_header();

$lang = get_ravandeh_current_language();

while (have_posts()):
    the_post();
    $collection_data = get_collection_data(get_the_ID(), $lang);
?>

<article id="collection-<?php the_ID(); ?>" <?php post_class('single-collection py-24 px-4 sm:px-6 lg:px-8'); ?>>
    <div class="max-w-6xl mx-auto">
        <!-- Collection Header -->
        <div class="collection-header backdrop-blur-xl bg-white/50 dark:bg-black/50 border border-black/10 dark:border-white/10 rounded-[44px] overflow-hidden mb-12">
            <?php if ($collection_data['image']): ?>
            <div class="collection-hero-image aspect-[21/9] relative">
                <img src="<?php echo esc_url($collection_data['image']); ?>" 
                     alt="<?php echo esc_attr($collection_data['title']); ?>"
                     class="w-full h-full object-cover" />
                <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent"></div>
                <div class="absolute bottom-0 left-0 right-0 p-12">
                    <h1 class="text-white mb-4"><?php echo esc_html($collection_data['title']); ?></h1>
                    <div class="flex items-center gap-6 text-white/80">
                        <?php if ($collection_data['year']): ?>
                        <span><?php echo esc_html($collection_data['year']); ?></span>
                        <?php endif; ?>
                        
                        <?php if ($collection_data['pieces']): ?>
                        <span>
                            <?php echo esc_html($collection_data['pieces']); ?> 
                            <?php echo $lang === 'fa' ? 'اثر' : 'pieces'; ?>
                        </span>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
            <?php endif; ?>
            
            <div class="collection-meta p-12">
                <?php if ($collection_data['description']): ?>
                <div class="collection-description text-foreground/80 leading-relaxed text-lg">
                    <?php echo wpautop($collection_data['description']); ?>
                </div>
                <?php endif; ?>
            </div>
        </div>
        
        <!-- Collection Content -->
        <?php if (get_the_content()): ?>
        <div class="collection-content backdrop-blur-xl bg-white/50 dark:bg-black/50 border border-black/10 dark:border-white/10 rounded-[44px] p-12 prose dark:prose-invert max-w-none">
            <?php the_content(); ?>
        </div>
        <?php endif; ?>
        
        <!-- Back Link -->
        <div class="mt-12 text-center">
            <a href="<?php echo esc_url(get_post_type_archive_link('collection')); ?>" class="inline-flex items-center gap-2 px-6 py-3 backdrop-blur-xl bg-white/50 dark:bg-black/50 border border-black/10 dark:border-white/10 rounded-[28px] hover:bg-white/70 dark:hover:bg-black/70 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="<?php echo $lang === 'fa' ? 'rotate-180' : ''; ?>">
                    <path d="M19 12H5"/>
                    <path d="m12 19-7-7 7-7"/>
                </svg>
                <?php echo $lang === 'fa' ? 'بازگشت به مجموعه‌ها' : 'Back to Collections'; ?>
            </a>
        </div>
    </div>
</article>

<?php
endwhile;

get_footer();
