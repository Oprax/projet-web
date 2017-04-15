<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopProduct extends Model
{
    protected $fillable = [
        'name', 'slug', 'price', 'quantities'
    ];

    public function shop_category() {
        return $this->belongsTo('App\ShopCategory');
    }

    public function shop_product_orders() {
        return $this->hasMany('App\ShopProductOrder');
    }

    public function shop_pictures() {
        return $this->hasMany('App\ShopPicture');
    }
}
