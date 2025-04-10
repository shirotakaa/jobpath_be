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
    public function edit()
    {
        $company = Auth::guard('perusahaan')->user();
        return view('perusahaan.pages.company-profile', compact('company'));
    }

    public function update(Request $request)
    {
        $company = Auth::guard('perusahaan')->user();

        $request->validate([
            'logo' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'email' => [
                'required',
                'email',
                Rule::unique('perusahaan')->ignore($company->id_perusahaan, 'id_perusahaan'),
            ],
            'nomor_telepon' => 'nullable|string|max:15',
            'nama_perusahaan' => 'nullable|string|max:255',
            'jenis_perusahaan' => 'nullable|string|max:255',
            'alamat' => 'nullable|string|max:255',
            'password_lama' => 'nullable|required_with:password_baru',
            'password_baru' => 'nullable|required_with:password_lama',
            'konfirmasi_password_baru' => 'nullable|same:password_baru',
        ]);

        if ($request->hasFile('logo')) {
            if ($company->logo) {
                Storage::delete(str_replace('/storage', 'public', $company->logo));
            }
            $path = $request->file('logo')->store('perusahaan', 'public');
            $company->logo = Storage::url($path);
        }

        $company->email = $request->email;
        $company->nama_perusahaan = $request->nama_perusahaan;
        $company->jenis_perusahaan = $request->jenis_perusahaan;
        $company->nomor_telepon = $request->nomor_telepon;
        $company->alamat = $request->alamat;

        if ($request->filled('password_lama')) {
            if (!Hash::check($request->password_lama, $company->password)) {
                return back()->with('error', 'Password lama salah!');
            }
            $company->password = Hash::make($request->password_baru);
        }        

        $company->save();

        return redirect()->route('companyprofile')->with('success', 'Profil perusahaan berhasil diperbarui.');
    }
}
