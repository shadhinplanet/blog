<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Models\Blog;
use App\Models\Category;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Route;



// Fronend
Route::get('/', function () {
    $blogs = Blog::orderBy('id', 'desc')->paginate(10);
    return view('frontend.home')->with([
        'blogs' => $blogs,
    ]);
})->name('home');

Route::get('/blog/{slug}', function($slug){
    $blog = Blog::where('slug','=',$slug)->with('categories')->get()->first();

    return view('frontend.single-blog')->with([
        'blog' => $blog,
    ]);

})->name('single-blog');





//  Backend

Route::prefix('dashboard')->middleware(['auth'])->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::get('blogs', [BlogController::class, 'index'] )->name('admin-blogs');
    Route::get('blog/create', [BlogController::class, 'create'])->name('admin-blog-create');
    Route::post('blog/store', [BlogController::class, 'store'])->name('admin-blog-store');
    Route::delete('blog/{id}', [BlogController::class, 'destroy'])->name('admin-blog-delete');
    Route::get('blog/edit/{id}', [BlogController::class, 'edit'])->name('admin-blog-edit');
    Route::put('blog/update/{id}', [BlogController::class, 'update'])->name('admin-blog-update');


    Route::get('categories', [CategoryController::class, 'index'])->name('admin-categories');
    Route::get('category/create', [CategoryController::class, 'create'])->name('admin-category-create');
    Route::post('category/store', [CategoryController::class, 'store'])->name('admin-category-store');
    Route::delete('category/{id}', [CategoryController::class, 'destroy'])->name('admin-category-delete');
    Route::get('category/edit/{id}', [CategoryController::class, 'edit'])->name('admin-category-edit');
    Route::put('category/update/{id}', [CategoryController::class, 'update'])->name('admin-category-update');

    Route::get('category/{slug}', [CategoryController::class, 'getBlogByCategory'])->name('admin-category-blogs');


});



require __DIR__.'/auth.php';
