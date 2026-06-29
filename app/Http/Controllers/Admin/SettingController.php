<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\SettingRequest;
use App\Models\Setting;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\View\View;

class SettingController extends Controller
{
    public function edit(): View
    {
        return view('admin.settings.index', [
            'title' => 'Settings',
            'subtitle' => 'Identitas situs, kontak CTA (WhatsApp/email), dan media sosial.',
            'settings' => Setting::publicValues(),
        ]);
    }

    public function update(SettingRequest $request): RedirectResponse
    {
        $data = $request->validated();

        foreach (Setting::IMAGE_KEYS as $imageKey) {
            if (! $request->hasFile($imageKey)) {
                continue;
            }
            $old = Setting::get($imageKey);
            if ($old && ! str_starts_with($old, 'http')) {
                Storage::disk('public')->delete($old);
            }
            Setting::put($imageKey, $request->file($imageKey)->store('settings', 'public'));
        }

        foreach (Setting::TEXT_KEYS as $key) {
            Setting::put($key, $data[$key] ?? null);
        }

        return redirect()->route('admin.settings.edit')->with('success', 'Settings berhasil disimpan.');
    }
}
