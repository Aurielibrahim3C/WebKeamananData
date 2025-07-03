<?php

namespace App\Http\Controllers;

use App\Models\Jenjang;
use Illuminate\Http\Request;

class JenjangController extends Controller
{
    public function index()
    {
        $jenjang = Jenjang::all();
        return view('a_admin.b_jenjang.index', compact('jenjang'));
    }

    public function create()
    {
        return view('a_admin.b_jenjang.create');
    }

    public function store(Request $request)
    {

        $request->validate([
            'nama_jenjang' => 'required|string|max:255',

        ]);

        Jenjang::create($request->all());

        return redirect()->route('jenjang.index')->with('success', 'Data jenjang berhasil ditambahkan.');
    }

    public function show($id)
    {
        $jenjang = Jenjang::findOrFail($id);
        return view('a_admin.b_jenjang.show', compact('jenjang'));
    }

    public function edit($id)
    {
        $jenjang = Jenjang::findOrFail($id);
        return view('jenjang.edit', compact('jenjang'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_jenjang' => 'required|string|max:255',

        ]);

        $jenjang = Jenjang::findOrFail($id);
        $jenjang->update($request->all());

        return redirect()->route('jenjang.index')->with('success', 'Data jenjang berhasil diperbarui.');
    }

    public function destroy($id)
    {
        $jenjang = Jenjang::findOrFail($id);
        $jenjang->delete();

        return redirect()->route('jenjang.index')->with('success', 'Data jenjang berhasil dihapus.');
    }
}
