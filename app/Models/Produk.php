<?php
 
namespace App\Models;
 
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
 
class Produk extends Model
{
    use HasFactory;
    protected $fillable = [
        'nama',
        'jenis',
        'deskripsi',
        'harga_jual',
        'harga_beli',
        'foto'
    ];

    public function kasir()
    {
        return $this->hasMany(Kasir::class, 'produk_id');
    }
}
