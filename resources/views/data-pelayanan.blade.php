<x-app-layout>
    <div class="bg-white p-6 rounded-xl shadow-md">
        <div class="mb-6">
            <h1 class="text-3xl font-semibold text-gray-800 text-center">
                Data Pelayanan Survei Kepuasan
            </h1>
        </div>

        <div class="overflow-x-auto">
            <table class="min-w-full bg-white border border-gray-300">
                <thead class="bg-amber-300">
                    <tr>
                        <th class="py-3 px-4 border-b border-gray-300 text-left text-sm font-semibold text-black">No</th>
                        <th class="py-3 px-4 border-b border-gray-300 text-left text-sm font-semibold text-black">Nama</th>
                        <th class="py-3 px-4 border-b border-gray-300 text-left text-sm font-semibold text-black">No Telepon</th>
                        <th class="py-3 px-4 border-b border-gray-300 text-left text-sm font-semibold text-black">Jenis Pelayanan</th>
                        <th class="py-3 px-4 border-b border-gray-300 text-left text-sm font-semibold text-black">Nilai Pelayanan</th>
                        <th class="py-3 px-4 border-b border-gray-300 text-left text-sm font-semibold text-black">Nilai Petugas</th>
                        <th class="py-3 px-4 border-b border-gray-300 text-left text-sm font-semibold text-black">Tanggal</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($surveys as $index => $survey)
                    <tr class="hover:bg-gray-50">
                        <td class="py-3 px-4 border-b border-gray-300 text-sm text-gray-700">{{ $surveys->firstItem() + $index }}</td>
                        <td class="py-3 px-4 border-b border-gray-300 text-sm text-gray-700">{{ $survey->nama }}</td>
                        <td class="py-3 px-4 border-b border-gray-300 text-sm text-gray-700">{{ $survey->no_telepon }}</td>
                        <td class="py-3 px-4 border-b border-gray-300 text-sm text-gray-700">{{ $survey->jenis_Pelayanan }}</td>
                        <td class="py-3 px-4 border-b border-gray-300 text-sm text-gray-700">{{ $survey->nilai_Pelayanan }}</td>
                        <td class="py-3 px-4 border-b border-gray-300 text-sm text-gray-700">{{ $survey->nilai_petugas }}</td>
                        <td class="py-3 px-4 border-b border-gray-300 text-sm text-gray-700">{{ $survey->created_at->format('d/m/Y H:i') }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>

        <div class="mt-6">
            {{ $surveys->links() }}
        </div>
    </div>
</x-app-layout>
