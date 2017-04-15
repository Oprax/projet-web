<?php

namespace App\Model\Shop;

use Illuminate\Database\Eloquent\Model;

class shop_comments extends Model
{
    public $fillable = ['content', 'user_id', 'product_id'];
}
