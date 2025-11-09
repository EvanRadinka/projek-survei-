<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Survei Kepuasan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-amber-300 border-b border-gray-200">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">{{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('survei.submit') }}">
                        @csrf

                        <div class="mb-4">
                            <label for="nama" class="block text-sm font-medium text-gray-700">Nama</label>
                            <input type="text"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                id="nama" name="nama" required>
                        </div>
                        <div class="mb-4">
                            <label for="no_telepon" class="block text-sm font-medium text-gray-700">No Telepon</label>
                            <input type="text"
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                id="no_telepon" name="no_telepon" required>
                        </div>

                        <div class="mb-4">
                            <label for="jenis_Pelayanan" class="block text-sm font-medium text-gray-700">Jenis
                                Pelayanan</label>
                            <select
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                id="jenis_Pelayanan" name="jenis_Pelayanan" required>
                                <option value="">Pilih Jenis Pelayanan</option>
                                <option value="Pelayanan Administrasi">Surat Kematian</option>
                                <option value="Pelayanan Kesehatan">Surat Keterangan Tidak Mampu</option>
                                <option value="Pelayanan Sosial">Surat Keterangan Umum</option>
                                <option value="Pelayanan Lainnya">Surat Nikah</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="nilai_Pelayanan" class="block text-sm font-medium text-gray-700">Nilai Pelayanan</label>
                            <select
                             class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                id="nilai_Pelayanan" name="nilai_Pelayanan" required>
                                <option value="">Pilih Nilai Pelayanan</option>
                                <option value="5">Sangat Baik</option>
                                <option value="4">Baik</option>
                                <option value="3">Cukup</option>
                                <option value="2">Kurang</option>
                                <option value="1">Sangat Kurang</option>
                            </select>
                        </div>

                        <div class="mb-4">
                            <label for="nilai_petugas" class="block text-sm font-medium text-gray-700">Nilai
                                Petugas</label>
                            <select
                                class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:ring-indigo-500 focus:border-indigo-500"
                                id="nilai_petugas" name="nilai_petugas" required>
                                <option value="">Pilih Nilai Petugas</option>
                                <option value="Sangat Baik">Sangat Baik</option>
                                <option value="Baik">Baik</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Kurang">Kurang</option>
                                <option value="Sangat Kurang">Sangat Kurang</option>
                            </select>
                        </div>
                        <button type="submit"
                            class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
