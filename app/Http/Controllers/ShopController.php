<?php

namespace App\Http\Controllers;

use App\Model\Shop\shop_productsRepository;
use App\Model\Shop\shop_comments;
use Illuminate\Http\Request;
use App\Gestion\Shop\ICategoryGestion;
use App\Model\Shop\shop_productsRepositoryInterface;
use App\Model\Shop\shop_products;
use App\User;

class ShopController extends Controller
{
    public function index(ICategoryGestion $categoryGestion, shop_productsRepositoryInterface $shopRepository){

        $products = shop_products::with('category')->get();

        //$products = $shopRepository->getProducts5perCategory();
        return view('pages/shop/index', ['categories' => $categoryGestion->getCategories(), 'products' => $products]);
    }

    public function categoryindex(ICategoryGestion $categoryGestion, shop_productsRepositoryInterface $shopRepository, Request $request){
        
        $products = $shopRepository->getProductsperCategory($request->category);

        return view('pages/shop/categoryindex', ['categories' => $categoryGestion->getCategories(), 'products' => $products, 'cat_act' => $request->category]);
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

    public function view (Request $request, ICategoryGestion $categoryGestion){

        //$productcat = $request->category;
        $product = shop_products::with('pictures')->get()->where('slug', $request->slugproduct)->first();
        $product->category = $request->category;
        
        $comments = shop_comments::all()->where('product_id', $product->id);
        foreach ($comments as $comment){
            $comment->firstname = User::find($comment->user_id, ['name'])->name;
            $comment->lastname = User::find($comment->user_id, ['forename'])->forename;
        }

        if ($product){
            return view('pages/shop/view', ['categories' => $categoryGestion->getCategories(), 'product' => $product, 'comments' => $comments]);
        }else{
            abort(404, 'Produit introuvable');
        }
    }

    public function storeComment(Request $request){

        $comment = new shop_comments();
        $comment->content = $request->content;
        $comment->user_id = 5;
        $comment->product_id = $request->product_id;

        $comment->save();

        return redirect()->route('shop_home');
    }
}
