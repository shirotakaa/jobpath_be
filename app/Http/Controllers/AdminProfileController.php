<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class AdminProfileController extends Controller
{
    public function index()
    {
        $admin = auth()->guard('admin')->user();
        return view('admin.pages.profil', compact('admin'));
    }
    
    public function edit()
    {
        $admin = auth()->guard('admin')->user();
        return view('admin.pages.edit-profil', compact('admin'));
    }
    
    public function update(Request $request)
    {
        $admin = auth()->guard('admin')->user();
    
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
    
        if ($request->hasFile('avatar')) {
            if ($admin->avatar) {
                Storage::disk('public')->delete($admin->avatar);
            }
            $path_avatar = $request->file('avatar')->store('avatars', 'public');
            $admin->avatar = $path_avatar;
        }
    
        if ($request->filled('currentpassword') && $request->filled('newpassword')) {
            if (Hash::check($request->currentpassword, $admin->password)) {
                $admin->password = Hash::make($request->newpassword);
            } else {
                return redirect()->back()->withErrors(['currentpassword' => 'Password lama tidak sesuai']);
            }
        }
    
        $admin->nama_depan = $request->nama_depan;
        $admin->nama_belakang = $request->nama_belakang;
        $admin->username = $request->username;
        $admin->email = $request->email;
        $admin->nomor = $request->nomor;
        $admin->save();
    
        return redirect()->route('admin.profil')->with('success', 'Profil berhasil diperbarui');
    }
}
