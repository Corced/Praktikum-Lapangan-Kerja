<?php
// app/Http/Controllers/FaqController.php

namespace App\Http\Controllers;

use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller
{
    public function index() {
        $faqs = Faq::all();
        return view('faqs.index', compact('faqs'));
    }

    public function create() {
        return view('faqs.create');
    }

    public function store(Request $request) {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'match_type' => 'required|in:exact,contains,regex',
        ]);
        Faq::create($request->all());
        return redirect()->route('faqs.index')->with('success', 'FAQ created!');
    }

    public function edit(Faq $faq) {
        return view('faqs.edit', compact('faq'));
    }

    public function update(Request $request, Faq $faq) {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'match_type' => 'required|in:exact,contains,regex',
        ]);
        $faq->update($request->all());
        return redirect()->route('faqs.index')->with('success', 'FAQ updated!');
    }

    public function destroy(Faq $faq) {
        $faq->delete();
        return redirect()->route('faqs.index')->with('success', 'FAQ deleted!');
    }
}

?>