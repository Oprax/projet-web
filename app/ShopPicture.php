<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopPicture extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'url', 'alt'
    ];

    public function shop_product() {
        return $this->belongsTo('App\ShopProduct');
    }
}
