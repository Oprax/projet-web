<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopProductOrder extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'quantities', 'size', 'color', 'price'
    ];

    public function shop_order() {
        return $this->belongsTo('App\ShopOrder');
    }

    public function shop_product() {
        return $this->belongsTo('App\ShopProduct');
    }
}
