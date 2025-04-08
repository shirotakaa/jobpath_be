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
    public function edit()
    {
        $user = Auth::guard('siswa')->user();
        return view('user.profile', compact('user'));
    }

    public function update(Request $request)
    {
        $user = Auth::guard('siswa')->user(); // Ambil data user yang login

        // Validasi input
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'email' => [
                'required',
                'email',
                Rule::unique('siswa')->ignore($user->id_siswa, 'id_siswa'),
            ],
            'kata_sandi_lama' => 'nullable|required_with:kata_sandi_baru',
            'kata_sandi_baru' => 'nullable|required_with:kata_sandi_lama',
            'konfirmasi_kata_sandi_baru' => 'nullable|same:kata_sandi_baru',
        ]);


        // Update Foto Profil
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if ($user->foto) {
                Storage::disk('public')->delete($user->foto);
            }

            // Simpan foto baru
            $foto = $request->file('foto')->store('siswa', 'public');
            $user->foto = asset('storage/' . $foto); // Ini yang salah,

        }

        // Update Email
        $user->email = $request->email;

        // Update Password (jika ada perubahan)
        if ($request->filled('kata_sandi_lama')) {
            if (!Hash::check($request->kata_sandi_lama, $user->password)) {
                return back()->withErrors(['kata_sandi_lama' => 'Password lama salah!']);
            }
            $user->password = Hash::make($request->kata_sandi_baru);
        }

        // Simpan perubahan
        $user->save();

        return redirect()->route('profile')->with('success', 'Profil berhasil diperbarui!');
    }
}
