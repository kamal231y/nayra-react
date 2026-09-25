import React, { useState } from 'react';
import { useLocation, Link } from 'react-router-dom';
import { galleriesData } from '../data/galleries';
import Lightbox from '../components/Lightbox';

export default function GalleryPage({ category: forcedCategory }) {
  const location = useLocation();
  const pathKey = location.pathname.replace(/^\//, '') || 'gallery';
  const categoryKey = forcedCategory || pathKey;

  const currentGallery = galleriesData[categoryKey] || galleriesData['gallery'] || {
    title: 'Gallery',
    eyebrow: 'Portfolio',
    description: 'Explore our latest photographic works.',
    images: []
  };

  const [lightboxState, setLightboxState] = useState({
    isOpen: false,
    index: 0
  });

  const openLightbox = (index) => {
    setLightboxState({
      isOpen: true,
      index
    });
  };

  const closeLightbox = () => {
    setLightboxState((prev) => ({ ...prev, isOpen: false }));
  };

  const nextImage = () => {
    setLightboxState((prev) => ({
      ...prev,
      index: (prev.index + 1) % currentGallery.images.length
    }));
  };

  const prevImage = () => {
    setLightboxState((prev) => ({
      ...prev,
      index: (prev.index - 1 + currentGallery.images.length) % currentGallery.images.length
    }));
  };

  return (
    <div style={{ paddingTop: '90px' }}>
      <section className="gallery py-5" id="gallery">
        <div className="container">
          <div className="row align-items-end mb-4">
            <div className="col-lg-7">
              <div className="eyebrow mb-2">{currentGallery.eyebrow}</div>
              <h2 style={{ fontSize: 'clamp(2rem, 3.6vw, 3rem)', fontWeight: 500 }}>
                {currentGallery.title}
              </h2>
              <p className="text-muted mt-2" style={{ maxWidth: '600px' }}>
                {currentGallery.description}
              </p>
            </div>
            <div className="col-lg-5 text-lg-end mt-3 mt-lg-0">
              <Link to="/contact" className="btn btn-outline-danger">
                Enquire for This Shoot
              </Link>
            </div>
          </div>

          {currentGallery.images.length > 0 ? (
            <div className="gallery-grid" id="galleryGrid">
              {currentGallery.images.map((img, idx) => (
                <div key={idx} className="overflow-hidden rounded" style={{ height: '100%' }}>
                  <img
                    src={img.src}
                    alt={img.alt}
                    loading="lazy"
                    onClick={() => openLightbox(idx)}
                    title="Click to expand"
                  />
                </div>
              ))}
            </div>
          ) : (
            <div className="text-center py-5">
              <p className="text-muted">No images found for this category.</p>
            </div>
          )}
        </div>
      </section>

      {/* Lightbox */}
      <Lightbox
        isOpen={lightboxState.isOpen}
        images={currentGallery.images}
        currentIndex={lightboxState.index}
        onClose={closeLightbox}
        onPrev={prevImage}
        onNext={nextImage}
      />
    </div>
  );
}

