<?php

namespace App\Http\Controllers;

use App\Content;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin.src.index');
    }
    public function settings()
    {
        $content = Content::find(1);
        return view("admin.src.forms.settings",compact("content"));
    }
    public function update(Request $request,Content $content)
    {
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
}
