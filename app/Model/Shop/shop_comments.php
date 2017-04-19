<?php

namespace App\Model\Shop;

use Illuminate\Database\Eloquent\Model;

class shop_comments extends Model
{
    public $fillable = ['content', 'user_id', 'product_id'];

    public function product() {
        return $this->belongsTo('App\Model\Shop\shop_products');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
    
    
}
