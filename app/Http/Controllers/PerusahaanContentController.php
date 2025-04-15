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
        // Logging data request yang diterima untuk tujuan debugging
        Log::info('Request Data:', $request->all());

        // Validasi input form
        $request->validate([
            // Validasi untuk asset_1 (file gambar, maksimal 2MB, tipe file jpeg/png/jpg)
            'asset_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // Validasi untuk asset_2 (file gambar, maksimal 2MB, tipe file jpeg/png/jpg)
            'asset_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // Validasi untuk asset_3 (file gambar, maksimal 2MB, tipe file jpeg/png/jpg)
            'asset_3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            // Validasi untuk judul_perusahaan (wajib diisi, string maksimal 50 karakter)
            'judul_perusahaan' => 'required|string|max:50',
            // Validasi untuk deskripsi_perusahaan (wajib diisi, string maksimal 300 karakter)
            'deskripsi_perusahaan' => 'required|string|max:300',
        ]);

        // Ambil data perusahaan berdasarkan ID
        $perusahaanContent = PerusahaanContent::findOrFail($id);

        // Proses untuk memperbarui asset_1 jika ada file baru
        if ($request->hasFile('asset_1')) {
            // Jika sebelumnya ada file, hapus file lama
            if ($perusahaanContent->asset_1) {
                Storage::disk('public')->delete($perusahaanContent->asset_1);
            }
            // Simpan file baru ke storage dan dapatkan pathnya
            $path1 = $request->file('asset_1')->store('assets/admin/media/PerusahaanContent', 'public');
        } else {
            // Jika tidak ada file baru, pertahankan path lama
            $path1 = $perusahaanContent->asset_1;
        }

        // Proses untuk memperbarui asset_2 jika ada file baru
        if ($request->hasFile('asset_2')) {
            // Jika sebelumnya ada file, hapus file lama
            if ($perusahaanContent->asset_2) {
                Storage::disk('public')->delete($perusahaanContent->asset_2);
            }
            // Simpan file baru ke storage dan dapatkan pathnya
            $path2 = $request->file('asset_2')->store('assets/admin/media/PerusahaanContent', 'public');
        } else {
            // Jika tidak ada file baru, pertahankan path lama
            $path2 = $perusahaanContent->asset_2;
        }

        // Proses untuk memperbarui asset_3 jika ada file baru
        if ($request->hasFile('asset_3')) {
            // Jika sebelumnya ada file, hapus file lama
            if ($perusahaanContent->asset_3) {
                Storage::disk('public')->delete($perusahaanContent->asset_3);
            }
            // Simpan file baru ke storage dan dapatkan pathnya
            $path3 = $request->file('asset_3')->store('assets/admin/media/PerusahaanContent', 'public');
        } else {
            // Jika tidak ada file baru, pertahankan path lama
            $path3 = $perusahaanContent->asset_3;
        }

        // Update data perusahaan di database dengan data baru
        $perusahaanContent->update([
            'asset_1' => $path1, // Path untuk asset_1
            'asset_2' => $path2, // Path untuk asset_2
            'asset_3' => $path3, // Path untuk asset_3
            'judul_perusahaan' => $request->judul_perusahaan, // Judul perusahaan
            'subtitle_perusahaan' => $request->deskripsi_perusahaan, // Deskripsi perusahaan
        ]);

        // Logging data perusahaan yang telah diperbarui untuk tujuan debugging
        Log::info('Updated PerusahaanContent:', $perusahaanContent->toArray());

        // Redirect kembali dengan pesan sukses
        return redirect()->back()->with('success', 'Data berhasil diperbarui!');
    }
}
