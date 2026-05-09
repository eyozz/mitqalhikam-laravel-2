<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class PageContent extends Model
{
    protected $fillable = ['page', 'section', 'field', 'value', 'type'];

    public static function getValue(string $page, string $section, string $field, ?string $default = null): ?string
    {
        $key = "page_content_{$page}_{$section}_{$field}";

        return Cache::rememberForever($key, function () use ($page, $section, $field, $default): ?string {
            return self::query()
                ->where('page', $page)
                ->where('section', $section)
                ->where('field', $field)
                ->value('value') ?? $default;
        });
    }

    public static function setValue(string $page, string $section, string $field, ?string $value, string $type = 'text'): void
    {
        self::query()->updateOrCreate(
            compact('page', 'section', 'field'),
            compact('value', 'type')
        );

        Cache::forget("page_content_{$page}_{$section}_{$field}");
    }
}
