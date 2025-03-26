<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\FaqContent;
use App\Models\Faq;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class FaqContentController extends Controller
{
    //index ga kepake, pakai yang FaqController
    // public function index()
    // {
    //     $faqContent = FaqContent::first();
    //     $faqs = Faq::all();
    //     return view('admin.pages.faq', compact('faqContent', 'faqs'));
    // }

    public function update(Request $request, FaqContent $faqContent)
    {
        Log::info('Request Data:', $request->all());
    
        $request->validate([
            'asset_1' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'asset_2' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'asset_3' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'deskripsi' => 'required|string',
        ]);
    
        if ($request->hasFile('asset_1')) {
            if ($faqContent->asset_1) {
                Storage::disk('public')->delete($faqContent->asset_1);
            }
            $path = $request->file('asset_1')->store('assets/admin/media/faq', 'public');
        } else {
            $path = $faqContent->asset_1;
        }
    
        if ($request->hasFile('asset_2')) {
            if ($faqContent->asset_2) {
                Storage::disk('public')->delete($faqContent->asset_2);
            }
            $path2 = $request->file('asset_2')->store('assets/admin/media/faq', 'public');
        } else {
            $path2 = $faqContent->asset_2;
        }
    
        if ($request->hasFile('asset_3')) {
            if ($faqContent->asset_3) {
                Storage::disk('public')->delete($faqContent->asset_3);
            }
            $path3 = $request->file('asset_3')->store('assets/admin/media/faq', 'public');
        } else {
            $path3 = $faqContent->asset_3;
        }
    
        $faqContent->update([
            'asset_1' => $path,
            'asset_2' => $path2,
            'asset_3' => $path3,
            'deskripsi' => $request->deskripsi,
        ]);
    
        Log::info('Updated FaqContent:', $faqContent->toArray());
    
        return redirect()->route('faq.index')->with('success', 'Data berhasil diperbarui.');
    }
    
}