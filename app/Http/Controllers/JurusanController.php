<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Jurusan;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusans = Jurusan::all();
        return view('admin.pages.jurusan', compact('jurusans'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jurusan' => 'required|string|max:255|unique:jurusan',
            'singkatan_jurusan' => 'required|string|max:50|unique:jurusan',
        ]);

        Jurusan::create([
            'nama_jurusan' => $request->nama_jurusan,
            'singkatan_jurusan' => $request->singkatan_jurusan,
        ]);

        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil ditambahkan.');
    }

    public function update(Request $request, $id_jurusan)
    {
        $request->validate([
            'nama_jurusan' => 'required|string|max:255|unique:jurusan,nama_jurusan,' . $id_jurusan . ',id_jurusan',
            'singkatan_jurusan' => 'required|string|max:50|unique:jurusan,singkatan_jurusan,' . $id_jurusan . ',id_jurusan',
        ]);

        $jurusan = Jurusan::findOrFail($id_jurusan);
        $jurusan->update([
            'nama_jurusan' => $request->nama_jurusan,
            'singkatan_jurusan' => $request->singkatan_jurusan,
        ]);

        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil diupdate.');
    }

    public function destroy($id_jurusan)
    {
        $jurusan = Jurusan::findOrFail($id_jurusan);
        $jurusan->delete();

        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil dihapus.');
    }
}
