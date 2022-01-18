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
        $data = Blog::with('category')->latest()->paginate();
        return view('blog.index')->with(['blogs' => $data]);
    }

    // Create
    public function create()
    {
        return view('blog.create')->with(['categories' => Category::all()]);
    }




    // Store
    public function store(Request $request)
    {

        $request->validate([
            'name'  => ['required', 'min:5', 'max:255'],
            'description' => 'required',
            'featured_image' => 'required|mimes:jpg,bmp,png',
            'category_id' => 'required|not_in:none'
        ]);

        $image = time() . "-" . $request->featured_image->getClientOriginalName();
        $request->file('featured_image')->storeAs('public/uploads/', $image);

        Blog::create([
            'name'           => $request->name,
            'slug'           => Str::slug($request->name),
            'featured_image' => $image,
            'category_id' => $request->category_id,
            'description'    => $request->description,
        ]);
        Flasher::addSuccess('Blog Created');
        return redirect()->route('admin-blogs');
    }


    // Edit page
    public function edit($id)
    {
        $blog = Blog::find($id);
        // $blog = Blog::where('slug', '=', $slug)->get()->first();

        return view('blog.edit')->with('blog', $blog);
    }

    // Update
    public function update(Request $request, $id)
    {
        $blog = Blog::find($id);
        if (!empty($request->file('featured_image'))) {
            $validation = [
                'name'  => ['required', 'min:5', 'max:255'],
                'description' => 'required',
                'featured_image' => 'mimes:jpg,bmp,png'
            ];
            $request->validate($validation);
            $image = time() . "-" . $request->featured_image->getClientOriginalName();
            $request->file('featured_image')->storeAs('public/uploads/', $image);

            Storage::delete('public/uploads/' . $blog->featured_image);

        } else {
            $validation = [
                'name'  => ['required', 'min:5', 'max:255'],
                'description' => 'required'
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
