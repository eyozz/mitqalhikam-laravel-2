<?php

declare(strict_types=1);

namespace App\Providers;

use App\Models\FooterLink;
use App\Models\Gallery;
use App\Models\PageContent;
use App\Models\SiteSetting;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    public function register(): void
    {
        //
    }

    public function boot(): void
    {
        View::composer('*', function ($view): void {
            $settings = [];
            $contents = collect();
            $footerLinks = collect();
            $homeGalleries = collect();

            if (Schema::hasTable('site_settings')) {
                $settings = SiteSetting::query()->pluck('value', 'key')->all();
            }

            if (Schema::hasTable('page_contents')) {
                $contents = PageContent::query()
                    ->get()
                    ->mapWithKeys(fn (PageContent $content): array => [
                        "{$content->page}.{$content->section}.{$content->field}" => $content->value,
                    ]);
            }

            if (Schema::hasTable('footer_links')) {
                $footerLinks = FooterLink::query()
                    ->where('is_active', true)
                    ->orderBy('sort_order')
                    ->get()
                    ->groupBy('group');
            }

            if (Schema::hasTable('galleries')) {
                $homeGalleries = Gallery::query()
                    ->where('is_active', true)
                    ->where('section', 'home')
                    ->orderBy('sort_order')
                    ->limit(6)
                    ->get();
            }

            $view->with([
                'cmsSettings' => $settings,
                'cmsContent' => $contents,
                'footerLinks' => $footerLinks,
                'homeGalleries' => $homeGalleries,
            ]);
        });
    }
}
