<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Perusahaan;

class CompanyProfileController extends Controller
{
    // Menampilkan halaman profil perusahaan yang sedang login
    public function edit()
    {
        // Mengambil data perusahaan yang sedang login menggunakan guard 'perusahaan'
        $company = Auth::guard('perusahaan')->user();
        // Mengembalikan tampilan profil perusahaan dengan data perusahaan
        return view('perusahaan.pages.company-profile', compact('company'));
    }

    // Memperbarui data profil perusahaan, termasuk logo, email, nomor telepon, nama perusahaan, dan password
    public function update(Request $request)
    {
        // Mengambil data perusahaan yang sedang login menggunakan guard 'perusahaan'
        $company = Auth::guard('perusahaan')->user();

        // Validasi input yang diterima dari form
        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi logo (opsional, tipe gambar, ukuran maksimal)
            'email' => [
                'required', // Email wajib diisi
                'email', // Format email harus valid
                Rule::unique('perusahaan')->ignore($company->id_perusahaan, 'id_perusahaan'), // Email harus unik kecuali untuk perusahaan yang sama
            ],
            'nomor_telepon' => 'nullable|string|max:15', // Nomor telepon opsional dengan panjang maksimal 15 karakter
            'nama_perusahaan' => 'nullable|string|max:255', // Nama perusahaan opsional dengan panjang maksimal 255 karakter
            'jenis_perusahaan' => 'nullable|string|max:255', // Jenis perusahaan opsional dengan panjang maksimal 255 karakter
            'alamat' => 'nullable|string|max:255', // Alamat opsional dengan panjang maksimal 255 karakter
            'password_lama' => 'nullable|required_with:password_baru', // Password lama opsional, jika password baru diisi
            'password_baru' => 'nullable|required_with:password_lama', // Password baru opsional, jika password lama diisi
            'konfirmasi_password_baru' => 'nullable|same:password_baru', // Konfirmasi password baru harus sama dengan password baru
        ]);

        // Jika ada file logo yang diupload, lakukan proses penyimpanan dan hapus logo lama jika ada
        if ($request->hasFile('logo')) {
            // Menghapus file logo lama dari storage jika ada
            if ($company->logo) {
                Storage::delete(str_replace('/storage', 'public', $company->logo));
            }
            // Menyimpan file logo baru di direktori 'perusahaan' di public storage
            $path = $request->file('logo')->store('perusahaan', 'public');
            // Menyimpan URL logo ke dalam data perusahaan
            $company->logo = Storage::url($path);
        }

        // Memperbarui data perusahaan lainnya (email, nama perusahaan, jenis perusahaan, nomor telepon, alamat)
        $company->email = $request->email;
        $company->nama_perusahaan = $request->nama_perusahaan;
        $company->jenis_perusahaan = $request->jenis_perusahaan;
        $company->nomor_telepon = $request->nomor_telepon;
        $company->alamat = $request->alamat;

        // Jika password lama diisi, periksa kecocokan password lama dan perbarui password jika valid
        if ($request->filled('password_lama')) {
            if (!Hash::check($request->password_lama, $company->password)) {
                // Jika password lama tidak sesuai, kembalikan ke halaman sebelumnya dengan pesan error
                return back()->with('error', 'Password lama salah!');
            }
            // Mengubah password perusahaan ke password baru yang di-hash
            $company->password = Hash::make($request->password_baru);
        }        

        // Menyimpan perubahan data perusahaan ke dalam database
        $company->save();

        // Mengarahkan kembali ke halaman profil perusahaan dengan pesan sukses
        return redirect()->route('companyprofile')->with('success', 'Profil perusahaan berhasil diperbarui.');
    }
}
