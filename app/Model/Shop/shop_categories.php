<?php

namespace App\Model\Shop;

use Illuminate\Database\Eloquent\Model;

class shop_categories extends Model
{
      public $fillable = ['name', 'cat_parent'];

      public function shop_category() {
            return $this->belongsTo('App\ShopCategory');
      }

      public function shop_categories() {
            return $this->hasMany('App\ShopCategory');
      }
}
