<?php

namespace App\Http\Controllers;

use App\Models\Layanan;
use Illuminate\Http\Request;

class LayananController extends Controller
{
    public function index()
    {
        $layanans = Layanan::all();
        return view('layanans.index', compact('layanans'));
    }

    public function create()
    {
        return view('layanans.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'match_type' => 'required|in:exact,contains,regex',
        ]);
        
        Layanan::create($request->all());
        return redirect()->route('layanans.index')->with('success', 'Layanan created!');
    }

    public function edit(Layanan $layanan)
    {
        return view('layanans.edit', compact('layanan'));
    }

    public function update(Request $request, Layanan $layanan)
    {
        $request->validate([
            'question' => 'required',
            'answer' => 'required',
            'match_type' => 'required|in:exact,contains,regex',
        ]);
        
        $layanan->update($request->all());
        return redirect()->route('layanans.index')->with('success', 'Layanan updated!');
    }

    public function destroy(Layanan $layanan)
    {
        $layanan->delete();
        return redirect()->route('layanans.index')->with('success', 'Layanan deleted!');
    }
}