<?php

namespace App\Http\Controllers;

use App\Models\Perusahaan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class PerusahaanController extends Controller
{
    public function index()
    {
        $perusahaan = Perusahaan::all();
        return view('admin.pages.kelola-perusahaan', compact('perusahaan'));
    }

    public function show($id)
    {
        $perusahaan = Perusahaan::findOrFail($id); // Ambil data siswa berdasarkan ID
        return view('company.profile', compact('perusahaan'));
    }
    
    public function kelolaPerusahaan()
    {
        $perusahaan = Perusahaan::all();
        return view('admin.pages.kelola-perusahaan', compact('perusahaan'));
    }

    // Metode untuk menampilkan perusahaan di halaman guest
    public function perusahaanLanding()
    {
        $perusahaan = Perusahaan::where('tampilkan_di_landing', true)->get();
        return view('guest.index', compact('perusahaan'));
    }

    public function create()
    {
        return view('perusahaan.registercom');
    }

    public function store(Request $request)
    {
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
        if ($request->hasFile('logo')) {
            $path = $request->file('logo')->store('perusahaan', 'public');
        }

        try {
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

    public function edit(Perusahaan $perusahaan)
    {
        return view('admin.pages.perusahaan.edit', compact('perusahaan'));
    }

    public function update(Request $request, Perusahaan $perusahaan)
    {
        $request->validate([
            'nama_perusahaan' => 'required|max:255',
            'jenis_perusahaan' => 'required|max:255',
            'email' => 'required|email|unique:perusahaan,email,' . $perusahaan->id_perusahaan . ',id_perusahaan',
            'logo' => 'nullable|image|mimes:jpeg,png,jpg',
            'nomor_telepon' => 'nullable|max:15',
            'alamat' => 'nullable|max:255',
        ]);

        if ($request->hasFile('logo')) {
            if ($perusahaan->logo) {
                Storage::delete(str_replace('/storage', 'public', $perusahaan->logo));
            }
            $path = $request->file('logo')->store('perusahaan', 'public');
            $perusahaan->logo = Storage::url($path);
        }

        $perusahaan->update([
            'nama_perusahaan' => $request->nama_perusahaan,
            'jenis_perusahaan' => $request->jenis_perusahaan,
            'email' => $request->email,
            'nomor_telepon' => $request->nomor_telepon,
            'alamat' => $request->alamat,
        ]);

        return redirect()->back()->with('success', 'Perusahaan berhasil diperbarui.');
    }

    public function destroy(Perusahaan $perusahaan)
    {
        if ($perusahaan->logo) {
            Storage::delete(str_replace('/storage', 'public', $perusahaan->logo));
        }

        $perusahaan->delete();

        return redirect()->back()->with('success', 'Perusahaan berhasil dihapus.');
    }
}