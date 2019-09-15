<?php

namespace App\Http\Controllers;

use App\Category;
use App\Content;
use App\Post;
use App\Visit;
use App\Files;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function index(Request $request)
    {

        $data = [
            "posts" => Post::all()->count() ,
            "categories" => Category::all()->count(),
            "visits" => Visit::all()->count(),
            "files" => Files::all()->count(),
        ];
        return view('admin.index',$data);
    }
    public function settings()
    {
        $content = Content::find(1);
        return view("admin.forms.settings",compact("content"));
    }
    public function update(Request $request,Content $content)
    {   /* Content update  */
        $content->name = $request->name;
        $content->logo = $request->logo;
        $content->instagram = $request->instagram;
        $content->github = $request->github;
        $content->about = $request->about;
        $content->bodyDescription = $request->bodyDescription;
        $content->linkedin = $request->linkedin;
        $content->email = $request->email;
        $content->save();
        $request->session()->flash("success","Başarıyla Güncellendi!");
        return back();
    }

    public function profile()
    {
        return view("admin.forms.profile");
    }
    
    public function profile_update(Request $request, User $user)
    {
        $user->name = $request->name;
        $user->email = $request->email;
        $user->profile = $request->profile;
        if (strlen($request->password) != 0) {
            $user->password = Hash::make($request->password);
        }
        if ($user->save()){
            $request->session()->flash("success","Profil Güncellendi");
        }else{
            $request->session()->flash("fail","Profil Güncellenemedi");
        }
        return back();
    }
}
