import { motion } from 'motion/react';
import { useLanguage } from './LanguageContext';
import { Sparkles, Eye, Heart } from 'lucide-react';
import { siteConfig } from '../data/config';

export function About() {
  const { t } = useLanguage();

  const values = [
    {
      icon: Sparkles,
      title: { en: 'Innovation', fa: 'نوآوری' },
      description: {
        en: 'Pushing boundaries between traditional Persian aesthetics and contemporary digital art',
        fa: 'فراتر رفتن از مرزهای بین زیبایی‌شناسی سنتی ایرانی و هنر دیجیتال معاصر'
      }
    },
    {
      icon: Eye,
      title: { en: 'Vision', fa: 'چشم‌انداز' },
      description: {
        en: 'Creating immersive experiences that celebrate cultural heritage through modern mediums',
        fa: 'خلق تجربه‌های فراگیر که میراث فرهنگی را از طریق رسانه‌های مدرن جشن می‌گیرند'
      }
    },
    {
      icon: Heart,
      title: { en: 'Passion', fa: 'اشتیاق' },
      description: {
        en: 'Dedicated to fostering dialogue between artists, collectors, and art enthusiasts worldwide',
        fa: 'متعهد به تقویت گفتگو بین هنرمندان، کلکسیونرها و علاقه‌مندان به هنر در سراسر جهان'
      }
    }
  ];

  return (
    <section id="about" className="relative py-32 px-6">
      {/* Background */}
      <div className="absolute inset-0 bg-gradient-to-b from-white via-pink-50/30 to-white dark:from-gray-950 dark:via-pink-950/10 dark:to-gray-950" />

      <div className="relative z-10 max-w-[1200px] mx-auto">
        {/* Section Title */}
        <motion.div
          initial={{ opacity: 0, y: 40 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true, margin: '-100px' }}
          transition={{ duration: 0.8 }}
          className="text-center mb-20"
        >
          <h2 className="mb-4 dark:text-white">
            {t(siteConfig.sections.about.title)}
          </h2>
          <p className="text-[#6b6b6b] dark:text-gray-300 max-w-[700px] mx-auto">
            {t({
              en: 'Ravandeh Studio is a digital gallery bridging the gap between Persian artistic traditions and contemporary global art movements. We curate, exhibit, and celebrate works that challenge conventions and inspire imagination.',
              fa: 'استودیو روندِه یک گالری دیجیتال است که شکاف بین سنت‌های هنری ایرانی و جنبش‌های هنری جهانی معاصر را پر می‌کند. ما آثاری را کیوریت، نمایش و جشن می‌گیریم که قراردادها را به چالش می‌کشند و تخیل را الهام می‌بخشند.'
            })}
          </p>
        </motion.div>

        {/* Values Grid */}
        <div className="grid grid-cols-1 md:grid-cols-3 gap-8">
          {values.map((value, index) => {
            const Icon = value.icon;
            return (
              <motion.div
                key={index}
                initial={{ opacity: 0, y: 40 }}
                whileInView={{ opacity: 1, y: 0 }}
                viewport={{ once: true, margin: '-100px' }}
                transition={{ duration: 0.6, delay: index * 0.15 }}
                whileHover={{ y: -8 }}
                className="group"
              >
                <div className="backdrop-blur-xl bg-white/70 dark:bg-gray-900/70 rounded-[32px] p-10 shadow-[0_8px_32px_rgba(0,0,0,0.08)] dark:shadow-[0_8px_32px_rgba(0,0,0,0.3)] border border-white/20 dark:border-gray-700/20 hover:shadow-[0_16px_48px_rgba(0,0,0,0.12)] dark:hover:shadow-[0_16px_48px_rgba(0,0,0,0.4)] transition-all duration-500 text-center">
                  {/* Icon */}
                  <motion.div
                    className="inline-flex items-center justify-center w-16 h-16 rounded-[20px] bg-gradient-to-br from-blue-500/20 to-purple-500/20 dark:from-blue-400/30 dark:to-purple-400/30 mb-6"
                    whileHover={{ rotate: 360, scale: 1.1 }}
                    transition={{ duration: 0.6 }}
                  >
                    <Icon size={32} className="text-purple-600 dark:text-purple-400" />
                  </motion.div>

                  {/* Title */}
                  <h3 className="mb-4 text-[#1a1a1a] dark:text-white">
                    {t(value.title)}
                  </h3>

                  {/* Description */}
                  <p className="text-[#6b6b6b] dark:text-gray-300">
                    {t(value.description)}
                  </p>
                </div>
              </motion.div>
            );
          })}
        </div>

        {/* Story Section */}
        <motion.div
          initial={{ opacity: 0, y: 40 }}
          whileInView={{ opacity: 1, y: 0 }}
          viewport={{ once: true, margin: '-100px' }}
          transition={{ duration: 0.8, delay: 0.4 }}
          className="mt-20 backdrop-blur-xl bg-gradient-to-br from-white/80 to-white/60 dark:from-gray-900/80 dark:to-gray-900/60 rounded-[44px] p-16 shadow-[0_8px_32px_rgba(0,0,0,0.08)] dark:shadow-[0_8px_32px_rgba(0,0,0,0.3)] border border-white/20 dark:border-gray-700/20"
        >
          <div className="max-w-[800px] mx-auto text-center">
            <h3 className="mb-6 text-[#1a1a1a] dark:text-white">
              {t({ en: 'Our Story', fa: 'داستان ما' })}
            </h3>
            <p className="text-[#6b6b6b] dark:text-gray-300 leading-relaxed mb-6">
              {t({
                en: 'Founded in 2023, Ravandeh Studio emerged from a simple belief: that art transcends borders, languages, and mediums. Our name, "Ravandeh" (روندِه), means "flowing" or "in motion" — a reflection of our commitment to the ever-evolving nature of artistic expression.',
                fa: 'استودیو روندِه در سال ۲۰۲۳ تاسیس شد و از یک باور ساده سرچشمه گرفت: هنر فراتر از مرزها، زبان‌ها و رسانه‌هاست. نام ما، «روندِه»، نشان‌دهنده تعهد ما به ماهیت همیشه در حال تکامل بیان هنری است.'
              })}
            </p>
            <p className="text-[#6b6b6b] dark:text-gray-300 leading-relaxed">
              {t({
                en: 'We collaborate with emerging and established artists who share our vision of creating work that honors heritage while embracing the future. Each piece in our collection tells a story — of transformation, identity, and the universal language of beauty.',
                fa: 'ما با هنرمندان نوظهور و شناخته‌شده همکاری می‌کنیم که دیدگاه ما را در خلق آثاری که به میراث احترام می‌گذارند و در عین حال آینده را در آغوش می‌گیرند، به اشتراک می‌گذارند. هر اثر در مجموعه ما داستانی از دگرگونی، هویت و زبان جهانی زیبایی را روایت می‌کند.'
              })}
            </p>
          </div>
        </motion.div>
      </div>
    </section>
  );
}
