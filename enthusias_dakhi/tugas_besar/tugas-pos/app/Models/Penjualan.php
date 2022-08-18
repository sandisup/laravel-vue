<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penjualan extends Model
{
    use HasFactory;

    public function member()
    {
        return $this->belongsTo('App\Models\Member', 'id_member');
    }
    public function user()
    {
        return $this->belongsTo('App\Models\User', 'id_user');
    }
    public function penjualan_detail()
    {
        return $this->hasOne('App\Models\PenjualanDetail', 'id_penjualan');
    }

}
