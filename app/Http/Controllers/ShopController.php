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
use Illuminate\Database\Eloquent\Collection;


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
        if(isset($_COOKIE['basket'])){
            $basket = unserialize($_COOKIE['basket']);
        }else{
            $basket = array();
        }


        if(isset($request->quantite)){
            $quantite = $request->quantite+1;
        }
        $string = null;
        $new = true;
        foreach ($basket as $key => $bask){
            $string = $string.' '.$bask[0];


            if($request->product_id == $bask[0]){
                $basket[$key][3] = $bask[3]+$quantite;

                //dd($basket[$key][3]);
                echo '<br> pas ok <br>';
                $new =false;
                $string = $string.'<br><br>';
            }
        }

        if($new){
            $arrayy = array($request->product_id, $request->sizes, $request->colors, $quantite);
            array_push($basket, $arrayy);
        }


        $tab_seria = serialize($basket);
        setcookie("basket", $tab_seria, time()+24*60*30);


        return redirect()->route('shop_product', ['category' => $request->category_name, 'product' => $request->product_slug]);
    }

    public function getbasket(Request $request, ICategoryGestion $categoryGestion){
        echo'<br><br>';
        if(isset($_COOKIE['basket'])){
            $basket = unserialize($_COOKIE['basket']);
        }


        $id_product_bask = array();
        foreach ($basket as $bak){
            array_push($id_product_bask, $bak[0]);
        }


        //$products = shop_products::get()->whereIn('id', $id_product_bask);
        $products = shop_products::whereIn('id', $id_product_bask)
            //->orderByRaw('FIELD(id, "23", "24", "1")')
            ->orderByRaw('FIELD(id, '.implode(",", $id_product_bask).')')
            // implode(" ,", [23,24,1]).')')
            ->get();

        return view('pages/shop/basket', ['categories' => $categoryGestion->getCategories(), 'baskets' => $basket, 'products' => $products]);
    }

    public function confirm_address(Request $request){

        echo 'ok';
    }

    public function postConfirm_address(Request $request){

    }
}
