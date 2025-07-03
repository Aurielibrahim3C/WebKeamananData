<?php

namespace App\Http\Controllers;

use App\Models\Ruangan;
use Illuminate\Http\Request;

class RuanganController extends Controller
{
    public function index()
    {
        $ruangans = Ruangan::all();
        return view('a_admin.b_ruangan.index', compact('ruangans'));
    }

    public function create()
    {
        return view('a_admin.b_ruangan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_ruangan' => 'required|string|max:255',
            'nama_ruangan' => 'required|string|max:255',
        ]);

        Ruangan::create($request->all());
        return redirect()->route('ruangan.index')->with('success', 'Ruangan created successfully.');
    }


    public function edit(Ruangan $ruangan)
    {
        return view('a_admin.b_ruangan.edit', compact('ruangan'));
    }

    public function update(Request $request, Ruangan $ruangan)
    {
        $request->validate([
            'kode_ruangan' => 'required|string|max:255',
            'nama_ruangan' => 'required|string|max:255',
        ]);

        $ruangan->update($request->all());
        return redirect()->route('ruangan.index')->with('success', 'Ruangan updated successfully.');
    }

    public function destroy(Ruangan $ruangan)
    {
        $ruangan->delete();
        return redirect()->route('ruangan.index')->with('success', 'Ruangan deleted successfully.');
    }
}
