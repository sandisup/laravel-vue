<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Produk extends Model
{
    use HasFactory;

    public function penjualan_details()
    {
        return $this->hasMAny('App\Models\PenjualanDetail', 'id_produk');
    }

    public function pembelian_details()
    {
        return $this->hasMAny('App\Models\PembelianDetail', 'id_produk');
    }

    public function kategori()
    {
        return $this->belongsTo('App\Models\Kategori', 'id_kategori');
    }

}
