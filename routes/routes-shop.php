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

        Route::delete('/delete-product/{category_id}/{product_id}', ['as' => 'shop_delete_product', 'uses' => 'ShopController@deleteproduct']);
        Route::delete('/delete-product/{comment_id}', ['as' => 'shop_delete_comment', 'uses' => 'ShopController@deletecomment']);

        Route::get('/update-product/{category}/{slugproduct}', ['as' => 'shop_getupdate_product', 'uses' => 'ShopController@getupdateproduct']);
        Route::put('/update-product', ['as' => 'shop_update_product', 'uses' => 'ShopController@updateproduct']);


    });


    Route::get('/basket', ['as' => 'shop_basket', 'uses' => 'ShopController@getbasket']);
    Route::get('/order/{order_id}', ['as' => 'shop_order_id', 'uses' => 'ShopController@getorderid']);

    Route::post('/basket', ['as' => 'shop_add_basket', 'uses' => 'ShopController@add_basket']);
    Route::delete('/basket', ['as' => 'shop_delete_baskets', 'uses' => 'ShopController@delete_baskets']);

    Route::get('/basket/confirm/address', ['as' => 'shop_basket_confirm_address', 'uses' => 'ShopController@confirm_address']);
    Route::post('/basket/confirm/address', ['as' => 'shop_basket_confirm_address', 'uses' => 'ShopController@postConfirm_address']);
    Route::post('/basket/confirm', ['as' => 'shop_basket_confirm', 'uses' => 'ShopController@postConfirmBasket']);


    //Tous les produits d'une catégorie
    Route::get('/{category}', ['as' => 'shop_products_categories', 'uses' => 'ShopController@categoryindex']);//->where('category', '[a-z0-9\-]+');

    //Présentation d'un produit
    Route::get('/{category}/{slugproduct}', ['as' => 'shop_product', 'uses' => 'ShopController@view']
    );//->where('category', '[a-z0-9\-]+')->where('product', '[a-z0-9\-]+')

    Route::post('/storecomment', ['as' => 'shop_store_comment', 'uses' => 'ShopController@storeComment']);





});