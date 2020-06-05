<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginUserController extends Controller
{
    public function showFormLoginUser(){
        return view('shop.login-user');
    }

    public function login(Request $request){
        $email = $request->email;
        $password = $request->password;
        $user = [
            'username'=>$email,
            'password'=>$password
        ];
        if (Auth::attempt($user)){
            return redirect('/');
        } else {
            return back();
        }
    }
}
