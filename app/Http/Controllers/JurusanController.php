<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index()
    {
        // Mengambil semua data jurusan dari database dan mengurutkannya berdasarkan waktu dibuat (terbaru terlebih dahulu)
        $jurusans = Jurusan::orderBy('created_at', 'desc')->get();
        return view('admin.pages.jurusan', compact('jurusans'));
    }

    public function store(Request $request)
    {
        // Validasi input dari request untuk memastikan nama dan singkatan jurusan tidak kosong, valid, dan unik
        $request->validate([
            'nama_jurusan' => 'required|string|max:255|unique:jurusan',
            'singkatan_jurusan' => 'required|string|max:50|unique:jurusan',
        ]);

        // Menyimpan data jurusan baru ke database
        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
            'singkatan_jurusan' => $request->singkatan_jurusan,
        ]);

        // Redirect kembali ke halaman index jurusan dengan pesan sukses
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil ditambahkan.');
    }

    public function update(Request $request, $id_jurusan)
    {
        // Validasi input dari request untuk update data jurusan,
        // memperbolehkan nama/singkatan yang sama jika itu milik jurusan yang sedang diedit
        $request->validate([
            'nama_jurusan' => 'required|string|max:255|unique:jurusan,nama_jurusan,' . $id_jurusan . ',id_jurusan',
            'singkatan_jurusan' => 'required|string|max:50|unique:jurusan,singkatan_jurusan,' . $id_jurusan . ',id_jurusan',
        ]);

        // Mencari data jurusan berdasarkan ID, lalu melakukan update
        $jurusan = Jurusan::findOrFail($id_jurusan);
        $jurusan->update([
            'nama_jurusan' => $request->nama_jurusan,
            'singkatan_jurusan' => $request->singkatan_jurusan,
        ]);

        // Redirect kembali ke halaman index jurusan dengan pesan sukses
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil diupdate.');
    }

    public function destroy($id_jurusan)
    {
        // Mencari data jurusan berdasarkan ID, lalu menghapusnya
        $jurusan = Jurusan::findOrFail($id_jurusan);
        $jurusan->delete();

        // Redirect kembali ke halaman index jurusan dengan pesan sukses
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil dihapus.');
    }
}
