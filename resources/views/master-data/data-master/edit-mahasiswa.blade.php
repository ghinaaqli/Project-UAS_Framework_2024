<!-- resources/views/master-data/mahasiswa-master/edit-mahasiswa.blade.php -->

@extends('layouts.app')

@section('content')
<div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
    <h2>Edit Mahasiswa</h2>

    <form method="POST" action="{{ route('mahasiswa-update', $mahasiswa->id) }}">
        @csrf
        @method('PUT')

        <div>
            <label for="nama" class="block">Nama</label>
            <input type="text" name="nama" id="nama" value="{{ old('nama', $mahasiswa->nama) }}" required class="mt-1 block w-full" />
        </div>

        <div class="mt-4">
            <label for="npm" class="block">NPM</label>
            <input type="text" name="npm" id="npm" value="{{ old('npm', $mahasiswa->npm) }}" required class="mt-1 block w-full" />
        </div>

        <div class="mt-4">
            <label for="prodi" class="block">Program Studi</label>
            <input type="text" name="prodi" id="prodi" value="{{ old('prodi', $mahasiswa->prodi) }}" required class="mt-1 block w-full" />
        </div>

        <div class="mt-6">
            <button type="submit" class="bg-blue-500 text-white py-2 px-4 rounded-md">Update Mahasiswa</button>
        </div>
    </form>
</div>
@endsection