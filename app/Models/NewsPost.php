<?php

declare(strict_types=1);

namespace App\Models;

use Database\Factories\NewsPostFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPost extends Model
{
    /** @use HasFactory<NewsPostFactory> */
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'category',
        'excerpt',
        'content',
        'image_url',
        'thumbnail_path',
        'published_at',
        'is_featured',
        'status',
    ];

    protected function casts(): array
    {
        return [
            'published_at' => 'datetime',
            'is_featured' => 'boolean',
        ];
    }

    public function getDisplayImageAttribute(): ?string
    {
        return $this->thumbnail_path ?: $this->image_url;
    }
}
