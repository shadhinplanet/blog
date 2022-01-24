<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    //Index
    public function index()
    {
        $data = Blog::with('categories')->latest()->paginate();
        return view('blog.index')->with(['blogs' => $data]);
    }

    // Create
    public function create()
    {
        return view('blog.create')->with([
            'categories' => Category::all()
        ]);
    }




    // Store
    public function store(Request $request)
    {
        // dd($request->all());
        $request->validate([
            'name'  => ['required', 'min:5', 'max:255'],
            'description' => 'required',
            // 'featured_image' => 'required|mimes:jpg,bmp,png',
        ]);

        if(!empty($request->file('featured_image'))){
            $image = time() . "-" . $request->featured_image->getClientOriginalName();
            $request->file('featured_image')->storeAs('public/uploads/', $image);
        }else{
            $image = "https://picsum.photos/300?random=".rand(5,500);
        }


        $blog = Blog::create([
            'name'           => $request->name,
            'slug'           => Str::slug($request->name),
            'featured_image' => $image,
            'description'    => $request->description,
        ]);

        $blog->categories()->attach($request->categories);

        // $blog->categories()->attach($request->category_id);


        Flasher::addSuccess('Blog Created');
        return redirect()->route('admin-blogs');
    }


    // Edit page
    public function edit($id)
    {
        $blog = Blog::with('categories')->find($id);

        return view('blog.edit')->with([
            'blog'=> $blog,
            'categories'=> Category::all(),
        ]);
    }

    // Update
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        if (!empty($request->file('featured_image'))) {
            $validation = [
                'name'  => ['required', 'min:5', 'max:255'],
                'description' => 'required',
                'featured_image' => 'mimes:jpg,bmp,png',
            ];
            $request->validate($validation);
            $image = time() . "-" . $request->featured_image->getClientOriginalName();
            $request->file('featured_image')->storeAs('public/uploads/', $image);

            Storage::delete('public/uploads/' . $blog->featured_image);

        } else {
            $validation = [
                'name'  => ['required', 'min:5', 'max:255'],
                'description' => 'required',
            ];
            $request->validate($validation);
            $image = $blog->featured_image;
        }

        $blog->update([
            'name'           => $request->name,
            'slug'           => Str::slug($request->name),
            'featured_image' => $image,
            'description'    => $request->description,
        ]);

        $blog->categories()->sync($request->categories);


        Flasher::addSuccess('Blog Updated');
        return redirect()->route('admin-blogs');
    }
    // Delete
    public function destroy($id)
    {
        $blog = Blog::find($id);
        Storage::delete('public/uploads/' . $blog->featured_image);

        $blog->delete();
        Flasher::addSuccess('Blog Deleted');
        return redirect()->route('admin-blogs');
    }
}
