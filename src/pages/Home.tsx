import React from 'react';
import { Link } from 'react-router-dom';
import { Star } from 'lucide-react';

interface HomeProps {
  language: 'en' | 'ar';
  translations: any;
}

const destinations = [
  {
    id: 1,
    name: 'Paris, France',
    image: 'https://images.pexels.com/photos/161853/eiffel-tower-paris-france-tower-161853.jpeg?auto=compress&cs=tinysrgb&w=800',
    description: 'The City of Light awaits with its iconic landmarks and romantic atmosphere.',
    price: 'From $1,200',
    duration: '7 days',
    rating: 4.9,
    highlights: ['Eiffel Tower', 'Louvre Museum', 'Seine River Cruise']
  },
  {
    id: 2,
    name: 'Tokyo, Japan',
    image: 'https://images.pexels.com/photos/2614818/pexels-photo-2614818.jpeg?auto=compress&cs=tinysrgb&w=800',
    description: 'Experience the perfect blend of ancient traditions and modern innovation.',
    price: 'From $1,800',
    duration: '10 days',
    rating: 4.8,
    highlights: ['Senso-ji Temple', 'Tokyo Skytree', 'Cherry Blossoms']
  },
  {
    id: 3,
    name: 'Santorini, Greece',
    image: 'https://www.tripsavvy.com/thmb/l_UG6_ONsKgN1nihMMwq1vP44-4=/1500x0/filters:no_upscale():max_bytes(150000):strip_icc()/GettyImages-510967662-5c4ddd8846e0fb00018dea73.jpg',
    description: 'Stunning sunsets and white-washed buildings overlooking the Aegean Sea.',
    price: 'From $900',
    duration: '5 days',
    rating: 4.7,
    highlights: ['Oia Village', 'Red Beach', 'Wine Tasting']
  },
  {
    id: 4,
    name: 'Bali, Indonesia',
    image: 'https://images.pexels.com/photos/2474689/pexels-photo-2474689.jpeg?auto=compress&cs=tinysrgb&w=800',
    description: 'Tropical paradise with ancient temples, lush rice terraces, and pristine beaches.',
    price: 'From $700',
    duration: '8 days',
    rating: 4.6,
    highlights: ['Uluwatu Temple', 'Rice Terraces', 'Beach Clubs']
  },
  {
    id: 5,
    name: 'New York City, USA',
    image: 'https://images.pexels.com/photos/466685/pexels-photo-466685.jpeg?auto=compress&cs=tinysrgb&w=800',
    description: 'The city that never sleeps offers endless entertainment and iconic landmarks.',
    price: 'From $1,500',
    duration: '6 days',
    rating: 4.8,
    highlights: ['Statue of Liberty', 'Central Park', 'Times Square']
  },
  {
    id: 6,
    name: 'Dubai, UAE',
    image: 'https://images.pexels.com/photos/2044434/pexels-photo-2044434.jpeg?auto=compress&cs=tinysrgb&w=800',
    description: 'A futuristic city with luxury shopping, ultramodern architecture, and desert adventures.',
    price: 'From $1,100',
    duration: '5 days',
    rating: 4.7,
    highlights: ['Burj Khalifa', 'Desert Safari', 'Gold Souk']
  }
];

