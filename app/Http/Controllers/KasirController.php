<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kasir;
use App\Models\Produk;
use Illuminate\Support\Facades\DB;

class KasirController extends Controller
{

    public function kasir()
    {
        $kasir = DB::table('kasir')
        ->join('produks', 'kasir.produk_id', '=', 'produks.id')
        ->select('kasir.*', 'produks.nama as nama')
        ->get();

        $kasir = Kasir::all();
        $produk = Produk::all();
        return view('kasir.index', compact('produk', 'kasir'));

                // Ambil data kasir beserta relasi produk
        $kasir = Kasir::with('produk')->get();
        dd($kasir);

        // Kirim data ke view
        return view('kasir.index', compact('kasir'));

    }

    public function penjualan()
    {
        $kasir = Kasir::all();
        $produk = Produk::all();
         return view('kasir.penjualan', compact('produk', 'kasir'));
    }

    public function store(Request $request)
    {

        // Handle sale input, reducing the stock in the database
        $produk = Produk::find($request->produk_id);

        if ($produk && $produk->jumlah >= $request->jumlah_terjual) {
        //     // Reduce stock
            $produk->jumlah -= $request->jumlah_terjual;
            $produk->save();

            // Here you can add logic to record the sale in a kasir table (optional)
            Kasir::create([
                'produk_id' => $produk->id,
                'jumlah_terjual' => $request->jumlah_terjual,
                'total_harga' => $produk->harga_jual * $request->jumlah_terjual,
                 'tanggal_pembelian' => now()->toDateString(),

            ]);

            return redirect()->route('kasir.index')->with('success', 'Penjualan berhasil');
        }

        return redirect()->route('kasir.index')->with('error', 'Stok tidak mencukupi');
    }
}

