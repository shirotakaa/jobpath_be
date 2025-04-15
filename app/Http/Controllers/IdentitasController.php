<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use App\Models\Identitas;
use App\Models\JejakAlumni;
use App\Models\Faq;
use App\Models\PerusahaanContent;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class IdentitasController extends Controller
{
    public function index()
    {
        // Menampilkan halaman pengaturan identitas di admin dengan mengambil data identitas pertama
        $identitas = Identitas::first();
        return view('admin.pages.pengaturan-identitas', compact('identitas'));
    }
    
    public function guestIndex()
    {
        // Mengecek apakah pengguna sudah login, jika iya redirect ke halaman sesuai role
        // Jika belum login, menampilkan halaman landing guest utama
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
    
        $alumni = JejakAlumni::where('tampilkan_di_landing', true)->get();
        $hero = \App\Models\HeroLanding::latest()->first(); // Mengambil data terbaru hero landing
    
        return view('guest.index', compact('identitas', 'perusahaan', 'alumni', 'hero'));
    }
    
    public function guestPerusahaan()
    {
        // Menampilkan halaman list perusahaan di landing page guest
        // Redirect jika user sudah login
        $identitas = Identitas::first();
        $perusahaan = Perusahaan::select('perusahaan.*')
            ->selectSub(function ($query) {
                $query->from('pekerjaan')
                    ->whereColumn('pekerjaan.id_perusahaan', 'perusahaan.id_perusahaan')
                    ->where('pekerjaan.status', 'Available')
                    ->selectRaw('COUNT(*)');
            }, 'jumlah_lowongan')
            ->orderByDesc('created_at')
            ->get();
    
        return view('guest.list-perusahaan', compact('identitas', 'perusahaan'));
    }
    
    public function guestJejakAlumni(Request $request)
    {
        // Menampilkan halaman jejak alumni di landing page guest
        // Jika permintaan via AJAX, hanya kembalikan bagian alumni
        $identitas = Identitas::first();
        $alumni = JejakAlumni::where('status', 'Approved')->orderBy('created_at', 'desc')->get();
    
        if ($request->ajax()) {
            return response()->json([
                'html' => view('guest.jejak-alumni')->with('alumni', $alumni)->renderSections()['alumni']
            ]);
        }
    
        return view('guest.guest-jejak-alumni', compact('identitas', 'alumni'));
    }
    
    public function guestFaq()
    {
        // Menampilkan halaman FAQ untuk guest
        // Redirect jika user sudah login
        $identitas = Identitas::first();
        $faqs = Faq::all();
        $faqContent = \App\Models\FaqContent::latest()->first(); // Ambil konten FAQ terbaru
        return view('guest.guest-faq', compact('identitas', 'faqContent', 'faqs'));
    }
    
    public function PerusahaanGuest()
    {
        // Menampilkan landing page khusus perusahaan (guest)
        $identitas = Identitas::first();
        $perusahaanContent = PerusahaanContent::first();
        return view('guest.index-perusahaan', compact('identitas', 'perusahaanContent'));
    }
    
    public function PerusahaanFaq()
    {
        // Menampilkan halaman FAQ untuk perusahaan guest
        $identitas = Identitas::first();
        $faqs = Faq::all();
        $faqContent = \App\Models\FaqContent::latest()->first(); // Ambil konten FAQ terbaru
        return view('guest.faq-perusahaan', compact('identitas', 'faqContent', 'faqs'));
    }
    
    // public function guest()
    // {
    //     // Fungsi yang dikomentari untuk menampilkan halaman jejak alumni guest (tidak digunakan)
    // }
    
    public function edit()
    {
        // Menampilkan halaman form edit pengaturan identitas
        $identitas = Identitas::first();
        return view('admin.pages.pengaturan-identitas', compact('identitas'));
    }
    
    public function update(Request $request)
    {
        // Memproses update data identitas termasuk upload logo
        $identitas = Identitas::first();
    
        Log::info('Request Data:', $request->all());
    
        $request->validate([
            'logo_light' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'logo_dark' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'nama' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
            'deskripsi' => 'required|string|max:350',
            'instagram' => 'nullable|url',
            'youtube' => 'nullable|url',
            'facebook' => 'nullable|url',
            'tiktok' => 'nullable|url',
            'whatsapp' => 'nullable|url',
            'email' => 'nullable|email|max:255',
        ]);
    
        if ($request->hasFile('logo_light')) {
            if ($identitas->logo_light) {
                Storage::disk('public')->delete($identitas->logo_light);
            }
            $path_light = $request->file('logo_light')->store('assets/admin/media/identitas', 'public');
        } else {
            $path_light = $identitas->logo_light;
        }
    
        if ($request->hasFile('logo_dark')) {
            if ($identitas->logo_dark) {
                Storage::disk('public')->delete($identitas->logo_dark);
            }
            $path_dark = $request->file('logo_dark')->store('assets/admin/media/identitas', 'public');
        } else {
            $path_dark = $identitas->logo_dark;
        }
    
        $identitas->update([
            'logo_light' => $path_light,
            'logo_dark' => $path_dark,
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'deskripsi' => $request->deskripsi,
            'instagram' => $request->instagram,
            'youtube' => $request->youtube,
            'facebook' => $request->facebook,
            'tiktok' => $request->tiktok,
            'whatsapp' => $request->whatsapp,
            'email' => $request->email,
        ]);
    
        Log::info('Updated Identitas:', $identitas->toArray());
        Log::info('Session Success:', ['message' => session('success')]);
    
        return redirect()->back()->with('success', 'Data berhasil diperbarui.');
    }
    
}
