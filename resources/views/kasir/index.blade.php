@extends('layoutes.app')
@section('content')

<div class="container mx-auto pt-20 pb-10">
    <div class="items-center w-full md:mt-8 text-gray-800">
        <div class="flex flex-col">
            <div class="border-b border-gray-200 shadow w-full">

            @auth
          @if(Auth::user()->role === 'Admin')
                <a href="{{ route('download.laporan.produk') }}" class="bg-blue-600 hover:bg-blue-400 text-white font-semibold py-2 px-6 rounded-lg mb-4 inline-block">
                    Download Laporan Produk
                </a>
                @endif
                @endauth

                <table class="divide-y w-full">
                    <thead class="bg-gray-50">
                        <tr>
                            <th class="px-6 py-2 text-xs text-center text-gray-500">No</th>
                            <th class="px-6 py-2 text-xs text-center text-gray-500">Barang</th>
                            <th class="px-6 py-2 text-xs text-center text-gray-500">Jumlah Terjual</th>
                            <th class="px-6 py-2 text-xs text-center text-gray-500">Total Harga</th>
                            <th class="px-6 py-2 text-xs text-center text-gray-500">Tanggal Pembelian</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-300">
					@foreach ( $kasir as $k )
                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4 text-sm text-gray-500 text-center">{{ $loop->iteration }}</td>
                            <td class="px-6 py-4">
                            <div class="text-sm text-gray-900 text-center">
                                 @if ($k->produk)
                                 {{ $k->produk->nama }}
                            @else
                               <span class="text-red-500">Barang tidak ditemukan</span>
                            @endif
                              </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-500 text-center">{{ $k->jumlah_terjual }}</div>
                            </td>
                            <td class="px-6 py-4 text-sm text-gray-500 text-center">Rp.{{ number_format($k->total_harga, 0, ',', '.') }}</td>
                            <td class="px-6 py-4 text-sm text-gray-500 text-center">{{ $k->tanggal_pembelian }}</td>
                        </tr>
						@endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection