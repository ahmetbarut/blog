<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
use Illuminate\Http\Request;
use App\Post;
class BlogController extends Controller
{
    public function index()
    {
       $posts = Post::latest()->paginate(5);
       $categories = Category::all();
       $content = Content::find(1);
       return view('blog.index',['posts'=> $posts,'categories' =>$categories,'content'=>$content]);
    }
    public function search(Request $request)
    {
        $request->validate([
            'search' => "required|min:3"
        ]);
        if ($request->search < 3) {
            return $request->session()->flash('hata', '3 Karakterden küçük olamaz');
        }
        $results = Post::where('content', 'LIKE', "%.$request->search.%")->get();
        return view('blog.result_search',compact("results"));
    }
}
