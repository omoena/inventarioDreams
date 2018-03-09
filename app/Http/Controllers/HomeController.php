<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Model\Product;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::atrasado()->paginate(15);
        $productsOntime = Product::onTime()->paginate(15);
        
        return view('home', ['datapro' => $products, 'ontime' => $productsOntime]);
    }
}
