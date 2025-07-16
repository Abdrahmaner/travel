import React from 'react';
import { MapPin, Users, Clock, Award, Globe, Heart } from 'lucide-react';

interface AboutProps {
  language: 'en' | 'ar';
  translations: any;
}

export default function About({ language, translations }: AboutProps) {
  const t = translations[language];
  const isRTL = language === 'ar';

  return (
    <div className={`min-h-screen bg-gray-50 ${isRTL ? 'rtl' : 'ltr'}`} dir={isRTL ? 'rtl' : 'ltr'}>
      {/* Hero Section */}
      <div className="relative h-96 flex items-center justify-center">
        <div 
          className="absolute inset-0 bg-cover bg-center bg-no-repeat"
          style={{
            backgroundImage: 'url(https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&w=1600)'
          }}
        />
        <div className="absolute inset-0 bg-black bg-opacity-60" />
        <div className="relative z-10 text-center text-white px-4">
          <h1 className={`text-5xl md:text-6xl font-bold mb-4 ${isRTL ? 'font-arabic' : ''}`}>
            {t.about.title}
          </h1>
          <p className={`text-xl md:text-2xl font-light max-w-2xl mx-auto ${isRTL ? 'font-arabic' : ''}`}>
            Discover the story behind your next adventure
          </p>
        </div>
      </div>

      {/* Main About Section */}
      <section className="py-20 bg-white">
        <div className="container mx-auto px-4">
          <div className="max-w-4xl mx-auto text-center">
            <p className={`text-xl text-gray-600 mb-12 leading-relaxed ${isRTL ? 'font-arabic' : ''}`}>
              {t.about.subtitle}
            </p>
            
            <div className="grid md:grid-cols-3 gap-8 mb-16">
              <div className="p-8 rounded-2xl bg-gradient-to-br from-blue-50 to-indigo-100 hover:shadow-lg transition-all duration-300">
                <MapPin className="w-12 h-12 text-blue-600 mb-4 mx-auto" />
                <h3 className={`text-xl font-semibold mb-3 ${isRTL ? 'font-arabic' : ''}`}>
                  {t.about.expertTitle}
                </h3>
                <p className={`text-gray-600 ${isRTL ? 'font-arabic' : ''}`}>
                  {t.about.expertDesc}
                </p>
              </div>
              <div className="p-8 rounded-2xl bg-gradient-to-br from-green-50 to-emerald-100 hover:shadow-lg transition-all duration-300">
                <Users className="w-12 h-12 text-green-600 mb-4 mx-auto" />
                <h3 className={`text-xl font-semibold mb-3 ${isRTL ? 'font-arabic' : ''}`}>
                  {t.about.personalizedTitle}
                </h3>
                <p className={`text-gray-600 ${isRTL ? 'font-arabic' : ''}`}>
                  {t.about.personalizedDesc}
                </p>
              </div>
              <div className="p-8 rounded-2xl bg-gradient-to-br from-purple-50 to-violet-100 hover:shadow-lg transition-all duration-300">
                <Clock className="w-12 h-12 text-purple-600 mb-4 mx-auto" />
                <h3 className={`text-xl font-semibold mb-3 ${isRTL ? 'font-arabic' : ''}`}>
                  {t.about.supportTitle}
                </h3>
                <p className={`text-gray-600 ${isRTL ? 'font-arabic' : ''}`}>
                  {t.about.supportDesc}
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Our Story Section */}
      <section className="py-20 bg-gray-50">
        <div className="container mx-auto px-4">
          <div className="max-w-6xl mx-auto">
            <div className="grid lg:grid-cols-2 gap-12 items-center">
              <div>
                <h2 className={`text-4xl font-bold mb-6 text-gray-800 ${isRTL ? 'font-arabic' : ''}`}>
                  {language === 'en' ? 'Our Story' : 'قصتنا'}
                </h2>
                <p className={`text-lg text-gray-600 mb-6 leading-relaxed ${isRTL ? 'font-arabic' : ''}`}>
                  {language === 'en' 
                    ? 'Founded in 2020 with a passion for authentic travel experiences, WanderLust has grown from a small team of travel enthusiasts to a trusted partner for thousands of adventurers worldwide.'
                    : 'تأسست في عام 2020 بشغف لتجارب السفر الأصيلة، نمت شغف السفر من فريق صغير من عشاق السفر إلى شريك موثوق لآلاف المغامرين حول العالم.'
                  }
                </p>
                <p className={`text-lg text-gray-600 mb-8 leading-relaxed ${isRTL ? 'font-arabic' : ''}`}>
                  {language === 'en'
                    ? 'We believe that travel is more than just visiting places – it\'s about creating connections, understanding cultures, and making memories that last a lifetime.'
                    : 'نؤمن أن السفر أكثر من مجرد زيارة الأماكن - إنه حول إنشاء الروابط وفهم الثقافات وصنع ذكريات تدوم مدى الحياة.'
                  }
                </p>
                <div className="grid grid-cols-2 gap-6">
                  <div className="text-center">
                    <div className="text-3xl font-bold text-blue-600 mb-2">5000+</div>
                    <div className={`text-gray-600 ${isRTL ? 'font-arabic' : ''}`}>
                      {language === 'en' ? 'Happy Travelers' : 'مسافر سعيد'}
                    </div>
                  </div>
                  <div className="text-center">
                    <div className="text-3xl font-bold text-green-600 mb-2">50+</div>
                    <div className={`text-gray-600 ${isRTL ? 'font-arabic' : ''}`}>
                      {language === 'en' ? 'Destinations' : 'وجهة'}
                    </div>
                  </div>
                </div>
              </div>
              <div className="relative">
                <img 
                  src="https://images.pexels.com/photos/1371360/pexels-photo-1371360.jpeg?auto=compress&cs=tinysrgb&w=800"
                  alt="Travel team"
                  className="rounded-2xl shadow-2xl"
                />
                <div className="absolute -bottom-6 -right-6 bg-white p-6 rounded-2xl shadow-lg">
                  <Award className="w-8 h-8 text-yellow-500 mb-2" />
                  <div className={`font-semibold ${isRTL ? 'font-arabic' : ''}`}>
                    {language === 'en' ? 'Award Winning' : 'حائز على جوائز'}
                  </div>
                  <div className={`text-sm text-gray-600 ${isRTL ? 'font-arabic' : ''}`}>
                    {language === 'en' ? 'Travel Agency 2023' : 'وكالة سفر 2023'}
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Values Section */}
      <section className="py-20 bg-white">
        <div className="container mx-auto px-4">
          <div className="max-w-4xl mx-auto text-center">
            <h2 className={`text-4xl font-bold mb-12 text-gray-800 ${isRTL ? 'font-arabic' : ''}`}>
              {language === 'en' ? 'Our Values' : 'قيمنا'}
            </h2>
            <div className="grid md:grid-cols-3 gap-8">
              <div className="p-6">
                <Globe className="w-12 h-12 text-blue-600 mb-4 mx-auto" />
                <h3 className={`text-xl font-semibold mb-3 ${isRTL ? 'font-arabic' : ''}`}>
                  {language === 'en' ? 'Global Perspective' : 'منظور عالمي'}
                </h3>
                <p className={`text-gray-600 ${isRTL ? 'font-arabic' : ''}`}>
                  {language === 'en'
                    ? 'We embrace diversity and celebrate the unique beauty of every destination and culture.'
                    : 'نحتضن التنوع ونحتفل بالجمال الفريد لكل وجهة وثقافة.'
                  }
                </p>
              </div>
              <div className="p-6">
                <Heart className="w-12 h-12 text-red-600 mb-4 mx-auto" />
                <h3 className={`text-xl font-semibold mb-3 ${isRTL ? 'font-arabic' : ''}`}>
                  {language === 'en' ? 'Passion for Travel' : 'شغف السفر'}
                </h3>
                <p className={`text-gray-600 ${isRTL ? 'font-arabic' : ''}`}>
                  {language === 'en'
                    ? 'Our love for exploration drives us to create extraordinary experiences for every traveler.'
                    : 'حبنا للاستكشاف يدفعنا لإنشاء تجارب استثنائية لكل مسافر.'
                  }
                </p>
              </div>
              <div className="p-6">
                <Award className="w-12 h-12 text-yellow-600 mb-4 mx-auto" />
                <h3 className={`text-xl font-semibold mb-3 ${isRTL ? 'font-arabic' : ''}`}>
                  {language === 'en' ? 'Excellence' : 'التميز'}
                </h3>
                <p className={`text-gray-600 ${isRTL ? 'font-arabic' : ''}`}>
                  {language === 'en'
                    ? 'We strive for perfection in every detail, ensuring your journey exceeds expectations.'
                    : 'نسعى للكمال في كل التفاصيل، مما يضمن أن رحلتك تتجاوز التوقعات.'
                  }
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
}