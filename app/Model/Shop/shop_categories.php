<?php

namespace App\Model\Shop;

use Illuminate\Database\Eloquent\Model;

class shop_categories extends Model
{
      public $fillable = ['name', 'cat_parent'];

      public function category() {
            return $this->belongsTo('App\Model\Shop\shop_categories');
      }

      public function categories() {
            return $this->hasMany('App\Model\Shop\shop_categories');
      }

      public function products() {
            return $this->hasMany('App\Model\Shop\shop_products');
      }
}
