<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use App\Models\Perusahaan;

class PekerjaanController extends Controller
{
    // ========== ADMIN SECTION ========== //
    public function index()
    {
        $pekerjaan = Pekerjaan::orderBy('created_at', 'desc')->get();
        $perusahaan = Perusahaan::all(); // Ambil data perusahaan
        return view('admin.pages.tambah-pekerjaan', compact('pekerjaan', 'perusahaan'));
    }

    public function daftarPekerjaanSaya()
    {
        // Periksa apakah ada perusahaan yang sedang login
        if (!auth()->guard('perusahaan')->check()) {
            return redirect()->route('login')->with('error', 'Silakan login terlebih dahulu.');
        }

        // Ambil data perusahaan yang sedang login
        $perusahaan = auth()->guard('perusahaan')->user();

        // Ambil id_perusahaan
        $id_perusahaan = $perusahaan->id_perusahaan;

        // Ambil daftar pekerjaan berdasarkan id_perusahaan
        $pekerjaan = Pekerjaan::where('id_perusahaan', $id_perusahaan)->get();

        return view('perusahaan.pages.company-job', compact('pekerjaan'));
    }

    public function kelolaPerusahaan()
    {
        $pekerjaan = Pekerjaan::all();
        $perusahaan = Perusahaan::all(); // Ambil data perusahaan
        return view('admin.pages.tambah-pekerjaan', compact('pekerjaan', 'perusahaan'));
    }

    public function storeAdmin(Request $request)
    {
        // dd($request->all());

        $request->validate([
            'id_perusahaan' => 'required|exists:perusahaan,id_perusahaan',
            'nama_pekerjaan' => 'required|string',
            'lokasi' => 'required|string',
            'category' => 'required|string',
            'deadline_lowongan' => 'required|date',
            'gaji' => 'required|string',
            'about_job' => 'required|string',
            'detail_pekerjaan' => 'required|string',
        ]);

        try {
            Pekerjaan::create([
                'id_perusahaan' => $request->id_perusahaan,
                'judul_pekerjaan' => $request->nama_pekerjaan,
                'lokasi' => $request->lokasi,
                'kategori' => $request->category,
                'rentang_gaji' => $request->gaji,
                'deadline' => $request->deadline_lowongan,
                'about_job' => $request->about_job,
                'detail_pekerjaan' => $request->detail_pekerjaan,
                'status' => 'Available',
                'verifikasi' => 'Approved',
            ]);

            return redirect()->back()->with('success', 'Pekerjaan berhasil diunggah!');
        } catch (\Exception $e) {
            return redirect()->back()->with('error', 'Terjadi kesalahan, silakan coba lagi.');
        }
    }

    public function edit(Pekerjaan $pekerjaan)
    {
        $perusahaan = Perusahaan::all();
        return view('admin.pages.pekerjaan.edit', compact('pekerjaan', 'perusahaan'));
    }

    public function update(Request $request, $id_pekerjaan)
    {
        // dd($request->all());

        // Validasi input
        $request->validate([
            'nama_pekerjaan' => 'required|max:255',
            'deadline_lowongan' => 'required|date',
            'lokasi' => 'required|max:255',
            'category' => 'required|string',
            'gaji' => 'required|max:255',
            'about_job' => 'required',
            'detail_pekerjaan' => 'required',
        ]);

        // Cari pekerjaan berdasarkan ID
        $pekerjaan = Pekerjaan::findOrFail($id_pekerjaan);

        // Update data pekerjaan
        $pekerjaan->judul_pekerjaan = $request->nama_pekerjaan;
        $pekerjaan->deadline = $request->deadline_lowongan;
        $pekerjaan->lokasi = $request->lokasi;
        $pekerjaan->kategori = $request->category;
        $pekerjaan->rentang_gaji = $request->gaji;
        $pekerjaan->about_job = $request->about_job;
        $pekerjaan->detail_pekerjaan = $request->detail_pekerjaan;

        // Simpan perubahan ke database
        $pekerjaan->save();

        // Redirect kembali dengan pesan sukses
        return back()->with('success', 'Pekerjaan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->delete();
        return back()->with('success', 'Pekerjaan berhasil dihapus.');
    }

    // ========== USER SECTION ========== //
    public function storeUser(Request $request)
    {
        // dd($request->all()); // Debug untuk melihat data yang dikirim

        $request->validate([
            'id_perusahaan' => 'required|exists:perusahaan,id_perusahaan',
            'judul_pekerjaan' => 'required|string|max:100',
            'deadline' => 'required|date',
            'alamat' => 'required|string|max:255',
            'min_salary' => 'required|numeric|min:0',
            'max_salary' => 'required|numeric|min:0',
            'category' => 'required|string',
            'about_job' => 'required|string|max:255',
            'detail_pekerjaan' => 'required',
        ]);

        Pekerjaan::create([
            'id_perusahaan' => $request->id_perusahaan,
            'judul_pekerjaan' => $request->judul_pekerjaan,
            'deadline' => $request->deadline, // Tambahkan ini
            'lokasi' => $request->alamat,
            'kategori' => $request->category,
            'rentang_gaji' => "{$request->min_salary} - {$request->max_salary}",
            'about_job' => $request->about_job,
            'detail_pekerjaan' => $request->detail_pekerjaan,
            'status' => 'pending',
            'verifikasi' => 'Pending',
        ]);

        return redirect()->route('company.job')->with('success', 'Pekerjaan berhasil diunggah!');
    }

    public function approved(Pekerjaan $pekerjaan)
    {
        $pekerjaan->update([
            'verifikasi' => 'Approved',
            'status' => 'Available' // Jika Approved, status otomatis jadi Available
        ]);

        return back()->with('success', 'Pekerjaan telah disetujui dan tersedia.');
    }

    public function rejected(Pekerjaan $pekerjaan)
    {
        $pekerjaan->update([
            'verifikasi' => 'Rejected',
            'status' => 'Expired' // Jika Rejected, status otomatis jadi Expired
        ]);

        return back()->with('error', 'Pekerjaan ditolak dan kadaluarsa.');
    }
}
