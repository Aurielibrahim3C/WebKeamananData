<?php

namespace App\Http\Controllers;

use App\Models\RegistrasiPkl;
use App\Models\Mahasiswa;
use App\Models\TempatPkl;
use App\Models\Dosen;
use Illuminate\Http\Request;

class RegistrasiPklController extends Controller
{
    public function index()
    {
        $registrasi_pkl = RegistrasiPkl::with(['mahasiswa', 'tempatPkl', 'pembimbing'])->get();
        return view('registrasi_pkl.index', compact('registrasi_pkl'));
    }

    public function create()
    {
        $mahasiswa = Mahasiswa::all();
        $tempatPkl = TempatPkl::all();
        $dosen = Dosen::all();
        return view('registrasi_pkl.create', compact('mahasiswa', 'tempatPkl', 'dosen'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'id_mhs' => 'required|exists:mahasiswa,id_mhs',
            'id_tempat_pkl' => 'nullable|exists:tempat_pkl,id_tempat_pkl',
            'alamat_perusahaan' => 'required|string|max:255',
            'file' => 'nullable|file',
            'pembimbing_id' => 'nullable|exists:dosens,id_dosen',
            'konfirmasi' => 'required|in:0,1',
        ]);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('registrasi_pkl_files');
        }

        RegistrasiPkl::create($validated);

        return redirect()->route('registrasi_pkl.index')->with('success', 'Data created successfully!');
    }

    public function show($id)
    {
        $registrasiPkl = RegistrasiPkl::with(['mahasiswa', 'tempatPkl', 'pembimbing'])->findOrFail($id);
        return view('registrasi_pkl.show', compact('registrasiPkl'));
    }

    public function edit($id)
    {
        $registrasiPkl = RegistrasiPkl::findOrFail($id);
        $mahasiswa = Mahasiswa::all();
        $tempatPkl = TempatPkl::all();
        $dosen = Dosen::all();
        return view('registrasi_pkl.edit', compact('registrasiPkl', 'mahasiswa', 'tempatPkl', 'dosen'));
    }

    public function update(Request $request, $id)
    {
        $validated = $request->validate([
            'id_mhs' => 'required|exists:mahasiswa,id_mhs',
            'id_tempat_pkl' => 'nullable|exists:tempat_pkl,id_tempat_pkl',
            'alamat_perusahaan' => 'required|string|max:255',
            'file' => 'nullable|file',
            'pembimbing_id' => 'nullable|exists:dosens,id_dosen',
            'konfirmasi' => 'required|in:0,1',
        ]);

        $registrasiPkl = RegistrasiPkl::findOrFail($id);

        if ($request->hasFile('file')) {
            $validated['file'] = $request->file('file')->store('registrasi_pkl_files');
        }

        $registrasiPkl->update($validated);

        return redirect()->route('registrasi_pkl.index')->with('success', 'Data updated successfully!');
    }
}
