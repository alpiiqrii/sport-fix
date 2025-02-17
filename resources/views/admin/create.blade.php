@extends('layoutes.app')
@section('content')
<div class="min-h-screen p-6 flex items-center justify-center pt-20 pb-10">
  <div class="container max-w-screen-lg mx-auto">
      <div class="bg-white rounded shadow-lg p-4 px-4 md:p-8 mb-6">
        <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 lg:grid-cols-3">
          <div class="text-gray-600">
            <p class="font-medium text-lg">Tambah Barang</p>
            <p>Sport Store</p>
          </div>

		  <form action="{{ route('admin.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="lg:col-span-2">
            <div class="grid gap-4 gap-y-2 text-sm grid-cols-1 md:grid-cols-5">
              <div class="md:col-span-5">
                <label for="nama">Nama Barang</label>
                <input type="text" name="nama" id="nama" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500" value="" />
				@error('nama')
                <div class="invalid-feedback">{{ $message }}</div>
                @enderror
              </div>

              <div class="md:col-span-5">
                <label for="jenis">Merk Barang</label>
                <input type="text" name="jenis" id="jenis" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500" value="" />
              </div>
			  @error('jenis')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror

              <div class="md:col-span-2">
                <label for="harga_jual">Harga Jual</label>
                <input type="name" name="harga_jual" id="harga_jual" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500" value="" placeholder="" />
              </div>
			  @error('harga_jual')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror

              <div class="md:col-span-2">
                <label for="harga_beli">Harga Beli</label>
                <input type="number" name="harga_beli" id="harga_beli" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50 focus:outline-none focus:ring-2 focus:ring-blue-500" value="" placeholder="" />
              </div>
			  @error('harga_beli')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror

              <div class="md:col-span-2">
                <label for="jumlah">Jumlah Stok</label>
                <div class="h-10 w-28 bg-gray-50 flex border border-gray-200 rounded items-center mt-1 ">
                  <input name="jumlah" id="jumlah" placeholder="0" class="px-2 text-center appearance-none outline-none text-gray-800 w-full bg-transparent" value="0" />
                </div>
              </div>
			  @error('jumlah')
              <div class="invalid-feedback">{{ $message }}</div>
              @enderror

			  <div class="md:col-span-4">
                <label for="foto">Foto</label>
                <input type="file" name="foto" id="foto"  value="" placeholder="" />
              </div>

              <div class="md:col-span-5 text-right">
                <div class="inline-flex items-end">
                  <button type="submit" class="bg-blue-600 hover:bg-blue-400 text-white font-bold py-2 px-4 rounded">Submit</button>
                </div>
              </div>
            </div>
          </div>
		  </form>
        </div>
      </div>
    </div>
  </div>
@endsection
