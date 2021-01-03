<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $table = 'products';

    protected $fillable = [
        'name',
        'category_id',
        'is_delete'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function price(){
        return $this->hasMany(Price::class);
    }
}
