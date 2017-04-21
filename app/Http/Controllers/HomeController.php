<?php

namespace App\Http\Controllers;

use App\Activity;
use App\Model\Shop\shop_products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends EventHandlerController
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(! Auth::user()->is_valid){
            Auth::logout();
            return redirect()->route('login');
        }
        $activities = Activity::orderBy('date')->get();
        $product = shop_products::latest()->first();
        $pictureProduct = shop_products::with('pictures')->latest()->first()->pictures->first();
        return $this->view('home', compact('activities', 'product', 'pictureProduct'));
    }
}
