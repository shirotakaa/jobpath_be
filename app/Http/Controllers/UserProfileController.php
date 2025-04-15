<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use App\Models\Siswa;

class UserProfileController extends Controller
{
    // Menampilkan halaman untuk mengedit profil pengguna
    public function edit()
    {
        // Ambil data user yang sedang login
        $user = Auth::guard('siswa')->user();

        // Mengembalikan tampilan edit profil dengan data user
        return view('user.profile', compact('user'));
    }

    // Menangani pembaruan profil pengguna
    public function update(Request $request)
    {
        // Ambil data user yang sedang login
        $user = Auth::guard('siswa')->user();

        // Validasi input dari form
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048', // Validasi foto (optional, max 2MB)
            'email' => [
                'required',
                'email',
                Rule::unique('siswa')->ignore($user->id_siswa, 'id_siswa'), // Validasi email, kecuali email yang sedang dipakai
            ],
            'kata_sandi_lama' => 'nullable|required_with:kata_sandi_baru', // Validasi kata sandi lama jika ada kata sandi baru
            'kata_sandi_baru' => 'nullable|required_with:kata_sandi_lama', // Validasi kata sandi baru jika kata sandi lama ada
            'konfirmasi_kata_sandi_baru' => 'nullable|same:kata_sandi_baru', // Validasi konfirmasi kata sandi baru
        ]);

        // Update Foto Profil jika ada foto baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto); // Hapus foto lama dari penyimpanan
            }

            // Simpan foto baru di folder 'siswa' dan disk 'public'
            $foto = $request->file('foto')->store('siswa', 'public');

            // Menyimpan path foto yang baru ke database
            $user->foto = asset('storage/' . $foto); // Perbaikan: Menggunakan `asset()` untuk mendapatkan URL foto
        }

        // Update Email
        $user->email = $request->email;

        // Update Password jika ada perubahan
        if ($request->filled('kata_sandi_lama')) {
            // Periksa apakah kata sandi lama cocok dengan yang ada di database
            if (!Hash::check($request->kata_sandi_lama, $user->password)) {
                return back()->withErrors(['kata_sandi_lama' => 'Password lama salah!']); // Menampilkan error jika kata sandi lama salah
            }

            // Hash dan simpan kata sandi baru
            $user->password = Hash::make($request->kata_sandi_baru);
        }

        // Simpan perubahan profil ke database
        $user->save();

        // Redirect kembali ke halaman profil dengan pesan sukses
        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
