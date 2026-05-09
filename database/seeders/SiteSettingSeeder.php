<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\SiteSetting;
use Illuminate\Database\Seeder;

class SiteSettingSeeder extends Seeder
{
    public function run(): void
    {
        $settings = [
            ['site_name', 'MITQ Al-Hikam', 'identity', 'text'],
            ['site_logo', '/images/logo.jpg', 'identity', 'image'],
            ['registration_url', 'https://forms.gle/example-ppdb-mitq-al-hikam', 'links', 'url'],
            ['footer_address', 'Surakarta, Jawa Tengah', 'contact', 'textarea'],
            ['footer_phone', '+62 812-0000-0000', 'contact', 'text'],
            ['footer_email', 'info@mitqalhikam.sch.id', 'contact', 'email'],
            ['footer_description', 'MITQ Al-Hikam adalah lembaga pendidikan tahfizh dasar yang berfokus pada Al-Qur\'an, adab, dan pembinaan karakter santri.', 'identity', 'textarea'],
        ];

        foreach ($settings as [$key, $value, $group, $type]) {
            SiteSetting::setValue($key, $value, $group, $type);
        }
    }
}
