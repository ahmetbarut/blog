<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use App\Lang;
use App\image;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $langs = Lang::all();
        $images = image::all();
        $categories = Category::all();
        return view('admin.forms.post_add',["langs" => $langs,"categories" => $categories,"images" => $images]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show_all()
    {
        $post = Post::latest()->paginate(15);
        return view("admin.tables.posts",["posts" => $post]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|min:6|max:80",
            "content" => "required|min:150",
            "tags"  =>"required",
            "image" =>"required",
            "category" =>"required",
        ]);
        $post = new Post;
        $post->title = $request->title;
        $post->content = $request->content;
        $post->code = $request->code;
        $post->programing_lang = $request->lang;
        $post->tags = $request->tags;
        $post->img = $request->image;
        $post->category_id = $request->category;
        $post->author = Auth::user()->name;
        $post->save();
        $request->session()->flash("success","Konu Başarıyla Eklendi!");
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view("blog.showPost",compact("post"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        $langs = Lang::all();
        $images = image::all();
        $categories = Category::all();
        return view("admin.forms.post_edit",["langs" => $langs,"categories" => $categories,"images" => $images,"post"=>$post]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $request->validate([
            "title" => "required|min:6|max:80",
            "content" => "required|min:150",
            "tags"  =>"required",
            "image" =>"required",
            "category" =>"required|integer",
        ]);
        $post->title = $request->title;
        $post->content = $request->content;
        $post->code = $request->code;
        $post->programing_lang = $request->lang;
        $post->tags = $request->tags;
        $post->img = $request->image;
        $post->category_id = $request->category;
        $post->author = Auth::user()->name;
        $post->save();
        $request->session()->flash("success","Konu Başarıyla Güncellendi!");
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
