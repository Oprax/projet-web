<?php

namespace App\Http\Controllers;

use App\Model\Shop\shop_productsRepository;
use Illuminate\Http\Request;
use App\Gestion\Shop\ICategoryGestion;
use App\Model\Shop\shop_productsRepositoryInterface;
use App\Model\Shop\shop_products;

class ShopController extends Controller
{
    public function index(ICategoryGestion $categoryGestion){

        $products = shop_products::all();

        return view('pages/shop/index', ['categories' => $categoryGestion->getCategories(), 'products' => $products]);
    }

    public function addProduct(ICategoryGestion $categoryGestion){

        return view('pages/shop/addProduct', ['categories' => $categoryGestion->getCategories()]);
    }

    public function postProduct(Request $request){
        $shop_products = new shop_products;
        $shop_products->name = $request->input('name');
        $shop_products->price = $request->input('price');
        $shop_products->slug = $request->input('name');
        $shop_products->quantities = '3';
        $shop_products->category_id = '1';

        $shop_products->save();
        return "article ok";
    }

    public function store (Request $request, shop_productsRepositoryInterface $shopRepository){
        $product = $shopRepository->save($request->only('name', 'price', 'quantityIlimity', 'quantity', 'description', 'new_cat'));
       // $product = $shopRepository->save([$request->input('name'), $request->input('price')]);
        
        // return redirect()->route('product.views'); avec id du nouvel article
        return redirect()->route('shop_home');
    }
}
