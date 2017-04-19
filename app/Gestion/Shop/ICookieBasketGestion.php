<?php
/**
 * Created by IntelliJ IDEA.
 * User: Clemsouille
 * Date: 13/04/2017
 * Time: 23:05
 */


namespace App\Gestion\Shop;

interface ICookieBasketGestion
{
    public function getBasket();
    public function getArrayId($id_product_bask = array(), $baskets);
    public function getproducts();
    public function setBasket($baskets);
}