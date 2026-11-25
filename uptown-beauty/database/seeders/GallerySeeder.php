<?php

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $items = [
            [
                'title'       => 'Silk Blowout & Smooth Finish',
                'category'    => 'hair',
                'image_path'  => 'https://images.unsplash.com/photo-1560066984-138dadb4c035?w=900&h=1200&fit=crop&auto=format',
                'alt_text'    => 'Salon hair blowout and styling finish',
                'is_featured' => true,
                'sort_order'  => 1,
            ],
            [
                'title'       => 'Curly Hair Styling Session',
                'category'    => 'hair',
                'image_path'  => 'https://images.unsplash.com/photo-1522337360788-8b13dee7a37e?w=900&h=1200&fit=crop&auto=format',
                'alt_text'    => 'Stylist shaping curls in the salon',
                'is_featured' => false,
                'sort_order'  => 2,
            ],
            [
                'title'       => 'Neat Protective Hair Care',
                'category'    => 'hair',
                'image_path'  => 'https://images.unsplash.com/photo-1580618672591-eb180b1a973f?w=900&h=1200&fit=crop&auto=format',
                'alt_text'    => 'Clean protective hair styling at Uptown Beauty',
                'is_featured' => false,
                'sort_order'  => 3,
            ],
            [
                'title'       => 'Cuticle & Nail Care Session',
                'category'    => 'nails',
                'image_path'  => 'https://images.unsplash.com/photo-1604654894610-df63bc536371?w=900&h=1200&fit=crop&auto=format',
                'alt_text'    => 'Manicurist performing nail and cuticle care',
                'is_featured' => true,
                'sort_order'  => 4,
            ],
            [
                'title'       => 'Glossy Gel Manicure',
                'category'    => 'nails',
                'image_path'  => 'https://images.unsplash.com/photo-1607779097040-26e80aa78e66?w=900&h=1200&fit=crop&auto=format',
                'alt_text'    => 'Polished manicure with smooth finish',
                'is_featured' => false,
                'sort_order'  => 5,
            ],
            [
                'title'       => 'Spa Pedicure Treatment',
                'category'    => 'nails',
                'image_path'  => 'https://images.unsplash.com/photo-1610992015732-2449b76344bc?w=900&h=1200&fit=crop&auto=format',
                'alt_text'    => 'Relaxing pedicure and foot care session',
                'is_featured' => false,
                'sort_order'  => 6,
            ],
            [
                'title'       => 'Classic Eyelash Extensions',
                'category'    => 'lashes',
                'image_path'  => 'https://images.unsplash.com/photo-1583001931096-959e9a1a6223?w=900&h=1200&fit=crop&auto=format',
                'alt_text'    => 'Eyelash extensions applied cleanly in studio',
                'is_featured' => true,
                'sort_order'  => 7,
            ],
            [
                'title'       => 'Soft Wispy Lash Set',
                'category'    => 'lashes',
                'image_path'  => 'https://images.unsplash.com/photo-1631214540242-3cd8c4b0b2a8?w=900&h=1200&fit=crop&auto=format',
                'alt_text'    => 'Soft wispy eyelash styling',
                'is_featured' => false,
                'sort_order'  => 8,
            ],
            [
                'title'       => 'Hydrating Facial Massage',
                'category'    => 'facials',
                'image_path'  => 'https://images.unsplash.com/photo-1570172619644-dfd03ed5d881?w=900&h=1200&fit=crop&auto=format',
                'alt_text'    => 'Facial massage and skincare treatment',
                'is_featured' => true,
                'sort_order'  => 9,
            ],
            [
                'title'       => 'Radiance Skin Therapy',
                'category'    => 'facials',
                'image_path'  => 'https://images.unsplash.com/photo-1616394584738-fc6e612e71b9?w=900&h=1200&fit=crop&auto=format',
                'alt_text'    => 'Brightening facial skincare session',
                'is_featured' => false,
                'sort_order'  => 10,
            ],
        ];

        foreach ($items as $item) {
            Gallery::updateOrCreate(
                ['title' => $item['title']],
                $item
            );
        }
    }
}