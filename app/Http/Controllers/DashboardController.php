<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Produk;
use App\Models\Kasir;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function index()
    {
        // Mengambil data user yang sedang login
        $user = Auth::user();

        // Menghitung total pendapatan dari tabel kasir
        $totalPendapatan = Kasir::sum('total_harga');

        // Menghitung total barang dari tabel produks
        $totalBarang = Produk::count();

        // Menghitung total transaksi dari tabel kasir
        $totalTransaksi = Kasir::count();

        return view('dashboard.index', compact('user', 'totalPendapatan', 'totalBarang', 'totalTransaksi'));
    }
}