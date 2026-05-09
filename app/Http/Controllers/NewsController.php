<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\NewsPost;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(Request $request): View
    {
        $search = trim((string) $request->query('search', ''));

        $posts = NewsPost::query()
            ->whereNotNull('published_at')
            ->where('status', 'published')
            ->when($search !== '', function ($query) use ($search): void {
                $query->where(function ($query) use ($search): void {
                    $query->where('title', 'like', "%{$search}%")
                        ->orWhere('excerpt', 'like', "%{$search}%")
                        ->orWhere('category', 'like', "%{$search}%");
                });
            })
            ->latest('published_at')
            ->paginate(6)
            ->withQueryString();

        $featuredPost = NewsPost::query()
            ->where('is_featured', true)
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->first();

        return view('news.index', compact('posts', 'featuredPost', 'search'));
    }

    public function show(NewsPost $post): View
    {
        $relatedPosts = NewsPost::query()
            ->whereKeyNot($post->id)
            ->where('category', $post->category)
            ->where('status', 'published')
            ->whereNotNull('published_at')
            ->latest('published_at')
            ->limit(3)
            ->get();

        return view('news.show', compact('post', 'relatedPosts'));
    }
}
