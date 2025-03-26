<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PerusahaanContent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class PerusahaanContentController extends Controller
{
    public function update(Request $request, $id)
    {
        Log::info('Request Data:', $request->all());

        // Validasi input form
        $request->validate([
            'asset_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'asset_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'asset_3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'judul_perusahaan' => 'required|string|max:50',
            'deskripsi_perusahaan' => 'required|string|max:300', // Sesuai dengan form
        ]);

        // Ambil data berdasarkan ID
        $perusahaanContent = PerusahaanContent::findOrFail($id);

        // Update asset_1 jika ada file baru
        if ($request->hasFile('asset_1')) {
            if ($perusahaanContent->asset_1) {
                Storage::disk('public')->delete($perusahaanContent->asset_1);
            }
            $path1 = $request->file('asset_1')->store('assets/admin/media/PerusahaanContent', 'public');
        } else {
            $path1 = $perusahaanContent->asset_1;
        }

        // Update asset_2 jika ada file baru
        if ($request->hasFile('asset_2')) {
            if ($perusahaanContent->asset_2) {
                Storage::disk('public')->delete($perusahaanContent->asset_2);
            }
            $path2 = $request->file('asset_2')->store('assets/admin/media/PerusahaanContent', 'public');
        } else {
            $path2 = $perusahaanContent->asset_2;
        }

        // Update asset_3 jika ada file baru
        if ($request->hasFile('asset_3')) {
            if ($perusahaanContent->asset_3) {
                Storage::disk('public')->delete($perusahaanContent->asset_3);
            }
            $path3 = $request->file('asset_3')->store('assets/admin/media/PerusahaanContent', 'public');
        } else {
            $path3 = $perusahaanContent->asset_3;
        }

        // Update data di database
        $perusahaanContent->update([
            'asset_1' => $path1,
            'asset_2' => $path2,
            'asset_3' => $path3,
            'judul_perusahaan' => $request->judul_perusahaan,
            'subtitle_perusahaan' => $request->deskripsi_perusahaan, // Disesuaikan dengan form
        ]);

        Log::info('Updated PerusahaanContent:', $perusahaanContent->toArray());

        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }
}
