<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo('charset'); ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

<div id="page" class="site">
    <a class="skip-link screen-reader-text" href="#primary"><?php esc_html_e('Skip to content', 'ravandeh-studio'); ?></a>

    <header id="masthead" class="site-header fixed top-0 left-0 right-0 z-50 backdrop-blur-xl bg-white/70 dark:bg-[#252525]/70 border-b border-black/5 dark:border-white/5 transition-all duration-300">
        <nav class="nav-container max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="flex items-center justify-between h-20">
                <!-- Logo -->
                <div class="site-branding flex-shrink-0">
                    <?php if (has_custom_logo()): ?>
                        <?php the_custom_logo(); ?>
                    <?php else: ?>
                        <a href="<?php echo esc_url(home_url('/')); ?>" class="flex items-center gap-3">
                            <span class="logo-text text-foreground transition-colors duration-300">
                                <?php 
                                $lang = get_ravandeh_current_language();
                                $site_name = $lang === 'fa' 
                                    ? get_option('ravandeh_site_name_fa', 'استودیو رَوَنده')
                                    : get_option('ravandeh_site_name_en', 'Ravandeh Studio');
                                echo esc_html($site_name);
                                ?>
                            </span>
                        </a>
                    <?php endif; ?>
                </div>

                <!-- Desktop Navigation -->
                <div class="hidden md:flex items-center gap-8">
                    <ul class="nav-menu flex items-center gap-6">
                        <?php
                        $nav_items = ravandeh_get_nav_items();
                        $lang = get_ravandeh_current_language();
                        
                        foreach ($nav_items as $item):
                            $label = $lang === 'fa' ? $item['label_fa'] : $item['label_en'];
                        ?>
                            <li class="nav-item">
                                <a href="<?php echo esc_url($item['url']); ?>" class="nav-link text-foreground/70 hover:text-foreground transition-colors duration-200">
                                    <?php echo esc_html($label); ?>
                                </a>
                            </li>
                        <?php endforeach; ?>
                    </ul>

                    <div class="nav-actions flex items-center gap-3">
                        <?php ravandeh_language_toggle(); ?>
                        <?php ravandeh_dark_mode_toggle(); ?>
                    </div>
                </div>

                <!-- Mobile Menu Button -->
                <div class="md:hidden flex items-center gap-3">
                    <?php ravandeh_language_toggle(); ?>
                    <?php ravandeh_dark_mode_toggle(); ?>
                    <button id="mobile-menu-toggle" 
                            class="mobile-menu-toggle p-2 rounded-2xl hover:bg-black/5 dark:hover:bg-white/5 transition-colors"
                            aria-label="Toggle menu"
                            aria-expanded="false">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <line x1="4" x2="20" y1="12" y2="12"/>
                            <line x1="4" x2="20" y1="6" y2="6"/>
                            <line x1="4" x2="20" y1="18" y2="18"/>
                        </svg>
                    </button>
                </div>
            </div>

            <!-- Mobile Navigation -->
            <div id="mobile-menu" class="mobile-menu hidden md:hidden pb-6">
                <ul class="mobile-nav-menu flex flex-col gap-4">
                    <?php
                    foreach ($nav_items as $item):
                        $label = $lang === 'fa' ? $item['label_fa'] : $item['label_en'];
                    ?>
                        <li class="mobile-nav-item">
                            <a href="<?php echo esc_url($item['url']); ?>" class="mobile-nav-link block py-3 px-4 rounded-2xl text-foreground/70 hover:text-foreground hover:bg-black/5 dark:hover:bg-white/5 transition-all duration-200">
                                <?php echo esc_html($label); ?>
                            </a>
                        </li>
                    <?php endforeach; ?>
                </ul>
            </div>
        </nav>
    </header>

    <main id="primary" class="site-main">
