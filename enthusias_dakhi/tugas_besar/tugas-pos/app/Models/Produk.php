<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    protected $fillable = [ 'id_supplier','nama_produk', 'merk','harga_beli', 'diskon', 'harga_jual', 'stok'];

    public function penjualan_details()
    {
        return $this->hasMany('App\Models\PenjualanDetail', 'id_produk');
    }

    public function pembelian_details()
    {
        return $this->hasMany('App\Models\PembelianDetail', 'id_produk');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'id_kategori');
    }

}
