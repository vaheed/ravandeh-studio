<?php
/**
 * Template Name: Front Page
 * The main homepage template
 * 
 * @package Ravandeh_Studio
 * @since 1.0.0
 */

get_header();

$lang = get_ravandeh_current_language();
?>

<!-- Hero Section -->
<section id="hero" class="hero-section relative min-h-screen flex items-center justify-center overflow-hidden">
    <!-- Background with glassmorphism -->
    <div class="hero-background absolute inset-0 -z-10">
        <?php 
        $hero_bg = get_theme_mod('ravandeh_hero_bg_image');
        if ($hero_bg): 
        ?>
            <img src="<?php echo esc_url($hero_bg); ?>" alt="" class="w-full h-full object-cover opacity-20" />
        <?php endif; ?>
        <div class="absolute inset-0 bg-gradient-to-br from-indigo-500/10 via-purple-500/10 to-pink-500/10"></div>
    </div>
    
    <div class="hero-content relative z-10 max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 text-center">
        <div class="hero-glass-card backdrop-blur-2xl bg-white/10 dark:bg-black/10 border border-white/20 dark:border-white/10 rounded-[44px] p-12 md:p-16 shadow-2xl">
            <h1 class="hero-title mb-6 animate-fade-in">
                <?php echo esc_html(get_option("ravandeh_hero_title_{$lang}", $lang === 'fa' ? 'جایی که هنر با نور ملاقات می‌کند' : 'Where Art Meets Light')); ?>
            </h1>
            
            <p class="hero-subtitle text-foreground/80 max-w-3xl mx-auto mb-8 animate-fade-in-delay">
                <?php echo esc_html(get_option("ravandeh_hero_subtitle_{$lang}", $lang === 'fa' ? 'مجموعه‌ای منتخب از هنر معاصر ایرانی، پیکرتراشیده از شیشه و حرکت' : 'A curated collection of contemporary Persian art, sculpted from glass and motion')); ?>
            </p>
            
            <a href="#collections" class="hero-cta inline-flex items-center gap-2 px-8 py-4 bg-gradient-to-r from-indigo-600 to-purple-600 text-white rounded-[28px] hover:shadow-lg hover:scale-105 transition-all duration-300">
                <?php echo esc_html(get_option("ravandeh_hero_cta_{$lang}", $lang === 'fa' ? 'کاوش مجموعه‌ها' : 'Explore Collections')); ?>
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="<?php echo $lang === 'fa' ? 'rotate-180' : ''; ?>">
                    <path d="M5 12h14"/>
                    <path d="m12 5 7 7-7 7"/>
                </svg>
            </a>
        </div>
    </div>
    
    <!-- Scroll indicator -->
    <div class="absolute bottom-8 left-1/2 -translate-x-1/2 animate-bounce">
        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="text-foreground/50">
            <path d="M12 5v14"/>
            <path d="m19 12-7 7-7-7"/>
        </svg>
    </div>
</section>

<!-- Collections Section -->
<section id="collections" class="collections-section py-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-7xl mx-auto">
        <div class="section-header text-center mb-16">
            <h2 class="section-title mb-4">
                <?php echo esc_html(get_option("ravandeh_collections_title_{$lang}", $lang === 'fa' ? 'مجموعه‌ها' : 'Collections')); ?>
            </h2>
            <p class="section-description text-foreground/70 max-w-2xl mx-auto">
                <?php echo esc_html(get_option("ravandeh_collections_description_{$lang}", $lang === 'fa' ? 'نمایشگاه‌های منتخب که تقاطع سنت و نوآوری را کاوش می‌کنند' : 'Curated exhibitions exploring the intersection of tradition and innovation')); ?>
            </p>
        </div>
        
        <div class="collections-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $collections_query = new WP_Query(array(
                'post_type' => 'collection',
                'posts_per_page' => 6,
                'post_status' => 'publish',
            ));
            
            if ($collections_query->have_posts()):
                while ($collections_query->have_posts()): $collections_query->the_post();
                    $collection_data = get_collection_data(get_the_ID(), $lang);
                    get_template_part('template-parts/content', 'collection', array('data' => $collection_data));
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p class="col-span-full text-center text-foreground/50">' . ($lang === 'fa' ? 'مجموعه‌ای یافت نشد' : 'No collections found') . '</p>';
            endif;
            ?>
        </div>
        
        <?php if ($collections_query->found_posts > 6): ?>
        <div class="text-center mt-12">
            <a href="<?php echo esc_url(get_post_type_archive_link('collection')); ?>" class="inline-flex items-center gap-2 px-6 py-3 backdrop-blur-xl bg-white/50 dark:bg-black/50 border border-black/10 dark:border-white/10 rounded-[28px] hover:bg-white/70 dark:hover:bg-black/70 transition-all duration-300">
                <?php echo $lang === 'fa' ? 'مشاهده همه مجموعه‌ها' : 'View All Collections'; ?>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- Artists Section -->
