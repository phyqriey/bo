<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CartItem extends Model
{
    //
    protected $fillable = [
        'cart_id',
        'item_id',
        'item_name',
        'quantity',
        'price',
    ];

    public function cart(){
        return $this->belongsTo(Cart::class);
    }
}
