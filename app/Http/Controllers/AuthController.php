<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Identitas;
use App\Models\Perusahaan;
use App\Models\JejakAlumni;
use App\Models\Pekerjaan;
use App\Models\Siswa;
use App\Models\PerusahaanContent;
use App\Models\HeroLanding;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AuthController extends Controller
{
    public function signIn()
    {
        if (Auth::guard('siswa')->check()) {
            return redirect('/index');
        }

        if (Auth::guard('perusahaan')->check()) {
            return redirect('/company-landing');
        }

        if (Auth::guard('admin')->check()) {
            return redirect('/dashboard');
        }
        return view('admin.auth.sign-in');
    }

    public function index()
    {
        $identitas = Identitas::first();

        $perusahaan = Perusahaan::where('tampilkan_di_landing', true)
            ->select('perusahaan.*')
            ->selectSub(function ($query) {
                $query->from('pekerjaan')
                    ->whereColumn('pekerjaan.id_perusahaan', 'perusahaan.id_perusahaan')
                    ->where('pekerjaan.status', 'Available')
                    ->selectRaw('COUNT(*)');
            }, 'jumlah_lowongan')
            ->get();

        $kategoriPekerjaan = Pekerjaan::where('status', 'Available')
            ->select('kategori')
            ->distinct()
            ->get()
            ->map(function ($item) {
                return [
                    'nama' => $item->kategori,
                    'jumlah' => Pekerjaan::where('status', 'Available')
                        ->where('kategori', $item->kategori)
                        ->count(),
                ];
            });

        // Ambil semua kategori unik
        $categories = Pekerjaan::where('status', 'Available')
            ->select('kategori')
            ->distinct()
            ->pluck('kategori');

        // Ambil maksimal 6 pekerjaan untuk setiap kategori
        $pekerjaanPerKategori = [];
        foreach ($categories as $kategori) {
            $pekerjaanPerKategori[$kategori] = Pekerjaan::where('status', 'Available')
                ->where('kategori', $kategori)
                ->with('perusahaan')
                ->orderBy('created_at', 'desc')
                ->take(6)
                ->get();
        }

        $alumni = JejakAlumni::where('tampilkan_di_landing', true)->get();
        $hero = \App\Models\HeroLanding::latest()->first();

        return view('user.index', compact(
            'identitas',
            'perusahaan',
            'alumni',
            'hero',
            'kategoriPekerjaan',
            'categories',
            'pekerjaanPerKategori'
        ));
    }


    public function loginAdmin(Request $request)
    {
        $credentials = $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        if (Auth::guard('admin')->attempt($credentials)) {
            $request->session()->regenerate();
            return response()->json([
                'success' => true,
                'message' => 'Login berhasil!',
                'redirect' => route('dashboard')
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Email atau password salah. Silakan coba lagi.'
        ], 401);
    }


    public function loginSiswa(Request $request)
    {
        $request->validate([
            'nis' => 'required|string',
            'password' => 'required|string',
        ]);

        $siswa = Siswa::where('nis', $request->nis)->first();

        if (!$siswa) {
            return back()->with('login_error', 'NIS yang Anda masukkan salah');
        }

        if (!Hash::check($request->password, $siswa->password)) {
            return back()->with('login_error', 'Password yang Anda masukkan salah');
        }

        Auth::guard('siswa')->login($siswa);
        return redirect()->back()->with('login_success', true);
    }

    public function showLoginFormPerusahaan()
    {
        return view('perusahaan.auth.login-perusahaan');
    }

    public function loginPerusahaan(Request $request)
    {
        $request->validate([
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        $credentials = $request->only('email', 'password');

        if (Auth::guard('perusahaan')->attempt($credentials)) {
            $request->session()->regenerate();
            return redirect()->intended(route('company.landing'));
        }

        return back()->withErrors([
            'email' => 'Email atau password salah. Silakan coba lagi.',
        ]);
    }

    public function userlogout(Request $request)
    {
        Auth::guard('siswa')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('guest.index')->with('success', 'Logout berhasil.');
    }

    public function perusahaanlogout(Request $request)
    {
        Auth::guard('siswa')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('guest.index')->with('success', 'Logout berhasil.');
    }

    public function logout(Request $request)
    {
        Auth::guard('admin')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('guest.index')->with('success', 'Logout berhasil.');
    }
}
