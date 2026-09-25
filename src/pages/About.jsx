import React from 'react';
import { Link } from 'react-router-dom';

export default function About() {
  return (
    <div style={{ paddingTop: '100px' }}>
      <section className="about py-5" id="about">
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
              <p className="about-body mb-4">
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

              <div className="mt-4">
                <Link to="/contact" className="btn btn-pink-enquire">
                  Get in Touch With Us
                </Link>
              </div>
            </div>
          </div>
        </div>
      </section>
    </div>
  );
}

