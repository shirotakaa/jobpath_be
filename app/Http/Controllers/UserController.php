<?php

namespace App\Http\Controllers;
use App\Models\Pekerjaan;
use App\Models\Pelamar;
use App\Models\Siswa;
use App\Models\Faq;
use App\Models\Perusahaan;
use App\Models\JejakAlumni;
use App\Models\Identitas;
use App\Models\PerusahaanContent;
use Illuminate\Support\Facades\Auth;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function daftarPekerjaan(Request $request)
    {
        $query = $request->query('query');
        $kategori = $request->query('kategori');

        $pekerjaan = Pekerjaan::with('perusahaan')
            ->where('status', 'Available')
            ->when($query, function ($q) use ($query) {
                $q->where(function ($subQuery) use ($query) {
                    $subQuery->where('judul_pekerjaan', 'like', "%$query%")
                        ->orWhereHas('perusahaan', function ($q2) use ($query) {
                            $q2->where('nama_perusahaan', 'like', "%$query%");
                        });
                });
            })
            ->when($kategori, function ($q) use ($kategori) {
                $q->where('kategori', $kategori);
            })
            ->orderBy('created_at', 'desc') // <-- urutkan berdasarkan waktu pembuatan terbaru
            ->get();

        $identitas = Identitas::first();
        $categories = Pekerjaan::select('kategori')->distinct()->pluck('kategori');

        return view('user.daftar-pekerjaan', compact('pekerjaan', 'identitas', 'categories', 'query', 'kategori'));
    }

    public function detailPekerjaan($judul_pekerjaan)
    {
        $pekerjaan = Pekerjaan::with('perusahaan')->where('judul_pekerjaan', $judul_pekerjaan)->firstOrFail();
        $identitas = Identitas::first();

        // Ambil pekerjaan lain dengan kategori yang sama, tapi beda judul, urutkan dari yang terbaru
        $pekerjaanLain = Pekerjaan::with('perusahaan')
            ->where('judul_pekerjaan', '!=', $judul_pekerjaan)
            ->where('kategori', $pekerjaan->kategori)
            ->whereNotNull('judul_pekerjaan')
            ->whereHas('perusahaan')
            ->orderBy('created_at', 'desc') // <-- urutkan berdasarkan waktu pembuatan terbaru
            ->limit(3)
            ->get();

        $siswa = $pekerjaan->id_siswa ? Siswa::find($pekerjaan->id_siswa) : null;

        return view('user.detail-pekerjaan', compact('pekerjaan', 'pekerjaanLain', 'siswa', 'identitas'));
    }


    public function jejakAlumni(Request $request)
    {
        $identitas = Identitas::first();
        $alumni = JejakAlumni::where('status', 'Approved')->orderBy('created_at', 'desc')->get(); // Mengurutkan berdasarkan created_at dari terbaru

        if ($request->ajax()) {
            return response()->json([
                'html' => view('user.jejak-alumni')->with('alumni', $alumni)->renderSections()['alumni']
            ]);
        }

        return view('user.jejak-alumni', compact('identitas', 'alumni'));
    }

    public function faqUser()
    {
        $identitas = Identitas::first();
        $faqs = Faq::all();
        $faqContent = \App\Models\FaqContent::latest()->first(); // Mengambil data terbaru dari tabel
        return view('user.faq-user', compact('identitas', 'faqs', 'faqContent'));
    }

    public function saveJob(Request $request)
    {
        $identitas = Identitas::first();
        $ids = $request->query('id', []); // menangkap ?id[]=1&id[]=2

        $pekerjaanList = Pekerjaan::whereIn('id_pekerjaan', $ids)->get();
        $pekerjaan = Pekerjaan::with('perusahaan')->get(); // atau ->paginate(9) jika pakai paginasi

        return view('user.profile-save-job', compact('identitas', 'pekerjaanList', 'pekerjaan'));
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
                    ->where('pekerjaan.status', 'Available')
                    ->selectRaw('COUNT(*)');
            }, 'jumlah_lowongan')
            ->orderByDesc('created_at')         // perusahaan paling baru di sebelah kiri            
            ->get();

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
        $perusahaanContent = PerusahaanContent::first();
        return view('perusahaan.pages.company-landing', compact('identitas', 'perusahaanContent'));
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
        $identitas = Identitas::first();

        // Ambil pekerjaan terbaru milik perusahaan tersebut
        $pekerjaan = \App\Models\Pekerjaan::where('id_perusahaan', $perusahaan->id_perusahaan)
            ->orderBy('created_at', 'desc') // tampilkan yang terbaru di atas
            ->get();

        return view('perusahaan.pages.company-job', compact('pekerjaan', 'identitas', 'perusahaan'));
    }

    public function pelamar()
    {
        if (!auth()->guard('perusahaan')->check()) {
            return redirect()->route('login-perusahaan')->with('error', 'Anda harus login terlebih dahulu.');
        }

        $idPerusahaan = auth()->guard('perusahaan')->user()->id_perusahaan;
        $identitas = Identitas::first();

        $pelamar = Pelamar::where('id_perusahaan', $idPerusahaan)
            ->with(['pekerjaan', 'siswa'])
            ->orderBy('created_at', 'desc') // pelamar terbaru muncul di atas
            ->get();

        return view('perusahaan.pages.company-pelamar', compact('pelamar', 'identitas'));
    }

    public function lamaran()
    {
        $identitas = Identitas::first();
        $siswa = Auth::guard('siswa')->user(); // ambil data siswa yang login

        $lamaran = Pelamar::join('pekerjaan', 'pelamar.id_pekerjaan', '=', 'pekerjaan.id_pekerjaan')
            ->join('perusahaan', 'pekerjaan.id_perusahaan', '=', 'perusahaan.id_perusahaan')
            ->where('pelamar.id_siswa', $siswa->id_siswa) // filter berdasarkan siswa yang login
            ->orderBy('pelamar.created_at', 'desc') // urutkan berdasarkan waktu dibuat
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
        $identitas = Identitas::first();
        return view('perusahaan.pages.company-add-job', compact('identitas'));
    }

    public function profile()
    {
        $company = Perusahaan::findOrFail(auth()->guard('perusahaan')->user()->id_perusahaan);
        $identitas = Identitas::first();
        return view('perusahaan.pages.company-profile', compact('company', 'identitas'));
    }

    public function faqCompany()
    {
        $identitas = Identitas::first();
        $faqs = Faq::all();
        $faqContent = \App\Models\FaqContent::latest()->first(); // Mengambil data terbaru dari tabel
        return view('perusahaan.pages.company-faq', compact('faqs', 'faqContent', 'identitas'));
    }
}