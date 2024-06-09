<?php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();
        return view('faqs.index', compact('faqs'));
    }

    public function create()
    {
        return view('faqs.create');
    }

    public function store(Request $request)
    {
        FAQ::create($request->all());
        return redirect()->route('faqs.index');

        $data = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        Faq::create($data);
        return redirect()->route('faqs.index');
    }

    public function show(Faq $faq)
    {
        $faq = FAQ::findOrFail($id);
        return view('faqs.show', compact('faq'));
    }

    public function edit(Faq $faq)
    {
        $faq = FAQ::findOrFail($id);
        return view('faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq)
    {
        $faq = FAQ::findOrFail($id);
        $faq->update($request->all());
        return redirect()->route('faqs.index');

        $data = $request->validate([
            'question' => 'required|string|max:255',
            'answer' => 'required|string',
        ]);

        $faq->update($data);
        return redirect()->route('faqs.index');
    }

    public function destroy(Faq $faq)
    {
        $faq = FAQ::findOrFail($id);
        $faq->delete();
        return redirect()->route('faqs.index');
    }
}
