<?php

namespace App\Http\Controllers;

use App\Models\Golongan;
use Illuminate\Http\Request;

class GolonganController extends Controller
{
    public function index()
    {
        $golongan = Golongan::all();
        return view('a_admin.b_golongan.index', compact('golongan'));
    }

    public function create()
    {
        return view('a_admin.b_golongan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_golongan' => 'required|string|max:255',
        ]);

        Golongan::create($request->all());

        return redirect()->route('golongan.index')
                         ->with('success', 'Golongan created successfully.');
    }

    public function show($id)
    {
        $golongan = Golongan::findOrFail($id);
        return view('a_admin.b_golongan.show', compact('golongan'));
    }

    public function edit($id)
    {
        $golongan = Golongan::findOrFail($id);
        return view('a_admin.b_golongan.edit', compact('golongan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_golongan' => 'required|string|max:255',
        ]);

        $golongan = Golongan::findOrFail($id);
        $golongan->update($request->all());

        return redirect()->route('golongan.index')
                         ->with('success', 'Golongan updated successfully.');
    }

    public function destroy($id)
    {
        $golongan = Golongan::findOrFail($id);
        $golongan->delete();

        return redirect()->route('golongan.index')
                         ->with('success', 'Golongan deleted successfully.');
    }
}