<section id="artists" class="artists-section py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-white via-indigo-50/30 to-white dark:from-[#1a1a1a] dark:via-indigo-950/20 dark:to-[#1a1a1a]">
    <div class="max-w-7xl mx-auto">
        <div class="section-header text-center mb-16">
            <h2 class="section-title mb-4">
                <?php echo esc_html(get_option("ravandeh_artists_title_{$lang}", $lang === 'fa' ? 'هنرمندان' : 'Artists')); ?>
            </h2>
            <p class="section-description text-foreground/70 max-w-2xl mx-auto">
                <?php echo esc_html(get_option("ravandeh_artists_description_{$lang}", $lang === 'fa' ? 'با رویابینانی آشنا شوید که هنر معاصر ایرانی را شکل می‌دهند' : 'Meet the visionaries shaping contemporary Persian art')); ?>
            </p>
        </div>
        
        <div class="artists-grid grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <?php
            $artists_query = new WP_Query(array(
                'post_type' => 'artist',
                'posts_per_page' => 6,
                'post_status' => 'publish',
            ));
            
            if ($artists_query->have_posts()):
                while ($artists_query->have_posts()): $artists_query->the_post();
                    $artist_data = get_artist_data(get_the_ID(), $lang);
                    get_template_part('template-parts/content', 'artist', array('data' => $artist_data));
                endwhile;
                wp_reset_postdata();
            else:
                echo '<p class="col-span-full text-center text-foreground/50">' . ($lang === 'fa' ? 'هنرمندی یافت نشد' : 'No artists found') . '</p>';
            endif;
            ?>
        </div>
        
        <?php if ($artists_query->found_posts > 6): ?>
        <div class="text-center mt-12">
            <a href="<?php echo esc_url(get_post_type_archive_link('artist')); ?>" class="inline-flex items-center gap-2 px-6 py-3 backdrop-blur-xl bg-white/50 dark:bg-black/50 border border-black/10 dark:border-white/10 rounded-[28px] hover:bg-white/70 dark:hover:bg-black/70 transition-all duration-300">
                <?php echo $lang === 'fa' ? 'مشاهده همه هنرمندان' : 'View All Artists'; ?>
            </a>
        </div>
        <?php endif; ?>
    </div>
</section>

<!-- About Section -->
<section id="about" class="about-section py-24 px-4 sm:px-6 lg:px-8">
    <div class="max-w-4xl mx-auto">
        <div class="about-glass-card backdrop-blur-xl bg-gradient-to-br from-white/50 via-white/30 to-white/50 dark:from-black/50 dark:via-black/30 dark:to-black/50 border border-black/10 dark:border-white/10 rounded-[44px] p-12 md:p-16 shadow-xl">
            <h2 class="section-title text-center mb-8">
                <?php echo esc_html(get_option("ravandeh_about_title_{$lang}", $lang === 'fa' ? 'درباره روندِه' : 'About Ravandeh')); ?>
            </h2>
            
            <div class="about-content text-foreground/80 leading-relaxed space-y-6">
                <p class="text-center max-w-3xl mx-auto">
                    <?php echo esc_html(get_option("ravandeh_about_description_{$lang}", $lang === 'fa' ? 'استودیو روندِه یک گالری دیجیتال است که شکاف بین سنت‌های هنری ایرانی و جنبش‌های هنری جهانی معاصر را پر می‌کند.' : 'Ravandeh Studio is a digital gallery bridging the gap between Persian artistic traditions and contemporary global art movements.')); ?>
                </p>
            </div>
        </div>
    </div>
</section>

<!-- Contact Section -->
<section id="contact" class="contact-section py-24 px-4 sm:px-6 lg:px-8 bg-gradient-to-br from-white via-purple-50/30 to-white dark:from-[#1a1a1a] dark:via-purple-950/20 dark:to-[#1a1a1a]">
    <div class="max-w-4xl mx-auto">
        <div class="section-header text-center mb-12">
            <h2 class="section-title mb-4">
                <?php echo esc_html(get_option("ravandeh_contact_title_{$lang}", $lang === 'fa' ? 'تماس با ما' : 'Get in Touch')); ?>
            </h2>
            <p class="section-description text-foreground/70">
                <?php echo esc_html(get_option("ravandeh_contact_description_{$lang}", $lang === 'fa' ? 'چه هنرمند باشید، چه کلکسیونر، یا صرفاً مشتاق هنر، دوست داریم از شما بشنویم.' : 'Whether you\'re an artist, collector, or simply passionate about art, we\'d love to hear from you.')); ?>
            </p>
        </div>
        
        <div class="contact-card backdrop-blur-xl bg-white/50 dark:bg-black/50 border border-black/10 dark:border-white/10 rounded-[44px] p-12 shadow-xl">
            <div class="contact-info text-center space-y-6">
                <?php
                $email = get_option('ravandeh_contact_email', 'hello@ravandeh.studio');
                $instagram = get_option('ravandeh_contact_instagram', 'ravandeh.studio');
                ?>
                
                <div class="contact-item">
                    <h3 class="mb-2"><?php echo $lang === 'fa' ? 'ایمیل' : 'Email'; ?></h3>
                    <a href="mailto:<?php echo esc_attr($email); ?>" class="text-indigo-600 dark:text-indigo-400 hover:underline">
                        <?php echo esc_html($email); ?>
                    </a>
                </div>
                
                <div class="contact-socials flex justify-center gap-4 mt-8">
                    <?php ravandeh_social_links('text-2xl'); ?>
                </div>
            </div>
        </div>
    </div>
</section>

<?php
get_footer();
