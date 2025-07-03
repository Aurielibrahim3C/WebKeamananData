<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Dosen;
use App\Models\Prodi;
use App\Models\Jabatan;
use App\Models\Jurusan;
use App\Models\Golongan;
use Illuminate\Http\Request;

class DosenController extends Controller
{
    // Menampilkan semua data dosen
    public function index()
    {
        $dosens = Dosen::all();
        return view('a_admin.b_dosen.index', compact('dosens'));
    }

    // Menampilkan form untuk menambahkan dosen baru
    public function create()
    {

       $golongan = Golongan::all();
        $jabatan = Jabatan::all();
        $jurusan = Jurusan::all();
        $prodi = Prodi::all();

        return view('a_admin.b_dosen.create', compact('prodi', 'jurusan', 'jabatan', 'golongan'));
    }

    // Menyimpan data dosen baru
    public function store(Request $request)
    {



        $validatedData = $request->validate([
            'nidn' => 'required',
            'nama' => 'required',
            'gender' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'password' => 'required',
            'pendidikan' => 'required',
            'id_jurusan' => 'required|exists:jurusan,id_jurusan',
            'id_prodi' => 'required|exists:prodi,id_prodi',
            'id_jabatan' => 'required|exists:jabatan,id_jabatan',
            'id_golongan' => 'required|exists:golongan,id_golongan',
            'alamat' => 'required',
            'email' => 'required|email|unique:dosens,email',
            'no_hp' => 'required',
            'status' => 'required',
            'sinta' => 'nullable',
            'link_sinta' => 'nullable',
            'schoolar' => 'nullable',
        ]);

        if ($request->hasFile('foto')) {
            $validatedData['foto'] = $request->file('foto')->store('uploads', 'public');
        }

        $dosen = Dosen::create([
            'nidn' => $validatedData['nidn'],
            'nama' => $validatedData['nama'],
            'gender' => $validatedData['gender'],
            'tempat_lahir' => $validatedData['tempat_lahir'],
            'tgl_lahir' => $validatedData['tgl_lahir'],
            'password' => bcrypt($validatedData['password']),
            'pendidikan' => $validatedData['pendidikan'],
            'id_jurusan' => $validatedData['id_jurusan'],
            'id_prodi' => $validatedData['id_prodi'],
            'id_jabatan' => $validatedData['id_jabatan'],
            'id_golongan' => $validatedData['id_golongan'],
            'alamat' => $validatedData['alamat'],
            'email' => $validatedData['email'],
            'no_hp' => $validatedData['no_hp'],
            'foto' => $validatedData['foto'] ?? null,
            'sinta' => $validatedData['sinta'],
            'link_sinta' => $validatedData['link_sinta'],
            'schoolar' => $validatedData['schoolar'],
            'status' => $validatedData['status'],
        ]);

        $user = User::create([
            'username' => $validatedData['email'],
            'password' => bcrypt($validatedData['password']),
            'name' => $validatedData['nama'],
            'role_id' => 2, // Sesuaikan level sesuai kebutuhan
        ]);

        $dosen->user_id = $user->id_user;
        $dosen->save();

        return redirect()->route('dosens.index')->with('success', 'Dosen berhasil ditambahkan.');
    }

    // Menampilkan detail dosen
    public function show($id_dosen)
    {
        $dosen = Dosen::where('id_dosen', $id_dosen)->firstOrFail();
        return view('a_admin.b_dosen.show', compact('dosen'));
    }

    // Menampilkan form edit dosen
    public function edit($id)
    {

        $golongan = Golongan::all();
        $jabatan = Jabatan::all();
        $jurusan = Jurusan::all();
        $prodi = Prodi::all();
        $dosen = Dosen::findOrFail($id);

        return view('a_admin.b_dosen.edit', compact('dosen', 'jurusan', 'prodi', 'jabatan', 'golongan'));
    }

    // Memperbarui data dosen
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nidn' => 'required',
            'nama' => 'required',
            'gender' => 'required',
            'tempat_lahir' => 'required',
            'tgl_lahir' => 'required|date',
            'password' => 'sometimes',
            'pendidikan' => 'required',
            'id_jurusan' => 'required|exists:jurusan,id_jurusan',
            'id_prodi' => 'required|exists:prodi,id_prodi',
            'id_jabatan' => 'required|exists:jabatan,id_jabatan',
            'id_golongan' => 'required|exists:golongan,id_golongan',
            'alamat' => 'required',
            'email' => 'required|email|unique:dosens,email,' . $id . ',id_dosen',
            'no_hp' => 'required',
            'foto' => 'sometimes|image',
            'sinta' => 'nullable',
            'link_sinta' => 'nullable',
            'schoolar' => 'nullable',
            'status' => 'required',
        ]);

        $dosen = Dosen::findOrFail($id);
        $data = $request->all();

        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('images/dosen', 'public');
        }

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        } else {
            unset($data['password']);
        }

        $dosen->update($data);

        return redirect()->route('dosens.index')->with('success', 'Data dosen berhasil diperbarui.');
    }


    // Menghapus data dosen
    public function destroy($id)
    {
        Dosen::destroy($id);
        return redirect()->route('dosens.index')->with('success', 'Dosen berhasil dihapus.');
    }
}
