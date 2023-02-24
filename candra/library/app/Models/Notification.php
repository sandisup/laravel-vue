<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;

<<<<<<< HEAD
    protected $fillable = ['message', 'is_read', 'transaction_id', 'member_id'];

    public function transactions()
    {
        return $this->belongsTo('App\Models\Transaction', 'transaction_id');
    }
    public function members()
    {
        return $this->belongsTo('App\Models\Member', 'member_id');
    }
=======
    protected $fillable = ['message', 'is_read', 'transaction_id' , 'member_id'];
>>>>>>> b61b840d53b54d89f2cc69113b2985c095d5711e
}
