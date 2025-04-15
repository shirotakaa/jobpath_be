<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\HeroLanding;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class HeroLandingController extends Controller
{
    // Fungsi untuk menampilkan halaman hero landing di panel admin
    public function index()
    {
        // Mengambil data hero landing pertama dari database
        $heroLanding = HeroLanding::first();

        // Menampilkan view admin.pages.hero-landing dengan data heroLanding
        return view('admin.pages.hero-landing', compact('heroLanding'));
    }

    // Fungsi untuk memperbarui data hero landing
    public function update(Request $request, HeroLanding $heroLanding)
    {
        // Menyimpan data request ke log untuk keperluan debugging
        Log::info('Request Data:', $request->all());

        // Validasi input dari form
        $request->validate([
            'background_image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Gambar background opsional
            'judul_hero' => 'required|string|max:50', // Judul wajib dan maksimal 50 karakter
            'subtitle_hero' => 'required|string|max:120', // Subtitle wajib dan maksimal 120 karakter
        ]);

        // Jika ada gambar baru yang diunggah, hapus gambar lama lalu simpan yang baru
        if ($request->hasFile('background_image')) {
            if ($heroLanding->background_image) {
                Storage::disk('public')->delete($heroLanding->background_image);
            }
            $path = $request->file('background_image')->store('assets/admin/media/hero', 'public');
        } else {
            // Jika tidak ada gambar baru, gunakan path gambar lama
            $path = $heroLanding->background_image;
        }

        // Memperbarui data hero landing dengan input baru
        $heroLanding->update([
            'background_image' => $path,
            'judul_hero' => $request->judul_hero,
            'subtitle_hero' => $request->subtitle_hero,
        ]);

        // Mencatat data hero landing yang telah diperbarui ke dalam log
        Log::info('Updated HeroLanding:', $heroLanding->toArray());

        // Redirect kembali ke halaman index dengan pesan sukses
        return redirect()->route('hero-landing.index')->with('success', 'Data berhasil diperbarui.');
    }
}
