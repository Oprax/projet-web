<?php

namespace App\Model\Shop;

use Illuminate\Database\Eloquent\Model;

class shop_product_order extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'quantities', 'size', 'color', 'price'
    ];

    public function shop_order() {
        return $this->belongsTo('App\Model\Shop\shop_order');
    }

    public function product() {
        return $this->belongsTo('App\Model\Shop\shop_products');
    }
}
