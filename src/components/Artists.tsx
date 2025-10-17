import { motion } from 'motion/react';
import { useLanguage } from './LanguageContext';
import { siteConfig, artistsData } from '../data/config';
import { ImageWithFallback } from './figma/ImageWithFallback';

const artistImages = [
  'https://images.unsplash.com/photo-1751003801857-30d275cc8243?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxhcnRpc3QlMjBwb3J0cmFpdCUyMHN0dWRpb3xlbnwxfHx8fDE3NjA3MTgyMTV8MA&ixlib=rb-4.1.0&q=80&w=1080',
  'https://images.unsplash.com/photo-1747944530879-6185b74c1d56?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxjb250ZW1wb3JhcnklMjBwaG90b2dyYXBoZXIlMjBwb3J0cmFpdHxlbnwxfHx8fDE3NjA3MTgyMTV8MA&ixlib=rb-4.1.0&q=80&w=1080',
  'https://images.unsplash.com/photo-1598564254441-be3be79c2b9a?crop=entropy&cs=tinysrgb&fit=max&fm=jpg&ixid=M3w3Nzg4Nzd8MHwxfHNlYXJjaHwxfHxzY3VscHRvciUyMGFydGlzdCUyMHBvcnRyYWl0fGVufDF8fHx8MTc2MDcxODIxNXww&ixlib=rb-4.1.0&q=80&w=1080',
];

export function Artists() {
  const { t } = useLanguage();

  return (
    <section id="artists" className="relative py-32 px-6">
      {/* Background */}
      <div className="absolute inset-0 bg-gradient-to-b from-white via-purple-50/30 to-white dark:from-gray-950 dark:via-purple-950/10 dark:to-gray-950" />

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
            {t(siteConfig.sections.artists.title)}
          </h2>
          <p className="text-[#6b6b6b] dark:text-gray-300 max-w-[600px] mx-auto">
            {t(siteConfig.sections.artists.description)}
          </p>
        </motion.div>

        {/* Artists Grid */}
        <div className="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
          {artistsData.map((artist, index) => (
            <motion.div
              key={artist.id}
              initial={{ opacity: 0, y: 40 }}
              whileInView={{ opacity: 1, y: 0 }}
              viewport={{ once: true, margin: '-100px' }}
              transition={{ duration: 0.6, delay: index * 0.1 }}
              whileHover={{ y: -8 }}
              className="group cursor-pointer"
            >
              <div className="backdrop-blur-xl bg-white/70 dark:bg-gray-900/70 rounded-[36px] overflow-hidden shadow-[0_8px_32px_rgba(0,0,0,0.08)] dark:shadow-[0_8px_32px_rgba(0,0,0,0.3)] border border-white/20 dark:border-gray-700/20 hover:shadow-[0_16px_48px_rgba(0,0,0,0.12)] dark:hover:shadow-[0_16px_48px_rgba(0,0,0,0.4)] transition-shadow duration-500">
                {/* Portrait */}
                <div className="relative aspect-[3/4] overflow-hidden">
                  <motion.div
                    className="w-full h-full"
                    whileHover={{ scale: 1.05 }}
                    transition={{ duration: 0.6 }}
                  >
                    <ImageWithFallback
                      src={artistImages[index]}
                      alt={t(artist.name)}
                      className="w-full h-full object-cover"
                    />
                  </motion.div>
                  {/* Gradient Overlay */}
                  <div className="absolute inset-0 bg-gradient-to-t from-black/30 via-transparent to-transparent" />
                  
                  {/* Name Overlay */}
                  <div className="absolute bottom-0 left-0 right-0 p-6">
                    <motion.h3
                      className="text-white drop-shadow-lg"
                      initial={{ opacity: 0, y: 10 }}
                      whileInView={{ opacity: 1, y: 0 }}
                      transition={{ delay: index * 0.1 + 0.3 }}
                    >
                      {t(artist.name)}
                    </motion.h3>
                  </div>
                </div>

                {/* Content */}
                <div className="p-8">
                  <div className="mb-4">
                    <span className="inline-block px-4 py-2 rounded-[16px] bg-gradient-to-r from-purple-500/10 to-pink-500/10 dark:from-purple-400/20 dark:to-pink-400/20 text-sm text-[#6b6b6b] dark:text-gray-300">
                      {t(artist.specialty)}
                    </span>
                  </div>
                  <p className="text-[#6b6b6b] dark:text-gray-300">
                    {t(artist.bio)}
                  </p>
                </div>
              </div>
            </motion.div>
          ))}
        </div>
      </div>
    </section>
  );
}
