<?php

namespace App\Model\Shop;

use Illuminate\Database\Eloquent\Model;

class shop_products extends Model
{
    protected $table = 'shop_products';
    protected $name;
    protected $price;
    protected $slug;


    public $fillable = ['name', 'price','category_id', 'slug', 'quantities'];

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
