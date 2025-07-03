<?php

namespace App\Http\Controllers;

use App\Models\MahasiswaPklLogBook;
use App\Models\RegistrasiPkl;
use Illuminate\Http\Request;

class MahasiswaPklLogBookController extends Controller
{
    public function index()
    {
        $logBooks = MahasiswaPklLogBook::with('registrasiPkl')->get();
        return view('logbook.index', compact('logBooks'));
    }

    public function create()
    {
        $registrasi_pkl = RegistrasiPkl::all();
        return view('logbook.create', compact('registrasi_pkl'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'id_registrasi_pkl' => 'required|exists:registrasi_pkl,id_registrasi_pkl',
            'tanggal_kegiatan_awal' => 'required|date',
            'tanggal_kegiatan_akhir' => 'required|date',
            'kegiatan' => 'required|string',
            'file_dokumentasi' => 'nullable|string',
            'komentar' => 'nullable|string',
        ]);

        $filePath = $request->hasFile('file')
        ? $request->file('file')->storeAs('uploads', time() . '_' . $request->file('file')->getClientOriginalName(), 'public')
        : null;

        MahasiswaPklLogBook::create($request->all());
        return redirect()->route('mahasiswa_pkl_log_book.index')->with('success', 'Log Book created successfully.');

         $filePath = $request->hasFile('file')
            ? $request->file('file')->storeAs('uploads', time() . '_' . $request->file('file')->getClientOriginalName(), 'public')
            : null;
    }

    public function edit($id)
    {
        $logBook = MahasiswaPklLogBook::findOrFail($id);
        $registrasiPkl = RegistrasiPkl::all();
        return view('logbook.edit', compact('logBook', 'registrasiPkl'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'id_registrasi_pkl' => 'required|exists:registrasi_pkl,id_registrasi_pkl',
            'tanggal_kegiatan_awal' => 'required|date',
            'tanggal_kegiatan_akhir' => 'required|date',
            'kegiatan' => 'required|string',
            'file_dokumentasi' => 'nullable|string',
            'komentar' => 'nullable|string',
        ]);

        $logBook = MahasiswaPklLogBook::findOrFail($id);
        $logBook->update($request->all());
        return redirect()->route('mahasiswa_pkl_log_book.index')->with('success', 'Log Book updated successfully.');
    }

    public function show($id)
    {
        $logBook = MahasiswaPklLogBook::findOrFail($id);
        return view('logbook.show', compact('logBook'));
    }

    public function acc($id)
    {
        $logBook = MahasiswaPklLogBook::findOrFail($id);

        // Mengubah kolom 'validasi' menjadi '1' (ACC)
        $logBook->update(['validasi' => '1']);

        return redirect()->route('mahasiswa_pkl_log_book.index')->with('success', 'Logbook berhasil di-ACC!');
    }


    public function destroy($id)
    {
        $logBook = MahasiswaPklLogBook::findOrFail($id);
        $logBook->delete();
        return redirect()->route('mahasiswa_pkl_log_book.index')->with('success', 'Log Book deleted successfully.');
    }
}
