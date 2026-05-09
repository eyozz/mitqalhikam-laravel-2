<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\Gallery;
use Illuminate\Database\Seeder;

class GallerySeeder extends Seeder
{
    public function run(): void
    {
        $images = [
            ['Halaqah Tahfizh Santri', '/images/galeri/1.jpg'],
            ['Kegiatan Pembelajaran Qurani', '/images/galeri/2.jpg'],
            ['Dokumentasi Kegiatan Sekolah', '/images/galeri/3.jpg'],
            ['Pembinaan Adab dan Akhlak', '/images/galeri/4.JPG'],
            ['Kegiatan Outdoor Santri', '/images/galeri/5.jpg'],
            ['Suasana Belajar MITQ Al-Hikam', '/images/galeri/P1400911.JPG'],
        ];

        foreach ($images as $index => [$title, $path]) {
            Gallery::query()->updateOrCreate(
                ['image_path' => $path],
                [
                    'title' => $title,
                    'description' => 'Dokumentasi kegiatan MITQ Al-Hikam Surakarta.',
                    'section' => 'home',
                    'sort_order' => $index + 1,
                    'is_active' => true,
                ]
            );
        }
    }
}
