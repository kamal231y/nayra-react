import React, { useState, useEffect, useRef } from 'react';

const bannerImages = [
  { src: '/assets/img/banner/b1.webp', alt: 'Nyra Photography Banner 1' },
  { src: '/assets/img/banner/b2.webp', alt: 'Nyra Photography Banner 2' },
  { src: '/assets/img/banner/b3.webp', alt: 'Nyra Photography Banner 3' },
  { src: '/assets/img/banner/b4.webp', alt: 'Nyra Photography Banner 4' },
  { src: '/assets/img/banner/b5.webp', alt: 'Nyra Photography Banner 5' },
  { src: '/assets/img/banner/b6.webp', alt: 'Nyra Photography Banner 6' },
  { src: '/assets/img/banner/b7.webp', alt: 'Nyra Photography Banner 7' },
  { src: '/assets/img/banner/b8.webp', alt: 'Nyra Photography Banner 8' }
];

export default function BannerSlider() {
  const [current, setCurrent] = useState(0);
  const [isPaused, setIsPaused] = useState(false);
  const timerRef = useRef(null);

  const nextSlide = () => {
    setCurrent((prev) => (prev + 1) % bannerImages.length);
  };

  const prevSlide = () => {
    setCurrent((prev) => (prev - 1 + bannerImages.length) % bannerImages.length);
  };

  useEffect(() => {
    if (!isPaused) {
      timerRef.current = setInterval(nextSlide, 4500);
    }
    return () => clearInterval(timerRef.current);
  }, [isPaused]);

  return (
    <div
      className="carousel slide position-relative overflow-hidden"
      style={{ marginTop: '72px' }}
      onMouseEnter={() => setIsPaused(true)}
      onMouseLeave={() => setIsPaused(false)}
    >
      {/* Slide Indicators */}
      <div className="carousel-indicators custom-dots mb-3">
        {bannerImages.map((_, index) => (
          <button
            key={index}
            type="button"
            className={current === index ? 'active' : ''}
            onClick={() => setCurrent(index)}
            aria-label={`Slide ${index + 1}`}
          />
        ))}
      </div>

      {/* Carousel Inner with Smooth Fade */}
      <div className="carousel-inner" style={{ position: 'relative', width: '100%', minHeight: '300px' }}>
        {bannerImages.map((img, index) => (
          <div
            key={index}
            className={`carousel-item ${current === index ? 'active' : ''}`}
            style={{
              display: current === index ? 'block' : 'none',
              animation: 'fadeIn 0.5s ease'
            }}
          >
            <img
              src={img.src}
              alt={img.alt}
              className="d-block w-100"
              style={{
                width: '100%',
                maxHeight: '85vh',
                objectFit: 'cover'
              }}
            />
          </div>
        ))}
      </div>

      {/* Navigation Controls */}
      <button
        className="carousel-control-prev custom-circle-btn"
        type="button"
        onClick={prevSlide}
        aria-label="Previous Slide"
      >
        <span className="carousel-control-prev-icon"></span>
      </button>
      <button
        className="carousel-control-next custom-circle-btn"
        type="button"
        onClick={nextSlide}
        aria-label="Next Slide"
      >
        <span className="carousel-control-next-icon"></span>
      </button>
    </div>
  );
}

