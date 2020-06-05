<?php

namespace App\Http\Controllers\Shop;

use App\Cart;
use App\Http\Controllers\Controller;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CartController extends Controller
{
    public function addToCart($id){
        $product = Product::findOrFail($id);
        $oldCart = Session::get('cart');
        $cart = new Cart($oldCart);
        $cart->add($id, $product);
//
//        dd($cart);
        Session::put('cart',$cart);
        //Session::push('cart',$cart);
        dd(Session::get('cart'));
        toastr()->success('Add to cart Completed');
        return back();
    }
}
