import fs from 'fs';
import path from 'path';

const galleryDir = path.resolve('public', 'assets', 'img', 'gallery');

function formatCaption(filename) {
  const nameWithoutExt = path.parse(filename).name.replace(/\.JPG$/i, '');
  return nameWithoutExt
    .replace(/[-_]/g, ' ')
    .replace(/\s+/g, ' ')
    .trim()
    .replace(/\b\w/g, char => char.toUpperCase());
}

function naturalSort(a, b) {
  return a.localeCompare(b, undefined, { numeric: true, sensitivity: 'base' });
}

const categoryMapping = {
  'wedding-shoot': 'weeding-shoot',
  'pre-wedding': 'PreWedding-Photoshoot',
  'bday-shoot': 'bday',
  'corporate': 'corporate',
  'ecommerce': 'ecommerce',
  'engagement': 'engagement',
  'haldi-shoot': 'haldi',
  'mehndi': 'mehndi',
  'gallery': 'gal'
};

const categoryTitles = {
  'wedding-shoot': {
    title: 'Wedding Shoot',
    eyebrow: 'Wedding Stories',
    description: 'Full-day and multi-day coverage — from morning rituals to the last dance — candid first, posed when it matters.'
  },
  'pre-wedding': {
    title: 'Pre Wedding Shoot',
    eyebrow: 'Couple Stories',
    description: 'A relaxed day out — city streets, a hill station, or somewhere you both love — built around your story, not a checklist.'
  },
  'bday-shoot': {
    title: 'Birthday Shoot',
    eyebrow: 'Celebration',
    description: 'From first-birthday smash cakes to milestone parties — warm, playful coverage that keeps up with the room.'
  },
  'haldi-shoot': {
    title: 'Haldi Shoot',
    eyebrow: 'Vibrant Rituals',
    description: 'Celebrate the joy and vibrant traditions of your Haldi ceremony with candid and colorful photography.'
  },
  'mehndi': {
    title: 'Mehndi Shoot',
    eyebrow: 'Henna & Harmony',
    description: 'Celebrate the joy and vibrant traditions of your Mehndi ceremony with candid and colorful photography.'
  },
  'engagement': {
    title: 'Ring Ceremony Shoot',
    eyebrow: 'The Promise',
    description: 'Celebrate the beginning of your forever with timeless Ring Ceremony photography.'
  },
  'corporate': {
    title: 'Corporate Event Shoot',
    eyebrow: 'Professional Moments',
    description: 'Conferences, launches, and offsites — clean, professional documentation delivered fast for press and socials.'
  },
  'ecommerce': {
    title: 'Ecommerce Shoot',
    eyebrow: 'Studio & Products',
    description: 'Showcase your products with high-quality, studio-style photography that drives sales.'
  },
  'gallery': {
    title: 'Main Gallery',
    eyebrow: 'Recent Work',
    description: 'From the contact sheet — a curated collection of authentic moments captured across celebrations.'
  }
};

const result = {};

for (const [key, folderName] of Object.entries(categoryMapping)) {
  const folderPath = path.join(galleryDir, folderName);
  if (fs.existsSync(folderPath)) {
    const files = fs.readdirSync(folderPath)
      .filter(f => /\.(webp|jpg|jpeg|png)$/i.test(f))
      .sort(naturalSort);

    const images = files.map(file => {
      return {
        src: `/assets/img/gallery/${folderName}/${file}`,
        caption: formatCaption(file),
        alt: formatCaption(file)
      };
    });

    result[key] = {
      ...categoryTitles[key],
      images
    };
  }
}

const fileContent = `// Auto-generated gallery catalog
export const galleriesData = ${JSON.stringify(result, null, 2)};
`;

fs.writeFileSync(path.resolve('src', 'data', 'galleries.js'), fileContent, 'utf-8');
console.log('Galleries data generated successfully!');
for (const [k, v] of Object.entries(result)) {
  console.log(`- ${k}: ${v.images.length} images`);
}

