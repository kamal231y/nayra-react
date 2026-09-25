import React from 'react';

export default function MarqueeStrip() {
  const items = [
    'WEDDING PHOTOGRAPHY',
    'BIRTHDAY SHOOTS',
    'PRE-WEDDING STORIES',
    'CORPORATE EVENTS',
    'RING CEREMONY',
    'HALDI & MEHNDI'
  ];

  return (
    <div className="strip" aria-hidden="true">
      <div className="track">
        {items.map((item, idx) => (
          <React.Fragment key={`marquee-1-${idx}`}>
            <span>{item}</span>•
          </React.Fragment>
        ))}
        {items.map((item, idx) => (
          <React.Fragment key={`marquee-2-${idx}`}>
            <span>{item}</span>•
          </React.Fragment>
        ))}
      </div>
    </div>
  );
}

