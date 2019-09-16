<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
use Illuminate\Http\Request;
use App\Post;
use App\Visit;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        if ($data = Visit::where("ip",$request->ip())->first()->id) {
            $visit = Visit::find($data);
            $visit->ip = $request->ip();
            $visit->language = $request->server("HTTP_ACCEPT_LANGUAGE");
            $visit->save();
        }else{
            $visit = new Visit;
            $visit->ip = $request->ip();
            $visit->language = $request->server("HTTP_ACCEPT_LANGUAGE");
            $visit->save();
        }

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
        $content = Content::find(1);
        $results = Post::where('content', 'LIKE', "%.$request->search.%")->get();
        return view('blog.result_search',["results"=>$results, "content" => $content]);
    }
    
    public function about()
    {
        $content = Content::find(1);
        return view('blog.about',compact("content"));
    }
    
    public function tags($tag)
    {
        $content = Content::find(1);
        $tags = Post::where("tags","LIKE", "%denem2%")->get();
        return view('blog.tags',compact(["tags","content"]));
    }

    public function deneme(Request $request)
    {
        if ($visit = Visit::where("ip",$request->ip())->first()->id) {
            dd($visit);
        }
    }
}
