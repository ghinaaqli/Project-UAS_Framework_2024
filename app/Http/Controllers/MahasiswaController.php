<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use Illuminate\Http\Request;
use App\Exports\MahasiswaExport;
use Maatwebsite\Excel\Facades\Excel;

class MahasiswaController extends Controller
{
    // Fungsi untuk menampilkan data mahasiswa
    public function index()
    {
        $data = Mahasiswa::all(); // Ambil semua data mahasiswa
        return view('master-data.data-master.index-mahasiswa', compact('data'));
    }

    // Fungsi untuk menampilkan form create (input data mahasiswa)
    public function create()
    {
        return view("master-data.mahasiswa-master.create-mahasiswa");
    }

    // Fungsi untuk menyimpan data mahasiswa baru
    public function store(Request $request)
    {
        $validasi_data = $request->validate([
            'nama'  => 'required|string|max:255',
            'npm'   => 'required|string|max:20',
            'prodi' => 'required|string|max:50',
        ]);

        Mahasiswa::create($validasi_data);
        return redirect()->route('mahasiswa-index')->with('success', 'Mahasiswa created successfully!');
    }

    // Fungsi untuk menampilkan data mahasiswa yang akan diedit
    public function edit($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        return view('master-data.data-master.edit-mahasiswa', compact('mahasiswa'));
    }

    // Fungsi untuk memperbarui data mahasiswa
    public function update(Request $request, $id)
    {
        $validasi_data = $request->validate([
            'nama'  => 'required|string|max:255',
            'npm'   => 'required|string|max:20',
            'prodi' => 'required|string|max:50',
        ]);

        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->update($validasi_data);

        return redirect()->route('mahasiswa-index')->with('success', 'Mahasiswa updated successfully!');
    }

    // Fungsi untuk menghapus data mahasiswa
    public function destroy($id)
    {
        $mahasiswa = Mahasiswa::findOrFail($id);
        $mahasiswa->delete();

        return redirect()->route('mahasiswa-index')->with('success', 'Mahasiswa deleted successfully!');
    }

    public function export()
    {
        return Excel::download(new MahasiswaExport, 'mahasiswa.xlsx');
    }
}
