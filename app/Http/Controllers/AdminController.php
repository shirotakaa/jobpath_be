<?php

namespace App\Http\Controllers;


use App\Models\Perusahaan;
use App\Models\Identitas;
use App\Models\HeroLanding;
use App\Models\Jurusan;
use App\Models\Siswa;
use App\Models\Faq;
use App\Models\Pekerjaan;
use App\Models\FaqContent;
use App\Models\JejakAlumni;
use App\Models\PerusahaanContent;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    protected $views = [
        'dashboard' => 'admin.index',
        'pengaturanIdentitas' => 'admin.pages.pengaturan-identitas',
        'heroLanding' => 'admin.pages.hero-landing',
        'perusahaanLanding' => 'admin.pages.perusahaan-landing',
        'alumniLanding' => 'admin.pages.alumni-landing',
        'kategoriPekerjaan' => 'admin.pages.kategori-pekerjaan',
        'kelolaPerusahaan' => 'admin.pages.kelola-perusahaan',
        'tambahPekerjaan' => 'admin.pages.tambah-pekerjaan',
        'kelolaJurusan' => 'admin.pages.jurusan',
        'dataUser' => 'admin.pages.data-user',
        'dataPekerjaanAlumni' => 'admin.pages.data-pekerjaan-alumni',
        'landingPerusahaan' => 'admin.pages.landing-perusahaan',
    ];

    // public function profil()
    // {
    //     // $admin = auth()->guard('admin')->user();
    //     $admin = Auth::guard('admin')->user();
    //     return view('admin.pages.profil', compact('admin'));
    // }

    // public function editProfil()
    // {
    //     $admin = auth()->guard('admin')->user();
    //     return view('admin.pages.edit-profil', compact('admin'));
    // }

    // public function kelolaPerusahaan()
    // {
    //     return view('admin.pages.kelola-perusahaan');
    // }

    // public function tambahPekerjaan()
    // {
    //     return view('admin.pages.tambah-pekerjaan');
    // }

    public function kelolaJurusan()
    {
        $jurusans = Jurusan::orderBy('id_jurusan', 'desc')->get();
        return view('admin.pages.jurusan', compact('jurusans'));
    }

    public function heroLanding()
    {
        $heroLanding = HeroLanding::first();
        return view('admin.pages.hero-landing', compact('heroLanding'));
    }

    public function pengaturanIdentitas()
    {
        $identitas = Identitas::all();
        return view('admin.pages.pengaturan-identitas', compact('identitas'));
    }

    public function faqs()
    {
        $faqs = Faq::all();
        dd($faqs);
        return view('admin.pages.faq', compact('faqs'));
    }

    public function faqContent()
    {
        $faqContent = FaqContent::all();
        dd($faqContent);
        return view('admin.pages.faq', compact('faqContent'));
    }

    public function kelolaPerusahaan()
    {
        // Mengambil data perusahaan dengan urutan descending berdasarkan created_at
        $perusahaan = Perusahaan::orderBy('created_at', 'desc')->get();
        return view('admin.pages.kelola-perusahaan', compact('perusahaan'));
    }

    public function kelolaPekerjaan()
    {
        // Mengambil data pekerjaan dengan urutan descending berdasarkan created_at
        $pekerjaan = Pekerjaan::orderBy('created_at', 'desc')->get();
        $perusahaan = Perusahaan::all(); // Ambil data perusahaan
        return view('admin.pages.tambah-pekerjaan', compact('pekerjaan', 'perusahaan'));
    }

    public function kelolaAlumni()
    {
        // Mengambil data alumni dengan urutan descending berdasarkan created_at
        $alumni = JejakAlumni::orderBy('created_at', 'desc')->get();
        $siswa = Siswa::all();
        return view('admin.pages.data-pekerjaan-alumni', compact('alumni', 'siswa'));
    }

    public function perusahaanLanding()
    {
        $perusahaan = Perusahaan::all();
        return view('admin.pages.perusahaan-landing', compact('perusahaan'));
    }

    public function landingPerusahaan()
    {
        $perusahaanContent = PerusahaanContent::first(); // Ambil hanya satu data
        return view('admin.pages.landing-perusahaan', compact('perusahaanContent'));
    }

    public function alumniLanding()
    {
        $alumni = JejakAlumni::all();
        $siswa = Siswa::all();
        return view('admin.pages.alumni-landing', compact('alumni', 'siswa'));
    }

    public function updatePerusahaanLanding(Request $request, $id)
    {
        $perusahaan = Perusahaan::findOrFail($id);
        $perusahaan->tampilkan_di_landing = !$perusahaan->tampilkan_di_landing; // Toggle status
        $perusahaan->save();

        return redirect()->back()->with('success', 'Perusahaan berhasil diperbarui.');
    }

    public function updateAlumniLanding(Request $request, $id)
    {
        $alumni = JejakAlumni::findOrFail($id);
        $alumni->tampilkan_di_landing = !$alumni->tampilkan_di_landing; // Toggle status
        $alumni->save();

        return redirect()->back()->with('success', 'Alumni berhasil diperbarui.');
    }

    public function kelolaSiswa()
    {
        // Mengambil data siswa dengan urutan descending berdasarkan created_at
        $siswa = Siswa::orderBy('created_at', 'desc')->get();
        $jurusans = Jurusan::all();
        return view('admin.pages.data-user', compact('siswa', 'jurusans'));
    }

    public function __call($method, $args)
    {
        if (array_key_exists($method, $this->views)) {
            return view($this->views[$method]);
        }

        abort(404);
    }
}
