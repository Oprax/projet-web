<?php

namespace App\Model\Shop;

use Illuminate\Database\Eloquent\Model;

class shop_order extends Model
{
    protected $fillable = [
        'date', 'adresse', 'zip_code', 'city', 'country', 'quantities', 'price'
    ];

    public function user() {
        return $this->belongsTo('App\User');
    }

    public function shop_product_order() {
        return $this->hasMany('App\ShopProductOrder');
    }
}
