<?php

namespace App\Model\Shop;

use Illuminate\Database\Eloquent\Model;

class shop_pictures extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'url', 'alt'
    ];

    public function product() {
        return $this->belongsTo('App\Model\Shop\shop_products', 'product_id');
    }
}
