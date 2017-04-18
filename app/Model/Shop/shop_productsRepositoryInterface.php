<?php
/**
 * Created by IntelliJ IDEA.
 * User: Clemsouille
 * Date: 14/04/2017
 * Time: 16:06
 */
namespace App\Model\Shop;

interface shop_productsRepositoryInterface{
    public function save($product);
    public function getProducts5perCategory();
    public function getProductsperCategory($category);

}