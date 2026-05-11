<?php

declare(strict_types=1);

namespace Database\Seeders;

use App\Models\FooterLink;
use Illuminate\Database\Seeder;

class FooterLinkSeeder extends Seeder
{
    public function run(): void
    {
        $links = [
            ['Beranda', '/', 'quick_links', null, 1],
            ['Tentang Kami', '/tentang-kami', 'quick_links', null, 2],
            ['Program', '/program', 'quick_links', null, 3],
            ['News', '/news', 'quick_links', null, 4],
            ['Hubungi Kami', '/hubungi-kami', 'quick_links', null, 5],
            ['Instagram', '#', 'social', 'instagram', 1],
            ['Facebook', '#', 'social', 'facebook', 2],
            ['TikTok', '#', 'social', 'tiktok', 3],
            ['YouTube', '#', 'social', 'youtube', 4],
        ];

        foreach ($links as [$label, $url, $group, $icon, $sortOrder]) {
            FooterLink::query()->updateOrCreate(
                ['label' => $label, 'group' => $group],
                ['url' => $url, 'icon' => $icon, 'sort_order' => $sortOrder, 'is_active' => true]
            );
        }
    }
}
