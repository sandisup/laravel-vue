<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class book extends Model
{
    use HasFactory;

    protected $fillable = ['isbn','title','year','publisher_id','author_id','catalog_id','qty','price'];

    public function publisher()
    {
        return $this->belongsTo('App\Models\Publisher', 'publisher_id');
    }
    use HasFactory;
    public function author()
    {
        return $this->belongsTo('App\Models\Author', 'author_id');
    }
    use HasFactory;
    public function catalog()
    {
        return $this->belongsTo('App\Models\Catalog', 'author_id');
    }
}
