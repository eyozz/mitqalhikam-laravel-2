<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Models\NewsPost;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

/**
 * @extends Factory<NewsPost>
 */
class NewsPostFactory extends Factory
{
    public function definition(): array
    {
        $title = fake()->sentence(5);

        return [
            'title' => $title,
            'slug' => Str::slug($title),
            'category' => fake()->randomElement(['Kegiatan', 'Tahfizh', 'Akademik']),
            'excerpt' => fake()->paragraph(),
            'content' => '<p>'.fake()->paragraph().'</p>',
            'image_url' => fake()->imageUrl(1200, 800, 'education'),
            'published_at' => fake()->dateTimeBetween('-2 months', 'now'),
            'is_featured' => false,
            'status' => 'published',
        ];
    }
}
