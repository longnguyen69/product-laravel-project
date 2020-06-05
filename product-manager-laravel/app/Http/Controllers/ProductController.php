<?php

namespace App\Http\Controllers;

use App\Categories;
use App\Http\Requests\ValidateProducts;
use App\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ProductController extends Controller
{

    public function index()
    {

        $products = Product::paginate(3);
        return view('products.list', compact('products'));
    }

    public function createProduct()
    {
        $categories = Categories::all();
        return view('products.create', compact('categories'));
    }

    public function storeProduct(ValidateProducts $request)
    {
        $product = new Product();
        $product->name = $request->name;
        $product->category_id = $request->category;
        $product->price = $request->price;
        $product->desc = $request->desc;
        //up load file
        if ($request->hasFile('image')) {
            $image = $request->image;
            $path = $image->store('images', 'public'); //tao thu muc images nam trong thu muc public
            $product->images = $path;
        } else {
            $product->images = 'public/images/default.ipg';
        }
        $product->save();
        //Session::flash('success', 'Add product completed');
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('create.product');
    }

    public function showFormEdit($id)
    {
        $product = Product::find($id);
//        dd($product);
        $categories = Categories::all();
        return view('products.edit', compact('product', 'categories'));
    }

    public function updateProduct(ValidateProducts $request, $id)
    {
        $product = Product::find($id);
//        dd($product);
        $product->Name = $request->name;
        $product->category_id = $request->category;
        $product->price = $request->price;
        $product->desc = $request->desc;
        // update anh moi hoac giu nguyen anh cu
        if ($request->hasFile('image')) {
            $image = $request->image;
            $path = $image->store('images', 'public'); //tao thu muc images nam trong thu muc public
            $product->images = $path;
            return $product->images;
        }

        $product->save();
//        Session::flash('success', 'Edit completed');
        toastr()->success('Data has been saved successfully!');
        return redirect()->route('index.product');
//        dd($product);
//        dd($product->images);
    }

    public function deleteProduct($id)
    {
        $product = Product::findOrFail($id);
        $product->delete();
        toastr()->warning('You have just deleted the record');
        return redirect()->route('index.product');
    }

    public function searchProduct(Request $request)
    {
        $keyword = $request->search;
        $products = Product::where('Name', 'LIKE', '%' . $keyword . '%')->get();
        return view('products.list', compact('products'));
    }
}
