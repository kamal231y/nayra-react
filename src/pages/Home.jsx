import React, { useState } from 'react';
import { Link } from 'react-router-dom';
import BannerSlider from '../components/BannerSlider';
import MarqueeStrip from '../components/MarqueeStrip';
import PhotoCarousel from '../components/PhotoCarousel';
import Lightbox from '../components/Lightbox';
import { servicesList } from '../data/services';

export default function Home() {
  const [lightboxState, setLightboxState] = useState({
    isOpen: false,
    images: [],
    index: 0
  });

  const openLightbox = (images, index) => {
    setLightboxState({
      isOpen: true,
      images,
      index
    });
  };

  const closeLightbox = () => {
    setLightboxState((prev) => ({ ...prev, isOpen: false }));
  };

  const nextImage = () => {
    setLightboxState((prev) => ({
      ...prev,
      index: (prev.index + 1) % prev.images.length
    }));
  };

  const prevImage = () => {
    setLightboxState((prev) => ({
      ...prev,
      index: (prev.index - 1 + prev.images.length) % prev.images.length
    }));
  };

  return (
    <>
      {/* Banner Carousel */}
      <BannerSlider />

      {/* Marquee Strip */}
      <MarqueeStrip />

      {/* ABOUT SECTION */}
      <section className="about" id="about">
        <div className="container">
          <div className="row g-5 align-items-center">
            <div className="col-lg-5">
              <div className="about-photo-wrap">
                <img
                  src="/assets/img/about/about.webp"
                  alt="Nyra Event Photography team at work during a shoot"
                  className="img-fluid"
                />
                <div className="about-frame-label">Est. 2016</div>
              </div>
            </div>

            <div className="col-lg-7">
              <div className="eyebrow mb-2">About Us</div>
              <h2 className="mb-3">
                A small studio,<br />a decade of days.
              </h2>
              <p className="about-lead mb-3">
                We started Nyra Event Photography with one idea — the best pictures happen when no one is posing for them.
              </p>
              <p className="about-body mb-2">
                What began as one photographer with a single camera has grown into a close-knit
                team of shooters, editors and second-shooters, all trained the same way: watch
                first, shoot second. We've since covered weddings across three states, birthday
                mornings in living rooms, quiet pre-wedding walks, and conference halls full of
                people who didn't know they were being photographed until they saw the gallery.
              </p>
              <p className="about-body">
                We keep every booking personal — you'll always know who's shooting your day,
                and you'll always be able to reach us directly.
              </p>

              <div className="row about-stats gx-0">
                <div className="col-6 col-md-3">
                  <div className="stat">
                    <span className="num">10+</span>
                    <span className="label">Years Shooting</span>
                  </div>
                </div>
                <div className="col-6 col-md-3">
                  <div className="stat">
                    <span className="num">450+</span>
                    <span className="label">Weddings Covered</span>
                  </div>
                </div>
                <div className="col-6 col-md-3">
                  <div className="stat">
                    <span className="num">6</span>
                    <span className="label">Studio Photographers</span>
                  </div>
                </div>
                <div className="col-6 col-md-3">
                  <div className="stat">
                    <span className="num">5+</span>
                    <span className="label">States Covered</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>

      {/* SERVICES SECTION */}
      <section className="services" id="services">
        <div className="container">
          <div className="row services-head align-items-end mb-4">
            <div className="col-lg-7">
              <div className="eyebrow mb-2">What We Shoot</div>
              <h2>
                Crafted ways we tell<br />your story.
              </h2>
            </div>
            <div className="col-lg-5">
              <p className="mt-3 mt-lg-0" style={{ color: '#4a423a', lineHeight: 1.7 }}>
                Every package is shaped around the people in front of the lens — from an
                intimate birthday afternoon to a three-day wedding, or a boardroom you want
                remembered well.
              </p>
            </div>
          </div>

          <div className="row g-4 g-lg-5">
            {servicesList.map((service) => (
              <div key={service.id} className="col-md-6 col-lg-4">
                <div className="frame-card h-100 d-flex flex-column">
                  <div className="frame-index">
                    <span className="no">{service.index}</span>
                    <span className="tag">{service.tag}</span>
                  </div>
                  <Link to={service.link} className="d-block overflow-hidden rounded">
                    <img
                      className="photo"
                      src={service.image}
                      alt={service.title}
                      loading="lazy"
                    />
                  </Link>
                  <h3 className="mt-3">{service.title}</h3>
                  <p className="flex-grow-1">{service.description}</p>
                  <div className="mt-2">
                    <Link to={service.link} className="btn btn-sm btn-outline-danger">
                      View Gallery <i className="fa-solid fa-arrow-right ms-1"></i>
                    </Link>
                  </div>
                </div>
              </div>
            ))}
          </div>
        </div>
      </section>

      {/* PHILOSOPHY SECTION */}
      <section className="philosophy" id="studio">
        <div className="container">
          <div className="row justify-content-center text-center">
            <div className="col-lg-9">
              <div className="eyebrow mb-3" style={{ color: 'var(--brass)' }}>
                The Nyra Approach
              </div>
              <p className="display">
                "We don't direct the moment — we wait for it. A stolen glance during the
                pheras, a nervous laugh before the cake is cut, the quiet after the boardroom
                empties. That's the archive worth keeping."
              </p>
              <div className="signature">— Nyra, Founder &amp; Lead Photographer</div>
            </div>
          </div>
        </div>
      </section>

      {/* PHOTO CAROUSEL SECTION */}
      <PhotoCarousel onImageClick={openLightbox} />

      {/* Lightbox */}
      <Lightbox
        isOpen={lightboxState.isOpen}
        images={lightboxState.images}
        currentIndex={lightboxState.index}
        onClose={closeLightbox}
        onPrev={prevImage}
        onNext={nextImage}
      />
    </>
  );
}

