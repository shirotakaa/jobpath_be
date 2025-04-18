<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pekerjaan;
use App\Models\Perusahaan;

class PekerjaanController extends Controller
{
    // ========== ADMIN SECTION ========== //

    // Menampilkan daftar pekerjaan dan perusahaan untuk halaman admin
    public function index()
    {
        $pekerjaan = Pekerjaan::orderBy('created_at', 'desc')->get();
        $perusahaan = Perusahaan::all(); // Ambil data perusahaan
        return view('admin.pages.tambah-pekerjaan', compact('pekerjaan', 'perusahaan'));
    }

    // Menampilkan daftar pekerjaan milik perusahaan yang sedang login
    public function daftarPekerjaanSaya()
    {
        if (!auth()->guard('perusahaan')->check()) {
            return redirect()->route('guest.index')->with('error', 'Silakan login terlebih dahulu.');
        }

        $this->updateExpiredJobs();

        $perusahaan = auth()->guard('perusahaan')->user();
        $id_perusahaan = $perusahaan->id_perusahaan;
        $pekerjaan = Pekerjaan::where('id_perusahaan', $id_perusahaan)->get();

        return view('perusahaan.pages.company-job', compact('pekerjaan'));
    }

    // Menampilkan data perusahaan dan semua pekerjaan (digunakan admin untuk kelola pekerjaan)
    public function kelolaPerusahaan()
    {
        $pekerjaan = Pekerjaan::all();
        $perusahaan = Perusahaan::all(); // Ambil data perusahaan
        return view('admin.pages.tambah-pekerjaan', compact('pekerjaan', 'perusahaan'));
    }

    // Menyimpan pekerjaan baru yang diinput oleh admin
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

    // Menampilkan form edit pekerjaan di sisi admin
    public function edit(Pekerjaan $pekerjaan)
    {
        $perusahaan = Perusahaan::all();
        return view('admin.pages.pekerjaan.edit', compact('pekerjaan', 'perusahaan'));
    }

    // Menyimpan perubahan data pekerjaan oleh admin
    public function update(Request $request, $id_pekerjaan)
    {
        $request->validate([
            'nama_pekerjaan' => 'required|max:255',
            'deadline_lowongan' => 'required|date',
            'lokasi' => 'required|max:255',
            'category' => 'required|string',
            'gaji' => 'required|max:255',
            'about_job' => 'required',
            'detail_pekerjaan' => 'required',
        ]);

        $pekerjaan = Pekerjaan::findOrFail($id_pekerjaan);

        $pekerjaan->judul_pekerjaan = $request->nama_pekerjaan;
        $pekerjaan->deadline = $request->deadline_lowongan;
        $pekerjaan->lokasi = $request->lokasi;
        $pekerjaan->kategori = $request->category;
        $pekerjaan->rentang_gaji = $request->gaji;
        $pekerjaan->about_job = $request->about_job;
        $pekerjaan->detail_pekerjaan = $request->detail_pekerjaan;

        // Jika deadline diperbarui dan sebelumnya statusnya expired atau rejected
        if (
            $request->deadline_lowongan > now()->toDateString() &&
            ($pekerjaan->status === 'Expired' || $pekerjaan->verifikasi === 'Rejected')
        ) {
            $pekerjaan->status = 'Available';
            $pekerjaan->verifikasi = 'Approved';
        }

        $pekerjaan->save();

        return back()->with('success', 'Pekerjaan berhasil diperbarui.');
    }

    // Menghapus pekerjaan dari database
    public function destroy($id)
    {
        $pekerjaan = Pekerjaan::findOrFail($id);
        $pekerjaan->delete();
        return back()->with('success', 'Pekerjaan berhasil dihapus.');
    }

    // ========== USER SECTION ========== //

    // Menyimpan pekerjaan baru dari sisi user/perusahaan
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
            'deadline' => $request->deadline,
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

    // Menyetujui pekerjaan oleh admin, ubah status menjadi Available
    public function approved(Pekerjaan $pekerjaan)
    {
        $pekerjaan->update([
            'verifikasi' => 'Approved',
            'status' => 'Available'
        ]);

        return back()->with('success', 'Pekerjaan telah disetujui dan tersedia.');
    }

    // Menolak pekerjaan oleh admin, ubah status menjadi Expired
    public function rejected(Pekerjaan $pekerjaan)
    {
        $pekerjaan->update([
            'verifikasi' => 'Rejected',
            'status' => 'Expired'
        ]);

        return back()->with('error', 'Pekerjaan ditolak dan kadaluarsa.');
    }

    // Fungsi statis untuk memperbarui status pekerjaan jika deadline sudah lewat
    public static function updateExpiredJobs()
    {
        $today = now()->toDateString();

        Pekerjaan::where('deadline', '<', $today)
            ->where(function ($query) {
                $query->where('status', '!=', 'Expired')
                    ->orWhere('verifikasi', '!=', 'Rejected');
            })
            ->update([
                'status' => 'Expired',
                'verifikasi' => 'Rejected',
            ]);
    }

    // Memperbarui deadline pekerjaan dari sisi perusahaan
    public function updateDeadline(Request $request, $id)
    {
        $request->validate([
            'deadline_lowongan' => 'required|date',
        ]);

        $pekerjaan = Pekerjaan::findOrFail($id);

        if (auth()->guard('perusahaan')->id() != $pekerjaan->id_perusahaan) {
            return redirect()->route('company.job')->with('error', 'Anda tidak memiliki izin untuk mengubah pekerjaan ini.');
        }

        $pekerjaan->deadline = $request->deadline_lowongan;

        $today = now()->toDateString();

        if ($pekerjaan->deadline < $today) {
            // Jika deadline di masa lalu
            $pekerjaan->status = 'Expired';
            $pekerjaan->verifikasi = 'Rejected';
        } else {
            // Jika deadline diperpanjang
            $pekerjaan->status = 'Available';
            $pekerjaan->verifikasi = 'Approved';
        }

        $pekerjaan->save();

        return back()->with('success', 'Deadline pekerjaan berhasil diperbarui.');
    }
}
