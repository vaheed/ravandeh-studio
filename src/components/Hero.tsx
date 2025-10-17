import { motion } from 'motion/react';
import { useLanguage } from './LanguageContext';
import { ChevronDown } from 'lucide-react';
import { siteConfig } from '../data/config';

export function Hero() {
  const { t } = useLanguage();

  return (
    <section id="hero" className="relative min-h-screen flex items-center justify-center overflow-hidden">
      {/* Gradient Background */}
      <div className="absolute inset-0 bg-gradient-to-br from-blue-50 via-purple-50 to-pink-50 dark:from-gray-900 dark:via-purple-900/20 dark:to-blue-900/20" />
      
      {/* Parallax Background Image */}
      <motion.div
        className="absolute inset-0 opacity-10 dark:opacity-5"
        initial={{ scale: 1.1 }}
        animate={{ scale: 1 }}
        transition={{ duration: 20, repeat: Infinity, repeatType: 'reverse' }}
      >
        <img
          src="https://images.unsplash.com/photo-1681662410751-0b6382f135c1?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxtaW5pbWFsJTIwZ3JhZGllbnQlMjBiYWNrZ3JvdW5kfGVufDF8fHx8MTc2MDcxMDgzMnww&ixlib=rb-4.1.0&q=80&w=1080"
          alt=""
          className="w-full h-full object-cover"
        />
      </motion.div>

      {/* Content Container */}
      <div className="relative z-10 max-w-[1200px] mx-auto px-6 py-32">
        <motion.div
          initial={{ opacity: 0, y: 40 }}
          animate={{ opacity: 1, y: 0 }}
          transition={{ duration: 1, delay: 0.5, ease: [0.4, 0, 0.2, 1] }}
          className="backdrop-blur-xl bg-white/70 dark:bg-gray-900/70 rounded-[44px] p-12 md:p-16 shadow-[0_8px_32px_rgba(0,0,0,0.08)] dark:shadow-[0_8px_32px_rgba(0,0,0,0.3)] border border-white/20 dark:border-gray-700/20"
        >
          {/* Title with Gradient */}
          <motion.h1
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.8, delay: 0.8 }}
            className="text-center mb-6 bg-gradient-to-r from-blue-600 via-purple-600 to-pink-600 dark:from-blue-400 dark:via-purple-400 dark:to-pink-400 bg-clip-text text-transparent"
          >
            {t(siteConfig.hero.title)}
          </motion.h1>

          {/* Subtitle */}
          <motion.p
            initial={{ opacity: 0 }}
            animate={{ opacity: 1 }}
            transition={{ duration: 0.8, delay: 1 }}
            className="text-center text-[#6b6b6b] dark:text-gray-300 max-w-[700px] mx-auto"
          >
            {t(siteConfig.hero.subtitle)}
          </motion.p>

          {/* CTA Button */}
          <motion.div
            initial={{ opacity: 0, y: 20 }}
            animate={{ opacity: 1, y: 0 }}
            transition={{ duration: 0.8, delay: 1.2 }}
            className="flex justify-center mt-10"
          >
            <motion.a
              href="#collections"
              className="px-8 py-4 rounded-[24px] bg-gradient-to-r from-blue-500 to-purple-500 dark:from-blue-600 dark:to-purple-600 text-white shadow-[0_8px_24px_rgba(99,102,241,0.3)] dark:shadow-[0_8px_24px_rgba(99,102,241,0.5)] hover:shadow-[0_12px_32px_rgba(99,102,241,0.4)] dark:hover:shadow-[0_12px_32px_rgba(99,102,241,0.6)] transition-shadow"
              whileHover={{ scale: 1.05, y: -2 }}
              whileTap={{ scale: 0.95 }}
            >
              {t(siteConfig.hero.ctaButton)}
            </motion.a>
          </motion.div>
        </motion.div>
      </div>

      {/* Scroll Indicator */}
      <motion.div
        className="absolute bottom-12 left-1/2 transform -translate-x-1/2"
        initial={{ opacity: 0, y: -10 }}
        animate={{ opacity: 1, y: 0 }}
        transition={{
          duration: 0.8,
          delay: 1.5,
          repeat: Infinity,
          repeatType: 'reverse',
        }}
      >
        <ChevronDown size={32} className="text-[#6b6b6b] dark:text-gray-400" />
      </motion.div>
    </section>
  );
}
