<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;
use App\Content;
class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.forms.add_category');
    }

    public function show_all()
    {
        $categories = Category::orderBy("title")->paginate(10);
        dd(Category::orderBy("title")->post);
        return view("admin.tables.categories",compact(["categories"]));
    }
    public function store(Request $request)
    {
        $request->validate([
            "title" => "required|min:6|max:80",
            "description" => "min:10",
        ]);
        $category = new Category;
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();
        $request->session()->flash("success","Kategori Başarıyla Eklendi!");
        return back();
    }


    public function show(Category $category)
    {
        $content = Content::find(1);
        $posts = $category->find($category->id)->posts;
        return view("blog.category",compact(["posts","content"]));
    }


    public function edit(Category $category)
    {
        return view("admin.forms.category_edit",compact(["category"]));
    }

    public function update(Request $request, Category $category)
    {
        $request->validate([
            "title" => "required|min:3"
        ]);
        $category->title = $request->title;
        $category->description = $request->description;
        $category->save();
        $request->session()->flash("success","Kategori Başarıyla Güncellendi!");
        return back();
    }


    public function destroy(Category $category)
    {
        $category->delete();
        return back();
    }
}
