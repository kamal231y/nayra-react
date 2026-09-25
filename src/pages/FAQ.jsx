import React, { useState } from 'react';
import { Link } from 'react-router-dom';

const faqList = [
  {
    question: 'What types of events do you photograph?',
    answer:
      'At Nyra Event Photography, we specialize in a wide range of events including weddings, pre-wedding shoots, ring ceremonies, haldi & mehndi celebrations, birthdays, corporate conferences, product launches, and private gatherings.'
  },
  {
    question: 'How far in advance should I book my event?',
    answer:
      'We recommend booking at least 3 to 6 months in advance for large events and weddings to ensure availability. For smaller birthday or corporate events, 2 to 4 weeks notice is usually sufficient, subject to availability.'
  },
  {
    question: 'When and how will I receive my photos?',
    answer:
      'You will receive a curated preview gallery within 48 hours of the event. Full edited high-resolution galleries and album deliverables are provided via secure online gallery download within 14 business days.'
  },
  {
    question: 'Do you offer videography services as well?',
    answer:
      'Yes! We offer cinematic wedding films, teaser reels, corporate highlight videos, and 4K coverage upon request. We provide a combined photography and videography team to capture every moment seamlessly.'
  },
  {
    question: 'What is your cancellation and deposit policy?',
    answer:
      'A non-refundable 25% retainer fee is required to reserve your date upon signing the contract. The remaining balance is due prior to the event date. If you need to reschedule, we make every effort to accommodate your new date based on calendar availability.'
  }
];

export default function FAQ() {
  const [openIndex, setOpenIndex] = useState(0);

  const toggleItem = (idx) => {
    setOpenIndex(openIndex === idx ? null : idx);
  };

  return (
    <div style={{ paddingTop: '90px' }}>
      <section className="py-5 bg-light" id="faq">
        <div className="container">
          {/* Section Title */}
          <div className="row justify-content-center mb-5">
            <div className="col-lg-8 text-center">
              <span className="text-primary text-uppercase fw-bold tracking-wider fs-7">
                Have Questions?
              </span>
              <h2 className="display-6 fw-bold mt-2">Frequently Asked Questions</h2>
              <p className="text-muted">
                Everything you need to know about booking and working with Nyra Event Photography.
              </p>
            </div>
          </div>

          {/* Accordion Section */}
          <div className="row justify-content-center">
            <div className="col-lg-9">
              <div className="accordion accordion-flush shadow-sm rounded-3 overflow-hidden bg-white">
                {faqList.map((item, idx) => {
                  const isOpen = openIndex === idx;
                  return (
                    <div key={idx} className="accordion-item border-bottom">
                      <h2 className="accordion-header">
                        <button
                          className={`accordion-button fw-semibold py-3 ${isOpen ? '' : 'collapsed'}`}
                          type="button"
                          onClick={() => toggleItem(idx)}
                        >
                          {item.question}
                        </button>
                      </h2>
                      {isOpen && (
                        <div className="accordion-collapse collapse show">
                          <div className="accordion-body text-muted">
                            {item.answer}
                          </div>
                        </div>
                      )}
                    </div>
                  );
                })}
              </div>

              <div className="text-center mt-5">
                <p className="text-muted mb-3">Still have questions that aren't answered here?</p>
                <Link to="/contact" className="btn btn-pink-enquire">
                  Contact Our Team
                </Link>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
}

