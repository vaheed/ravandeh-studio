import { motion } from 'motion/react';
import { useLanguage } from './LanguageContext';
import { siteConfig, collectionsData } from '../data/config';
import { ImageWithFallback } from './figma/ImageWithFallback';

const collectionImages = [
  'https://images.unsplash.com/photo-1758903846683-678bb2e6bca3?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxhYnN0cmFjdCUyMGV0aGVyZWFsJTIwYXJ0fGVufDF8fHx8MTc2MDcxODIxM3ww&ixlib=rb-4.1.0&q=80&w=1080',
  'https://images.unsplash.com/photo-1656164113343-25e62181588b?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx1cmJhbiUyMGFic3RyYWN0JTIwYXJjaGl0ZWN0dXJlfGVufDF8fHx8MTc2MDcxODIxNHww&ixlib=rb-4.1.0&q=80&w=1080',
  'https://images.unsplash.com/photo-1740292019680-559a7d12caa5?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHx0aW1lJTIwYWJzdHJhY3QlMjBjb25jZXB0dWFsfGVufDF8fHx8MTc2MDcxODIxNHww&ixlib=rb-4.1.0&q=80&w=1080',
];

export function Collections() {
  const { t } = useLanguage();

  return (
    <section id="collections" className="relative py-32 px-6">
      {/* Background */}
      <div className="absolute inset-0 bg-gradient-to-b from-white via-blue-50/30 to-white dark:from-gray-950 dark:via-blue-950/10 dark:to-gray-950" />

      <div className="relative z-10 max-w-[1440px] mx-auto">
        {/* Section Title */}
        <motion.div
          initial={{ opacity: 0, y: 40 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true, margin: '-100px' }}
          transition={{ duration: 0.8 }}
          className="text-center mb-20"
        >
          <h2 className="mb-4 dark:text-white">
            {t(siteConfig.sections.collections.title)}
          </h2>
          <p className="text-[#6b6b6b] dark:text-gray-300 max-w-[600px] mx-auto">
            {t(siteConfig.sections.collections.description)}
          </p>
        </motion.div>

        {/* Collections Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {collectionsData.map((collection, index) => (
            <motion.div
              key={collection.id}
              initial={{ opacity: 0, y: 40 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true, margin: '-100px' }}
              transition={{ duration: 0.6, delay: index * 0.1 }}
              whileHover={{ y: -8 }}
              className="group cursor-pointer"
            >
              <div className="backdrop-blur-xl bg-white/70 dark:bg-gray-900/70 rounded-[36px] overflow-hidden shadow-[0_8px_32px_rgba(0,0,0,0.08)] dark:shadow-[0_8px_32px_rgba(0,0,0,0.3)] border border-white/20 dark:border-gray-700/20 hover:shadow-[0_16px_48px_rgba(0,0,0,0.12)] dark:hover:shadow-[0_16px_48px_rgba(0,0,0,0.4)] transition-shadow duration-500">
                {/* Image */}
                <div className="relative aspect-[4/3] overflow-hidden">
                  <motion.div
                    className="w-full h-full"
                    whileHover={{ scale: 1.05 }}
                    transition={{ duration: 0.6 }}
                  >
                    <ImageWithFallback
                      src={collectionImages[index]}
                      alt={t(collection.title)}
                      className="w-full h-full object-cover"
                    />
                  </motion.div>
                  {/* Gradient Overlay */}
                  <div className="absolute inset-0 bg-gradient-to-t from-black/20 to-transparent opacity-0 group-hover:opacity-100 transition-opacity duration-500" />
                </div>

                {/* Content */}
                <div className="p-8">
                  <div className="flex items-center justify-between mb-3">
                    <h3 className="text-[#1a1a1a] dark:text-white">{t(collection.title)}</h3>
                    <span className="text-sm text-[#6b6b6b] dark:text-gray-400">{collection.year}</span>
                  </div>
                  <p className="text-[#6b6b6b] dark:text-gray-300 mb-4">
                    {t(collection.description)}
                  </p>
                  <div className="flex items-center gap-4 text-sm text-[#6b6b6b] dark:text-gray-400">
                    <span>{collection.pieces} {t({ en: 'pieces', fa: 'اثر' })}</span>
                  </div>
                </div>
              </div>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
