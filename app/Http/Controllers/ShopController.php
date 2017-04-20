<?php

namespace App\Http\Controllers;

use App\Model\Shop\shop_categories;
use App\Model\Shop\shop_product_order;
use App\Model\Shop\shop_order;
use App\Model\Shop\shop_colors;
use App\Model\Shop\shop_pictures;
use App\Model\Shop\shop_productsRepository;
use App\Model\Shop\shop_comments;
use App\Model\Shop\shop_sizes;
use Illuminate\Http\Request;
use App\Gestion\Shop\ICategoryGestion;
use App\Gestion\Shop\ICookieBasketGestion;
use App\Model\Shop\shop_productsRepositoryInterface;
use App\Model\Shop\shop_products;
use App\User;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\Auth;
use Input;
use Illuminate\Support\Facades\DB;



class ShopController extends Controller
{
    public function index(ICategoryGestion $categoryGestion, ICookieBasketGestion $cookieBasketGestion){

        $products = shop_products::with('category')->with('pictures')->get();

        //$products = $shopRepository->getProducts5perCategory();
        return view('pages/shop/index', ['categories' => $categoryGestion->getCategories(), 'products' => $products, 'products' => $cookieBasketGestion->getproducts()]);
    }

    public function categoryindex(ICategoryGestion $categoryGestion, shop_productsRepositoryInterface $shopRepository, Request $request){
        
        $products = $shopRepository->getProductsperCategory($request->category);

        return view('pages/shop/categoryindex', ['categories' => $categoryGestion->getCategories(), 'products' => $products, 'cat_act' => $request->category]);
    }

    public function getaddProduct(ICategoryGestion $categoryGestion){

        if(isset($categoryGestion)){
            $categories = shop_categories::pluck('name', 'id');//if product->size ok
            return view('pages/shop/addProduct', ['categories' => $categoryGestion->getCategories(), 'categoriesselect' => $categories]);
        }else{
            return view('pages/shop/addProduct', ['categories' => $categoryGestion->getCategories()]);
        }
    }
    

    public function store (Request $request, shop_productsRepositoryInterface $shopRepository){
        //echo $request->image1;
        $product = $shopRepository->save($request->only('name', 'price', 'quantityIlimity', 'quantity', 'description', 'new_cat', 'categoriesselect', 'taille', 'couleur'));


        $i = 1;
        $image = 'image'.$i;



        $files = Input::file('images');
        // Making counting of uploaded images
        $file_count = count($files);
        // start count how many uploaded
        $uploadcount = 0;
        $destinationPath = 'images/shop';

        if(isset($files)){
            foreach($files as $file) {
                $shop_image = new shop_pictures();
                $shop_image->url=$file->getClientOriginalName();
                $shop_image->alt=pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $shop_image->product_id = $product->id;
                $shop_image->save();


                $shop_image->url=$destinationPath.'/'.$shop_image->id.'.'.pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $shop_image->save();


                //$rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                //$validator = Validator::make(array('file'=> $file), $rules);
                //if($validator->passes()){




                $filename = $shop_image->id.'.'.pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $upload_success = $file->move($destinationPath, $filename);
                $uploadcount ++;
                //}


            }
            if($uploadcount == $file_count){
                //return Redirect::to('upload');
                return redirect()->route('shop_product', ['category' => $product->category->name, 'product' => $product->slug]);
            }
            else {
                //return Redirect::to('upload')->withInput()->withErrors($validator);
                dd('erreur uploads');
            }
        }else{
            return redirect()->route('shop_product', ['category' => $product->category->name, 'product' => $product->slug]);
        }



    }

    public function deleteproduct(Request $request, ICategoryGestion $categoryGestion){

        shop_pictures::where('product_id', $request->product_id)->delete();

        shop_comments::where('product_id', $request->product_id)->delete();

        shop_products::destroy($request->product_id);

        $products = shop_products::get()->where('category_id', $request->category_id);

        if(!isset($products[0])){
            shop_categories::destroy($request->category_id);
        }

        return redirect()->route('shop_home');
    }

