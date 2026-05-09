<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\ContactMessage;
use App\Models\NewsPost;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class CompanyProfileTest extends TestCase
{
    use RefreshDatabase;

    public function test_company_profile_pages_are_accessible(): void
    {
        $this->get(route('home'))->assertOk();
        $this->get(route('about'))->assertOk();
        $this->get(route('program'))->assertOk();
        $this->get(route('contact'))->assertOk();
    }

    public function test_news_page_uses_database_posts(): void
    {
        $post = NewsPost::factory()->create([
            'title' => 'Tasmi Akbar Al Hikam',
            'slug' => 'tasmi-akbar-al-hikam',
            'published_at' => now(),
            'is_featured' => true,
        ]);

        $this->get(route('news.index'))->assertOk()->assertSee($post->title);
        $this->get(route('news.show', $post))->assertOk()->assertSee($post->title);
    }

    public function test_contact_form_stores_message(): void
    {
        $this->post(route('contact.store'), [
            'name' => 'Wali Santri',
            'email' => 'wali@example.com',
            'subject' => 'Informasi Pendaftaran (PPDB)',
            'message' => 'Mohon informasi pendaftaran santri baru.',
        ])->assertRedirect();

        $this->assertDatabaseHas(ContactMessage::class, [
            'email' => 'wali@example.com',
            'subject' => 'Informasi Pendaftaran (PPDB)',
        ]);
    }
}
