<?php
/**
 * Template part for displaying artist posts
 * 
 * @package Ravandeh_Studio
 * @since 1.0.0
 */

$data = isset($args['data']) ? $args['data'] : get_artist_data(get_the_ID());
$lang = get_ravandeh_current_language();
?>

<article id="artist-<?php echo esc_attr($data['id']); ?>" <?php post_class('artist-card'); ?>>
    <a href="<?php echo esc_url($data['permalink']); ?>" class="glass-card group block overflow-hidden backdrop-blur-xl bg-white/50 dark:bg-black/50 border border-black/10 dark:border-white/10 rounded-[44px] hover:border-purple-500/30 hover:shadow-2xl transition-all duration-500 h-full">
        
        <?php if ($data['image']): ?>
        <div class="glass-card-image relative overflow-hidden rounded-t-[44px] aspect-square">
            <img src="<?php echo esc_url($data['image']); ?>" 
                 alt="<?php echo esc_attr($data['name']); ?>" 
                 class="w-full h-full object-cover transform group-hover:scale-110 transition-transform duration-700 grayscale group-hover:grayscale-0" />
            <div class="absolute inset-0 bg-gradient-to-t from-black/60 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500"></div>
        </div>
        <?php endif; ?>
        
        <div class="glass-card-content p-8">
            <h3 class="artist-name mb-2 group-hover:text-purple-600 dark:group-hover:text-purple-400 transition-colors duration-300">
                <?php echo esc_html($data['name']); ?>
            </h3>
            
            <?php if ($data['specialty']): ?>
            <p class="artist-specialty text-foreground/50 mb-4">
                <?php echo esc_html($data['specialty']); ?>
            </p>
            <?php endif; ?>
            
            <?php if ($data['bio']): ?>
            <p class="artist-bio text-foreground/70 line-clamp-3">
                <?php echo esc_html($data['bio']); ?>
            </p>
            <?php endif; ?>
            
            <div class="artist-link mt-6 flex items-center gap-2 text-purple-600 dark:text-purple-400 opacity-0 group-hover:opacity-100 transform translate-x-0 group-hover:translate-x-2 transition-all duration-300">
                <span><?php echo $lang === 'fa' ? 'مشاهده پروفایل' : 'View Profile'; ?></span>
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="<?php echo $lang === 'fa' ? 'rotate-180' : ''; ?>">
                    <path d="M5 12h14"/>
                    <path d="m12 5 7 7-7 7"/>
                </svg>
            </div>
        </div>
    </a>
</article>
