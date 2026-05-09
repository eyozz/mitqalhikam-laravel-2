<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Gallery;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function index(): View
    {
        return view('admin.galleries.index', [
            'galleries' => Gallery::orderBy('section')->orderBy('sort_order')->paginate(12),
        ]);
    }

    public function create(): View
    {
        return view('admin.galleries.form', ['gallery' => new Gallery]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $data['image_path'] = '/storage/'.$request->file('image')->store('galleries', 'public');
        }

        Gallery::create($data);

        return redirect()->route('admin.galleries.index')->with('status', 'Galeri berhasil dibuat.');
    }

    public function edit(Gallery $gallery): View
    {
        return view('admin.galleries.form', compact('gallery'));
    }

    public function update(Request $request, Gallery $gallery): RedirectResponse
    {
        $data = $this->validatedData($request, false);
        $data['is_active'] = $request->boolean('is_active');

        if ($request->hasFile('image')) {
            $this->deleteStoredFile($gallery->image_path);
            $data['image_path'] = '/storage/'.$request->file('image')->store('galleries', 'public');
        }

        $gallery->update($data);

        return redirect()->route('admin.galleries.index')->with('status', 'Galeri berhasil diperbarui.');
    }

    public function destroy(Gallery $gallery): RedirectResponse
    {
        $this->deleteStoredFile($gallery->image_path);
        $gallery->delete();

        return back()->with('status', 'Galeri berhasil dihapus.');
    }

    private function validatedData(Request $request, bool $requireImage = true): array
    {
        return $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'description' => ['nullable', 'string', 'max:1000'],
            'section' => ['required', 'string', 'max:80'],
            'sort_order' => ['required', 'integer', 'min:0'],
            'image_path' => [$requireImage ? 'required_without:image' : 'nullable', 'string', 'max:255'],
            'image' => [$requireImage ? 'nullable' : 'nullable', 'image', 'max:4096'],
        ]);
    }

    private function deleteStoredFile(?string $path): void
    {
        if ($path && str_starts_with($path, '/storage/')) {
            Storage::disk('public')->delete(Str::after($path, '/storage/'));
        }
    }
}
