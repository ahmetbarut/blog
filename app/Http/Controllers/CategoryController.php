<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.src.forms.add_category');
    }

    public function show_all()
    {
        $categories = Category::orderBy("title")->paginate(10);
        return view("admin.src.tables.categories",compact("categories"));
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
       dd($category->find(1)->posts);
    }


    public function edit(Category $category)
    {
        return view("admin.src.forms.category_edit",compact("category"));
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
