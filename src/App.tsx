import React from 'react';
import { BrowserRouter as Router, Routes, Route } from 'react-router-dom';
import Header from './components/Header';
import Footer from './components/Footer';
import Home from './pages/Home';
import About from './pages/About';
import Contact from './pages/Contact';
import { translations } from './data/translations';

function App() {
  const [language, setLanguage] = React.useState<'en' | 'ar'>('en');

  const toggleLanguage = () => {
    setLanguage(prev => prev === 'en' ? 'ar' : 'en');
  };

  return (
    <Router>
      <div className="min-h-screen">
        <Header 
          language={language} 
          toggleLanguage={toggleLanguage} 
          translations={translations}
        />
        
        <main className="pt-16">
          <Routes>
            <Route 
              path="/" 
              element={<Home language={language} translations={translations} />} 
            />
            <Route 
              path="/about" 
              element={<About language={language} translations={translations} />} 
            />
            <Route 
              path="/contact" 
              element={<Contact language={language} translations={translations} />} 
            />
          </Routes>
        </main>

        <Footer language={language} translations={translations} />
      </div>
    </Router>
  );
}

export default App;