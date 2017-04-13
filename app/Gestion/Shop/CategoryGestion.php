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
        /*$categories[1]['name'] = "Sweat";
        $categories[1]['parent'] = "Vêtements";

        $categories[2]['name'] = "TeeShirt";

        $categories[3]['parent'] = "Lit";
        $categories[3]['name'] = "Lit double";*/

        $categories = DB::table('shop_categories')->get();
        //dd($categories);

        return $categories;
    }

}