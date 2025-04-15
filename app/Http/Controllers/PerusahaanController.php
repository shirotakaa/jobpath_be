<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PerusahaanController extends Controller
{
    // Menampilkan daftar perusahaan yang diurutkan berdasarkan waktu pembuatan terbaru
    public function index()
    {
        $perusahaan = Perusahaan::orderBy('created_at', 'desc')->get();
        return view('admin.pages.kelola-perusahaan', compact('perusahaan'));
    }

    // Menampilkan profil perusahaan berdasarkan ID
    public function show($id)
    {
        $perusahaan = Perusahaan::findOrFail($id); // Ambil data perusahaan berdasarkan ID
        return view('company.profile', compact('perusahaan'));
    }
    
    // Menampilkan semua perusahaan di halaman admin untuk kelola perusahaan
    public function kelolaPerusahaan()
    {
        $perusahaan = Perusahaan::all();
        return view('admin.pages.kelola-perusahaan', compact('perusahaan'));
    }

    // Menampilkan perusahaan yang akan ditampilkan di halaman landing page guest
    public function perusahaanLanding()
    {
        $perusahaan = Perusahaan::where('tampilkan_di_landing', true)->get();
        return view('guest.index', compact('perusahaan'));
    }

    // Menampilkan form untuk registrasi perusahaan baru
    public function create()
    {
        return view('perusahaan.registercom');
    }

    // Menyimpan data perusahaan baru ke dalam database
    public function store(Request $request)
    {
        // Validasi input data
        $request->validate([
            'nama_perusahaan' => 'required|max:255',
            'jenis_perusahaan' => 'required|max:255',
            'email' => 'required|email|unique:perusahaan,email',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg',
            'nomor_telepon' => 'nullable|max:15',
            'alamat' => 'nullable|max:255',
            'password' => 'required',
        ]);

        $path = null;
        // Jika ada file logo, simpan file tersebut di storage
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('perusahaan', 'public');
        }

        try {
            // Menambahkan data perusahaan ke dalam database
            Perusahaan::create([
                'nama_perusahaan' => $request->nama_perusahaan,
                'jenis_perusahaan' => $request->jenis_perusahaan,
                'password' => Hash::make($request->password),
                'logo' => $path ? Storage::url($path) : null,
                'email' => $request->email,
                'nomor_telepon' => $request->nomor_telepon,
                'alamat' => $request->alamat,
            ]);
        
            return redirect()->route('register-perusahaan')->with('success', 'Perusahaan berhasil ditambahkan. Silakan login.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan perusahaan. Silakan coba lagi.');
        }
    }

    // Menampilkan form untuk mengedit data perusahaan
    public function edit(Perusahaan $perusahaan)
    {
        return view('admin.pages.perusahaan.edit', compact('perusahaan'));
    }

    // Memperbarui data perusahaan yang ada di database
    public function update(Request $request, Perusahaan $perusahaan)
    {
        // Validasi input data
        $request->validate([
            'nama_perusahaan' => 'required|max:255',
            'jenis_perusahaan' => 'required|max:255',
            'email' => 'required|email|unique:perusahaan,email,' . $perusahaan->id_perusahaan . ',id_perusahaan',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg',
            'nomor_telepon' => 'nullable|max:15',
            'alamat' => 'nullable|max:255',
        ]);

        // Jika ada file logo baru, hapus logo lama dan simpan yang baru
        if ($request->hasFile('logo')) {
            if ($perusahaan->logo) {
                Storage::delete(str_replace('/storage', 'public', $perusahaan->logo));
            }
            $path = $request->file('logo')->store('perusahaan', 'public');
            $perusahaan->logo = Storage::url($path);
        }

        // Memperbarui data perusahaan
        $perusahaan->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'jenis_perusahaan' => $request->jenis_perusahaan,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat' => $request->alamat,
        ]);

        return redirect()->back()->with('success', 'Perusahaan berhasil diperbarui.');
    }

    // Menghapus data perusahaan dari database
    public function destroy(Perusahaan $perusahaan)
    {
        // Menghapus logo perusahaan jika ada
        if ($perusahaan->logo) {
            Storage::delete(str_replace('/storage', 'public', $perusahaan->logo));
        }

        // Menghapus perusahaan dari database
        $perusahaan->delete();

        return redirect()->back()->with('success', 'Perusahaan berhasil dihapus.');
    }
}
