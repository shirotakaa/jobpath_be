<?php

namespace App\Http\Controllers;
use App\Models\Pekerjaan;
use App\Models\Pelamar;
use App\Models\Siswa;
use App\Models\Faq;
use App\Models\Perusahaan;
use App\Models\JejakAlumni;
use App\Models\Identitas;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function daftarPekerjaan()
    {
        $pekerjaan = Pekerjaan::with('perusahaan')->where('status', 'Available')->get();
        $identitas = Identitas::first();
        $categories = Pekerjaan::select('kategori')->distinct()->pluck('kategori');

        return view('user.daftar-pekerjaan', compact('pekerjaan', 'identitas', 'categories'));
    }


    public function detailPekerjaan($judul_pekerjaan)
    {
        $pekerjaan = Pekerjaan::where('judul_pekerjaan', $judul_pekerjaan)->firstOrFail();
        $identitas = Identitas::first();

        // Pastikan $pekerjaan memiliki id_siswa
        if ($pekerjaan->id_siswa) {
            $siswa = Siswa::find($pekerjaan->id_siswa);
        } else {
            $siswa = null; // Atau handle sesuai kebutuhan
        }

        return view('user.detail-pekerjaan', compact('pekerjaan', 'siswa', 'identitas'));
    }

    public function jejakAlumni()
    {
        $identitas = Identitas::first();
        $alumni = JejakAlumni::where('status', true)->get();
        return view('user.jejak-alumni', compact('identitas', 'alumni'));
    }

    public function faqUser()
    {
        $identitas = Identitas::first();
        $faqs = Faq::all();
        $faqContent = \App\Models\FaqContent::latest()->first(); // Mengambil data terbaru dari tabel
        return view('user.faq-user', compact('identitas', 'faqs', 'faqContent'));
    }

    public function saveJob()
    {
        $identitas = Identitas::first();
        return view('user.profile-save-job', compact('identitas'));
    }

    public function changePw()
    {
        $identitas = Identitas::first();
        return view('user.profile-change-pw', compact('identitas'));
    }

    public function perusahaan()
    {
        $identitas = Identitas::first();
        $perusahaan = Perusahaan::select('perusahaan.*')
            ->selectSub(function ($query) {
                $query->from('pekerjaan')
                    ->whereColumn('pekerjaan.id_perusahaan', 'perusahaan.id_perusahaan')
                    ->where('pekerjaan.status', 'Available') // Hanya pekerjaan dengan status Available
                    ->selectRaw('COUNT(*)');
            }, 'jumlah_lowongan') // Alias untuk jumlah pekerjaan yang tersedia
            ->paginate(8); // Pagination dengan 8 perusahaan per halaman
        return view('user.perusahaan', compact('identitas', 'perusahaan'));
    }

    public function jejakAlumniForm()
    {
        $identitas = Identitas::first();
        return view('user.jejak-alumni-form', compact('identitas'));
    }

    public function profil()
    {
        $identitas = Identitas::first();
        return view('user.profile', compact('identitas'));
    }

    public function landing()
    {
        $identitas = Identitas::first();
        return view('perusahaan.pages.company-landing', compact('identitas'));
    }

    // public function guestlanding()
    // {
    //     return view('guest.index-perusahaan');
    // }

    public function job()
    {
        // Periksa apakah ada perusahaan yang sedang login
        if (!auth()->guard('perusahaan')->check()) {
            return redirect()->route('login-perusahaan')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil data perusahaan yang sedang login
        $perusahaan = auth()->guard('perusahaan')->user();

        // Ambil pekerjaan yang dimiliki oleh perusahaan tersebut
        $pekerjaan = \App\Models\Pekerjaan::where('id_perusahaan', $perusahaan->id_perusahaan)->get();

        return view('perusahaan.pages.company-job', compact('pekerjaan'));
    }


    public function pelamar()
    {
        if (!auth()->guard('perusahaan')->check()) {
            return redirect()->route('login-perusahaan')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $idPerusahaan = auth()->guard('perusahaan')->user()->id_perusahaan;

        $pelamar = Pelamar::where('id_perusahaan', $idPerusahaan)
            ->with(['pekerjaan', 'siswa'])
            ->get();

        return view('perusahaan.pages.company-pelamar', compact('pelamar'));
    }

    public function lamaran()
    {
        $identitas = Identitas::first();
        $lamaran = Pelamar::join('pekerjaan', 'pelamar.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
            ->join('perusahaan', 'pekerjaan.id_perusahaan', '=', 'perusahaan.id_perusahaan')
            ->select(
                'pelamar.*',
                'pekerjaan.judul_pekerjaan',
                'pekerjaan.deadline',
                'pekerjaan.lokasi',
                'pekerjaan.kategori',
                'pekerjaan.rentang_gaji',
                'pekerjaan.about_job',
                'pekerjaan.detail_pekerjaan',
                'perusahaan.nama_perusahaan'
            )
            ->get();

        return view('user.lamaran', compact('lamaran', 'identitas'));
    }

    public function addjob()
    {
        return view('perusahaan.pages.company-add-job');
    }

    public function profile()
    {
        return view('perusahaan.pages.company-profile');
    }

    public function PwChange()
    {
        return view('perusahaan.pages.company-change-pw');
    }

    public function faqCompany()
    {
        return view('perusahaan.pages.company-faq');
    }
}   