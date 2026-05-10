<?php

declare(strict_types=1);

use App\Models\PageContent;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /** @var array<int, array{0: string, 1: string, 2: string, 3: string, 4: string}> */
    private array $contents = [
        ['about', 'leadership', 'pembina_name', 'Sigit Basuki', 'text'],
        ['about', 'leadership', 'pembina_photo', '/images/logo.jpg', 'image'],
        ['about', 'leadership', 'pengawas_name', 'Muzayyin Marzuki', 'text'],
        ['about', 'leadership', 'pengawas_photo', '/images/logo.jpg', 'image'],
        ['about', 'leadership', 'ketua_yayasan_name', 'Anas Ma\'ruf', 'text'],
        ['about', 'leadership', 'ketua_yayasan_photo', '/images/logo.jpg', 'image'],
        ['about', 'leadership', 'kepala_sekolah_name', 'Dudi Budi Astoko, S.Pd.I., M.Pd.', 'text'],
        ['about', 'leadership', 'kepala_sekolah_photo', '/images/logo.jpg', 'image'],
    ];

    public function up(): void
    {
        foreach ($this->contents as [$page, $section, $field, $value, $type]) {
            PageContent::setValue($page, $section, $field, $value, $type);
        }
    }

    public function down(): void
    {
        PageContent::query()
            ->where('page', 'about')
            ->where('section', 'leadership')
            ->whereIn('field', array_column($this->contents, 2))
            ->delete();
    }
};
