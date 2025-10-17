<?php
/**
 * Template part for displaying a message when no content is found
 * 
 * @package Ravandeh_Studio
 * @since 1.0.0
 */

$lang = get_ravandeh_current_language();
?>

<section class="no-results not-found py-24 text-center">
    <div class="max-w-2xl mx-auto backdrop-blur-xl bg-white/50 dark:bg-black/50 border border-black/10 dark:border-white/10 rounded-[44px] p-16">
        <header class="page-header mb-8">
            <h1 class="page-title">
                <?php echo $lang === 'fa' ? 'محتوایی یافت نشد' : 'Nothing Found'; ?>
            </h1>
        </header>

        <div class="page-content text-foreground/70">
            <?php
            if (is_home() && current_user_can('publish_posts')):
                ?>
                <p><?php echo $lang === 'fa' ? 'برای شروع، یک پست ایجاد کنید.' : 'Ready to publish your first post? Get started here.'; ?></p>
                <a href="<?php echo esc_url(admin_url('post-new.php')); ?>" class="inline-block mt-6 px-6 py-3 bg-indigo-600 text-white rounded-[28px] hover:bg-indigo-700 transition-colors">
                    <?php echo $lang === 'fa' ? 'افزودن پست جدید' : 'Add New Post'; ?>
                </a>
                <?php
            elseif (is_search()):
                ?>
                <p><?php echo $lang === 'fa' ? 'متأسفانه، هیچ نتیجه‌ای با جستجوی شما مطابقت نداشت. لطفاً با کلمات کلیدی متفاوت دوباره جستجو کنید.' : 'Sorry, but nothing matched your search terms. Please try again with different keywords.'; ?></p>
                <?php
                get_search_form();
            else:
                ?>
                <p><?php echo $lang === 'fa' ? 'متأسفانه، محتوایی در اینجا یافت نشد.' : 'It seems we can\'t find what you\'re looking for. Perhaps searching can help.'; ?></p>
                <?php
                get_search_form();
            endif;
            ?>
        </div>
    </div>
</section>
