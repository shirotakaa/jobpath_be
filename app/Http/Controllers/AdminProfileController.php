<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    // Menampilkan halaman profil admin dengan informasi admin yang sedang login
    public function index()
    {
        // Mengambil data admin yang sedang login menggunakan guard 'admin'
        $admin = auth()->guard('admin')->user();
        // Mengembalikan tampilan profil admin dengan data admin
        return view('admin.pages.profil', compact('admin'));
    }
    
    // Menampilkan halaman edit profil untuk admin dengan informasi admin yang sedang login
    public function edit()
    {
        // Mengambil data admin yang sedang login menggunakan guard 'admin'
        $admin = auth()->guard('admin')->user();
        // Mengembalikan tampilan edit profil admin dengan data admin
        return view('admin.pages.edit-profil', compact('admin'));
    }
    
    // Memperbarui data profil admin, termasuk nama, email, nomor, avatar, dan password
    public function update(Request $request)
    {
        // Mengambil data admin yang sedang login menggunakan guard 'admin'
        $admin = auth()->guard('admin')->user();
    
        // Validasi input yang diterima dari form
        $request->validate([
            'nama_depan' => 'nullable|string|max:255',
            'nama_belakang' => 'nullable|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'nomor' => 'required|string|max:15',
            'avatar' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'currentpassword' => 'nullable|string|min:8',
            'newpassword' => 'nullable|string|min:8|confirmed',
        ]);
    
        // Jika ada file avatar yang diupload, lakukan proses penyimpanan dan hapus avatar lama jika ada
        if ($request->hasFile('avatar')) {
            if ($admin->avatar) {
                // Menghapus file avatar lama dari storage jika ada
                Storage::disk('public')->delete($admin->avatar);
            }
            // Menyimpan file avatar baru di direktori 'avatars' di public storage
            $path_avatar = $request->file('avatar')->store('avatars', 'public');
            // Menyimpan path file avatar ke dalam data admin
            $admin->avatar = $path_avatar;
        }
    
        // Jika password lama dan baru diisi, periksa kecocokan password lama dan perbarui password jika valid
        if ($request->filled('currentpassword') && $request->filled('newpassword')) {
            if (Hash::check($request->currentpassword, $admin->password)) {
                // Mengubah password admin ke password baru yang di-hash
                $admin->password = Hash::make($request->newpassword);
            } else {
                // Jika password lama tidak sesuai, kembalikan ke halaman sebelumnya dengan error message
                return redirect()->back()->withErrors(['currentpassword' => 'Password lama tidak sesuai']);
            }
        }
    
        // Memperbarui data admin lainnya (nama depan, nama belakang, username, email, dan nomor)
        $admin->nama_depan = $request->nama_depan;
        $admin->nama_belakang = $request->nama_belakang;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->nomor = $request->nomor;
        // Menyimpan perubahan data admin ke dalam database
        $admin->save();
    
        // Mengarahkan kembali ke halaman profil admin dengan pesan sukses
        return redirect()->route('admin.profil')->with('success', 'Profil berhasil diperbarui');
    }
}
