<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Models\FooterLink;
use App\Models\Gallery;
use App\Models\NewsPost;
use App\Models\PageContent;
use App\Models\SiteSetting;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use Tests\TestCase;

class AdminDashboardTest extends TestCase
{
    use RefreshDatabase;

    public function test_admin_login_and_dashboard_are_available(): void
    {
        $admin = User::factory()->create([
            'email' => 'admin@example.com',
            'password' => 'password',
            'is_admin' => true,
        ]);

        $this->post(route('admin.login.store'), [
            'email' => $admin->email,
            'password' => 'password',
        ])->assertRedirect(route('admin.dashboard'));

        $this->actingAs($admin)->get(route('admin.dashboard'))->assertOk()->assertSee('Admin CMS');
    }

    public function test_non_admin_cannot_open_admin_dashboard(): void
    {
        $user = User::factory()->create(['is_admin' => false]);

        $this->actingAs($user)->get(route('admin.dashboard'))->assertRedirect(route('admin.login'));
    }

    public function test_admin_can_create_cms_records(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)->post(route('admin.news.store'), [
            'title' => 'Berita Admin Baru',
            'slug' => 'berita-admin-baru',
            'category' => 'Kegiatan',
            'excerpt' => 'Ringkasan berita admin.',
            'content' => '<p>Konten berita admin.</p>',
            'image_url' => '/images/berita/1.JPG',
            'published_at' => now()->format('Y-m-d H:i:s'),
            'status' => 'published',
        ])->assertRedirect(route('admin.news.index'));

        $this->actingAs($admin)->post(route('admin.galleries.store'), [
            'title' => 'Galeri Admin',
            'image_path' => '/images/galeri/1.jpg',
            'description' => 'Dokumentasi kegiatan.',
            'section' => 'home',
            'sort_order' => 1,
            'is_active' => 1,
        ])->assertRedirect(route('admin.galleries.index'));

        $this->actingAs($admin)->post(route('admin.footer-links.store'), [
            'label' => 'Instagram',
            'url' => 'https://instagram.com',
            'group' => 'social',
            'icon' => 'instagram',
            'sort_order' => 1,
            'is_active' => 1,
        ])->assertRedirect(route('admin.footer-links.index'));

        $this->assertDatabaseHas(NewsPost::class, ['slug' => 'berita-admin-baru']);
        $this->assertDatabaseHas(Gallery::class, ['title' => 'Galeri Admin']);
        $this->assertDatabaseHas(FooterLink::class, ['label' => 'Instagram']);
    }

    public function test_admin_can_update_site_settings(): void
    {
        $admin = User::factory()->create(['is_admin' => true]);
        SiteSetting::create(['key' => 'site_name', 'value' => 'MITQ Al-Hikam', 'group' => 'identity', 'type' => 'text']);

        $this->actingAs($admin)->put(route('admin.settings.update'), [
            'settings' => ['site_name' => 'MITQ Al-Hikam Surakarta'],
        ])->assertRedirect();

        $this->assertDatabaseHas(SiteSetting::class, [
            'key' => 'site_name',
            'value' => 'MITQ Al-Hikam Surakarta',
        ]);
    }

    public function test_admin_can_upload_page_content_image(): void
    {
        Storage::fake('public');
        $admin = User::factory()->create(['is_admin' => true]);

        $this->actingAs($admin)->post(route('admin.page-contents.store'), [
            'page' => 'about',
            'section' => 'leadership',
            'field' => 'test_photo',
            'value' => '',
            'type' => 'image',
            'image_file' => UploadedFile::fake()->image('pembina.jpg'),
        ])->assertRedirect(route('admin.page-contents.index'));

        $content = PageContent::where('page', 'about')
            ->where('section', 'leadership')
            ->where('field', 'test_photo')
            ->firstOrFail();

        $this->assertStringStartsWith('/storage/page-contents/', $content->value);
        Storage::disk('public')->assertExists(str_replace('/storage/', '', $content->value));
    }
}
