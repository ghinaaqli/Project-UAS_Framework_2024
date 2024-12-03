<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    <div class="container mx-auto mt-5">
                        <!-- Judul diperbesar dan ditebalkan -->
                        <h2 class="mb-5 text-3xl font-extrabold text-gray-800">Create New Mahasiswa</h2>

                        <x-auth-session-status class="mb-4" :status="session('success')" />

                        <form action="{{ route('mahasiswa-store') }}" method="POST" class="space-y-4">
                            @csrf <!-- Laravel CSRF protection -->

                            <!-- Input Nama -->
                            <div class="form-group">
                                <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                                <input type="text" id="nama" name="nama" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>

                            <!-- Input NPM -->
                            <div class="form-group">
                                <label for="npm" class="block text-sm font-medium text-gray-700">NPM</label>
                                <input type="text" id="npm" name="npm" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm" required>
                            </div>

                            <!-- Input Prodi -->
                            <div class="form-group">
                                <label for="prodi" class="block text-sm font-medium text-gray-700">Prodi</label>
                                <input id="prodi" name="prodi" rows="3" class="block w-full p-2 mt-1 border border-gray-300 rounded-md shadow-sm focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm">
                            </div>

                            <!-- Tombol Submit -->
                            <button type="submit" class="inline-flex justify-center px-4 py-2 text-sm font-medium text-black bg-blue-300 border border-transparent rounded-md shadow-sm hover:bg-blue-400 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500">
                                Submit
                            </button>
                        </form>
                    </div>

                    @vite('resources/js/app.js') <!-- Include Vite's JS assets -->
                </div>
            </div>
        </div>
    </div>
</x-app-layout>