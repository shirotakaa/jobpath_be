<?php
namespace App\Http\Controllers;

use App\Models\Faq;
use App\Models\FaqContent;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    // public function index()
    // {
    //     return view('admin.pages.faq');
    // }

    public function index()
    {
        $faqs = Faq::all();
        $faqContent = FaqContent::first();
        $faqCount = $faqs->count();
        return view('admin.pages.faq', compact('faqs', 'faqContent', 'faqCount'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|string',
        ]);

        Faq::create($request->all());

        return redirect()->route('faq.index')->with('success', 'Pertanyaan berhasil ditambahkan.');
    }

    public function update(Request $request, Faq $faq)
    {
        $request->validate([
            'pertanyaan' => 'required|string|max:255',
            'jawaban' => 'required|string',
        ]);

        $faq->update($request->all());

        return redirect()->route('faq.index')->with('success', 'Pertanyaan berhasil diperbarui.');
    }

    public function destroy(Faq $faq)
    {
        $faq->delete();

        return redirect()->route('faq.index')->with('success', 'Pertanyaan berhasil dihapus.');
    }
}