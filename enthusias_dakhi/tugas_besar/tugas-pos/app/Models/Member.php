<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Member extends Model
{
    use HasFactory;

    public function penjualan()
    {
        return $this->hasMAny('App\Models\Penjualan', 'id_member');
    }
}
