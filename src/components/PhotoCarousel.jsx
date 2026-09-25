import React from 'react';
import { Swiper, SwiperSlide } from 'swiper/react';
import { Autoplay, Navigation, Pagination } from 'swiper/modules';
import { galleriesData } from '../data/galleries';

// Import Swiper styles
import 'swiper/css';
import 'swiper/css/navigation';
import 'swiper/css/pagination';

export default function PhotoCarousel({ onImageClick }) {
  const images = galleriesData['bday-shoot']?.images || [];

  return (
    <section className="photo-scroll-section">
      <div className="container">
        <div className="text-center mb-4">
          <div className="eyebrow mb-2">Moments in Motion</div>
          <h2 style={{ fontSize: 'clamp(2rem, 3.2vw, 2.8rem)', fontWeight: 500 }}>
            Celebrations Captured
          </h2>
        </div>

        <Swiper
          modules={[Autoplay, Navigation, Pagination]}
          spaceBetween={20}
          slidesPerView={1.2}
          loop={images.length > 4}
          autoplay={{
            delay: 2500,
            disableOnInteraction: false,
            pauseOnMouseEnter: true
          }}
          pagination={{ clickable: true }}
          navigation={true}
          breakpoints={{
            576: {
              slidesPerView: 2,
              spaceBetween: 16
            },
            992: {
              slidesPerView: 3,
              spaceBetween: 24
            },
            1200: {
              slidesPerView: 4,
              spaceBetween: 24
            }
          }}
          className="pb-5"
        >
          {images.map((photo, index) => (
            <SwiperSlide key={index}>
              <div
                className="photo-card"
                style={{ cursor: 'pointer' }}
                onClick={() => onImageClick && onImageClick(images, index)}
              >
                <img src={photo.src} alt={photo.caption} loading="lazy" />
                <div className="photo-caption">
                  <span>{photo.caption}</span>
                </div>
              </div>
            </SwiperSlide>
          ))}
        </Swiper>
      </div>
    </section>
  );
}

