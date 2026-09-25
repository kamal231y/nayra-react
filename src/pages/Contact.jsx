import React, { useState } from 'react';

export default function Contact() {
  const [formData, setFormData] = useState({
    name: '',
    phone: '',
    service: 'Wedding Photography',
    date: '',
    message: ''
  });

  const handleChange = (e) => {
    const { id, value } = e.target;
    setFormData((prev) => ({ ...prev, [id]: value }));
  };

  const handleSubmit = (e) => {
    e.preventDefault();

    const whatsappNumber = '918920939191';
    const textMessage =
      `*New Enquiry for Nyra Photography*\n\n` +
      `*Name:* ${formData.name}\n` +
      `*Phone:* ${formData.phone}\n` +
      `*Shoot Type:* ${formData.service}\n` +
      `*Preferred Date:* ${formData.date}\n` +
      `*Message:* ${formData.message}`;

    const whatsappURL = `https://wa.me/${whatsappNumber}?text=${encodeURIComponent(textMessage)}`;
    window.open(whatsappURL, '_blank');
  };

  return (
    <div style={{ paddingTop: '90px' }}>
      <section className="contact py-5" id="contact">
        <div className="container">
          <div className="row g-5">
            {/* Left Info Column */}
            <div className="col-lg-5">
              <div className="eyebrow mb-2">Get in Touch</div>
              <h2 className="mb-4">
                Let's frame<br />your story.
              </h2>
              <div className="contact-info">
                <div className="item mb-4">
                  <span className="eyebrow d-block mb-1">Studio</span>
                  first floor office no.01, Main Chhatarpur Rd, near aggrwal medical store, opp. M.C.D park, Block A1, Chhatarpur, New Delhi, Delhi 110074
                </div>
                <div className="item mb-4">
                  <span className="eyebrow d-block mb-1">Phone</span>
                  <a href="tel:+918920939191" className="text-decoration-none text-dark">
                    +91 08920939191
                  </a>
                </div>
                <div className="item mb-4">
                  <span className="eyebrow d-block mb-1">Email</span>
                  <a href="mailto:eventshoootsnyra@gmail.com" className="text-decoration-none text-dark">
                    eventshoootsnyra@gmail.com
                  </a>
                </div>
                <div className="item mb-4">
                  <span className="eyebrow d-block mb-1">Instagram</span>
                  <a
                    href="https://www.instagram.com/nyra_photography"
                    target="_blank"
                    rel="noopener noreferrer"
                    className="text-decoration-none text-dark"
                  >
                    @nyra_photography
                  </a>
                </div>
              </div>
            </div>

            {/* Right Form Column */}
            <div className="col-lg-7">
              <div className="card border-0 shadow-sm p-4 p-md-5 rounded-4 bg-white">
                <h3 className="mb-4" style={{ fontFamily: 'Fraunces, serif' }}>Send an Enquiry</h3>
                <form id="whatsappForm" onSubmit={handleSubmit}>
                  <div className="row g-4">
                    <div className="col-sm-6">
                      <label className="form-label fw-medium" htmlFor="name">
                        Full Name
                      </label>
                      <input
                        type="text"
                        className="form-control"
                        id="name"
                        value={formData.name}
                        onChange={handleChange}
                        placeholder="Your name"
                        required
                      />
                    </div>
                    <div className="col-sm-6">
                      <label className="form-label fw-medium" htmlFor="phone">
                        Phone
                      </label>
                      <input
                        type="tel"
                        className="form-control"
                        id="phone"
                        value={formData.phone}
                        onChange={handleChange}
                        placeholder="+91 98765 43210"
                        required
                      />
                    </div>
                    <div className="col-sm-6">
                      <label className="form-label fw-medium" htmlFor="service">
                        Shoot Type
                      </label>
                      <select
                        className="form-control form-select"
                        id="service"
                        value={formData.service}
                        onChange={handleChange}
                      >
                        <option value="Wedding Photography">Wedding Photography</option>
                        <option value="Pre-Wedding Shoot">Pre-Wedding Shoot</option>
                        <option value="Birthday Shoot">Birthday Shoot</option>
                        <option value="Corporate Event">Corporate Event</option>
                        <option value="Haldi Shoot">Haldi Shoot</option>
                        <option value="Mehndi Shoot">Mehndi Shoot</option>
                        <option value="Ring Ceremony">Ring Ceremony</option>
                        <option value="Ecommerce Shoot">Ecommerce Shoot</option>
                      </select>
                    </div>
                    <div className="col-sm-6">
                      <label className="form-label fw-medium" htmlFor="date">
                        Preferred Date
                      </label>
                      <input
                        type="date"
                        className="form-control"
                        id="date"
                        value={formData.date}
                        onChange={handleChange}
                        required
                      />
                    </div>
                    <div className="col-12">
                      <label className="form-label fw-medium" htmlFor="message">
                        Tell us about the day
                      </label>
                      <textarea
                        className="form-control"
                        id="message"
                        rows="3"
                        value={formData.message}
                        onChange={handleChange}
                        placeholder="Location, guest count, timings, special requests..."
                      ></textarea>
                    </div>
                    <div className="col-12 mt-4">
                      <button type="submit" className="btn btn-brass w-100 py-3 text-white fw-bold">
                        <i className="bi bi-whatsapp me-2"></i> Send Enquiry via WhatsApp
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
}

