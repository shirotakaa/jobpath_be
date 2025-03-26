<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroLanding;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class HeroLandingController extends Controller
{
    public function index()
    {
        $heroLanding = HeroLanding::first();
        return view('admin.pages.hero-landing', compact('heroLanding'));
    }

    public function update(Request $request, HeroLanding $heroLanding)
    {
        Log::info('Request Data:', $request->all());

        $request->validate([
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'judul_hero' => 'required|string|max:50',
            'subtitle_hero' => 'required|string|max:120',
        ]);

        if ($request->hasFile('background_image')) {
            if ($heroLanding->background_image) {
                Storage::disk('public')->delete($heroLanding->background_image);
            }
            $path = $request->file('background_image')->store('assets/admin/media/hero', 'public');
        } else {
            $path = $heroLanding->background_image;
        }

        $heroLanding->update([
            'background_image' => $path,
            'judul_hero' => $request->judul_hero,
            'subtitle_hero' => $request->subtitle_hero,
        ]);

        Log::info('Updated HeroLanding:', $heroLanding->toArray());

        return redirect()->route('hero-landing.index')->with('success', 'Data berhasil diperbarui.');
    }
}