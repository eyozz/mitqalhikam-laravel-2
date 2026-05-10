<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class PageContentController extends Controller
{
    public function index(): View
    {
        $query = PageContent::query()
            ->orderBy('page')
            ->orderBy('section')
            ->orderBy('field');

        if (request()->filled('page')) {
            $query->where('page', request('page'));
        }

        if (request()->filled('section')) {
            $query->where('section', request('section'));
        }

        if (request()->filled('search')) {
            $search = request('search');
            $query->where(function ($query) use ($search): void {
                $query->where('field', 'like', "%{$search}%")
                    ->orWhere('value', 'like', "%{$search}%");
            });
        }

        return view('admin.page-contents.index', [
            'contents' => $query->paginate(20)->withQueryString(),
        ]);
    }

    public function create(): View
    {
        return view('admin.page-contents.form', ['content' => new PageContent]);
    }

    public function store(Request $request): RedirectResponse
    {
        PageContent::create($this->contentData($request));
        Cache::flush();

        return redirect()->route('admin.page-contents.index')->with('status', 'Konten halaman berhasil dibuat.');
    }

    public function edit(PageContent $pageContent): View
    {
        return view('admin.page-contents.form', ['content' => $pageContent]);
    }

    public function update(Request $request, PageContent $pageContent): RedirectResponse
    {
        $data = $this->contentData($request, $pageContent);

        if ($request->hasFile('image_file')) {
            $this->deleteStoredFile($pageContent->value);
        }

        $pageContent->update($data);
        Cache::flush();

        return redirect()->route('admin.page-contents.index')->with('status', 'Konten halaman berhasil diperbarui.');
    }

    public function destroy(PageContent $pageContent): RedirectResponse
    {
        $this->deleteStoredFile($pageContent->value);
        $pageContent->delete();
        Cache::flush();

        return back()->with('status', 'Konten halaman berhasil dihapus.');
    }

    private function contentData(Request $request, ?PageContent $content = null): array
    {
        $data = $this->validatedData($request, $content);

        if ($request->hasFile('image_file')) {
            $data['value'] = '/storage/'.$request->file('image_file')->store('page-contents', 'public');
            $data['type'] = 'image';
        }

        return $data;
    }

    private function validatedData(Request $request, ?PageContent $content = null): array
    {
        return $request->validate([
            'page' => ['required', 'string', 'max:80'],
            'section' => ['required', 'string', 'max:80'],
            'field' => [
                'required',
                'string',
                'max:120',
                Rule::unique('page_contents')->where(fn ($query) => $query
                    ->where('page', $request->input('page'))
                    ->where('section', $request->input('section')))->ignore($content?->id),
            ],
            'value' => ['nullable', 'string'],
            'type' => ['required', 'string', 'max:40'],
            'image_file' => ['nullable', 'image', 'max:4096'],
        ]);
    }

    private function deleteStoredFile(?string $path): void
    {
        if ($path && str_starts_with($path, '/storage/page-contents/')) {
            Storage::disk('public')->delete(Str::after($path, '/storage/'));
        }
    }
}
