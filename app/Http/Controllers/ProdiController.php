<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Jurusan;
use App\Models\Jenjang;
use Illuminate\Http\Request;

class ProdiController extends Controller
{
    /**
     * Display a listing of the Prodi.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $prodi = Prodi::with(['jurusan', 'jenjang'])->get();
        return view('a_admin.b_prodi.index', compact('prodi'));
    }

    /**
     * Show the form for creating a new Prodi.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $jurusan = Jurusan::all();
        $jenjang = Jenjang::all();
        return view('a_admin.b_prodi.create', compact('jurusan', 'jenjang'));
    }

    /**
     * Store a newly created Prodi in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_prodi' => 'required|string|max:255',
            'id_jurusan' => 'required|exists:jurusan,id_jurusan',
            'id_jenjang' => 'required|exists:jenjang,id_jenjang',
        ]);

        Prodi::create([
            'nama_prodi' => $request->nama_prodi,
            'id_jurusan' => $request->id_jurusan,
            'id_jenjang' => $request->id_jenjang,
        ]);

        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified Prodi.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $prodi = Prodi::findOrFail($id);
        $jurusan = Jurusan::all();
        $jenjang = Jenjang::all();
        return view('a_admin.b_prodi.edit', compact('prodi', 'jurusan', 'jenjang'));
    }

    /**
     * Update the specified Prodi in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_prodi' => 'required|string|max:255',
            'id_jurusan' => 'required|exists:jurusan,id_jurusan',
            'id_jenjang' => 'required|exists:jenjang,id_jenjang',
        ]);

        $prodi = Prodi::findOrFail($id);
        $prodi->update([
            'nama_prodi' => $request->nama_prodi,
            'id_jurusan' => $request->id_jurusan,
            'id_jenjang' => $request->id_jenjang,
        ]);

        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil diperbarui');
    }

    /**
     * Display the specified Prodi.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $prodi = Prodi::findOrFail($id);
        return view('a_admin.b_prodi.show', compact('prodi'));
    }

    /**
     * Remove the specified Prodi from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $prodi = Prodi::findOrFail($id);
        $prodi->delete();

        return redirect()->route('prodi.index')->with('success', 'Prodi berhasil dihapus');
    }
}
