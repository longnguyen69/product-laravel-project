<?php

namespace App\Http\Controllers;

use App\Cart;
use App\Product;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CartController extends Controller
{
    public function showCheckOut($id_user){
        $carts = Cart::where('id_user','=',$id_user)->get();
        $user = User::findOrFail($id_user);
        $arr = [];
        foreach ($carts as $cart){
            array_push($arr,$cart->price);
        }
        $subTotal = array_sum($arr);
//        dd($subTotal);
////        dd($carts);
        return view('shop.checkout',compact('carts','user','subTotal'));
    }

    public function add($id){
        $product = Product::find($id);
        $user = Auth::user();
        $cart = new Cart();

        $cart->id_user = $user->id;
        $cart->id_product = $product->id;
        $cart->nameProduct = $product->Name;
        $cart->number = 1;
        $cart->price = $product->price;
        $cart->image = $product->images;
        $cart->save();

        return redirect('/');
    }

    public function remove($id){
        $cartProduct = Cart::where('id_product','=',$id);
        $cartProduct->delete();
        return back();
    }

}
