<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\FooterLink;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class FooterLinkController extends Controller
{
    public function index(): View
    {
        return view('admin.footer-links.index', [
            'links' => FooterLink::orderBy('group')->orderBy('sort_order')->paginate(20),
        ]);
    }

    public function create(): View
    {
        return view('admin.footer-links.form', ['link' => new FooterLink]);
    }

    public function store(Request $request): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['is_active'] = $request->boolean('is_active');
        FooterLink::create($data);

        return redirect()->route('admin.footer-links.index')->with('status', 'Footer link berhasil dibuat.');
    }

    public function edit(FooterLink $footerLink): View
    {
        return view('admin.footer-links.form', ['link' => $footerLink]);
    }

    public function update(Request $request, FooterLink $footerLink): RedirectResponse
    {
        $data = $this->validatedData($request);
        $data['is_active'] = $request->boolean('is_active');
        $footerLink->update($data);

        return redirect()->route('admin.footer-links.index')->with('status', 'Footer link berhasil diperbarui.');
    }

    public function destroy(FooterLink $footerLink): RedirectResponse
    {
        $footerLink->delete();

        return back()->with('status', 'Footer link berhasil dihapus.');
    }

    private function validatedData(Request $request): array
    {
        return $request->validate([
            'label' => ['required', 'string', 'max:120'],
            'url' => ['required', 'string', 'max:255'],
            'group' => ['required', 'string', 'max:80'],
            'icon' => ['nullable', 'string', 'max:80'],
            'sort_order' => ['required', 'integer', 'min:0'],
        ]);
    }
}
