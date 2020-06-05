<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ListControl extends Controller
{
    public function showListProduct(){
        $this->middleware('checkRole');
        $results = DB::select('SELECT * FROM `users`');
//        dd($results);
        return view('listProduct',compact('results'));
    }
}
