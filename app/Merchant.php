<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Merchant extends Model
{
    protected $table = 'merchants';

    protected $fillable = [
        'name',
        'address',
        'is_delete'
    ];

    public function price(){
        return $this->hasMany(Price::class);
    }
}
