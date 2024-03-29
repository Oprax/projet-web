<?php

/**
 * Created by IntelliJ IDEA.
 * User: Clemsouille
 * Date: 13/04/2017
 * Time: 22:59
 */

namespace App\Gestion\Shop;
use Illuminate\Support\Facades\DB;
use App\Model\Shop\shop_products;


class CookieBasketGestion implements ICookieBasketGestion
{
    public function getBasket(){
        if(isset($_COOKIE['basket'])){
            $baskets = unserialize($_COOKIE['basket']);
        }else{
            $baskets=array();
        }

        return $baskets;
    }

    public function getArrayId($id_product_bask = array(), $baskets){
        foreach ($baskets as $bak){
            array_push($id_product_bask, $bak[0]);
        }

        return $id_product_bask;
    }

    public function  getproducts(){
        $id_product_bask = array();
        $id_product_bask = $this->getArrayId($id_product_bask, $this->getBasket());


        if($id_product_bask != []){
            $products = shop_products::with('pictures')->whereIn('id', $id_product_bask)
                //->orderByRaw('FIELD(id, "23", "24", "1")')
                ->orderByRaw('FIELD(id, '.implode(",", $id_product_bask).')')
                // implode(" ,", [23,24,1]).')')
                ->get();

            return $products;
        }
        else{
            return $products = null;
        }
    }

    public function setBasket($baskets){

        $tab_seria = serialize($baskets);
        setcookie("basket", $tab_seria, time()+24*60*30);
    }

    public function deleteBasket(){
        $baskets = $this->getBasket();
        $tab_seria = serialize($baskets);
        setcookie("basket", $tab_seria, time()-1);
        //dd($baskets);
    }
}