    public function getupdateproduct(Request $request, ICategoryGestion $categoryGestion){

        $product = shop_products::find($request->product_id);

        if(isset($categoryGestion)){
            $categories = shop_categories::pluck('name', 'id');//if product->size ok
            return view('pages/shop/updateProduct', ['categories' => $categoryGestion->getCategories(), 'categoriesselect' => $categories, 'product' => $product]);
        }else{
            return view('pages/shop/updateProduct', ['categories' => $categoryGestion->getCategories(), 'product' => $product]);
        }
    }

    public function updateproduct(Request $request, ICategoryGestion $categoryGestion){

        //dd($request);
        $product = shop_products::find($request->product_id);



        $product->name = $request->name;
        $product->slug = str_slug($request->name, '-');
        $product->price = $request->price;
        if($request->couleur){
            $product->color = 1;
        }else{
            $product->color = 0;
        }

        if($request->taille){
            $product->size = 1;
        }else{
            $product->size = 0;
        }

        if($request->quantityIlimity){
            $product->quantities = null;
        }else{
            $product->quantities = $request->quantity;
        }
        $product->description = $request->description;

        if($request['new_cat'] != null){
            $category = shop_categories::all()->where('name', $request->new_cat)->first();
            if (!$category){
                $idcat = DB::table('shop_categories')->insertGetId(
                    ['name' => $request->new_cat, 'cat_parent' => null]
                );

                $product->category_id = $idcat;
            }else{
                $product->category_id = $category->id;
            }
        }elseif($request->categoriesselect != 1 AND isset($request->categoriesselect)){
            $product->category_id = $request->categoriesselect;
        }

        $product->save();



        $files = Input::file('images');
        // Making counting of uploaded images
        $file_count = count($files);
        // start count how many uploaded
        $uploadcount = 0;
        $destinationPath = 'images/shop';

        if(isset($files)){
            foreach($files as $file) {
                $shop_image = new shop_pictures();
                $shop_image->url=$file->getClientOriginalName();
                $shop_image->alt=pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $shop_image->product_id = $product->id;
                $shop_image->save();


                $shop_image->url=$destinationPath.'/'.$shop_image->id.'.'.pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $shop_image->save();


                //$rules = array('file' => 'required'); //'required|mimes:png,gif,jpeg,txt,pdf,doc'
                //$validator = Validator::make(array('file'=> $file), $rules);
                //if($validator->passes()){




                $filename = $shop_image->id.'.'.pathinfo($file->getClientOriginalName(), PATHINFO_EXTENSION);
                $upload_success = $file->move($destinationPath, $filename);
                $uploadcount ++;
                //}


            }
            if($uploadcount == $file_count){
                //return Redirect::to('upload');
                return redirect()->route('shop_product', ['category' => $product->category->name, 'product' => $product->slug]);
            }
            else {
                //return Redirect::to('upload')->withInput()->withErrors($validator);
                dd('erreur uploads');
            }
        }else{
            return redirect()->route('shop_product', ['category' => $product->category->name, 'product' => $product->slug]);
        }
        
    }

