import { ThemeProvider } from './components/ThemeContext';
import { LanguageProvider } from './components/LanguageContext';
import { Navigation } from './components/Navigation';
import { Hero } from './components/Hero';
import { Collections } from './components/Collections';
import { Artists } from './components/Artists';
import { About } from './components/About';
import { Contact } from './components/Contact';
import { Footer } from './components/Footer';

export default function App() {
  return (
    <ThemeProvider>
      <LanguageProvider>
        <div className="min-h-screen bg-white dark:bg-gray-950 overflow-x-hidden transition-colors duration-300">
          <Navigation />
          <main>
            <Hero />
            <Collections />
            <Artists />
            <About />
            <Contact />
          </main>
          <Footer />
        </div>
      </LanguageProvider>
    </ThemeProvider>
  );
}
