<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\NewsPost;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class NewsPostSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title' => 'Semangat Iduladha: Santri Belajar Makna Berbagi dan Kepedulian',
                'category' => 'Kegiatan',
                'excerpt' => 'Santri turut berpartisipasi dalam kegiatan penyembelihan dan pembagian hewan kurban sebagai pembelajaran nilai keikhlasan serta kebersamaan.',
                'image_url' => '/images/berita/1.JPG',
                'thumbnail_path' => '/images/berita/1.JPG',
                'published_at' => now()->subDays(8),
                'is_featured' => true,
                'status' => 'published',
            ],
            [
                'title' => "Tasmi' Akbar: Gema Al-Qur'an di Bumi Surakarta",
                'category' => 'Tahfizh',
                'excerpt' => 'Kegiatan rutin bulanan santri dalam memperdengarkan hafalan sekali duduk di hadapan publik.',
                'image_url' => '/images/berita/2.jpg',
                'thumbnail_path' => '/images/berita/2.jpg',
                'published_at' => now()->subDays(14),
                'is_featured' => false,
                'status' => 'published',
            ],
            [
                'title' => 'Mukhayyam Santri: Membangun Ukhuwah dan Jiwa Kepemimpinan',
                'category' => 'Karakter',
                'excerpt' => "Santri mengikuti mukhayyam tahunan yang diisi pembinaan karakter, kerja sama tim, dan penguatan nilai-nilai Qur'ani.",
                'image_url' => '/images/berita/3.jpg',
                'thumbnail_path' => '/images/berita/3.jpg',
                'published_at' => now()->subDays(21),
                'is_featured' => false,
                'status' => 'published',
            ],
        ];

        foreach ($posts as $post) {
            NewsPost::updateOrCreate(
                ['slug' => Str::slug($post['title'])],
                $post + ['content' => $this->contentFor($post['title'])]
            );
        }
    }

    private function contentFor(string $title): string
    {
        return <<<HTML
<p>{$title} menjadi salah satu agenda pendidikan yang memperkuat pengalaman belajar santri di MITQ Al-Hikam Surakarta.</p>
<p>Kegiatan ini dirancang tidak hanya sebagai dokumentasi sekolah, tetapi juga sebagai media pembinaan adab, tanggung jawab, kedisiplinan, dan kecintaan kepada Al-Qur'an.</p>
<p>Melalui pendekatan halaqah, pendampingan guru, dan suasana belajar yang hangat, santri diarahkan untuk tumbuh sebagai pribadi Qur'ani yang berakhlak dan siap memberi manfaat bagi keluarga serta masyarakat.</p>
HTML;
    }
}
