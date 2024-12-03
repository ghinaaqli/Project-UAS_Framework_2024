<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Daftar Mahasiswa') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto mt-5">
                        <h2 class="mb-5 text-3xl font-extrabold text-gray-800">Daftar Mahasiswa</h2>

                        <x-auth-session-status class="mb-4" :status="session('success')" />

                        <!-- Menampilkan Daftar Mahasiswa -->
                        <table class="min-w-full mt-4 table-auto border-collapse border border-gray-200">
                            <thead>
                                <tr>
                                    <th class="px-4 py-2 border-b text-left">Nama</th>
                                    <th class="px-4 py-2 border-b text-left">NPM</th>
                                    <th class="px-4 py-2 border-b text-left">Prodi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($data as $mahasiswa)
                                <tr>
                                    <td class="px-4 py-2 border-b">{{ $mahasiswa->nama }}</td>
                                    <td class="px-4 py-2 border-b">{{ $mahasiswa->npm }}</td>
                                    <td class="px-4 py-2 border-b">{{ $mahasiswa->prodi }}</td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>

                    @vite('resources/js/app.js')
                </div>
            </div>
        </div>
    </div>
</x-app-layout>