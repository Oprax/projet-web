<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopCategory extends Model
{
    public $timestamps = false;

    protected $fillable = [
        'name'
    ];

    public function shop_category() {
        return $this->belongsTo('App\ShopCategory');
    }

    public function shop_categories() {
        return $this->hasMany('App\ShopCategory');
    }
}
