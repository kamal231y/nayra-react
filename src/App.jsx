import React from 'react';
import { Routes, Route, Navigate } from 'react-router-dom';
import Navbar from './components/Navbar';
import Footer from './components/Footer';
import FloatingActions from './components/FloatingActions';
import ScrollToTop from './components/ScrollToTop';

import Home from './pages/Home';
import About from './pages/About';
import FAQ from './pages/FAQ';
import Contact from './pages/Contact';
import GalleryPage from './pages/GalleryPage';

export default function App() {
  return (
    <div className="app-container d-flex flex-column min-vh-100">
      <ScrollToTop />
      <Navbar />

      <main className="flex-grow-1">
        <Routes>
          {/* Home */}
          <Route path="/" element={<Home />} />
          <Route path="/index.php" element={<Navigate to="/" replace />} />

          {/* About */}
          <Route path="/about" element={<About />} />
          <Route path="/about.php" element={<Navigate to="/about" replace />} />

          {/* Gallery */}
          <Route path="/gallery" element={<GalleryPage category="gallery" />} />
          <Route path="/gallery.php" element={<Navigate to="/gallery" replace />} />

          {/* FAQ */}
          <Route path="/faq" element={<FAQ />} />
          <Route path="/faq.php" element={<Navigate to="/faq" replace />} />

          {/* Contact */}
          <Route path="/contact" element={<Contact />} />
          <Route path="/contact.php" element={<Navigate to="/contact" replace />} />

          {/* Specific Shoot Galleries */}
          <Route path="/wedding-shoot" element={<GalleryPage category="wedding-shoot" />} />
          <Route path="/wedding-shoot.php" element={<Navigate to="/wedding-shoot" replace />} />

          <Route path="/pre-wedding" element={<GalleryPage category="pre-wedding" />} />
          <Route path="/pre-wedding.php" element={<Navigate to="/pre-wedding" replace />} />

          <Route path="/bday-shoot" element={<GalleryPage category="bday-shoot" />} />
          <Route path="/bday-shoot.php" element={<Navigate to="/bday-shoot" replace />} />

          <Route path="/haldi-shoot" element={<GalleryPage category="haldi-shoot" />} />
          <Route path="/haldi-shoot.php" element={<Navigate to="/haldi-shoot" replace />} />

          <Route path="/mehndi" element={<GalleryPage category="mehndi" />} />
          <Route path="/mehndi.php" element={<Navigate to="/mehndi" replace />} />

          <Route path="/engagement" element={<GalleryPage category="engagement" />} />
          <Route path="/engagement.php" element={<Navigate to="/engagement" replace />} />

          <Route path="/corporate" element={<GalleryPage category="corporate" />} />
          <Route path="/corporate.php" element={<Navigate to="/corporate" replace />} />

          <Route path="/ecommerce" element={<GalleryPage category="ecommerce" />} />
          <Route path="/eccomerce.php" element={<Navigate to="/ecommerce" replace />} />

          {/* Catch-all fallback */}
          <Route path="*" element={<Navigate to="/" replace />} />
        </Routes>
      </main>

      <Footer />
      <FloatingActions />
    </div>
  );
}

