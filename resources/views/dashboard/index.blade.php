@extends('layoutes.app')

@section('content')
<!--Container-->
<div class="container w-full mx-auto pt-20">
    <div class="w-full px-4 md:px-0 md:mt-8 mb-16 text-gray-800 leading-normal">
        <!--Console Content-->
        <div class="flex flex-wrap">
            <!-- Total Pendapatan -->
            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <div class="bg-gray-50 border border-gray-200 rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded p-3 bg-green-600"><i class="fa fa-wallet fa-2x fa-fw fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-400">Total Pendapatan</h5>
                            <h3 class="font-bold text-3xl text-gray-600">Rp.{{ number_format($totalPendapatan, 0, ',', '.') }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Barang -->
            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <div class="bg-gray-50 border border-gray-200 rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded p-3 bg-pink-600"><i class="fas fa-boxes fa-2x fa-fw fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-400">Total Barang</h5>
                            <h3 class="font-bold text-3xl text-gray-600">{{ $totalBarang }}</h3>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Total Transaksi -->
            <div class="w-full md:w-1/2 xl:w-1/3 p-3">
                <div class="bg-gray-50 border border-gray-200 rounded shadow p-2">
                    <div class="flex flex-row items-center">
                        <div class="flex-shrink pr-4">
                            <div class="rounded p-3 bg-yellow-600"><i class="fas fa-exchange-alt fa-2x fa-fw fa-inverse"></i></div>
                        </div>
                        <div class="flex-1 text-right md:text-center">
                            <h5 class="font-bold uppercase text-gray-400">Total Transaksi</h5>
                            <h3 class="font-bold text-3xl text-gray-600">{{ $totalTransaksi }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
@endsection