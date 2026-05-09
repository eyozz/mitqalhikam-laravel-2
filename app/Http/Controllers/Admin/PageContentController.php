<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageContent;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Validation\Rule;

class PageContentController extends Controller
{
    public function index(): View
    {
        return view('admin.page-contents.index', [
            'contents' => PageContent::orderBy('page')->orderBy('section')->orderBy('field')->paginate(20),
        ]);
    }

    public function create(): View
    {
        return view('admin.page-contents.form', ['content' => new PageContent]);
    }

    public function store(Request $request): RedirectResponse
    {
        PageContent::create($this->validatedData($request));
        Cache::flush();

        return redirect()->route('admin.page-contents.index')->with('status', 'Konten halaman berhasil dibuat.');
    }

    public function edit(PageContent $pageContent): View
    {
        return view('admin.page-contents.form', ['content' => $pageContent]);
    }

    public function update(Request $request, PageContent $pageContent): RedirectResponse
    {
        $pageContent->update($this->validatedData($request, $pageContent));
        Cache::flush();

        return redirect()->route('admin.page-contents.index')->with('status', 'Konten halaman berhasil diperbarui.');
    }

    public function destroy(PageContent $pageContent): RedirectResponse
    {
        $pageContent->delete();
        Cache::flush();

        return back()->with('status', 'Konten halaman berhasil dihapus.');
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
        ]);
    }
}
