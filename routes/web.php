<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function(){
    Route::get('/',"BlogController@index")->name('blog.anasayfa');
    Route::get('anasayfa',"BlogController@index")->name('blog.anasayfa');
    Route::get('gonderi/{post}',"PostController@show")->name('blog.gonderi');
    Route::get('hakkimda',function(){
        return view('blog.about');
    })->name('blog.hakkimda');
    Route::get('iletisim',"ContactController@index")->name('blog.iletisim');
    Route::post('iletisim/kaydet',"ContactController@store")->name('blog.iletisim.kaydet');
    Route::get('arama',"BlogController@search")->name('blog.search');
    Route::get('kategori/{id}',"CategoryController@show")->name('blog.category');
});

Auth::routes(['register' => false]);

Route::prefix('/admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function(){
        Route::get('anasayfa', "AdminController@index")->name('index');
        Route::get('/', "AdminController@index")->name('home');

        /* Post Routes */

        Route::get('posts',"PostController@show_all")->name("posts");
        Route::get('posts/edit/{post}',"PostController@edit")->name("post.edit");
        Route::get('post/insert',"PostController@index")->name("add_post");
        Route::post('posts/edit/save/{post}',"PostController@update")->name("post.update");
        Route::post('post/insert/save',"PostController@store")->name("add_post.save");
        Route::delete('posts/delete/{post}',"PostController@destroy")->name("post.destroy");

        /* Category Routes */

        Route::get('categories',"CategoryController@show_all")->name("categories");
        Route::get('categories/edit/{category}',"CategoryController@edit")->name("category.edit");
        Route::get('category/insert',"CategoryController@index")->name("add_category");
        Route::post('category/insert/save',"CategoryController@store")->name("add_category.save");
        Route::post('categories/edit/save/{category}',"CategoryController@update")->name("category.update");
        Route::delete('categories/delete/{category}',"CategoryController@destroy")->name("category.destroy");

        /* Setting Routes */

        Route::get("settings","AdminController@settings")->name("settings");
        Route::post("settings/update/{content}","AdminController@update")->name("settings.update");
});