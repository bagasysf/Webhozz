<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];

    public function category()
    {
        //relasi table model ke tabel category
        return $this->belongsTo(Category::class, 'category_id');
    }
}
