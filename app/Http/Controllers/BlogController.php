<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    //Index
    public function index()
    {
        $data = Blog::latest()->paginate();
        return view('blog.index')->with(['blogs' => $data]);
    }

    // Create
    public function create()
    {
        return view('blog.create');
    }

    // Store
    public function store(Request $request)
    {

        $request->validate([
            'name'  => ['required', 'min:5', 'max:255'],
            'description' => 'required'
        ]);

        Blog::create([
            'name'           => $request->name,
            'slug'           => Str::slug($request->name),
            'featured_image' => 'https://picsum.photos/500/300?random=' . rand(5, 500),
            'description'    => $request->description,
        ]);

        return redirect()->route('admin-blogs');
    }


    // Edit page
    public function edit($slug)
    {
        $blog = Blog::where('slug', '=', $slug)->get()->first();

        return view('blog.edit')->with('blog', $blog);
    }

    // Update
    public function update(Request $request, $id)
    {
        $request->validate([
            'name'  => ['required', 'min:5', 'max:255'],
            'description' => 'required'
        ]);


        Blog::find($id)->update([
            'name'           => $request->name,
            'slug'           => Str::slug($request->name),
            'featured_image' => 'https://picsum.photos/500/300?random=' . rand(5, 500),
            'description'    => $request->description,
        ]);

        return redirect()->route('admin-blogs');
    }
    // Delete
    public function destroy($id)
    {
        Blog::find($id)->delete();

        return redirect()->route('admin-blogs');
    }
}
