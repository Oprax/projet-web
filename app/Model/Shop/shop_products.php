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

    public function category() {
        return $this->belongsTo('App\Model\Shop\shop_categories');
    }

    public function product_orders() {
        return $this->hasMany('App\ShopProductOrder');
    }

    public function pictures() {
        return $this->hasMany('App\ShopPicture');
    }

    public function comments() {
        return $this->hasMany('App\Model\Shop\shop_comments');
    }
}
