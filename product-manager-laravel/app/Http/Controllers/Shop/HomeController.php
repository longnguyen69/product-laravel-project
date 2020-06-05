<?php

namespace App\Http\Controllers\Shop;

use App\Cart;
use App\Categories;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index(){
        $products = Product::all();
        $categories = Categories::all();
        if (!Auth::user()){
            return view('shop.home',compact('products','categories'));
        } else {
            $user = Auth::user();
            $carts = Cart::where('id_user','=',$user->id)->get();
            return view('shop.home',compact('products','categories','user','carts'));
        }



    }
}
