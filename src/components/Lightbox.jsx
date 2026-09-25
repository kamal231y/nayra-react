import React, { useEffect, useCallback } from 'react';

export default function Lightbox({ isOpen, images, currentIndex, onClose, onPrev, onNext }) {
  const handleKeyDown = useCallback(
    (e) => {
      if (!isOpen) return;
      if (e.key === 'Escape') onClose();
      if (e.key === 'ArrowLeft') onPrev();
      if (e.key === 'ArrowRight') onNext();
    },
    [isOpen, onClose, onPrev, onNext]
  );

  useEffect(() => {
    if (isOpen) {
      document.body.style.overflow = 'hidden';
      window.addEventListener('keydown', handleKeyDown);
    } else {
      document.body.style.overflow = '';
    }

    return () => {
      document.body.style.overflow = '';
      window.removeEventListener('keydown', handleKeyDown);
    };
  }, [isOpen, handleKeyDown]);

  if (!isOpen || !images || images.length === 0) return null;

  const currentImage = images[currentIndex] || images[0];
  const total = images.length;
  const counterText = `${String(currentIndex + 1).padStart(2, '0')} / ${String(total).padStart(2, '0')}`;

  return (
    <div
      className="lightbox-overlay active"
      role="dialog"
      aria-modal="true"
      aria-label="Image preview"
      onClick={(e) => {
        if (e.target === e.currentTarget) {
          onClose();
        }
      }}
    >
      <button
        className="lightbox-close"
        onClick={onClose}
        aria-label="Close preview"
        type="button"
      >
        &times;
      </button>

      {total > 1 && (
        <button
          className="lightbox-prev"
          onClick={(e) => {
            e.stopPropagation();
            onPrev();
          }}
          aria-label="Previous image"
          type="button"
        >
          &#10094;
        </button>
      )}

      <div
        className="d-flex flex-column align-items-center justify-content-center"
        style={{ maxWidth: '90vw', maxHeight: '85vh', position: 'relative' }}
      >
        <img
          src={currentImage.src}
          alt={currentImage.alt || 'Gallery photo'}
          className="img-fluid"
          style={{
            maxHeight: '75vh',
            maxWidth: '100%',
            objectFit: 'contain',
            borderRadius: '8px',
            boxShadow: '0 30px 80px rgba(0,0,0,0.6)'
          }}
        />
        <div className="lightbox-caption mt-3 text-center">
          <span className="idx">{counterText}</span>
          <span>{currentImage.caption || currentImage.alt}</span>
        </div>
      </div>

      {total > 1 && (
        <button
          className="lightbox-next"
          onClick={(e) => {
            e.stopPropagation();
            onNext();
          }}
          aria-label="Next image"
          type="button"
        >
          &#10095;
        </button>
      )}
    </div>
  );
}

