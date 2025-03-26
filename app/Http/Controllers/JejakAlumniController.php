<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\JejakAlumni;
use App\Models\Siswa;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Auth;

class JejakAlumniController extends Controller
{
    public function index()
    {
        $alumni = JejakAlumni::all();
        $siswa = Siswa::all(); // Ambil data siswa

        return view('admin.pages.data-pekerjaan-alumni', compact('alumni', 'siswa'));
    }

    // Method untuk user (storeAlumni)
    public function storeAlumni(Request $request)
    {
        $siswa = Auth::guard('siswa')->user();

        if (!$siswa) {
            return redirect()->back()->with('error', 'Anda harus login sebagai siswa.');
        }

        $request->validate([
            'pekerjaan' => 'required|string|max:255',
            'perusahaan' => 'required|string|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = [
            'id_siswa' => $siswa->id_siswa,
            'nama' => $siswa->nama,
            'nis' => $siswa->nis,
            'jurusan' => $siswa->jurusan,
            'pekerjaan' => $request->pekerjaan,
            'perusahaan' => $request->perusahaan,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'status' => 'Pending', // Tambahkan status pending
        ];

        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('jejakalumni', 'public');
            $data['foto'] = $fotoPath;
        }

        JejakAlumni::create($data);

        return redirect()->back()->with('success', 'Data alumni berhasil disimpan!');
    }

    // Method untuk admin (storeAdminAlumni)

    public function storeAdminAlumni(Request $request)
    {
        $request->validate([
            'id_siswa' => 'required|exists:siswa,id_siswa',
            'perusahaan' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'instagram' => 'nullable|string',
            'linkedin' => 'nullable|string',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
        ]);

        $siswa = Siswa::findOrFail($request->id_siswa);

        // Upload foto jika ada
        $fotoPath = null;
        if ($request->hasFile('foto')) {
            $fotoPath = $request->file('foto')->store('alumni', 'public'); // Simpan ke storage/alumni
        }

        JejakAlumni::create([
            'id_siswa' => $request->id_siswa, // HARUS id_siswa, bukan siswa_id
            'nama' => $siswa->nama,
            'nis' => $siswa->nis,
            'jurusan' => $siswa->jurusan,
            'perusahaan' => $request->perusahaan,
            'pekerjaan' => $request->pekerjaan,
            'instagram' => $request->instagram,
            'linkedin' => $request->linkedin,
            'status' => 'Approved',
            'foto' => $fotoPath,
        ]);


        return redirect('/data-pekerjaan-alumni')->with('success', 'Data alumni berhasil disimpan.');
    }

    // Method untuk menampilkan form edit (admin)
    public function edit($id)
    {
        $alumni = JejakAlumni::findOrFail($id);
        return view('admin.data-pekerjaan-alumni', compact('alumni'));
    }

    // Method untuk update data (admin)
    public function update(Request $request, $id)
    {
        // Validasi input
        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'pekerjaan' => 'nullable|string|max:255',
            'perusahaan' => 'nullable|string|max:255',
            'instagram' => 'nullable|url|max:255',
            'linkedin' => 'nullable|url|max:255',
        ]);

        // Cari data alumni berdasarkan ID
        $alumni = JejakAlumni::findOrFail($id);

        // Simpan data yang bisa diperbarui
        $data = $request->only(['pekerjaan', 'perusahaan', 'instagram', 'linkedin']);

        // Jika ada foto baru yang diunggah, hapus foto lama dan simpan yang baru
        if ($request->hasFile('foto')) {
            // Hapus foto lama jika ada
            if (!empty($alumni->foto) && Storage::disk('public')->exists($alumni->foto)) {
                Storage::disk('public')->delete($alumni->foto);
            }

            // Simpan foto baru
            $fotoPath = $request->file('foto')->store('jejakalumni', 'public');
            $data['foto'] = $fotoPath;
        }

        // Update data di database
        $alumni->update($data);

        // Redirect dengan pesan sukses
        return redirect('/data-pekerjaan-alumni')->with('success', 'Data alumni berhasil diperbarui.');
    }

    // Method untuk delete data (admin)
    public function destroy($id)
    {
        $alumni = JejakAlumni::findOrFail($id);

        // Hapus foto jika ada
        if ($alumni->foto && Storage::disk('public')->exists($alumni->foto)) {
            Storage::disk('public')->delete($alumni->foto);
        }

        // Hapus data dari database
        $alumni->delete();

        return redirect()->back()->with('success', 'Data alumni berhasil dihapus!');
    }
    public function approve(JejakAlumni $jejakAlumni)
    {
        $jejakAlumni->update(['status' => 'Approved']);
        return redirect()->back()->with('success', 'Status alumni berhasil disetujui.');
    }

    public function reject(JejakAlumni $jejakAlumni)
    {
        $jejakAlumni->update(['status' => 'Rejected']);
        return redirect()->back()->with('success', 'Status alumni berhasil ditolak.');
    }
}
