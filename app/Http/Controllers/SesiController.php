<?php

namespace App\Http\Controllers;

use App\Models\Sesi;
use Illuminate\Http\Request;

class SesiController extends Controller
{
    /**
     * Display a listing of the sesi.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        $sesi = Sesi::all();
        return view('a_admin.b_sesi.index', compact('sesi'));
    }

    /**
     * Show the form for creating a new sesi.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('a_admin.b_sesi.create');
    }

    /**
     * Store a newly created sesi in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {
        $request->validate([
            'nama_sesi' => 'required|string|max:255',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
            'keterangan' => 'nullable|string|max:255',
        ]);

        Sesi::create([
            'nama_sesi' => $request->nama_sesi,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('sesi.index')->with('success', 'Sesi berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified sesi.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $sesi = Sesi::findOrFail($id);
        return view('a_admin.b_sesi.edit', compact('sesi'));
    }

    /**
     * Update the specified sesi in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_sesi' => 'required|string|max:255',
            'jam_mulai' => 'required|date_format:H:i',
            'jam_selesai' => 'required|date_format:H:i',
            'keterangan' => 'nullable|string|max:255',
        ]);

        $sesi = Sesi::findOrFail($id);
        $sesi->update([
            'nama_sesi' => $request->nama_sesi,
            'jam_mulai' => $request->jam_mulai,
            'jam_selesai' => $request->jam_selesai,
            'keterangan' => $request->keterangan,
        ]);

        return redirect()->route('sesi.index')->with('success', 'Sesi berhasil diperbarui');
    }

    /**
     * Display the specified sesi.
     *
     * @param  int  $id
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $sesi = Sesi::findOrFail($id);
        return view('a_admin.b_sesi.show', compact('sesi'));
    }

    /**
     * Remove the specified sesi from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function destroy($id)
    {
        $sesi = Sesi::findOrFail($id);
        $sesi->delete();

        return redirect()->route('sesi.index')->with('success', 'Sesi berhasil dihapus');
    }
}
