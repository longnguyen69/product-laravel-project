<?php

use Illuminate\Support\Facades\Route;


Route::get('/', 'Shop\HomeController@index')->name('index');
Route::get('{id}/add-to-cart', 'Shop\CartController@addToCart')->name('addToCart');
Route::get('login', 'LoginControl@showFormLogin');
Route::post('login', 'LoginControl@loginAdmin')->name('login');
Route::get('logout','LogoutController@logoutSystem')->name('logout');
Route::get('register', 'RegisterControl@showFormRegister');
Route::post('/register','RegisterControl@addAdmin')->name('register');
Route::get('change-pass', 'ChangePass@showFormChange')->name('showChangePass');
Route::post('change-pass','ChangePass@changePass')->name('changePage');

Route::get('user-login','Shop\LoginUserController@showFormLoginUser')->name('showLogin');
Route::post('user-login','Shop\LoginUserController@login')->name('loginUser');
Route::get('logout','Shop\LogoutController@logoutUser')->name('logout');


Route::middleware('checkUser')->group(function (){
    Route::get('{id}/check-out','CartController@showCheckOut')->name('showCheckOut');
    Route::get('{id}/add-to-cart','CartController@add')->name('addProduct');
    Route::get('{id}/delete','CartController@remove')->name('delete');
});


Route::middleware(['auth','checkRole'])->group(function (){
    Route::prefix('categories')->group(function (){
        Route::get('/','CategoriesController@index')->name('index.categories');
        Route::get('/create', 'CategoriesController@create')->name('create.categories');
        Route::post('/create','CategoriesController@store')->name('store.categories');
        Route::get('{id}/edit','CategoriesController@edit')->name('edit.categories');
        Route::post('{id}/edit','CategoriesController@update')->name('update.categories');
        Route::get('{id}/delete','CategoriesController@destroy')->name('delete.categories');
        Route::get('search','CategoriesController@search')->name('search.categories');
    });

    Route::prefix('products')->group(function (){
        Route::get('/','ProductController@index')->name('index.product');
        Route::get('/create', 'ProductController@createProduct')->name('create.product');
        Route::post('create','ProductController@storeProduct')->name('store.product');
        Route::get('{id}/edit', 'ProductController@showFormEdit')->name('edit.product');
        Route::post('{id}/edit', 'ProductController@updateProduct')->name('update.product');
        Route::get('{id}/delete-product','ProductController@deleteProduct')->name('delete.product');
        Route::get('search','ProductController@searchProduct')->name('search.product');
    });
});

