<?php
/**
 * Created by IntelliJ IDEA.
 * User: Clemsouille
 * Date: 14/04/2017
 * Time: 16:05
 */
namespace App\Model\Shop;

use App\Model\Shop\shop_categories;
use App\Model\Shop\shop_products;
use Illuminate\Support\Facades\DB;



class shop_productsRepository implements shop_productsRepositoryInterface{

    protected $shop_products;

    public function __construct(shop_products $shop_products)
    {
        $this->shop_products = $shop_products;
    }

    public function save($product)
    {
        //dd($product);
        // dd($product['name']);
        $this->shop_products->name = $product['name'];
        $this->shop_products->slug = str_slug($product['name'], '-');
        $this->shop_products->price = $product['price'];
        if($product['couleur']){
            $this->shop_products->color = 1;
        }else{
            $this->shop_products->color = 0;
        }
        
        if($product['taille']){
            $this->shop_products->size = 1;
        }else{
            $this->shop_products->size = 0;
        }

        if($product['quantityIlimity']){
            $this->shop_products->quantities = null;
        }else{
            $this->shop_products->quantities = $product['quantity'];
        }
        $this->shop_products->description = $product['description'];

        if($product['new_cat'] != null){
            $category = shop_categories::all()->where('name', $product['new_cat'])->first();
            if (!$category){
                $idcat = DB::table('shop_categories')->insertGetId(
                    ['name' => $product['new_cat'], 'cat_parent' => null]
                );

                $this->shop_products->category_id = $idcat;
            }else{
                $this->shop_products->category_id = $category->id;
            }
        }elseif($product['categoriesselect'] != 1 AND isset($product['categoriesselect'])){
            $this->shop_products->category_id = $product['categoriesselect'];
        }

        $this->shop_products->save();

        return $this->shop_products;
    }
    
    public function getProducts5perCategory(){
        $categories = DB::table('shop_categories')->get();

        foreach ($categories as $key => $category){
            //$products = shop_products::all()->where('category_id', $category->id)->groupBy('update_at')->take(5);
            //$this->shop_products = DB::table('shop_products')->get()->where('category_id', $category->id)->groupBy('update_at')->take(5);
            $products[$key] = shop_products::all()->where('category_id', $category->id)->take(5);
        }


        return $products;
    }

    public function getProductsperCategory($category){

        $category_obj = shop_categories::all()->where('name', $category)->first();

        // $products = shop_products::with('category')->get()->where('category', $category);

        $products = shop_products::with('category')->get()->where('category_id', $category_obj->id);


        return $products;
    }
}