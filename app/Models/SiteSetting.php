<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SiteSetting extends Model
{
    protected $fillable = ['key', 'value', 'group', 'type'];

    public static function getValue(string $key, ?string $default = null): ?string
    {
        return Cache::rememberForever('site_setting_'.$key, function () use ($key, $default): ?string {
            return self::query()->where('key', $key)->value('value') ?? $default;
        });
    }

    public static function setValue(string $key, ?string $value, string $group = 'general', string $type = 'text'): void
    {
        self::query()->updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'group' => $group, 'type' => $type]
        );

        Cache::forget('site_setting_'.$key);
    }
}
