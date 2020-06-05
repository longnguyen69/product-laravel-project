<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class RegisterControl extends Controller
{
    public function showFormRegister(){
        return view('register');
    }

    public function addAdmin(Request $request){
        $default = null;
        $email = $request->email;
        $password = $request->password;

        $passBAM = Hash::make($password);

        DB::insert('INSERT INTO `users`(`username`, `password`, `name`, `role`) VALUES (?,?,?,?)',[$email,$passBAM,$default,$default]);

        return redirect()->route('login');
    }
}
