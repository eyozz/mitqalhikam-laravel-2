<?php

declare(strict_types=1);

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\SiteSetting;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class SiteSettingController extends Controller
{
    public function index(): View
    {
        return view('admin.settings.index', [
            'settings' => SiteSetting::orderBy('group')->orderBy('key')->get()->groupBy('group'),
        ]);
    }

    public function update(Request $request): RedirectResponse
    {
        $data = $request->validate([
            'settings' => ['nullable', 'array'],
            'settings.*' => ['nullable', 'string'],
            'site_logo_upload' => ['nullable', 'image', 'max:4096'],
        ]);

        foreach ($data['settings'] ?? [] as $key => $value) {
            $setting = SiteSetting::where('key', $key)->first();
            SiteSetting::setValue($key, $value, $setting?->group ?? 'general', $setting?->type ?? 'text');
        }

        if ($request->hasFile('site_logo_upload')) {
            $oldLogo = SiteSetting::getValue('site_logo');
            if ($oldLogo && str_starts_with($oldLogo, '/storage/')) {
                Storage::disk('public')->delete(Str::after($oldLogo, '/storage/'));
            }

            SiteSetting::setValue('site_logo', '/storage/'.$request->file('site_logo_upload')->store('identity', 'public'), 'identity', 'image');
        }

        Cache::flush();

        return back()->with('status', 'Pengaturan website berhasil diperbarui.');
    }
}