export default function Home({ language, translations }: HomeProps) {
  const t = translations[language];
  const isRTL = language === 'ar';

  const handleCityClick = (cityName: string) => {
    const message = `Hello! I'm interested in booking a trip to ${cityName}. Could you please provide more information about available packages and pricing?`;
    const phoneNumber = '0616534232';
    const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
    window.open(whatsappUrl, '_blank');
  };

  return (
    <div className={`min-h-screen bg-gray-50 ${isRTL ? 'rtl' : 'ltr'}`} dir={isRTL ? 'rtl' : 'ltr'}>
      {/* Hero Section */}
      <div className="relative h-screen flex items-center justify-center">
        <div 
          className="absolute inset-0 bg-cover bg-center bg-no-repeat"
          style={{
            backgroundImage: 'url(https://images.pexels.com/photos/1271619/pexels-photo-1271619.jpeg?auto=compress&cs=tinysrgb&w=1600)'
          }}
        />
        <div className="absolute inset-0 bg-black bg-opacity-50" />
        <div className="relative z-10 text-center text-white px-4">
          <h1 className={`text-6xl md:text-8xl font-bold mb-6 tracking-tight ${isRTL ? 'font-arabic' : ''}`}>
            {language === 'en' ? (
              <>Wander<span className="text-blue-400">Lust</span></>
            ) : (
              <span className="text-blue-400">شغف السفر</span>
            )}
          </h1>
          <p className={`text-xl md:text-2xl mb-8 font-light max-w-2xl mx-auto ${isRTL ? 'font-arabic' : ''}`}>
            {t.hero.subtitle}
          </p>
          <div className="flex flex-col sm:flex-row gap-4 justify-center">
            <button 
              onClick={() => document.getElementById('destinations')?.scrollIntoView({ behavior: 'smooth' })}
              className="bg-blue-600 hover:bg-blue-700 px-8 py-4 rounded-full text-lg font-medium transition-all duration-300 transform hover:scale-105"
            >
              {t.hero.exploreBtn}
            </button>
            <Link 
              to="/contact"
              className="border-2 border-white hover:bg-white hover:text-black px-8 py-4 rounded-full text-lg font-medium transition-all duration-300 text-center"
            >
              {t.hero.contactBtn}
            </Link>
          </div>
        </div>
      </div>

      {/* Destinations Section */}
      <section id="destinations" className="py-20 bg-gray-50">
        <div className="container mx-auto px-4">
          <div className="text-center mb-16">
            <h2 className={`text-5xl font-bold mb-6 text-gray-800 ${isRTL ? 'font-arabic' : ''}`}>
              {t.destinations.title}
            </h2>
            <p className={`text-xl text-gray-600 max-w-3xl mx-auto ${isRTL ? 'font-arabic' : ''}`}>
              {t.destinations.subtitle}
            </p>
          </div>
          
          <div className="grid md:grid-cols-2 lg:grid-cols-3 gap-8">
            {destinations.map((destination) => (
              <div 
                key={destination.id}
                className="bg-white rounded-3xl overflow-hidden shadow-lg hover:shadow-2xl transition-all duration-500 transform hover:-translate-y-2 cursor-pointer group"
                onClick={() => handleCityClick(destination.name)}
              >
                <div className="relative overflow-hidden">
                  <img 
                    src={destination.image} 
                    alt={destination.name}
                    className="w-full h-64 object-cover group-hover:scale-110 transition-transform duration-700"
                  />
                  <div className="absolute top-4 right-4 bg-white bg-opacity-90 backdrop-blur-sm rounded-full px-3 py-1 flex items-center gap-1">
                    <Star className="w-4 h-4 text-yellow-500 fill-current" />
                    <span className="text-sm font-medium">{destination.rating}</span>
                  </div>
                </div>
                
                <div className="p-6">
                  <div className="flex justify-between items-start mb-3">
                    <h3 className="text-2xl font-bold text-gray-800 group-hover:text-blue-600 transition-colors">
                      {destination.name}
                    </h3>
                    <div className="text-right">
                      <p className="text-blue-600 font-bold text-lg">{destination.price}</p>
                      <p className="text-gray-500 text-sm">{destination.duration}</p>
                    </div>
                  </div>
                  
                  <p className="text-gray-600 mb-4 leading-relaxed">{destination.description}</p>
                  
                  <div className="mb-4">
                    <h4 className={`font-semibold text-gray-800 mb-2 ${isRTL ? 'font-arabic' : ''}`}>
                      {t.destinations.highlights}
                    </h4>
                    <div className="flex flex-wrap gap-2">
                      {destination.highlights.map((highlight, index) => (
                        <span 
                          key={index}
                          className="bg-blue-100 text-blue-800 px-3 py-1 rounded-full text-sm"
                        >
                          {highlight}
                        </span>
                      ))}
                    </div>
                  </div>
                  
                  <button className={`w-full bg-gradient-to-r from-blue-600 to-indigo-600 hover:from-blue-700 hover:to-indigo-700 text-white py-3 rounded-xl font-medium transition-all duration-300 transform group-hover:scale-105 ${isRTL ? 'font-arabic' : ''}`}>
                    {t.destinations.bookBtn}
                  </button>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>
    </div>
  );
}