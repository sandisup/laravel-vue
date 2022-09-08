<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = ['nama', 'alamat', 'telepon'];


    public function pembelians()
    {
        return $this->hasMAny('App\Models\Pembelian', 'id_supplier');
    }

}
