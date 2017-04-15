<?php

namespace App\Http\Controllers;

use App\Model\Shop\shop_productsRepository;
use Illuminate\Http\Request;
use App\Gestion\Shop\ICategoryGestion;
use App\Model\Shop\shop_productsRepositoryInterface;
use App\Model\Shop\shop_products;

class ShopController extends Controller
{
    public function index(ICategoryGestion $categoryGestion, shop_productsRepositoryInterface $shopRepository){

        $products = shop_products::all();
        
        $products = $shopRepository->getProducts5perCategory();
        return view('pages/shop/index', ['categories' => $categoryGestion->getCategories(), 'products' => $products]);
    }

    public function getaddProduct(ICategoryGestion $categoryGestion){

        return view('pages/shop/addProduct', ['categories' => $categoryGestion->getCategories()]);
    }
    

    public function store (Request $request, shop_productsRepositoryInterface $shopRepository){
        $product = $shopRepository->save($request->only('name', 'price', 'quantityIlimity', 'quantity', 'description', 'new_cat'));
       // $product = $shopRepository->save([$request->input('name'), $request->input('price')]);
        
        // return redirect()->route('product.views'); avec id du nouvel article
        return redirect()->route('shop_home');
    }
}
