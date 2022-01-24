<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CategoryController extends Controller
{
    public function index()
    {
        $categories = Category::with('blogs')->orderBy('name','ASC')->get();
        // dd($categories);
        return view('category.index')->with([
            'categories' => $categories,
        ]);
    }

    public function create()
    {
        return view('category.create');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|max:255|unique:categories,name'
        ]);

        $slug = Str::slug($request->name);
        Category::create([
            'name'  => $request->name,
            'slug'  => $slug,
        ]);

        Flasher::addSuccess('Category Created!');

        return redirect()->route('admin-categories');
    }
    public function edit($id)
    {
        $category = Category::find($id)->with('blogs');
        return view('category.edit')->with(['category'=>$category]);
    }
    public function update(Request $request,$id)
    {
        $request->validate([
            'name'  => 'required|max:255'
        ]);

        $slug = Str::slug($request->name);
        Category::find($id)->update([
            'name'  => $request->name,
            'slug'  => $slug,
        ]);

        Flasher::addSuccess('Category Updated!');

        return redirect()->route('admin-categories');
    }
    public function destroy($id)
    {
        Category::find($id)->delete();
        Flasher::addSuccess('Category Deleted!');
        return redirect()->route('admin-categories');
    }


    public function getBlogByCategory($slug)
    {
        $category = Category::where('slug',$slug)->with('blogs')->first();
        // dd($category);
        return view('blog.view')->with([
            'category' => $category,
        ]);
    }


}
