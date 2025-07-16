import React from 'react';
import { Phone, Mail, MapPin, Clock, Send, MessageCircle } from 'lucide-react';

interface ContactProps {
  language: 'en' | 'ar';
  translations: any;
}

export default function Contact({ language, translations }: ContactProps) {
  const t = translations[language];
  const isRTL = language === 'ar';

  const handleWhatsAppClick = () => {
    const message = 'Hello! I would like to inquire about your travel packages and services.';
    const phoneNumber = '0616534232';
    const whatsappUrl = `https://wa.me/${phoneNumber}?text=${encodeURIComponent(message)}`;
    window.open(whatsappUrl, '_blank');
  };

  const handleSubmit = (e: React.FormEvent) => {
    e.preventDefault();
    // Handle form submission here
    alert(language === 'en' ? 'Thank you for your message! We will get back to you soon.' : 'شكراً لرسالتك! سنعود إليك قريباً.');
  };

  return (
    <div className={`min-h-screen bg-gray-50 ${isRTL ? 'rtl' : 'ltr'}`} dir={isRTL ? 'rtl' : 'ltr'}>
      {/* Hero Section */}
      <div className="relative h-96 flex items-center justify-center">
        <div 
          className="absolute inset-0 bg-cover bg-center bg-no-repeat"
          style={{
            backgroundImage: 'url(https://images.pexels.com/photos/1591447/pexels-photo-1591447.jpeg?auto=compress&cs=tinysrgb&w=1600)'
          }}
        />
        <div className="absolute inset-0 bg-black bg-opacity-60" />
        <div className="relative z-10 text-center text-white px-4">
          <h1 className={`text-5xl md:text-6xl font-bold mb-4 ${isRTL ? 'font-arabic' : ''}`}>
            {t.contact.title}
          </h1>
          <p className={`text-xl md:text-2xl font-light max-w-2xl mx-auto ${isRTL ? 'font-arabic' : ''}`}>
            {t.contact.subtitle}
          </p>
        </div>
      </div>

      {/* Contact Information */}
      <section className="py-20 bg-white">
        <div className="container mx-auto px-4">
          <div className="max-w-6xl mx-auto">
            <div className="grid lg:grid-cols-2 gap-12">
              {/* Contact Info */}
              <div>
                <h2 className={`text-4xl font-bold mb-8 text-gray-800 ${isRTL ? 'font-arabic' : ''}`}>
                  {language === 'en' ? 'Get in Touch' : 'تواصل معنا'}
                </h2>
                
                <div className="space-y-8">
                  <div className="flex items-start space-x-4">
                    <div className="bg-blue-100 p-3 rounded-full">
                      <Phone className="w-6 h-6 text-blue-600" />
                    </div>
                    <div>
                      <h3 className={`text-xl font-semibold mb-2 ${isRTL ? 'font-arabic' : ''}`}>
                        {t.contact.callTitle}
                      </h3>
                      <p className="text-lg text-gray-700">+0616534232</p>
                      <p className={`text-blue-600 ${isRTL ? 'font-arabic' : ''}`}>
                        {t.contact.callAvailable}
                      </p>
                    </div>
                  </div>

                  <div className="flex items-start space-x-4">
                    <div className="bg-green-100 p-3 rounded-full">
                      <Mail className="w-6 h-6 text-green-600" />
                    </div>
                    <div>
                      <h3 className={`text-xl font-semibold mb-2 ${isRTL ? 'font-arabic' : ''}`}>
                        {t.contact.emailTitle}
                      </h3>
                      <p className="text-lg text-gray-700">info@wanderlust.com</p>
                      <p className={`text-green-600 ${isRTL ? 'font-arabic' : ''}`}>
                        {t.contact.emailResponse}
                      </p>
                    </div>
                  </div>

                  <div className="flex items-start space-x-4">
                    <div className="bg-purple-100 p-3 rounded-full">
                      <MapPin className="w-6 h-6 text-purple-600" />
                    </div>
                    <div>
                      <h3 className={`text-xl font-semibold mb-2 ${isRTL ? 'font-arabic' : ''}`}>
                        {language === 'en' ? 'Office Location' : 'موقع المكتب'}
                      </h3>
                      <p className="text-lg text-gray-700">
                        {language === 'en' 
                          ? '123 Travel Street, Adventure City, AC 12345'
                          : '123 شارع السفر، مدينة المغامرة، AC 12345'
                        }
                      </p>
                      <p className={`text-purple-600 ${isRTL ? 'font-arabic' : ''}`}>
                        {language === 'en' ? 'Visit us anytime' : 'زرنا في أي وقت'}
                      </p>
                    </div>
                  </div>

                  <div className="flex items-start space-x-4">
                    <div className="bg-orange-100 p-3 rounded-full">
                      <Clock className="w-6 h-6 text-orange-600" />
                    </div>
                    <div>
                      <h3 className={`text-xl font-semibold mb-2 ${isRTL ? 'font-arabic' : ''}`}>
                        {language === 'en' ? 'Business Hours' : 'ساعات العمل'}
                      </h3>
                      <div className="text-gray-700 space-y-1">
                        <p>{language === 'en' ? 'Monday - Friday: 9:00 AM - 6:00 PM' : 'الاثنين - الجمعة: 9:00 ص - 6:00 م'}</p>
                        <p>{language === 'en' ? 'Saturday: 10:00 AM - 4:00 PM' : 'السبت: 10:00 ص - 4:00 م'}</p>
                        <p>{language === 'en' ? 'Sunday: Closed' : 'الأحد: مغلق'}</p>
                      </div>
                    </div>
                  </div>
                </div>

                <div className="mt-8">
                  <button 
                    onClick={handleWhatsAppClick}
                    className={`bg-green-600 hover:bg-green-700 text-white px-8 py-4 rounded-full text-lg font-medium transition-all duration-300 transform hover:scale-105 flex items-center space-x-2 ${isRTL ? 'font-arabic' : ''}`}
                  >
                    <MessageCircle className="w-5 h-5" />
                    <span>{t.contact.whatsappBtn}</span>
                  </button>
                </div>
              </div>

              {/* Contact Form */}
              <div className="bg-gray-50 p-8 rounded-2xl">
                <h3 className={`text-2xl font-bold mb-6 text-gray-800 ${isRTL ? 'font-arabic' : ''}`}>
                  {language === 'en' ? 'Send us a Message' : 'أرسل لنا رسالة'}
                </h3>
                
                <form onSubmit={handleSubmit} className="space-y-6">
                  <div className="grid md:grid-cols-2 gap-6">
                    <div>
                      <label className={`block text-sm font-medium text-gray-700 mb-2 ${isRTL ? 'font-arabic' : ''}`}>
                        {language === 'en' ? 'First Name' : 'الاسم الأول'}
                      </label>
                      <input
                        type="text"
                        required
                        className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder={language === 'en' ? 'John' : 'أحمد'}
                      />
                    </div>
                    <div>
                      <label className={`block text-sm font-medium text-gray-700 mb-2 ${isRTL ? 'font-arabic' : ''}`}>
                        {language === 'en' ? 'Last Name' : 'اسم العائلة'}
                      </label>
                      <input
                        type="text"
                        required
                        className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                        placeholder={language === 'en' ? 'Doe' : 'محمد'}
                      />
                    </div>
                  </div>

                  <div>
                    <label className={`block text-sm font-medium text-gray-700 mb-2 ${isRTL ? 'font-arabic' : ''}`}>
                      {language === 'en' ? 'Email Address' : 'البريد الإلكتروني'}
                    </label>
                    <input
                      type="email"
                      required
                      className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                      placeholder={language === 'en' ? 'john@example.com' : 'ahmed@example.com'}
                    />
                  </div>

                  <div>
                    <label className={`block text-sm font-medium text-gray-700 mb-2 ${isRTL ? 'font-arabic' : ''}`}>
                      {language === 'en' ? 'Phone Number' : 'رقم الهاتف'}
                    </label>
                    <input
                      type="tel"
                      className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                      placeholder="+1 (555) 123-4567"
                    />
                  </div>

                  <div>
                    <label className={`block text-sm font-medium text-gray-700 mb-2 ${isRTL ? 'font-arabic' : ''}`}>
                      {language === 'en' ? 'Subject' : 'الموضوع'}
                    </label>
                    <select className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent">
                      <option value="">{language === 'en' ? 'Select a subject' : 'اختر موضوعاً'}</option>
                      <option value="booking">{language === 'en' ? 'Booking Inquiry' : 'استفسار حجز'}</option>
                      <option value="support">{language === 'en' ? 'Customer Support' : 'دعم العملاء'}</option>
                      <option value="feedback">{language === 'en' ? 'Feedback' : 'ملاحظات'}</option>
                      <option value="other">{language === 'en' ? 'Other' : 'أخرى'}</option>
                    </select>
                  </div>

                  <div>
                    <label className={`block text-sm font-medium text-gray-700 mb-2 ${isRTL ? 'font-arabic' : ''}`}>
                      {language === 'en' ? 'Message' : 'الرسالة'}
                    </label>
                    <textarea
                      rows={5}
                      required
                      className="w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-transparent"
                      placeholder={language === 'en' 
                        ? 'Tell us about your travel plans or any questions you have...'
                        : 'أخبرنا عن خطط سفرك أو أي أسئلة لديك...'
                      }
                    ></textarea>
                  </div>

                  <button
                    type="submit"
                    className={`w-full bg-blue-600 hover:bg-blue-700 text-white py-4 rounded-lg font-medium transition-all duration-300 flex items-center justify-center space-x-2 ${isRTL ? 'font-arabic' : ''}`}
                  >
                    <Send className="w-5 h-5" />
                    <span>{language === 'en' ? 'Send Message' : 'إرسال الرسالة'}</span>
                  </button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* Map Section */}
      <section className="py-20 bg-gray-100">
        <div className="container mx-auto px-4">
          <div className="max-w-4xl mx-auto text-center">
            <h2 className={`text-4xl font-bold mb-8 text-gray-800 ${isRTL ? 'font-arabic' : ''}`}>
              {language === 'en' ? 'Find Us' : 'اعثر علينا'}
            </h2>
            <div className="bg-gray-300 h-96 rounded-2xl flex items-center justify-center">
              <div className="text-center">
                <MapPin className="w-16 h-16 text-gray-600 mx-auto mb-4" />
                <p className={`text-gray-600 text-lg ${isRTL ? 'font-arabic' : ''}`}>
                  {language === 'en' ? 'Interactive Map Coming Soon' : 'خريطة تفاعلية قريباً'}
                </p>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
}