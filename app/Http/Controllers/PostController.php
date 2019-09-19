<?php

namespace App\Http\Controllers;

use App\Category;
use App\Files;
use App\Post;
use App\Content;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class PostController extends Controller
{
    public function index()
    {
        $images = Files::all();
        $categories = Category::all();
        return view('admin.forms.post_add',["categories" => $categories,"images" => $images]);
    }

    public function show_all()
    {
        $post = Post::latest()->paginate(15);
        return view("admin.tables.posts",["posts" => $post]);
    }

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
        $post->tags = $request->tags;
        $post->img = $request->image;
        $post->category_id = $request->category;
        $post->author = Auth::user()->name;
        $post->save();
        $request->session()->flash("success","Konu Başarıyla Eklendi!");
        return back();
    }

    public function show(Post $post)
    {
        $content = Content::find(1);
        return view("blog.showPost",compact(["post","content"]));
    }

    public function edit(Post $post)
    {
        $images = Files::all();
        $categories = Category::all();
        return view("admin.forms.post_edit",["categories" => $categories,"images" => $images,"post"=>$post]);
    }

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
        $post->tags = $request->tags;
        $post->img = $request->image;
        $post->category_id = $request->category;
        $post->author = Auth::user()->name;
        $post->save();
        $request->session()->flash("success","Konu Başarıyla Güncellendi!");
        return back();
    }

    public function destroy(Post $post)
    {
        $post->delete();
        return back();
    }
}
