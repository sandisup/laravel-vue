<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class member extends Model
{
    use HasFactory;

    protected $fillable = ['name','gender','phone_number','address','email'];

    public function user()
    {
        return $this->hasOne('App\Models\User', 'member_id');
    }
    use HasFactory;

    public function Transactions()
    {
        return $this->hasMany('App\Models\Transaction', 'member_id');
    }
}
