<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use App\Models\Contact;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    public function index()
    {
        $blogs = Blog::with('categories')->orderBy('id', 'desc')->paginate(10);
        return view('frontend.home')->with([
            'blogs' => $blogs,
            'categories' => Category::all(),
        ]);
    }


    public function singleBlog($slug)
    {
        $blog = Blog::where('slug', $slug)->with('categories')->get()->first();

        return view('frontend.single-blog')->with([
            'blog' => $blog,
            'categories' => Category::all(),
        ]);
    }


    public function contact()
    {
        return view('frontend.contact');
    }

    public function contactStore(Request $request)
    {
        $request->validate([
            'contact_name'=>'required|max:255',
            'contact_email'=>'required|email|max:255',
            'contact_subject'=>'max:255',
            'contact_message'=>'required',
        ]);

        Contact::create([
            'name'=> $request->contact_name,
            'email'=>$request->contact_email,
            'subject'=>$request->contact_subject,
            'message'=>$request->contact_message,
        ]);

        Flasher::addSuccess('Message sent!');

        return redirect()->back();
    }

}
