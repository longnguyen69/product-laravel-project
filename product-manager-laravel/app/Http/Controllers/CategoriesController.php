<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Http\Requests\ValidateCategories;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class CategoriesController extends Controller
{
    public function index(){
        $categories = Categories::all();
        return view('categories.list',compact('categories'));
    }

    public function create(){
        return view('categories.create');
    }

    public function store(ValidateCategories $request){
        $category = new Categories();
        $category->name = $request->name;
        $category->save();
        Session::flash('success','add complete');
        return redirect()->route('create.categories');
    }

    public function edit($id){
        $categories = Categories::findOrFail($id);
        return view('categories.edit',compact('categories'));
    }

    public function update(Request $request,$id){
        $categories = Categories::findOrFail($id);
        $categories->name = $request->name;
        $categories->save();
        Session::flash('success', 'update Completed');
        return redirect()->route('index.categories');
    }

    public function destroy($id){
        $categories = Categories::findOrFail($id);
        $categories->delete();
        Session::flash('success','Delete Completed');
        return redirect()->route('index.categories');
    }

    public function search(Request $request){
        $keyword = $request->keyword;
        $categories = Categories::where('name','LIKE','%'.$keyword.'%')->get();
        return view('categories.list',compact('categories'));
    }
}
