import React from 'react';
import { Link } from 'react-router-dom';

interface FooterProps {
  language: 'en' | 'ar';
  translations: any;
}

export default function Footer({ language, translations }: FooterProps) {
  const t = translations[language];
  const isRTL = language === 'ar';

  return (
    <footer className="bg-gray-900 text-white py-12">
      <div className="container mx-auto px-4">
        <div className="text-center">
          <h3 className={`text-3xl font-bold mb-4 ${isRTL ? 'font-arabic' : ''}`}>
            {language === 'en' ? 'WanderLust' : 'شغف السفر'}
          </h3>
          <p className={`text-gray-400 mb-6 ${isRTL ? 'font-arabic' : ''}`}>
            {t.footer.tagline}
          </p>
          <div className="flex justify-center space-x-6">
            <Link to="/privacy" className={`text-gray-400 hover:text-white transition-colors ${isRTL ? 'font-arabic' : ''}`}>
              {t.footer.privacy}
            </Link>
            <Link to="/terms" className={`text-gray-400 hover:text-white transition-colors ${isRTL ? 'font-arabic' : ''}`}>
              {t.footer.terms}
            </Link>
            <Link to="/contact" className={`text-gray-400 hover:text-white transition-colors ${isRTL ? 'font-arabic' : ''}`}>
              {t.footer.contact}
            </Link>
          </div>
          <div className="mt-8 pt-8 border-t border-gray-800">
            <p className={`text-gray-400 ${isRTL ? 'font-arabic' : ''}`}>
              {t.footer.rights}
            </p>
          </div>
        </div>
      </div>
    </footer>
  );
}