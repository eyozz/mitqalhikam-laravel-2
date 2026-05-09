<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\PageContent;
use Illuminate\Database\Seeder;

class PageContentSeeder extends Seeder
{
    public function run(): void
    {
        $contents = [
            ['home', 'hero', 'badge', 'PENDAFTARAN TAHUN AJARAN 2025/2026 DIBUKA', 'text'],
            ['home', 'hero', 'title', 'Mencetak Generasi Ulama yang Berpegang Teguh dengan Al-Qur\'an dan As-Sunnah', 'text'],
            ['home', 'hero', 'subtitle', 'MITQ Al-Hikam menghadirkan pembelajaran tahfizh, adab, dan ilmu dasar dalam suasana halaqah yang hangat dan terarah.', 'textarea'],
            ['home', 'about', 'title', 'Tahun ke-7 Melayani Masyarakat', 'text'],
            ['home', 'about', 'body', 'MITQ Al-Hikam Surakarta berkomitmen memberikan pendidikan terbaik berbasis Al-Qur\'an dengan lingkungan belajar yang kondusif bagi pertumbuhan spiritual dan intelektual santri.', 'textarea'],
            ['about', 'hero', 'title', 'Yayasan Salamah Surakarta', 'text'],
            ['about', 'hero', 'subtitle', 'Berawal dari cita-cita mencetak generasi Qur\'ani yang berakhlak mulia dan unggul dalam akademik, MITQ Al-Hikam mendedikasikan diri pada kesucian ilmu dan ketekunan ibadah.', 'textarea'],
            ['program', 'hero', 'title', 'Kurikulum Adab dan Ilmu Berbasis Tahfizh', 'text'],
            ['program', 'hero', 'subtitle', 'Menyeimbangkan hafalan Al-Qur\'an dengan pemahaman agama dan kecakapan akademik umum untuk mencetak generasi Rabbani.', 'textarea'],
            ['contact', 'hero', 'title', 'Hubungi MITQ Al-Hikam', 'text'],
            ['contact', 'hero', 'subtitle', 'Kami siap membantu wali murid dan calon pendaftar mendapatkan informasi terbaik tentang program pendidikan MITQ Al-Hikam.', 'textarea'],
        ];

        foreach ($contents as [$page, $section, $field, $value, $type]) {
            PageContent::setValue($page, $section, $field, $value, $type);
        }
    }
}