    public function view (Request $request, ICategoryGestion $categoryGestion, ICookieBasketGestion $cookieBasketGestion){
        //$productcat = $request->category;
        //dd($request);
        $product = shop_products::with('pictures')->get()->where('slug', $request->slugproduct)->first();
        $product->category = $request->category;
        
        $comments = shop_comments::all()->where('product_id', $product->id);
        foreach ($comments as $comment){
            $comment->firstname = User::find($comment->user_id, ['name'])->name;
            $comment->lastname = User::find($comment->user_id, ['forename'])->forename;
        }


        if($product->size == 1){
            $sizes = shop_sizes::pluck('content', 'content');//if product->size ok
        }

        if($product->color == 1){
            $colors = shop_colors::pluck('content', 'content');//if product->size ok
        }


        if ($product AND !empty($sizes) AND !empty($colors)){

            return view('pages/shop/view', ['categories' => $categoryGestion->getCategories(), 'product' => $product, 'comments' => $comments, 'sizes' => $sizes, 'colors' => $colors, 'products' => $cookieBasketGestion->getproducts()]);

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
        $comment->user_id = Auth::user()->id;
        $comment->product_id = $request->product_id;

        $comment->save();

        return redirect()->route('shop_product', ['category' => $request->category_name, 'product' => $request->product_slug]);
    }

    public function deletecomment(Request $request){
        //dd($request->comment_id);
        shop_comments::destroy($request->comment_id);



        return redirect()->route('shop_product', ['category' => $request->category_name, 'product' => $request->product_slug]);
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
        $product = shop_products::find($request->product_id);

        foreach ($basket as $key => $bask){
            $string = $string.' '.$bask[0];

            if($request->product_id == $bask[0]){
                $basket[$key][3] = $bask[3]+$quantite;
                $basket[$key][4] = $basket[$key][3]*$product->price;

                //dd($basket[$key][3]);
                echo '<br> pas ok <br>';
                $new =false;
                $string = $string.'<br><br>';
            }
        }

        if($new){
            $arrayy = array($request->product_id, $request->sizes, $request->colors, $quantite, $quantite*$product->price);
            array_push($basket, $arrayy);
        }



        $tab_seria = serialize($basket);
        setcookie("basket", $tab_seria, time()+24*60*30);


        return redirect()->route('shop_product', ['category' => $request->category_name, 'product' => $request->product_slug]);
    }

    public function getbasket(Request $request, ICategoryGestion $categoryGestion, ICookieBasketGestion $cookieBasketGestion){
        echo'<br><br>';
        if(isset($_COOKIE['basket'])){
            $basket = unserialize($_COOKIE['basket']);

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

        }else{
            $basket =array();
            $products= null;
        }

        //dd($basket);

        return view('pages/shop/basket', ['categories' => $categoryGestion->getCategories(), 'baskets' => $basket, 'products' => $products, 'products'=>$cookieBasketGestion->getproducts()]);
    }

    public function confirm_address(Request $request, ICategoryGestion $categoryGestion){


        return view('pages/shop/basketConfimAddress', ['categories' => $categoryGestion->getCategories()]);
    }

    public function postConfirm_address(Request $request, ICookieBasketGestion $cookieBasketGestion){
        if(isset($_COOKIE['basket'])) {
            $baskets = unserialize($_COOKIE['basket']);
        }
       // $baskets = $cookieBasketGestion->getBasket();

        $dernierIndex = count($baskets)-1;

        $products = $cookieBasketGestion->getproducts();

        $order = new shop_order();
        $order->country = $request->country;
        $order->adresse = $request->address;
        $order->zip_code = $request->codePostale;
        $order->city = $request->city;

        $order->quantities = $baskets[$dernierIndex-1];
        $order->price = $baskets[$dernierIndex];
        $order->user_id = Auth::user()->id;


        $order->save();

        $index =0;
        foreach ($products as $product){
            if(isset($baskets[$index][3])){
                $productsorder = new shop_product_order();

                if(isset($baskets[$index][1]) AND $baskets[$index][1] !=1){
                    $productsorder->size = $baskets[$index][1] ;
                }
                if(isset($baskets[$index][2]) AND $baskets[$index][2] !=1){
                    $productsorder->color = $baskets[$index][2] ;
                }
                //dd($baskets);
                $productsorder->quantity = $baskets[$index][3];
                $productsorder->price = $baskets[$index][4];
                $productsorder->order_id = $order->id;
                $productsorder->product_id = $product->id;

                $productsorder->save();//sup cookie
                $basketvide = array();
                $index++;
            }

        }

        $cookieBasketGestion->deleteBasket();
        return redirect()->route('user.show', Auth::user());
    }

    public function postConfirmBasket(Request $request, ICookieBasketGestion $cookieBasketGestion){
        $baskets = $cookieBasketGestion->getBasket();


        $dernierIndex = count($baskets)-1;

        array_push($baskets, $request->quantity_total);
        array_push($baskets, $request->price_total);

       // $baskets[$dernierIndex]= $request->quantity_total;
        //$baskets[$dernierIndex+1]= $request->price_total;


        $cookieBasketGestion->setBasket($baskets);

        return redirect()->route('shop_basket_confirm_address');
    }

    public function getorderid(Request $request, ICategoryGestion $categoryGestion){
        $products = shop_product_order::with('product')->where('order_id', $request->order_id)->get();
        $order = shop_order::find($request->order_id)->first();
        //dd($products);
        return view('pages/shop/order', ['categories' => $categoryGestion->getCategories(), 'products' => $products, 'order' => $order]);
    }
}
