<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;

class MahasiswaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Mahasiswa::all();

        // Return the view with the data
        return view('master-data.data-master.index-mahasiswa', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view("master-data.mahasiswa-master.create-mahasiswa");
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi_data = $request->validate([
            'nama'  => 'required|string|max:255',
            'npm'   => 'required|string|max:20',
            'prodi' => 'required|string|max:50',
        ]);

        Mahasiswa::create($validasi_data);

        $data = Mahasiswa::all();

        return view('master-data.mahasiswa-master.create-mahasiswa', compact('data'))->with('success', 'Mahasiswa created successfully!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Mahasiswa::findOrFail($id);

        // Menampilkan view dengan data mahasiswa yang akan diedit
        return view('master-data.data-master.edit-mahasiswa', compact('mahasiswa'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validasi_data = $request->validate([
            'nama'  => 'required|string|max:255',
            'npm'   => 'required|string|max:20',
            'prodi' => 'required|string|max:50',
        ]);

        // Mencari mahasiswa berdasarkan id
        $data = Mahasiswa::findOrFail($id);

        // Update data mahasiswa
        $data->update($validasi_data);

        // Redirect dengan pesan sukses
        return redirect()->route('mahasiswa-index')->with('success', 'Mahasiswa updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);

        // Menghapus data mahasiswa
        $mahasiswa->delete();

        // Redirect dengan pesan sukses
        return redirect()->route('mahasiswa-index')->with('success', 'Mahasiswa deleted successfully!');
    }
}
