import { motion } from 'motion/react';
import { useLanguage } from './LanguageContext';
import { useTheme } from './ThemeContext';
import { Languages, Moon, Sun } from 'lucide-react';
import { siteConfig } from '../data/config';

export function Navigation() {
  const { language, toggleLanguage, t } = useLanguage();
  const { theme, toggleTheme } = useTheme();

  const navItems = [
    { label: { en: 'Collections', fa: 'مجموعه‌ها' }, href: '#collections' },
    { label: { en: 'Artists', fa: 'هنرمندان' }, href: '#artists' },
    { label: { en: 'About', fa: 'درباره' }, href: '#about' },
    { label: { en: 'Contact', fa: 'تماس' }, href: '#contact' },
  ];

  return (
    <motion.nav
      initial={{ y: -100, opacity: 0 }}
      animate={{ y: 0, opacity: 1 }}
      transition={{ duration: 0.8, ease: [0.4, 0, 0.2, 1] }}
      className="fixed top-0 left-0 right-0 z-50 px-6 py-4"
    >
      <div className="max-w-[1440px] mx-auto">
        <div className="backdrop-blur-xl bg-white/70 dark:bg-gray-900/70 rounded-[28px] px-6 md:px-8 py-4 shadow-[0_8px_32px_rgba(0,0,0,0.08)] dark:shadow-[0_8px_32px_rgba(0,0,0,0.3)] border border-white/20 dark:border-gray-700/20">
          <div className="flex items-center justify-between gap-4">
            {/* Logo */}
            <motion.a
              href="#hero"
              className="text-[#1a1a1a] dark:text-white hover:opacity-70 transition-opacity flex-shrink-0"
              whileHover={{ scale: 1.05 }}
              whileTap={{ scale: 0.95 }}
            >
              <span className="text-lg md:text-xl tracking-tight whitespace-nowrap">
                {t(siteConfig.siteName)}
              </span>
            </motion.a>

            {/* Desktop Navigation */}
            <div className="hidden lg:flex items-center gap-6">
              {navItems.map((item, index) => (
                <motion.a
                  key={index}
                  href={item.href}
                  className="text-[#6b6b6b] dark:text-gray-300 hover:text-[#1a1a1a] dark:hover:text-white transition-colors relative group"
                  initial={{ opacity: 0, y: -10 }}
                  animate={{ opacity: 1, y: 0 }}
                  transition={{ delay: index * 0.1 + 0.3, duration: 0.5 }}
                >
                  {t(item.label)}
                  <span className="absolute bottom-[-4px] left-0 w-0 h-[2px] bg-gradient-to-r from-blue-500 to-purple-500 group-hover:w-full transition-all duration-300" />
                </motion.a>
              ))}
            </div>

            {/* Right Side Controls */}
            <div className="flex items-center gap-2 flex-shrink-0">
              {/* Theme Toggle */}
              <motion.button
                onClick={toggleTheme}
                className="flex items-center justify-center w-10 h-10 rounded-full bg-gradient-to-r from-blue-500/10 to-purple-500/10 dark:from-blue-400/20 dark:to-purple-400/20 hover:from-blue-500/20 hover:to-purple-500/20 dark:hover:from-blue-400/30 dark:hover:to-purple-400/30 transition-all"
                whileHover={{ scale: 1.05 }}
                whileTap={{ scale: 0.95 }}
                aria-label="Toggle theme"
              >
                {theme === 'light' ? (
                  <Moon size={18} className="text-[#6b6b6b] dark:text-gray-300" />
                ) : (
                  <Sun size={18} className="text-[#6b6b6b] dark:text-gray-300" />
                )}
              </motion.button>

              {/* Language Toggle */}
              <motion.button
                onClick={toggleLanguage}
                className="flex items-center gap-2 px-4 py-2 rounded-[20px] bg-gradient-to-r from-blue-500/10 to-purple-500/10 dark:from-blue-400/20 dark:to-purple-400/20 hover:from-blue-500/20 hover:to-purple-500/20 dark:hover:from-blue-400/30 dark:hover:to-purple-400/30 transition-all"
                whileHover={{ scale: 1.05 }}
                whileTap={{ scale: 0.95 }}
                aria-label="Toggle language"
              >
                <Languages size={18} className="text-[#6b6b6b] dark:text-gray-300" />
                <span className="text-[#6b6b6b] dark:text-gray-300 text-sm">
                  {language === 'en' ? 'فا' : 'EN'}
                </span>
              </motion.button>
            </div>
          </div>
        </div>
      </div>
    </motion.nav>
  );
}
