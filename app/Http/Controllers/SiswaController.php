<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Jurusan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{
    public function index()
    {
        $siswa = Siswa::orderBy('created_at', 'desc')->get();
        $jurusans = Jurusan::all();
        return view('admin.pages.data-user', compact('siswa', 'jurusans'));
    }

    public function show($id)
    {
        $siswa = Siswa::findOrFail($id); // Ambil data siswa berdasarkan ID
        return view('siswa.profil', compact('siswa'));
    }

    public function create()
    {
        return view('admin.pages.siswa.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'nullable|email|unique:siswa,email',
            'nis' => 'required|unique:siswa,nis',
            'nomor_telepon' => 'nullable|max:15',
            'jurusan' => 'nullable|max:255',
            'tahun_ajaran' => 'nullable|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Simpan foto atau gunakan default
        $path = 'storage/siswa/default.png'; // Default foto
        if ($request->hasFile('foto')) {
            $path = $request->file('foto')->store('siswa', 'public');
            $path = Storage::url($path);
        }

        try {
            Siswa::create([
                'nama' => $request->nama,
                'email' => $request->email,
                'nis' => $request->nis,
                'nomor_telepon' => $request->nomor_telepon,
                'jurusan' => $request->jurusan,
                'tahun_ajaran' => $request->tahun_ajaran,
                'jenis_kelamin' => $request->jenis_kelamin,
                'password' => Hash::make($request->nis),
                'foto' => $path,
            ]);

            return redirect()->back()->with('success', 'Siswa berhasil ditambahkan.');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Gagal menambahkan siswa. Silakan coba lagi.');
        }
    }

    public function edit(Siswa $siswa)
    {
        return view('admin.pages.siswa.edit', compact('siswa'));
    }

    public function update(Request $request, Siswa $siswa)
    {
        $request->validate([
            'nama' => 'required|max:255',
            'email' => 'nullable|email|unique:siswa,email,' . $siswa->id_siswa . ',id_siswa',
            'nis' => 'required|unique:siswa,nis,' . $siswa->id_siswa . ',id_siswa',
            'nomor_telepon' => 'nullable|max:15',
            'jurusan' => 'nullable|max:255',
            'tahun_ajaran' => 'nullable|max:255',
            'jenis_kelamin' => 'required|in:Laki-laki,Perempuan',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        // Jika ada file baru, hapus yang lama
        if ($request->hasFile('foto')) {
            if ($siswa->foto && Storage::exists(str_replace('/storage/', 'public/', $siswa->foto))) {
                Storage::delete(str_replace('/storage/', 'public/', $siswa->foto));
            }
            $path = $request->file('foto')->store('siswa', 'public');
            $siswa->foto = Storage::url($path);
        }

        $siswa->update([
            'nama' => $request->nama,
            'email' => $request->email,
            'nis' => $request->nis,
            'nomor_telepon' => $request->nomor_telepon,
            'jurusan' => $request->jurusan,
            'tahun_ajaran' => $request->tahun_ajaran,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto' => $siswa->foto ?? 'storage/siswa/default.png', // Pastikan tetap ada foto
        ]);

        return redirect()->back()->with('success', 'Siswa berhasil diperbarui.');
    }

    public function destroy(Siswa $siswa)
    {
        if ($siswa->foto && $siswa->foto !== 'storage/siswa/default.png') {
            $filePath = str_replace('/storage/', 'public/', $siswa->foto);
            if (Storage::exists($filePath)) {
                Storage::delete($filePath);
            }
        }

        $siswa->delete();

        return redirect()->back()->with('success', 'Siswa berhasil dihapus.');
    }
}
