<?php
/**
 * Created by IntelliJ IDEA.
 * User: Clemsouille
 * Date: 13/04/2017
 * Time: 15:41
 */

Route::group(['prefix' => 'shop'], function(){

    //accueil boutique
    Route::get('/', ['as' => 'shop_home' , 'uses' => 'ShopController@index']);


    //Groupe avec middleware : interdit aux noms membres du cesi
    Route::group(['middleware' => 'role.cesi'], function(){

        //Ajout d'un produit -> CESI
        Route::get('/add-product', ['as' => 'shop_add_product', 'uses' => 'ShopController@getaddProduct']);
       // Route::post('/add-product', ['as' => 'shop_post_product', 'uses' => 'ShopController@postProduct']);
        Route::post('/add-product', ['as' => 'shop_store_product', 'uses' => 'ShopController@store']);

    });


    //Panier d'un produit
    Route::get('/basket', ['as' => 'shop_basket', function(){
        return "panier";
    }]);

    //Tous les produits d'une catégorie
    Route::get('/{category}', ['as' => 'shop_products_categories', function($category){
        return "Catégorie : $category";
    }])->where('category', '[a-z0-9\-]+');

    //Présentation d'un produit
    Route::get('/{category}/{product}', ['as' => 'shop_product', function($category, $product){
        return "Catégorie : $category '\n' Product : $product";
    }])->where('category', '[a-z0-9\-]+')->where('product', '[a-z0-9\-]+');
});