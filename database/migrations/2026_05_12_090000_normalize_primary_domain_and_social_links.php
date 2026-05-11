<?php

declare(strict_types=1);

use App\Models\FooterLink;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    private string $oldDomain = 'https://mitqalhikam.satemp.top';

    public function up(): void
    {
        $this->replaceOldDomainIn('site_settings', 'value');
        $this->replaceOldDomainIn('page_contents', 'value');
        $this->replaceOldDomainIn('footer_links', 'url');
        $this->replaceOldDomainIn('news_posts', 'image_url');
        $this->replaceOldDomainIn('galleries', 'image_path');

        if (Schema::hasTable('site_settings')) {
            DB::table('site_settings')->updateOrInsert(
                ['key' => 'site_logo'],
                [
                    'value' => '/images/logo.jpg',
                    'group' => 'identity',
                    'type' => 'image',
                    'created_at' => now(),
                    'updated_at' => now(),
                ],
            );
        }

        FooterLink::query()->updateOrCreate(
            ['label' => 'TikTok', 'group' => 'social'],
            ['url' => '#', 'icon' => 'tiktok', 'sort_order' => 3, 'is_active' => true],
        );

        FooterLink::query()
            ->where('label', 'YouTube')
            ->where('group', 'social')
            ->update(['icon' => 'youtube', 'sort_order' => 4]);
    }

    public function down(): void
    {
        FooterLink::query()
            ->where('label', 'TikTok')
            ->where('group', 'social')
            ->delete();
    }

    private function replaceOldDomainIn(string $table, string $column): void
    {
        if (! Schema::hasTable($table) || ! Schema::hasColumn($table, $column)) {
            return;
        }

        DB::table($table)
            ->where($column, 'like', $this->oldDomain.'%')
            ->update([
                $column => DB::raw("REPLACE({$column}, '{$this->oldDomain}', '')"),
                'updated_at' => now(),
            ]);
    }
};
