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
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBJxHWUWJU_LoW496RPaJUllL1UhBgLVDyzymGDYW5cpvWd0M7G8OHVl2jVBbOc-o232_c-9aIGwhUH5xbavByMoDn6GwWbqXkhjNWdzB6cFP9l5JP3yfoDbJUSD8ksIefAe9Aksa-IgNbU11gcJjE5Ee-lRKEMNh1BxBdn9rKHVI6Zb5Bl3pXFdGTTCYZX6vKV6_B7z1tsu8dMIoTRunT16AQpyVRVB1V3qvxUxcDDTttOot0BiAA0jS93rPT6v8hU4g66sm3FG8vy',
                'published_at' => now()->subDays(8),
                'is_featured' => true,
            ],
            [
                'title' => "Tasmi' Akbar: Gema Al-Qur'an di Bumi Surakarta",
                'category' => 'Tahfizh',
                'excerpt' => 'Kegiatan rutin bulanan santri dalam memperdengarkan hafalan sekali duduk di hadapan publik.',
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuC4GYefKztnPTtY2sICBzyALAqs0D1oJvRR6rgZiwdG7NpUlGmu6mNP_ueG3rLSsT4G_tb9I1-EplYI2XDzRFQ0TomkZsCP1PzMBCrUc-wTvme8sjq9l8an2EaDqGTRRJidHgh4NNIMUekrVXErpr3CpCU5muqYWYzMEsyykjF6lQkOAbxGkxAbD2Sy-4coc1jP9c08WPfbvHS1gh4DqLpGERlqDf3K5wjhDeCc7u1jYCzd5w0EjqBrpSBzSZ-8MORjpdqKg8MR6SEe',
                'published_at' => now()->subDays(14),
                'is_featured' => false,
            ],
            [
                'title' => 'Mukhayyam Santri: Membangun Ukhuwah dan Jiwa Kepemimpinan',
                'category' => 'Karakter',
                'excerpt' => "Santri mengikuti mukhayyam tahunan yang diisi pembinaan karakter, kerja sama tim, dan penguatan nilai-nilai Qur'ani.",
                'image_url' => 'https://lh3.googleusercontent.com/aida-public/AB6AXuBm1400c8wErfGH42of1r_AXIDHeXLaVh70lSxk6AJVS61Xp0iRb9t1qY552r5ZWgMAX2wGyrvKnzn8wK6EKHM4b1jV0_Hs1nB_o60xDJWirrRoOrCa6k4wqs7XprnEqoVLv44Huww1tjqzY8k3n49XndqsG_hEcLqRWvTycAH66Kq9jgHyy0T4FKRo1FzqNPEKgaqZVtwv0esqDlYo-lu3iv6KjH6V498qJVsyULMNGa70AWuL0nITXLu-kv8zNg22tFJkKLPbU6AV',
                'published_at' => now()->subDays(21),
                'is_featured' => false,
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
<p>{$title} menjadi salah satu agenda pendidikan yang memperkuat pengalaman belajar santri di STTD Al Hikam Surakarta.</p>
<p>Kegiatan ini dirancang tidak hanya sebagai dokumentasi sekolah, tetapi juga sebagai media pembinaan adab, tanggung jawab, kedisiplinan, dan kecintaan kepada Al-Qur'an.</p>
<p>Melalui pendekatan halaqah, pendampingan guru, dan suasana belajar yang hangat, santri diarahkan untuk tumbuh sebagai pribadi Qur'ani yang berakhlak dan siap memberi manfaat bagi keluarga serta masyarakat.</p>
HTML;
    }
}
