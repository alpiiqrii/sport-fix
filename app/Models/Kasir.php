<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kasir extends Model
{
    
    use HasFactory;
    protected $table = 'kasir';

    // The attributes that are mass assignable
    protected $fillable = [
        'produk_id',
        'jumlah_terjual',
        'total_harga',
        'tanggal_pembelian',
    ];

    // The attributes that should be cast to native types (for example, decimals)
    protected $casts = [
        'jumlah_terjual',
        'total_harga' => 'decimal:2',
    ];

    // Relationship with Produk (One Kasir has one Produk)
    public function produk()
    {
        return $this->belongsTo(Produk::class, 'produk_id');
    }
}
