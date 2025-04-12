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
        $identitas = Identitas::first();
        return view('admin.pages.pengaturan-identitas', compact('identitas'));
    }

    public function guestIndex()
    {
        if (Auth::guard('siswa')->check()) {
            return redirect('/index');
        }

        if (Auth::guard('perusahaan')->check()) {
            return redirect('/company-landing');
        }

        $identitas = Identitas::first();
        $perusahaan = Perusahaan::where('tampilkan_di_landing', true)
            ->select('perusahaan.*')
            ->selectSub(function ($query) {
                $query->from('pekerjaan')
                    ->whereColumn('pekerjaan.id_perusahaan', 'perusahaan.id_perusahaan')
                    ->where('pekerjaan.status', 'Available') // Hanya pekerjaan dengan status Available
                    ->selectRaw('COUNT(*)');
            }, 'jumlah_lowongan') // Alias untuk jumlah pekerjaan yang tersedia
            ->get();

        $alumni = JejakAlumni::where('tampilkan_di_landing', true)->get();
        $hero = \App\Models\HeroLanding::latest()->first(); // Mengambil data terbaru dari tabel

        return view('guest.index', compact('identitas', 'perusahaan', 'alumni', 'hero'));
    }

    public function guestPerusahaan()
    {
        if (Auth::guard('siswa')->check()) {
            return redirect('/index');
        }

        if (Auth::guard('perusahaan')->check()) {
            return redirect('/company-landing');
        }
        $identitas = Identitas::first();
        $perusahaan = Perusahaan::select('perusahaan.*')
            ->selectSub(function ($query) {
                $query->from('pekerjaan')
                    ->whereColumn('pekerjaan.id_perusahaan', 'perusahaan.id_perusahaan')
                    ->where('pekerjaan.status', 'Available') // Hanya pekerjaan dengan status Available
                    ->selectRaw('COUNT(*)');
            }, 'jumlah_lowongan') // Alias untuk jumlah pekerjaan yang tersedia
            ->paginate(8); // Pagination dengan 8 perusahaan per halaman

        return view('guest.list-perusahaan', compact('identitas', 'perusahaan'));
    }

    public function guestJejakAlumni()
    {
        if (Auth::guard('siswa')->check()) {
            return redirect('/index');
        }

        if (Auth::guard('perusahaan')->check()) {
            return redirect('/company-landing');
        }
        $identitas = Identitas::first();
        $alumni = JejakAlumni::where('status', 'Approved')->paginate(6);
        return view('guest.guest-jejak-alumni', compact('identitas', 'alumni'));
    }

    public function guestFaq()
    {
        if (Auth::guard('siswa')->check()) {
            return redirect('/index');
        }

        if (Auth::guard('perusahaan')->check()) {
            return redirect('/company-landing');
        }
        $identitas = Identitas::first();
        $faqs = Faq::all();
        $faqContent = \App\Models\FaqContent::latest()->first(); // Mengambil data terbaru dari tabel
        return view('guest.guest-faq', compact('identitas', 'faqContent', 'faqs'));
    }

    public function PerusahaanGuest()
    {
        if (Auth::guard('siswa')->check()) {
            return redirect('/index');
        }

        if (Auth::guard('perusahaan')->check()) {
            return redirect('/company-landing');
        }
        $identitas = Identitas::first();
        $perusahaanContent = PerusahaanContent::first();
        return view('guest.index-perusahaan', compact('identitas', 'perusahaanContent'));
    }

    public function PerusahaanFaq()
    {
        if (Auth::guard('siswa')->check()) {
            return redirect('/index');
        }

        if (Auth::guard('perusahaan')->check()) {
            return redirect('/company-landing');
        }
        $identitas = Identitas::first();
        $faqs = Faq::all();
        $faqContent = \App\Models\FaqContent::latest()->first(); // Mengambil data terbaru dari tabel
        return view('guest.faq-perusahaan', compact('identitas', 'faqContent', 'faqs'));
    }

    // public function guest()
    // {
    //     $identitas = Identitas::first();
    //     return view('guest.guest-jejak-alumni');
    // }

    public function edit()
    {
        $identitas = Identitas::first();
        return view('admin.pages.pengaturan-identitas', compact('identitas'));
    }

    public function update(Request $request)
    {
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
