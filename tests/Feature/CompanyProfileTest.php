<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\ContactMessage;
use App\Models\FooterLink;
use App\Models\NewsPost;
use App\Models\PageContent;
use App\Models\SiteSetting;
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

    public function test_about_page_uses_dynamic_leadership_content(): void
    {
        PageContent::setValue('about', 'leadership', 'pembina_name', 'Nama Pembina Dinamis');
        PageContent::setValue('about', 'leadership', 'pembina_photo', '/storage/page-contents/pembina.jpg', 'image');

        $this->get(route('about'))
            ->assertOk()
            ->assertSee('Nama Pembina Dinamis')
            ->assertSee('/storage/page-contents/pembina.jpg');
    }

    public function test_footer_uses_logo_and_editable_social_links(): void
    {
        SiteSetting::setValue('site_logo', '/images/logo.jpg', 'identity', 'image');
        FooterLink::create(['label' => 'Instagram', 'url' => 'https://instagram.test', 'group' => 'social', 'icon' => 'instagram', 'sort_order' => 1, 'is_active' => true]);
        FooterLink::create(['label' => 'Facebook', 'url' => 'https://facebook.test', 'group' => 'social', 'icon' => 'facebook', 'sort_order' => 2, 'is_active' => true]);
        FooterLink::create(['label' => 'TikTok', 'url' => 'https://tiktok.test', 'group' => 'social', 'icon' => 'tiktok', 'sort_order' => 3, 'is_active' => true]);
        FooterLink::create(['label' => 'YouTube', 'url' => 'https://youtube.test', 'group' => 'social', 'icon' => 'youtube', 'sort_order' => 4, 'is_active' => true]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('/images/logo.jpg')
            ->assertSee('https://instagram.test')
            ->assertSee('https://facebook.test')
            ->assertSee('https://tiktok.test')
            ->assertSee('https://youtube.test')
            ->assertDontSee('mitqalhikam.satemp.top');
    }

    public function test_public_pages_use_responsive_image_markup(): void
    {
        NewsPost::factory()->create([
            'title' => 'Artikel Optimasi Gambar',
            'slug' => 'artikel-optimasi-gambar',
            'image_url' => '/images/berita/1.JPG',
            'thumbnail_path' => '/images/berita/1.JPG',
            'published_at' => now(),
            'is_featured' => true,
        ]);

        $this->get(route('home'))
            ->assertOk()
            ->assertSee('<picture>', false)
            ->assertSee('type="image/avif"', false)
            ->assertSee('type="image/webp"', false)
            ->assertSee('fetchpriority="high"', false)
            ->assertSee('width="640"', false)
            ->assertSee('height="500"', false);

        $this->get(route('news.index'))
            ->assertOk()
            ->assertSee('/images/optimized/', false)
            ->assertSee('loading="lazy"', false);
    }
}
