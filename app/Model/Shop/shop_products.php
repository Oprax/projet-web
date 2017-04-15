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
}
