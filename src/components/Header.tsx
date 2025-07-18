import { Link, useLocation } from 'react-router-dom';
import { MapPin, Globe, Menu, X } from 'lucide-react'; // or your icon library
import { useState } from 'react';

interface HeaderProps {
  language: 'en' | 'ar';
  toggleLanguage: () => void;
  t: {
    nav: {
      home: string;
      about: string;
      contact: string;
    };
  };
}

export default function Header({ language, toggleLanguage, t }: HeaderProps) {
  const location = useLocation();
  const [isMenuOpen, setIsMenuOpen] = useState(false);

  const isActive = (path: string) => location.pathname === path;

  return (
    <header className="fixed top-0 left-0 right-0 z-50 bg-white/95 backdrop-blur-md shadow-sm">
      <div className="container mx-auto px-4">
        <div className="flex items-center justify-between h-16">
          {/* Logo */}
          <Link to="/" className="flex items-center">
            <MapPin className="w-8 h-8 text-blue-600 mr-2" />
            <span className="text-2xl font-bold text-gray-800">
              {language === 'en' ? 'WanderLust' : 'شغف السفر'}
            </span>
          </Link>

          {/* Desktop Navigation */}
          <nav className="hidden md:flex items-center space-x-8">
            <Link 
              to="/"
              className={`font-medium transition-colors ${
                isActive('/') 
                  ? 'text-blue-600' 
                  : 'text-gray-700 hover:text-blue-600'
              }`}
            >
              {t.nav.home}
            </Link>
            <Link 
              to="/about"
              className={`font-medium transition-colors ${
                isActive('/about') 
                  ? 'text-blue-600' 
                  : 'text-gray-700 hover:text-blue-600'
              }`}
            >
              {t.nav.about}
            </Link>
            <Link 
              to="/contact"
              className={`font-medium transition-colors ${
                isActive('/contact') 
                  ? 'text-blue-600' 
                  : 'text-gray-700 hover:text-blue-600'
              }`}
            >
              {t.nav.contact}
            </Link>
          </nav>

          {/* Language Switcher & Mobile Menu */}
          <div className="flex items-center space-x-4">
            <button
              onClick={toggleLanguage}
              className="flex items-center space-x-2 px-3 py-2 rounded-lg bg-gray-100 hover:bg-gray-200 transition-colors"
            >
              <Globe className="w-4 h-4" />
              <span className="text-sm font-medium">{language === 'en' ? 'العربية' : 'English'}</span>
            </button>
            
            {/* Mobile Menu Button */}
            <button
              onClick={() => setIsMenuOpen(!isMenuOpen)}
              className="md:hidden p-2 rounded-lg hover:bg-gray-100 transition-colors"
            >
              {isMenuOpen ? <X className="w-6 h-6" /> : <Menu className="w-6 h-6" />}
            </button>
          </div>
        </div>

        {/* Mobile Navigation */}
        {isMenuOpen && (
          <div className="md:hidden py-4 border-t border-gray-200">
            <nav className="flex flex-col space-y-4">
              <Link 
                to="/"
                onClick={() => setIsMenuOpen(false)}
                className={`text-left font-medium transition-colors ${
                  isActive('/') 
                    ? 'text-blue-600' 
                    : 'text-gray-700 hover:text-blue-600'
                }`}
              >
                {t.nav.home}
              </Link>
              <Link 
                to="/about"
                onClick={() => setIsMenuOpen(false)}
                className={`text-left font-medium transition-colors ${
                  isActive('/about') 
                    ? 'text-blue-600' 
                    : 'text-gray-700 hover:text-blue-600'
                }`}
              >
                {t.nav.about}
              </Link>
              <Link 
                to="/contact"
                onClick={() => setIsMenuOpen(false)}
                className={`text-left font-medium transition-colors ${
                  isActive('/contact') 
                    ? 'text-blue-600' 
                    : 'text-gray-700 hover:text-blue-600'
                }`}
              >
                {t.nav.contact}
              </Link>
            </nav>
          </div>
        )}
      </div>
    </header>
  );
}
