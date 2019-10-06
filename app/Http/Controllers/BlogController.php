<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
use Illuminate\Http\Request;
use App\Post;
use App\User;
use App\Visit;
use Illuminate\Support\Facades\Hash;


class BlogController extends Controller
{
    public function index(Request $request)
    {
        if(Content::all()->count() == 0){
            // Varsayılan
            $content = new Content;
            $content->logo = url("uploads/default_logo.png");
            $content->name = config("app.name");
            $content->save();

            // Varsayılan Kullanıcı
            $user = new User;
            $user->name = "root";
            $user->email = "root@ahmetbrt.com";
            $user->image =url("uploads/default_avatar.png");
            $user->password = Hash::make("123456");
            $user->save();
        }

        if ($data = Visit::where("ip",$request->ip())->first()) {
            $visit = Visit::find($data->id);
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
        $content =Content::find(1);
        return view('blog.index',['posts'=> $posts,'categories' =>$categories,'content'=>$content]);
    }
    public function search(Request $request)
    {
        $request->validate([
            'search' => "required|min:3"
        ]);
        $content = Content::find(1);
        $results = Post::where('content', 'LIKE', "%.$request->search.%")->get();

        return view('blog.result_search',["results"=>$results,"word" => $request->search, "content" => $content]);
    }
    
    public function about()
    {
        $content = Content::find(1);
        return view('blog.about',compact("content"));
    }
    
    public function tags($tag)
    {
        $content = Content::find(1);
        $tags = Post::where("tags","LIKE", "%".$tag."%")->get();
        return view('blog.tags',compact(["tags","content"]));
    }

    public function deneme(Request $request)
    {
        if ($visit = Visit::where("ip",$request->ip())->first()->id) {
            dd($visit);
        }
    }
}
