<?php

namespace App\Http\Controllers;

use App\Models\Jurusan;
use Illuminate\Http\Request;

class JurusanController extends Controller
{
    public function index()
    {
        $jurusan = Jurusan::all();
        return view('a_admin.b_jurusan.index', compact('jurusan'));
    }

    public function create()
    {
        return view('a_admin.b_jurusan.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode_jurusan' => 'required|unique:jurusan',
            'nama_jurusan' => 'required',
        ]);

        Jurusan::create($request->all());
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil ditambahkan.');
    }

    public function show($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('a_admin.b_jurusan.show', compact('jurusan'));
    }

    public function edit($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        return view('jurusan.edit', compact('jurusan'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode_jurusan' => 'required|unique:jurusan,kode_jurusan,' . $id . ',id_jurusan',
            'nama_jurusan' => 'required',
        ]);

        $jurusan = Jurusan::findOrFail($id);
        $jurusan->update($request->all());
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jurusan = Jurusan::findOrFail($id);
        $jurusan->delete();
        return redirect()->route('jurusan.index')->with('success', 'Jurusan berhasil dihapus.');
    }
}
