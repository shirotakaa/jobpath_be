<?php
namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqContent;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // Menampilkan halaman FAQ dengan data pertanyaan yang ada dan konten FAQ pertama.
    public function index()
    {
        // Mengambil semua data FAQ dari database
        $faqs = Faq::all();
        // Mengambil konten FAQ pertama dari database
        $faqContent = FaqContent::first();
        // Menghitung jumlah total FAQ
        $faqCount = $faqs->count();
        // Mengembalikan tampilan halaman FAQ dengan data yang diperlukan
        return view('admin.pages.faq', compact('faqs', 'faqContent', 'faqCount'));
    }

    // Menyimpan data pertanyaan dan jawaban baru ke dalam database.
    public function store(Request $request)
    {
        // Validasi input dari form, memastikan 'pertanyaan' dan 'jawaban' tidak kosong
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|string',
        ]);

        // Membuat entry baru untuk FAQ di database dengan data yang diterima dari form
        Faq::create($request->all());

        // Mengarahkan kembali ke halaman FAQ dengan pesan sukses
        return redirect()->route('faq.index')->with('success', 'Pertanyaan berhasil ditambahkan.');
    }

    // Memperbarui data pertanyaan dan jawaban yang ada dalam database.
    public function update(Request $request, Faq $faq)
    {
        // Validasi input dari form, memastikan 'pertanyaan' dan 'jawaban' tidak kosong
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|string',
        ]);

        // Memperbarui data FAQ yang sudah ada di database dengan data yang diterima dari form
        $faq->update($request->all());

        // Mengarahkan kembali ke halaman FAQ dengan pesan sukses
        return redirect()->route('faq.index')->with('success', 'Pertanyaan berhasil diperbarui.');
    }

    // Menghapus data FAQ dari database.
    public function destroy(Faq $faq)
    {
        // Menghapus data FAQ dari database
        $faq->delete();

        // Mengarahkan kembali ke halaman FAQ dengan pesan sukses
        return redirect()->route('faq.index')->with('success', 'Pertanyaan berhasil dihapus.');
    }
}
