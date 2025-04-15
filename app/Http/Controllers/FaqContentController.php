<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqContent;
use App\Models\Faq;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class FaqContentController extends Controller
{
    // Fungsi index ini tidak digunakan karena sudah digantikan oleh FaqController
    // public function index()
    // {
    //     $faqContent = FaqContent::first();
    //     $faqs = Faq::all();
    //     return view('admin.pages.faq', compact('faqContent', 'faqs'));
    // }

    // Fungsi untuk memperbarui konten FAQ (gambar dan deskripsi)
    public function update(Request $request, FaqContent $faqContent)
    {
        // Mencatat semua data request ke log untuk keperluan debugging
        Log::info('Request Data:', $request->all());
    
        // Validasi data input dari form
        $request->validate([
            'asset_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Gambar 1 (opsional)
            'asset_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Gambar 2 (opsional)
            'asset_3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Gambar 3 (opsional)
            'deskripsi' => 'required|string', // Deskripsi wajib diisi
        ]);
    
        // Jika file asset_1 diupload, hapus file lama dan simpan yang baru
        if ($request->hasFile('asset_1')) {
            if ($faqContent->asset_1) {
                Storage::disk('public')->delete($faqContent->asset_1);
            }
            $path = $request->file('asset_1')->store('assets/admin/media/faq', 'public');
        } else {
            // Jika tidak ada file baru, gunakan path lama
            $path = $faqContent->asset_1;
        }
    
        // Proses yang sama untuk file asset_2
        if ($request->hasFile('asset_2')) {
            if ($faqContent->asset_2) {
                Storage::disk('public')->delete($faqContent->asset_2);
            }
            $path2 = $request->file('asset_2')->store('assets/admin/media/faq', 'public');
        } else {
            $path2 = $faqContent->asset_2;
        }
    
        // Proses yang sama untuk file asset_3
        if ($request->hasFile('asset_3')) {
            if ($faqContent->asset_3) {
                Storage::disk('public')->delete($faqContent->asset_3);
            }
            $path3 = $request->file('asset_3')->store('assets/admin/media/faq', 'public');
        } else {
            $path3 = $faqContent->asset_3;
        }
    
        // Memperbarui data faqContent dengan path gambar dan deskripsi baru
        $faqContent->update([
            'asset_1' => $path,
            'asset_2' => $path2,
            'asset_3' => $path3,
            'deskripsi' => $request->deskripsi,
        ]);
    
        // Mencatat data yang telah diperbarui ke log untuk debugging
        Log::info('Updated FaqContent:', $faqContent->toArray());
    
        // Redirect ke halaman FAQ dengan pesan sukses
        return redirect()->route('faq.index')->with('success', 'Data berhasil diperbarui.');
    }
}
