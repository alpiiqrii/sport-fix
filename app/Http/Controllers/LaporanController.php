<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use App\Models\Produk;
use App\Models\Kasir;

class LaporanController extends Controller
{
    // Method untuk laporan produk
    public function downloadLaporanProduk()
    {
        // Ambil data produk dari database
        $produk = Produk::all();

        // Load view dengan data produk
        $pdf = Pdf::loadView('laporan.produk-pdf', compact('produk'));

        // Download PDF
        return $pdf->download('laporan-produk.pdf');
    }

    // Method untuk laporan kasir
    public function downloadLaporanKasir()
    {
        // Ambil data kasir dari database
        $kasir = Kasir::with('produk')->get(); // Pastikan relasi 'produk' ada di model Kasir

        // Load view dengan data kasir
        $pdf = Pdf::loadView('laporan.kasir-pdf', compact('kasir'));

        // Download PDF
        return $pdf->download('laporan-kasir.pdf');
    }
}