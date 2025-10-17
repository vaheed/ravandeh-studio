    </main><!-- #primary -->

    <footer id="colophon" class="site-footer relative backdrop-blur-xl bg-gradient-to-br from-white/50 via-white/30 to-white/50 dark:from-[#1a1a1a]/50 dark:via-[#1a1a1a]/30 dark:to-[#1a1a1a]/50 border-t border-black/5 dark:border-white/5 overflow-hidden">
        <div class="footer-container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8 py-16">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-12 mb-12">
                <!-- Footer Column 1 -->
                <div class="footer-column">
                    <div class="site-branding mb-6">
                        <h3 class="site-title">
                            <?php 
                            $lang = get_ravandeh_current_language();
                            $site_name = $lang === 'fa' 
                                ? get_option('ravandeh_site_name_fa', 'استودیو رَوَنده')
                                : get_option('ravandeh_site_name_en', 'Ravandeh Studio');
                            echo esc_html($site_name);
                            ?>
                        </h3>
                        <p class="site-tagline text-foreground/60">
                            <?php 
                            $tagline = $lang === 'fa' 
                                ? get_option('ravandeh_tagline_fa', 'جایی که هنر با نور ملاقات می‌کند')
                                : get_option('ravandeh_tagline_en', 'Where Art Meets Light');
                            echo esc_html($tagline);
                            ?>
                        </p>
                    </div>
                    
                    <?php if (is_active_sidebar('footer-1')): ?>
                        <?php dynamic_sidebar('footer-1'); ?>
                    <?php endif; ?>
                </div>

                <!-- Footer Column 2 -->
                <div class="footer-column">
                    <?php if (is_active_sidebar('footer-2')): ?>
                        <?php dynamic_sidebar('footer-2'); ?>
                    <?php else: ?>
                        <h4 class="footer-title mb-4"><?php echo $lang === 'fa' ? 'پیوندها' : 'Links'; ?></h4>
                        <ul class="footer-menu space-y-2">
                            <?php
                            $nav_items = ravandeh_get_nav_items();
                            foreach ($nav_items as $item):
                                $label = $lang === 'fa' ? $item['label_fa'] : $item['label_en'];
                            ?>
                                <li>
                                    <a href="<?php echo esc_url($item['url']); ?>" class="footer-link text-foreground/60 hover:text-foreground transition-colors duration-200">
                                        <?php echo esc_html($label); ?>
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    <?php endif; ?>
                </div>

                <!-- Footer Column 3 -->
                <div class="footer-column">
                    <?php if (is_active_sidebar('footer-3')): ?>
                        <?php dynamic_sidebar('footer-3'); ?>
                    <?php else: ?>
                        <h4 class="footer-title mb-4">
                            <?php echo $lang === 'fa' ? 'تماس با ما' : 'Contact'; ?>
                        </h4>
                        <div class="footer-contact space-y-3">
                            <?php
                            $email = get_option('ravandeh_contact_email', 'hello@ravandeh.studio');
                            $instagram = get_option('ravandeh_contact_instagram', 'ravandeh.studio');
                            ?>
                            <p class="text-foreground/60">
                                <a href="mailto:<?php echo esc_attr($email); ?>" class="hover:text-foreground transition-colors">
                                    <?php echo esc_html($email); ?>
                                </a>
                            </p>
                            <div class="footer-social mt-4">
                                <?php ravandeh_social_links(); ?>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <!-- Footer Bottom -->
            <div class="footer-bottom pt-8 border-t border-black/5 dark:border-white/5">
                <div class="flex flex-col md:flex-row items-center justify-between gap-4">
                    <p class="footer-copyright text-foreground/50">
                        <?php echo esc_html(get_theme_mod('ravandeh_footer_copyright', '© 2025 Ravandeh Studio')); ?>
                    </p>
                    
                    <p class="footer-credit text-foreground/50">
                        <?php 
                        echo $lang === 'fa' ? 'ساخته شده با' : 'Made with';
                        echo ' ';
                        ?>
                        <span class="text-red-500">♥</span>
                        <?php echo ' '; ?>
                        <?php echo $lang === 'fa' ? 'و' : 'and'; ?>
                        <?php echo ' '; ?>
                        <a href="https://wordpress.org" target="_blank" rel="noopener noreferrer" class="hover:text-foreground transition-colors">WordPress</a>
                    </p>
                </div>
            </div>
        </div>
    </footer>
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
