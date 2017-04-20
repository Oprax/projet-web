<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Model\Shop\shop_products;
use Illuminate\Http\Request;

class HomeController extends EventHandlerController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $activities = Activity::orderBy('date')->get();
        $product = shop_products::latest()->first();
        $pictureProduct = shop_products::with('pictures')->latest()->first()->pictures->first();
        return $this->view('home', compact('activities', 'product', 'pictureProduct'));
    }
}
