<?php

namespace App\Http\Controllers;

use App\Model\Shop\shop_colors;
use App\Model\Shop\shop_picture;
use App\Model\Shop\shop_pictures;
use App\Model\Shop\shop_productsRepository;
use App\Model\Shop\shop_comments;
use App\Model\Shop\shop_sizes;
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
        //echo $request->image1;
        dd($request->file('image1'));
        $product = $shopRepository->save($request->only('name', 'price', 'quantityIlimity', 'quantity', 'description', 'new_cat'));


        $i = 1;
        $image = 'image'.$i;


        while ($request->$image != null){
            $shop_image = new shop_pictures();
            $shop_image->url=$request->$image;
            $shop_image->alt=get_extension_funcs($request->$image);
            $shop_image->product_id = $product->id;
            $shop_image->save();


            $image = 'image'.$i;

            $nameimage = $shop_image->id+1;
            $request->file('image'.$i)->move(
                base_path() . '/public/images/shop/', $nameimage
            );
            $i++;
        }
        
        //return redirect()->route('shop_home');
        return redirect()->route('shop_product', ['category' => $product->category->name, 'product' => $product->slug]);

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


        if($product->size == 1){
            $sizes = shop_sizes::pluck('content', 'id');//if product->size ok
        }

        if($product->color == 1){
            $colors = shop_colors::pluck('content', 'id');//if product->size ok
        }


        if ($product AND !empty($sizes) AND !empty($colors)){

            return view('pages/shop/view', ['categories' => $categoryGestion->getCategories(), 'product' => $product, 'comments' => $comments, 'sizes' => $sizes, 'colors' => $colors]);

        }elseif ($product AND !empty($sizes)){

            return view('pages/shop/view', ['categories' => $categoryGestion->getCategories(), 'product' => $product, 'comments' => $comments, 'sizes' => $sizes]);

        }elseif ($product){
            return view('pages/shop/view', ['categories' => $categoryGestion->getCategories(), 'product' => $product, 'comments' => $comments]);

        }
        else{
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

    public function add_basket(Request $request){

        
        //setcookie("TestCookie", "yes", time()+3600);


        return redirect()->route('shop_product', ['category' => $request->category_name, 'product' => $request->product_slug]);
    }

    public function getbasket(Request $request, ICategoryGestion $categoryGestion){



        echo'<br><br>';
        print_r($_COOKIE["basket"]);


        return view('pages/shop/basket', ['categories' => $categoryGestion->getCategories()]);
    }
}
