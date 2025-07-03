<?php

namespace App\Http\Controllers;

use App\Models\TempatPkl;
use Illuminate\Http\Request;

class TempatPklController extends Controller
{
    // Display a listing of the resource
    public function index()
    {
        $tempat_pkl = TempatPkl::all(); // Fetch all records
        return view('tempat_pkl.index', compact('tempat_pkl'));
    }

    // Show the form for creating a new resource
    public function create()
    {
        return view('tempat_pkl.create');
    }

    // Store a newly created resource in storage
    public function store(Request $request)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'kuota' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        TempatPkl::create($request->all()); // Create new record

        return redirect()->route('tempat_pkl.index')->with('success', 'Tempat PKL created successfully');
    }

    // Display the specified resource
    public function show($id)
    {
        $tempatPkl = TempatPkl::findOrFail($id); // Fetch the record by ID
        return view('tempat_pkl.show', compact('tempatPkl'));
    }

    // Show the form for editing the specified resource
    public function edit($id)
    {
        $tempatPkl = TempatPkl::findOrFail($id); // Fetch the record by ID
        return view('tempat_pkl.edit', compact('tempatPkl'));
    }

    // Update the specified resource in storage
    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_perusahaan' => 'required',
            'alamat_perusahaan' => 'required',
            'kuota' => 'required|integer',
            'status' => 'required|boolean',
        ]);

        $tempatPkl = TempatPkl::findOrFail($id);
        $tempatPkl->update($request->all()); // Update record

        return redirect()->route('tempat_pkl.index')->with('success', 'Tempat PKL updated successfully');
    }

    // Remove the specified resource from storage
    public function destroy($id)
    {
        $tempatPkl = TempatPkl::findOrFail($id);
        $tempatPkl->delete(); // Delete the record

        return redirect()->route('tempat_pkl.index')->with('success', 'Tempat PKL deleted successfully');
    }
}
