<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangePassword;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class ChangePass extends Controller
{
    public function showFormChange(){
        return view('chagePass');
    }

    public function changePass(ChangePassword $request){

        $currentUser = Auth::user(); //lay ra thong tin tahgn user hien tai dang dang nhap

        if (Hash::check($request->current, $currentUser->password)){
            $user = User::find($currentUser->id);
            $user->password = Hash::make($request->new);
            $user->save();
            Session::flash('error','wrong password');
            return redirect()->route('logout');
        }

        return redirect()->route('showChangePass');
    }
}
