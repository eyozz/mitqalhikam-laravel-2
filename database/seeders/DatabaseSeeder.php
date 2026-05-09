<?php

declare(strict_types=1);

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        $this->call([
            AdminUserSeeder::class,
            SiteSettingSeeder::class,
            PageContentSeeder::class,
            FooterLinkSeeder::class,
            GallerySeeder::class,
            NewsPostSeeder::class,
        ]);
    }
}
