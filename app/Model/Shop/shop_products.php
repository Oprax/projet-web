<?php

namespace App\Model\Shop;

use Illuminate\Database\Eloquent\Model;

class shop_products extends Model
{
    protected $table = 'shop_products';
    protected $name;
    protected $price;
    protected $slug;


    public $fillable = ['name', 'price','category_id', 'slug', 'quantities', 'product_id'];

    public function category() {
        return $this->belongsTo('App\Model\Shop\shop_categories');
    }

    public function product_orders() {
        return $this->hasMany('App\Model\Shop\shop_product_order');
    }

    public function pictures() {
        return $this->hasMany('App\Model\Shop\shop_pictures', 'product_id');
    }

    public function comments() {
        return $this->hasMany('App\Model\Shop\shop_comments');
    }
}
