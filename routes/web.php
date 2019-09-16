<?php

use Illuminate\Support\Facades\Route;

Route::prefix('/')->group(function(){
    Route::get('/',"BlogController@index")->name('blog.home');
    Route::get('anasayfa',"BlogController@index")->name('blog.home');
    Route::get('gonderi/{post}',"PostController@show")->name('blog.post');
    Route::get('hakkimda',"BlogController@about")->name('blog.about');
    Route::get('iletisim',"ContactController@index")->name('blog.contact');
    Route::post('iletisim/kaydet',"ContactController@store")->name('blog.contact.save');
    Route::get('arama',"BlogController@search")->name('blog.search');
    Route::get('kategori/{category}',"CategoryController@show")->name('blog.category');
    Route::get('tags/{tags}',"BlogController@tags")->name("blog.tags");
});

Auth::routes(['register' => false]);

Route::prefix('/admin')
    ->middleware('auth')
    ->name('admin.')
    ->group(function(){
        Route::get('anasayfa', "AdminController@index")->name('index');
        Route::get('/', "AdminController@index")->name('home');

        /* Post Routes */

        Route::get('gonderiler',"PostController@show_all")->name("posts");
        Route::get('gonderiler/duzenleme/{post}',"PostController@edit")->name("post.edit");
        Route::get('gonderi/ekle',"PostController@index")->name("add_post");
        Route::post('gonderi/duzenleme/kaydet/{post}',"PostController@update")->name("post.update");
        Route::post('gonderi/ekleme/kaydet',"PostController@store")->name("add_post.save");
        Route::delete('posts/delete/{post}',"PostController@destroy")->name("post.destroy");

        /* Category Routes */

        Route::get('kategoriler',"CategoryController@show_all")->name("categories");
        Route::get('kategoriler/duzenleme/{category}',"CategoryController@edit")->name("category.edit");
        Route::get('kategori/ekle',"CategoryController@index")->name("add_category");
        Route::post('kategori/ekle/kaydet',"CategoryController@store")->name("add_category.save");
        Route::post('kategoriler/duzenleme/kaydet/{category}',"CategoryController@update")->name("category.update");
        Route::delete('kategoriler/sil/{category}',"CategoryController@destroy")->name("category.destroy");

        /* Setting Routes */

        Route::get("ayarlar","AdminController@settings")->name("settings");
        Route::post("settinayarlargs/guncelleme/{content}","AdminController@update")->name("settings.update");

        /* File Routes */        

        Route::get("dosyalar","FileController@index")->name("files");
        Route::get("dosya/yukleme","FileController@file_upload")->name("file.upload");
        Route::post("dosya/yukleme/kaydet","FileController@store")->name("file.upload.save");
        Route::post("dosya/guncelleme/{files}","FileController@update")->name("file.update");
        Route::delete("dosya/sil/{files}","FileController@destroy")->name("file.destroy");

        /* Message Routes */

        Route::get("mesajlar","ContactController@show_all")->name("messages");

        /* Mail Routes */
        Route::get("epostalar","MailController@index")->name("mail");
        Route::get("eposta-gonder/{reply}/{mail}","MailController@create")->name("mail.send");

        /* Profile Routes */
        Route::get('profilim',"AdminController@profile")->name("profile");
        Route::post('profilim/guncelle/{user}',"AdminController@profile_update")->name("profile.update");

        /* Galery */

        Route::get("galeri","FileController@galery")->name("galery");

});

Route::get('cikis-yap', '\App\Http\Controllers\Auth\LoginController@logout');