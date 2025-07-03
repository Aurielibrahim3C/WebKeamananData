<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Prodi;
use App\Models\Jurusan;
use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    // Display a list of mahasiswa
    public function index()
    {
        $mahasiswa = Mahasiswa::with(['prodi', 'jurusan'])->get();
        return view('a_admin.b_mahasiswa.index', compact('mahasiswa'));
    }

    // Show the form for creating a new mahasiswa
    public function create()
    {
        $prodi = Prodi::all();
        $jurusan = Jurusan::all();
        return view('a_admin.b_mahasiswa.create', compact('prodi', 'jurusan'));
    }

    // Fetch Prodi based on the selected Jurusan
    public function getProdi($id_jurusan)
    {
        $prodi = Prodi::where('id_jurusan', $id_jurusan)->get();
        return response()->json($prodi);
    }

    // Store a newly created mahasiswa in the database
    public function store(Request $request)
    {



        // Validate the input
        $validatedData = $request->validate([
            'nim' => 'required|unique:mahasiswa',
            'nama' => 'required',
            'id_prodi' => 'required|exists:prodi,id_prodi',
            'id_jurusan' => 'required|exists:jurusan,id_jurusan',
            'gender' => 'required',
            'password' => 'required|min:6',
            'tanggal_daftar' => 'required|date',
            'akses' => 'required|integer',
        ]);

        // Handle file upload (if any)
        if ($request->hasFile('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        // Create Mahasiswa record
        $mahasiswa = Mahasiswa::create([
            'nim' => $validatedData['nim'],
            'nama' => $validatedData['nama'],
            'gender' => $validatedData['gender'],
            'password' => bcrypt($validatedData['password']),
            'foto' => $validatedData['foto'] ?? null,
            'akses' => $validatedData['akses'],
            'tanggal_daftar' => $validatedData['tanggal_daftar'],
            'id_jurusan' => $validatedData['id_jurusan'],
            'id_prodi' => $validatedData['id_prodi'],
        ]);

        // Create associated User for Mahasiswa
        $user = User::create([
            'username' => $validatedData['nim'],
            'password' => bcrypt($validatedData['password']),
            'name' => $validatedData['nama'],
            'role_id' => 1, // Adjust level as needed
        ]);

        // Link Mahasiswa with User
        $mahasiswa->user_id = $user->id_user;
        $mahasiswa->save();

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil ditambahkan!');
    }

    // Show the form for editing a specific mahasiswa
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $prodi = Prodi::all();
        $jurusan = Jurusan::all();
        return view('a_admin.b_mahasiswa.edit', compact('mahasiswa', 'prodi', 'jurusan'));
    }

    // Show the details of a specific mahasiswa
    public function show($id)
    {
        $mahasiswa = Mahasiswa::with(['prodi', 'jurusan'])->findOrFail($id);
        return view('a_admin.b_mahasiswa.show', compact('mahasiswa'));
    }

    // Update the specified mahasiswa in the database
    public function update(Request $request, $id)
    {
        // Validate the input
        $validatedData = $request->validate([
            'nim' => 'required|unique:mahasiswa,nim,' . $id . ',id_mhs',
            'nama' => 'required',
            'id_prodi' => 'required|exists:prodi,id_prodi',
            'id_jurusan' => 'required|exists:jurusan,id_jurusan',
            'gender' => 'required',
            'password' => 'required|min:6',
            'tanggal_daftar' => 'required|date',
            'akses' => 'required|integer',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);

        // Handle file upload (if any)
        if ($request->hasFile('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        // Update Mahasiswa record
        $mahasiswa->update($validatedData);

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil diperbarui!');
    }

    // Remove the specified mahasiswa from the database
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa.index')->with('success', 'Data Mahasiswa berhasil dihapus!');
    }
}
