<?php

namespace App\Http\Controllers;

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
        return $this->view('home');
    }
}
