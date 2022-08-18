<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembelian extends Model
{
    use HasFactory;

    public function pembelian_detail()
    {
        return $this->hasOne('App\Models\PembelianDetail', 'id_pembelian');
    }

    public function supplier()
    {
        return $this->belongsTo('App\Models\Supplier', 'id_supplier');
    }

}
