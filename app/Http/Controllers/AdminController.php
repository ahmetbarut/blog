<?php

namespace App\Http\Controllers;

use App\Category; // Kategori Modeli  
use App\Content; // İçerik Modeli   
use App\Post; // Gönderiler Modeli  
use App\Visit; // Ziyaretçiler Modeli 
use App\Files; // Dosya Modeli 
use App\User; // Kullanıcı Modeli  
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
        // toplam satır döndürür ve admin/index.blade.php dosyasına gönderir
        return view('admin.index',$data);
    }
    public function settings()
    {
        $content = Content::find(1); // içerik id'si 1 olan kaydı getirir ve admin/form/settings.blade.php dosyasına gönderir
        return view("admin.forms.settings",compact("content"));
    }
    public function update(Request $request,Content $content)
    {   /* İçerik Güncelleme İşlemi  */
        $content->name = $request->name;
        $content->logo = $request->logo;
        $content->instagram = $request->instagram;
        $content->github = $request->github;
        $content->about = $request->about;
        $content->linkedin = $request->linkedin;
        $content->email = $request->email;
        $content->save(); // Kaydetme
        $request->session()->flash("success","Başarıyla Güncellendi!"); // mesaj. Flash data ile gidiyor belli bir süre sonra yok olur
        return back();
    }

    public function profile()
    {
        return view("admin.forms.profile");
    }
    
    public function profile_update(Request $request, User $user)
    {
        // Profil güncelleme işlemi
        $user->name = $request->name;
        $user->email = $request->email;
        $user->img = $request->profile;
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
