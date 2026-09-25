import React, { useEffect } from 'react';
import { Link } from 'react-router-dom';

export default function Footer() {
  useEffect(() => {
    // Load Elfsight Google Reviews script dynamically if not present
    if (!document.querySelector('script[src="https://elfsightcdn.com/platform.js"]')) {
      const script = document.createElement('script');
      script.src = 'https://elfsightcdn.com/platform.js';
      script.async = true;
      document.body.appendChild(script);
    }
  }, []);

  return (
    <>
      {/* Elfsight Google Reviews */}
      <div className="elfsight-app-df209ed6-1ab7-4605-bb4c-8e2bbddb8edf" data-elfsight-app-lazy></div>

      {/* Google Map */}
      <div className="w-100" style={{ lineHeight: 0 }}>
        <iframe
          src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3506.274652159824!2d77.1827959!3d28.501383299999997!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x390d1f154a3f837f%3A0xe540c8805bd3713d!2sNyra%20Event%20Photography!5e0!3m2!1sen!2sin!4v1785126193907!5m2!1sen!2sin"
          width="100%"
          height="420"
          style={{ border: 0 }}
          allowFullScreen=""
          loading="lazy"
          referrerPolicy="strict-origin-when-cross-origin"
          title="Nyra Photography Location"
        ></iframe>
      </div>

      {/* Site Footer */}
      <footer className="site-footer">
        <div className="container">
          <div className="row align-items-center gy-3">
            <div className="col-md-4">
              <span className="brand">Nyra Event Photography</span>
            </div>
            <div className="col-md-4 text-md-center">
              <Link to="/wedding-shoot">Services</Link>
              <Link to="/gallery">Gallery</Link>
              <Link to="/contact">Contact</Link>
            </div>
            <div className="col-md-4 text-md-end" style={{ opacity: 0.6, fontSize: '0.78rem' }}>
              © 2026 Nyra Event Photography. All rights reserved.
            </div>
          </div>
        </div>
      </footer>
    </>
  );
}

