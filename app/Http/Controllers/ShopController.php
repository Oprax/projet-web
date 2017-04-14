<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Gestion\Shop\ICategoryGestion;

class ShopController extends Controller
{
    public function index(ICategoryGestion $categoryGestion){

        

        return view('pages/shop/index', ['categories' => $categoryGestion->getCategories()]);
    }

    public function addProduct(ICategoryGestion $categoryGestion){

        return view('pages/shop/addProduct', ['categories' => $categoryGestion->getCategories()]);
    }

    public function postProduct(){

    }
}
