<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelamar;
use App\Models\Pekerjaan;
use Illuminate\Support\Facades\Auth;

class PelamarController extends Controller
{
    public function index()
    {
        $pelamar = Pelamar::with(['pekerjaan', 'siswa'])->get();
        return view('halaman_pelamar', compact('pelamar'));
    }

    public function store(Request $request)
    {
        // Validasi input
        $request->validate([
            'cv' => 'required|mimes:pdf|max:2048',
            'id_pekerjaan' => 'required|exists:pekerjaan,id_pekerjaan',
        ]);

        // Cek apakah siswa sudah login
        $user = Auth::guard('siswa')->user();
        if (!$user) {
            return redirect()->back()->with('error', 'Anda harus login sebagai siswa.');
        }

        // Cek apakah siswa sudah melamar pekerjaan ini
        $sudahMelamar = Pelamar::where('id_siswa', $user->id_siswa)
            ->where('id_pekerjaan', $request->id_pekerjaan)
            ->exists();

        if ($sudahMelamar) {
            return redirect()->back()->with('error', 'Anda sudah melamar pekerjaan ini sebelumnya.');
        }

        // Ambil data pekerjaan
        $pekerjaan = Pekerjaan::where('id_pekerjaan', $request->id_pekerjaan)->firstOrFail();

        // Simpan file CV
        $cvPath = $request->file('cv')->store('cv', 'public');

        // Simpan data pelamar ke database
        Pelamar::create([
            'id_pekerjaan' => $pekerjaan->id_pekerjaan,
            'id_perusahaan' => $pekerjaan->id_perusahaan, // Ambil dari tabel pekerjaan
            'id_siswa' => $user->id_siswa,
            'cv' => $cvPath,
            'kelanjutan' => '',
            'status_lamaran' => 'Pending',
        ]);

        return redirect()->route('user.lamaran')->with('success', 'Lamaran berhasil dikirim.')->withInput();
    }

    public function destroy($id_pelamar)
    {
        $pelamar = Pelamar::find($id_pelamar);

        if (!$pelamar) {
            return redirect()->back()->with('error', 'Data pelamar tidak ditemukan.');
        }

        $pelamar->delete();

        return redirect()->back()->with('success', 'Data pelamar berhasil dihapus.');
    }


    public function updateKelanjutan(Request $request, $id_pelamar)
    {
        // Validasi input
        $request->validate([
            'kelanjutan' => 'required|string',
        ]);

        // Cari data pelamar berdasarkan id_pelamar
        $pelamar = Pelamar::find($id_pelamar);

        if (!$pelamar) {
            return back()->with('error', 'Pelamar tidak ditemukan.');
        }

        // Perbarui hanya kolom kelanjutan
        $pelamar->kelanjutan = $request->kelanjutan;

        if ($pelamar->save()) {
            return back()->with('success', 'Kelanjutan lamaran berhasil diperbarui.');
        }

        return back()->with('error', 'Gagal memperbarui kelanjutan lamaran.');
    }

    public function approved(Pelamar $pelamar)
    {
        $pelamar->update(['status_lamaran' => 'Approved']);
        return redirect()->back()->with('success', 'Pelamar telah diterima dan bisa ditindaklanjuti..');
    }

    public function rejected(Pelamar $pelamar)
    {
        $pelamar->update(['status_lamaran' => 'Rejected']);
        return redirect()->back()->with('success', 'Pelamar telah ditolak.');
    }
    // public function approved(Pelamar $pelamar)
    // {
    //     $pelamar->update([
    //         'status_lamaran' => 'Approved',            
    //     ]);

    //     return back()->with('success', 'Pelamar telah diterima dan bisa ditindaklanjuti..');
    // }

    // public function rejected(Pelamar $pelamar)
    // {
    //     $pelamar->update([
    //         'status_lamaran' => 'Rejected',            
    //     ]);

    //     return back()->with('error', 'Pelamar telah ditolak.');
    // }
}
