<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;
use App\Models\FooterLink;
use App\Models\Gallery;
use App\Models\NewsPost;
use App\Models\PageContent;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;

class DashboardController extends Controller
{
    public function __invoke(): View
    {
        return view('admin.dashboard', [
            'newsCount' => NewsPost::count(),
            'publishedNewsCount' => NewsPost::where('status', 'published')->count(),
            'galleryCount' => Gallery::count(),
            'messageCount' => ContactMessage::count(),
            'settingCount' => SiteSetting::count(),
            'pageContentCount' => PageContent::count(),
            'footerLinkCount' => FooterLink::count(),
            'latestMessages' => ContactMessage::latest()->limit(5)->get(),
        ]);
    }
}
