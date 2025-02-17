@extends('layoutes.app')

@section('content')
<div class="container mx-auto pt-20 pb-10">
    <div class="items-center w-full md:mt-8 text-gray-800 ">
        <div class="flex flex-col">
            <div class="border-b border-gray-200 shadow  w-full">
                
                <a href="{{ route('download.laporan.produk') }}" class="bg-blue-600 hover:bg-blue-400 text-white font-semibold py-2 px-6 rounded-lg mb-4 inline-block">
                    Download Laporan Produk
                </a>

                <div class="overflow-x-auto">
                    <table class="divide-y w-full table-auto">
                        <thead class="bg-gray-50">
                            <tr>
                                <th class="px-6 py-3 text-xs text-center text-gray-500">No</th>
                                <th class="px-6 py-3 text-xs text-center text-gray-500">Nama Barang</th>
                                <th class="px-6 py-3 text-xs text-center text-gray-500">Merk Barang</th>
                                <th class="px-6 py-3 text-xs text-center text-gray-500">Harga Jual</th>
                                <th class="px-6 py-3 text-xs text-center text-gray-500">Harga Beli</th>
                                <th class="px-6 py-3 text-xs text-center text-gray-500">Stok</th>
                                <th class="px-6 py-3 text-xs text-center text-gray-500">Foto</th>
                                <th class="px-6 py-3 text-xs text-center text-gray-500">Edit</th>
                                <th class="px-6 py-3 text-xs text-center text-gray-500">Delete</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-300">
                            @foreach ($produk as $k)
                            <tr class="whitespace-nowrap">
                                <td class="px-6 py-4 text-sm text-gray-500 text-center">{{ $loop->iteration }}</td>
                                <td class="px-6 py-4 text-center text-sm text-gray-900">{{ $k->nama }}</td>
                                <td class="px-6 py-4 text-center text-sm text-gray-500">{{ $k->jenis }}</td>
                                <td class="px-6 py-4 text-center text-sm text-gray-500">Rp.{{ number_format($k->harga_jual, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-center text-sm text-gray-500">Rp.{{ number_format($k->harga_beli, 0, ',', '.') }}</td>
                                <td class="px-6 py-4 text-center text-sm text-gray-500">{{ $k->jumlah }}</td>
                                <td class="px-6 py-4 text-center text-sm text-gray-500">
                                    @empty($k->foto)
                                    <img src="{{ url('image/nophoto.jpg') }}" alt="project-image" class="rounded" style="width: 100px; height: auto;">
                                    @else
                                    <img src="{{ url('image') }}/{{$k->foto}}" alt="project-image" class="rounded" style="width: 100px; height: auto;">
                                    @endempty
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#" onclick="openEditModal('{{ $k->id }}', '{{ $k->nama }}', '{{ $k->jenis }}', '{{ $k->harga_jual }}', '{{ $k->harga_beli }}', '{{ $k->jumlah }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-blue-400 hover:text-blue-600" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                        </svg>
                                    </a>
                                </td>
                                <td class="px-6 py-4 text-center">
                                    <a href="#" onclick="confirmDelete('{{ $k->id }}', '{{ $k->nama }}')">
                                        <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6 text-red-400 hover:text-red-600 cursor-pointer" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                        </svg>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Pop Up Modal -->
<div id="editModal" class="fixed inset-0 z-50 hidden overflow-y-auto">
    <div class="flex items-center justify-center min-h-screen px-4 pt-4 pb-20 text-center sm:block sm:p-0">
        <!-- Background overlay -->
        <div class="fixed inset-0 bg-black bg-opacity-50 transition-opacity" aria-hidden="true"></div>

        <!-- Modal content -->
        <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
            <!-- Modal header -->
            <div class="bg-white p-6">
                <h3 class="text-2xl font-semibold text-gray-800 mb-4 text-center">Edit Barang</h3>
            </div>

            <!-- Modal body -->
            <div class="bg-white px-6 pt-5 pb-4">
                <form id="editForm" action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <!-- Nama Barang -->
                    <div class="mb-4">
                        <label for="nama" class="block text-sm font-medium text-gray-700">Nama Barang</label>
                        <input type="text" name="nama" id="nama" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>

                    <!-- Merk Barang -->
                    <div class="mb-4">
                        <label for="jenis" class="block text-sm font-medium text-gray-700">Merk Barang</label>
                        <input type="text" name="jenis" id="jenis" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>

                    <!-- Harga Jual -->
                    <div class="mb-4">
                        <label for="harga_jual" class="block text-sm font-medium text-gray-700">Harga Jual</label>
                        <input type="number" name="harga_jual" id="harga_jual" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>

                    <!-- Harga Beli -->
                    <div class="mb-4">
                        <label for="harga_beli" class="block text-sm font-medium text-gray-700">Harga Beli</label>
                        <input type="number" name="harga_beli" id="harga_beli" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>

                    <!-- Stok -->
                    <div class="mb-4">
                        <label for="jumlah" class="block text-sm font-medium text-gray-700">Jumlah</label>
                        <input type="number" name="jumlah" id="jumlah" class="mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 sm:text-sm">
                    </div>

                    <!-- Foto Barang -->
                    <div class="mb-4">
                        <label for="foto" class="block text-sm font-medium text-gray-700">Foto Barang</label>
                        <input type="file" name="foto" id="foto" class="mt-1 block w-full">
                    </div>
                </form>
            </div>

            <!-- Footer -->
            <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                <button type="button" onclick="submitEditForm()" class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-blue-600 text-base font-medium text-white hover:bg-blue-700 sm:ml-3 sm:w-auto sm:text-sm">
                    Simpan
                </button>
                <button type="button" onclick="closeEditModal()" class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm">
                    Batal
                </button>
            </div>
        </div>
    </div>
</div>
@endsection
