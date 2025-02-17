<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function admin()
    {
        //
        $produk = Produk::all();
        return view('admin.index', compact('produk'));

        // Hitung total stok
        $totalStok = Produk::sum('jumlah');

       // Kirim data ke view
       return view('admin.index', compact('produk', 'totalStok'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
        'nama' => 'required|string|max:255',
        'jenis' => 'required|string|max:255',
        'harga_jual' => 'required|numeric|min:0',
        'harga_beli' => 'required|numeric|min:0',
        'jumlah' => 'required|integer|min:1',
        'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ],
        [
            'nama.required' => 'Nama wajib diisi',
            'nama.max' => 'Nama maksimal 45 karakter',
            'jenis.required' => 'jenis wajib diisi',
            'jenis.max' => 'jenis maksimal 45 karakter',
            'foto.max' => 'Foto maksimal 2 MB',
            'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
            'foto.image' => 'File harus berbentuk image'
        ]);

        if ($request->harga_jual < $request->harga_beli) {
            return redirect()->back()
                ->withErrors(['error' => 'Harga jual tidak boleh lebih kecil dari harga beli.'])
                ->withInput();
        }
        //jika file foto ada yang terupload
        if(!empty($request->foto)){
            //maka proses berikut yang dijalankan
            $fileName = 'foto-'.uniqid().'.'.$request->foto->extension();
            //setelah tau fotonya sudah masuk maka tempatkan ke public
            $request->foto->move(public_path('image'), $fileName);
        } else {
            $fileName = 'image/nophoto.jpg';
        }

        //tambah data produk
        DB::table('produks')->insert([
            'nama'=>$request->nama,
            'jenis'=>$request->jenis,
            'harga_jual'=>$request->harga_jual,
            'harga_beli'=>$request->harga_beli,
            'deskripsi' => $request->deskripsi,
            'foto'=>$fileName,
            'jumlah'=>$request->jumlah,
        ]);

        return redirect()->route('admin.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Produk $id)
    {
        //
        return view('admin.edit', compact('id'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    $request->validate([
        'nama' => 'required|max:45',
        'jenis' => 'required|max:45',
        'harga_jual' => 'required|numeric|min:0',
        'harga_beli' => 'required|numeric|min:0',
        'foto' => 'nullable|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
        'jumlah' => 'required|integer|min:1',
    ],
    [
        'nama.required' => 'Nama wajib diisi',
        'nama.max' => 'Nama maksimal 45 karakter',
        'jenis.required' => 'jenis wajib diisi',
        'jenis.max' => 'jenis maksimal 45 karakter',
        'foto.max' => 'Foto maksimal 2 MB',
        'foto.mimes' => 'File ekstensi hanya bisa jpg,png,jpeg,gif, svg',
        'foto.image' => 'File harus berbentuk image'
    ]);


    ///////
    $fotoLama = DB::table('produks')->select('foto')->where('id',$id)->get();
    foreach($fotoLama as $f1){
        $fotoLama = $f1->foto;
    }

    //jika foto sudah ada yang terupload
    if(!empty($request->foto)){
        //maka proses selanjutnya
        if(!empty($fotoLama->foto)) unlink(public_path('image'.$fotoLama->foto));
        //proses ganti foto
        $fileName = 'foto-'.$request->id.'.'.$request->foto->extension();
        //setelah tau fotonya sudah masuk maka tempatkan ke public
        $request->foto->move(public_path('image'), $fileName);
    } else{
        $fileName = $fotoLama;
    }

    //update data produk
    DB::table('produks')->where('id',$id)->update([
        'nama'=>$request->nama,
        'jenis'=>$request->jenis,
        'harga_jual'=>$request->harga_jual,
        'harga_beli'=>$request->harga_beli,
        'jumlah' => $request->jumlah,
        'foto'=>$fileName,
    ]);

    return redirect()->route('admin.index')->with('error', 'Barang tidak ditemukan');
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        // Cari produk berdasarkan ID
        $produk = Produk::find($id);

        if ($produk) {
            // Hapus data produk
            $produk->delete();

            return redirect()->route('produks.index')->with('success', 'Produk berhasil dihapus');
        }

        return redirect()->route('produks.index')->with('error', 'Produk tidak ditemukan');
    }
}
