<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    protected $fillable = ['id_supplier', 'total_item','total_harga', 'diskon', 'bayar'];


    public function pembelianDetails()
    {
        return $this->hasMany('App\Models\PembelianDetail', 'id_pembelian');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier', 'id_supplier');
    }
}
