import React from 'react';

export default function FloatingActions() {
  return (
    <div className="floating-btns">
      {/* Call */}
      <a 
        href="tel:+918920939191" 
        className="fab call-btn" 
        aria-label="Call Us" 
        title="Call Us"
      >
        <i className="bi bi-telephone-fill"></i>
      </a>

      {/* WhatsApp */}
      <a 
        href="https://wa.me/918920939191" 
        target="_blank" 
        rel="noopener noreferrer" 
        className="fab whatsapp-btn" 
        aria-label="Chat on WhatsApp" 
        title="Chat on WhatsApp"
      >
        <i className="bi bi-whatsapp"></i>
      </a>

      {/* Instagram */}
      <a 
        href="https://www.instagram.com/nyra_photography" 
        target="_blank" 
        rel="noopener noreferrer" 
        className="fab instagram-btn" 
        aria-label="Follow on Instagram" 
        title="Follow on Instagram"
      >
        <i className="bi bi-instagram"></i>
      </a>
    </div>
  );
}

