<?php

/**
 * Created by IntelliJ IDEA.
 * User: Clemsouille
 * Date: 13/04/2017
 * Time: 22:59
 */

namespace App\Gestion\Shop;
use Illuminate\Support\Facades\DB;

class CategoryGestion implements ICategoryGestion
{
    public function getCategories(){
        
        $categories = DB::table('shop_categories')->get();
        unset($categories[0]);
        //$categories = array_values($categories);
        return $categories;
    }

}