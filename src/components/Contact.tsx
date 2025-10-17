import { motion } from 'motion/react';
import { useLanguage } from './LanguageContext';
import { Mail, Instagram, Twitter, Globe } from 'lucide-react';
import { siteConfig } from '../data/config';

export function Contact() {
  const { t } = useLanguage();

  const contactMethods = [
    {
      icon: Mail,
      label: { en: 'Email', fa: 'ایمیل' },
      value: 'hello@ravandeh.studio',
      href: 'mailto:hello@ravandeh.studio'
    },
    {
      icon: Instagram,
      label: { en: 'Instagram', fa: 'اینستاگرام' },
      value: '@ravandeh.studio',
      href: 'https://instagram.com/ravandeh.studio'
    },
    {
      icon: Twitter,
      label: { en: 'Twitter', fa: 'توییتر' },
      value: '@ravandehstudio',
      href: 'https://twitter.com/ravandehstudio'
    },
    {
      icon: Globe,
      label: { en: 'Website', fa: 'وب‌سایت' },
      value: 'ravandeh.studio',
      href: 'https://ravandeh.studio'
    }
  ];

  return (
    <section id="contact" className="relative py-32 px-6">
      {/* Background */}
      <div className="absolute inset-0 bg-gradient-to-b from-white via-blue-50/20 to-white dark:from-gray-950 dark:via-blue-950/10 dark:to-gray-950" />

      <div className="relative z-10 max-w-[900px] mx-auto">
        {/* Section Title */}
        <motion.div
          initial={{ opacity: 0, y: 40 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true, margin: '-100px' }}
          transition={{ duration: 0.8 }}
          className="text-center mb-16"
        >
          <h2 className="mb-4 dark:text-white">
            {t(siteConfig.sections.contact.title)}
          </h2>
          <p className="text-[#6b6b6b] dark:text-gray-300 max-w-[600px] mx-auto">
            {t(siteConfig.sections.contact.description)}
          </p>
        </motion.div>

        {/* Contact Cards */}
        <div className="grid grid-cols-1 md:grid-cols-2 gap-6 mb-16">
          {contactMethods.map((method, index) => {
            const Icon = method.icon;
            return (
              <motion.a
                key={index}
                href={method.href}
                target="_blank"
                rel="noopener noreferrer"
                initial={{ opacity: 0, y: 40 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true, margin: '-100px' }}
                transition={{ duration: 0.6, delay: index * 0.1 }}
                whileHover={{ y: -8, scale: 1.02 }}
                className="backdrop-blur-xl bg-white/70 dark:bg-gray-900/70 rounded-[28px] p-8 shadow-[0_8px_32px_rgba(0,0,0,0.08)] dark:shadow-[0_8px_32px_rgba(0,0,0,0.3)] border border-white/20 dark:border-gray-700/20 hover:shadow-[0_16px_48px_rgba(0,0,0,0.12)] dark:hover:shadow-[0_16px_48px_rgba(0,0,0,0.4)] transition-all duration-500"
              >
                <div className="flex items-center gap-4">
                  <div className="flex items-center justify-center w-12 h-12 rounded-[16px] bg-gradient-to-br from-blue-500/20 to-purple-500/20 dark:from-blue-400/30 dark:to-purple-400/30">
                    <Icon size={24} className="text-purple-600 dark:text-purple-400" />
                  </div>
                  <div className="flex-1">
                    <div className="text-sm text-[#6b6b6b] dark:text-gray-400 mb-1">
                      {t(method.label)}
                    </div>
                    <div className="text-[#1a1a1a] dark:text-white">
                      {method.value}
                    </div>
                  </div>
                </div>
              </motion.a>
            );
          })}
        </div>

        {/* CTA Section */}
        <motion.div
          initial={{ opacity: 0, y: 40 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true, margin: '-100px' }}
          transition={{ duration: 0.8, delay: 0.4 }}
          className="backdrop-blur-xl bg-gradient-to-br from-blue-500/10 to-purple-500/10 dark:from-blue-400/20 dark:to-purple-400/20 rounded-[36px] p-12 text-center border border-white/20 dark:border-gray-700/20"
        >
          <h3 className="mb-4 text-[#1a1a1a] dark:text-white">
            {t({ en: 'Ready to Start a Conversation?', fa: 'آماده شروع گفتگو هستید؟' })}
          </h3>
          <p className="text-[#6b6b6b] dark:text-gray-300 mb-8 max-w-[500px] mx-auto">
            {t({
              en: 'We welcome inquiries about exhibitions, collaborations, acquisitions, and commissions.',
              fa: 'ما از سوالات درباره نمایشگاه‌ها، همکاری‌ها، خریدها و سفارش‌ها استقبال می‌کنیم.'
            })}
          </p>
          <motion.a
            href="mailto:hello@ravandeh.studio"
            className="inline-block px-8 py-4 rounded-[24px] bg-gradient-to-r from-blue-500 to-purple-500 dark:from-blue-600 dark:to-purple-600 text-white shadow-[0_8px_24px_rgba(99,102,241,0.3)] dark:shadow-[0_8px_24px_rgba(99,102,241,0.5)] hover:shadow-[0_12px_32px_rgba(99,102,241,0.4)] dark:hover:shadow-[0_12px_32px_rgba(99,102,241,0.6)] transition-shadow"
            whileHover={{ scale: 1.05, y: -2 }}
            whileTap={{ scale: 0.95 }}
          >
            {t({ en: 'Send Us a Message', fa: 'ارسال پیام' })}
          </motion.a>
        </motion.div>
      </div>
    </section>
  );
}
