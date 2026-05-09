<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\NewsPost;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class NewsPostController extends Controller
{
    public function index(): View
    {
        return view('admin.news.index', [
            'posts' => NewsPost::latest()->paginate(10),
        ]);
    }

    public function create(): View
    {
        return view('admin.news.form', ['post' => new NewsPost]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('thumbnail')) {
            $data['thumbnail_path'] = '/storage/'.$request->file('thumbnail')->store('news', 'public');
            $data['image_url'] = $data['thumbnail_path'];
        }

        NewsPost::create($data);

        return redirect()->route('admin.news.index')->with('status', 'Berita berhasil dibuat.');
    }

    public function edit(NewsPost $news): View
    {
        return view('admin.news.form', ['post' => $news]);
    }

    public function update(Request $request, NewsPost $news): RedirectResponse
    {
        $data = $this->validatedData($request, $news);
        $data['slug'] = $data['slug'] ?: Str::slug($data['title']);
        $data['is_featured'] = $request->boolean('is_featured');

        if ($request->hasFile('thumbnail')) {
            $this->deleteStoredFile($news->thumbnail_path);
            $data['thumbnail_path'] = '/storage/'.$request->file('thumbnail')->store('news', 'public');
            $data['image_url'] = $data['thumbnail_path'];
        }

        $news->update($data);

        return redirect()->route('admin.news.index')->with('status', 'Berita berhasil diperbarui.');
    }

    public function destroy(NewsPost $news): RedirectResponse
    {
        $this->deleteStoredFile($news->thumbnail_path);
        $news->delete();

        return back()->with('status', 'Berita berhasil dihapus.');
    }

    private function validatedData(Request $request, ?NewsPost $post = null): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'slug' => ['nullable', 'string', 'max:255', Rule::unique('news_posts', 'slug')->ignore($post?->id)],
            'category' => ['required', 'string', 'max:120'],
            'excerpt' => ['required', 'string', 'max:1000'],
            'content' => ['required', 'string'],
            'image_url' => ['nullable', 'string'],
            'thumbnail' => ['nullable', 'image', 'max:4096'],
            'published_at' => ['nullable', 'date'],
            'status' => ['required', Rule::in(['draft', 'published'])],
        ]);
    }

    private function deleteStoredFile(?string $path): void
    {
        if ($path && str_starts_with($path, '/storage/')) {
            Storage::disk('public')->delete(Str::after($path, '/storage/'));
        }
    }
}
