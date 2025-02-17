@extends('layoutes.app')
@section('content')

    @if (session('success'))
        <div class="alert alert-success bg-green-100 text-green-800 p-4 rounded mb-4">
            {{ session('success') }}
        </div>
    @endif

    @if (session('error'))
        <div class="alert alert-danger bg-red-100 text-red-800 p-4 rounded mb-4">
            {{ session('error') }}
        </div>
    @endif

<div class="min-h-screen p-6 flex items-center justify-center pt-4 pb-10">
  <div class="container max-w-screen-lg mx-auto">
    <div class="bg-white p-6 rounded-lg shadow-md">
    <h1 class="text-3xl font-semibold mb-6 text-gray-600">Transaksi</h1>
        <form action="{{ route('kasir.store') }}" method="POST" class="mb-6">
            @csrf
            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="form-group">
                    <label for="produk_id" class="block text-gray-700 font-medium mb-2">Pilih Barang</label>
                    <select name="produk_id" id="produk_id" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" required>
                        <option value="">-- Pilih Barang --</option>
                        @foreach ($produk as $item)
                            <option value="{{ $item->id }}" data-stok="{{ $item->jumlah }}" data-harga="{{ $item->harga_jual }}">{{ $item->nama }} (Stok: {{ $item->jumlah }})</option>
                        @endforeach
                    </select>
                </div>
                <div class="form-group">
                    <label for="jumlah_terjual" class="block text-gray-700 font-medium mb-2">Jumlah</label>
                    <input type="number" name="jumlah_terjual" id="jumlah_terjual" class="w-full p-2 border border-gray-300 rounded-md focus:outline-none focus:ring-2 focus:ring-blue-500" min="1" required>
                </div>
            </div>

            <!-- Tanggal Pembelian (Hidden Input) -->
            <input type="hidden" name="tanggal_pembelian" id="tanggal_pembelian" value="{{ now()->toDateString() }}">

            <!-- Tampilkan Tanggal Pembelian (Read-Only) -->
            <div class="mb-4">
                <label for="tanggal_pembelian_display" class="block text-sm font-medium text-gray-700">Tanggal Pembelian</label>
                <input class="block text-sm text-gray-700 focus:outline-none" type="text" id="tanggal_pembelian_display" value="{{ now()->toDateString() }}" readonly>
            </div>

            <div class="mt-4">
                <button type="submit" class="px-6 py-2 bg-blue-600 hover:bg-blue-400 text-white font-bold rounded-md hover:bg-green-600 focus:outline-none">Konfirmasi Penjualan</button>
            </div>
        </form>
        
        <h2 class="pt-2 text-center block font-medium mb-6 text-gray-600">List Barang</h2>
        <table class="min-w-full table-auto bg-white border border-gray-300 rounded-lg shadow-sm">
            <thead>
                <tr>
                    <th class="px-4 py-2 text-center text-gray-700">Nama Produk</th>
                    <th class="px-4 py-2 text-center text-gray-700">Jenis</th>
                    <th class="px-4 py-2 text-center text-gray-700">Harga Jual</th>
                    <th class="px-4 py-2 text-center text-gray-700">Stok</th>
                    <th class="px-4 py-2 text-center text-gray-700">Foto</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($produk as $item)
                    <tr class="border-t">
                        <td class="px-4 py-2 text-center">{{ $item->nama }}</td>
                        <td class="px-4 py-2 text-center">{{ $item->jenis }}</td>
                        <td class="px-4 py-2 text-center">Rp.{{ number_format($item->harga_jual, 0, ',', '.') }}</td>
                        <td class="px-4 py-2 text-center">{{ $item->jumlah }}</td>
                        <td class="px-6 py-4 text-sm text-gray-500" style="text-align: center;">
                        @empty($item->foto)
                           <img src="{{url('image/nophoto.jpg')}}"
                            alt="project-image" class="rounded" style="width: 100%; max-width: 100px; height: auto; display: block; margin: auto;">
                        @else
                           <img src="{{url('image')}}/{{$item->foto}}"
                            alt="project-image" class="rounded" style="width: 100%; max-width: 100px; height: auto; display: block; margin: auto;">
                        @endempty
                      </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
</div>

    @if (session('error'))
        <script>
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: '{{ session('error') }}',
            });
        </script>
    @endif

    <script>
        document.getElementById('produk_id').addEventListener('change', function() {
            const selectedOption = this.options[this.selectedIndex];
            const stok = selectedOption.getAttribute('data-stok');
            const harga = selectedOption.getAttribute('data-harga');
            document.getElementById('jumlah_terjual').setAttribute('max', stok);
        });
    </script>
@endsection