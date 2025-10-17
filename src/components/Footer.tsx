import { motion } from 'motion/react';
import { useLanguage } from './LanguageContext';
import { Instagram, Twitter, Mail, Heart } from 'lucide-react';
import { siteConfig } from '../data/config';

export function Footer() {
  const { t } = useLanguage();

  const socialLinks = [
    { icon: Instagram, href: 'https://instagram.com/ravandeh.studio', label: 'Instagram' },
    { icon: Twitter, href: 'https://twitter.com/ravandehstudio', label: 'Twitter' },
    { icon: Mail, href: 'mailto:hello@ravandeh.studio', label: 'Email' }
  ];

  return (
    <footer className="relative py-16 px-6">
      <div className="max-w-[1440px] mx-auto">
        {/* Divider */}
        <div className="h-px bg-gradient-to-r from-transparent via-gray-300 dark:via-gray-700 to-transparent mb-12" />

        {/* Content */}
        <div className="flex flex-col items-center gap-8">
          {/* Logo */}
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.6 }}
            className="text-center"
          >
            <h3 className="text-[#1a1a1a] dark:text-white mb-2">
              {t(siteConfig.siteName)}
            </h3>
            <p className="text-sm text-[#6b6b6b] dark:text-gray-400">
              {t(siteConfig.tagline)}
            </p>
          </motion.div>

          {/* Social Links */}
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            whileInView={{ opacity: 1, y: 0 }}
            viewport={{ once: true }}
            transition={{ duration: 0.6, delay: 0.2 }}
            className="flex items-center gap-4"
          >
            {socialLinks.map((link, index) => {
              const Icon = link.icon;
              return (
                <motion.a
                  key={index}
                  href={link.href}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="flex items-center justify-center w-12 h-12 rounded-full backdrop-blur-xl bg-white/70 dark:bg-gray-900/70 shadow-[0_4px_16px_rgba(0,0,0,0.08)] dark:shadow-[0_4px_16px_rgba(0,0,0,0.3)] border border-white/20 dark:border-gray-700/20 hover:shadow-[0_8px_24px_rgba(0,0,0,0.12)] dark:hover:shadow-[0_8px_24px_rgba(0,0,0,0.4)] transition-all"
                  whileHover={{ scale: 1.1, y: -2 }}
                  whileTap={{ scale: 0.95 }}
                  aria-label={link.label}
                >
                  <Icon size={20} className="text-[#6b6b6b] dark:text-gray-400" />
                </motion.a>
              );
            })}
          </motion.div>

          {/* Copyright */}
          <motion.div
            initial={{ opacity: 0 }}
            whileInView={{ opacity: 1 }}
            viewport={{ once: true }}
            transition={{ duration: 0.6, delay: 0.4 }}
            className="flex items-center gap-2 text-sm text-[#6b6b6b] dark:text-gray-400"
          >
            <span>{siteConfig.footer.copyright}</span>
            <span>•</span>
            <span className="flex items-center gap-1">
              {t(siteConfig.footer.madeWith)}
              <Heart size={14} className="text-red-500 fill-red-500" />
            </span>
          </motion.div>

          {/* Additional Links */}
          <motion.div
            initial={{ opacity: 0 }}
            whileInView={{ opacity: 1 }}
            viewport={{ once: true }}
            transition={{ duration: 0.6, delay: 0.5 }}
            className="flex items-center gap-6 text-sm text-[#6b6b6b] dark:text-gray-400"
          >
            <a href="https://ravandeh.studio/privacy-policy" className="hover:text-[#1a1a1a] dark:hover:text-white transition-colors">
              {t({ en: 'Privacy Policy', fa: 'حریم خصوصی' })}
            </a>
            <a href="https://ravandeh.studio/terms" className="hover:text-[#1a1a1a] dark:hover:text-white transition-colors">
              {t({ en: 'Terms of Service', fa: 'شرایط استفاده' })}
            </a>
          </motion.div>
        </div>
      </div>
    </footer>
  );
}
