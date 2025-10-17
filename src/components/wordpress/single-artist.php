<?php
/**
 * Template for displaying single artist posts
 * 
 * @package Ravandeh_Studio
 * @since 1.0.0
 */

get_header();

$lang = get_ravandeh_current_language();

while (have_posts()):
    the_post();
    $artist_data = get_artist_data(get_the_ID(), $lang);
?>

<article id="artist-<?php the_ID(); ?>" <?php post_class('single-artist py-24 px-4 sm:px-6 lg:px-8'); ?>>
    <div class="max-w-6xl mx-auto">
        <!-- Artist Header -->
        <div class="artist-header backdrop-blur-xl bg-white/50 dark:bg-black/50 border border-black/10 dark:border-white/10 rounded-[44px] p-12 mb-12">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 items-center">
                <?php if ($artist_data['image']): ?>
                <div class="artist-image-wrap">
                    <img src="<?php echo esc_url($artist_data['image']); ?>" 
                         alt="<?php echo esc_attr($artist_data['name']); ?>"
                         class="w-full aspect-square object-cover rounded-[44px] shadow-2xl" />
                </div>
                <?php endif; ?>
                
                <div class="artist-info md:col-span-2">
                    <h1 class="artist-name mb-4"><?php echo esc_html($artist_data['name']); ?></h1>
                    
                    <?php if ($artist_data['specialty']): ?>
                    <p class="artist-specialty text-indigo-600 dark:text-indigo-400 mb-6">
                        <?php echo esc_html($artist_data['specialty']); ?>
                    </p>
                    <?php endif; ?>
                    
                    <?php if ($artist_data['bio']): ?>
                    <div class="artist-bio text-foreground/80 leading-relaxed">
                        <?php echo wpautop($artist_data['bio']); ?>
                    </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
        
        <!-- Artist Content -->
        <?php if (get_the_content()): ?>
        <div class="artist-content backdrop-blur-xl bg-white/50 dark:bg-black/50 border border-black/10 dark:border-white/10 rounded-[44px] p-12 prose dark:prose-invert max-w-none">
            <?php the_content(); ?>
        </div>
        <?php endif; ?>
        
        <!-- Back Link -->
        <div class="mt-12 text-center">
            <a href="<?php echo esc_url(get_post_type_archive_link('artist')); ?>" class="inline-flex items-center gap-2 px-6 py-3 backdrop-blur-xl bg-white/50 dark:bg-black/50 border border-black/10 dark:border-white/10 rounded-[28px] hover:bg-white/70 dark:hover:bg-black/70 transition-all duration-300">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="<?php echo $lang === 'fa' ? 'rotate-180' : ''; ?>">
                    <path d="M19 12H5"/>
                    <path d="m12 19-7-7 7-7"/>
                </svg>
                <?php echo $lang === 'fa' ? 'بازگشت به هنرمندان' : 'Back to Artists'; ?>
            </a>
        </div>
    </div>
</article>

<?php
endwhile;

get_footer();
