<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginControl extends Controller
{
    public function showFormLogin()
    {
        return view('login');
    }

    public function loginAdmin(Request $request)
    {
        $email = $request->email;
        $password = $request->password;

        $user = [
            'username' => $email,
            'password' => $password
        ];
        if (Auth::attempt($user)) {
            return redirect()->route('index.product');
        } else {
            return back();
        }
    }
}
