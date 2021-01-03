<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Price extends Model
{
    protected $table = 'prices';

    protected $fillable = [
        'merchant_id',
        'product_id',
        'price',
        'is_delete'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function merchant()
    {
        return $this->belongsTo(Merchant::class);
    }
}
