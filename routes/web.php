<?php

use App\Http\Controllers\BlogController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


// Fronend
Route::get('/', function () {
    $blogs = Blog::orderBy('id', 'desc')->paginate(10);
    return view('frontend.home')->with('blogs', $blogs );
})->name('home');

Route::get('/blog/{slug}', function($slug){
    $blog = Blog::where('slug','=',$slug)->get()->first();

    return view('frontend.single-blog')->with('blog',$blog);

})->name('single-blog');





//  Backend

Route::prefix('dashboard')->group(function () {
    Route::get('/', function () {
        return view('dashboard');
    })->middleware(['auth'])->name('dashboard');


    Route::get('blogs', [BlogController::class, 'index'] )->middleware(['auth'])->name('admin-blogs');
    Route::get('blog/create', [BlogController::class, 'create'])->middleware(['auth'])->name('admin-blog-create');
    Route::post('blog/store', [BlogController::class, 'store'])->middleware(['auth'])->name('admin-blog-store');
    Route::delete('blog/{id}', [BlogController::class, 'destroy'])->middleware(['auth'])->name('admin-blog-delete');
    Route::get('blog/edit/{slug}', [BlogController::class, 'edit'])->middleware(['auth'])->name('admin-blog-edit');
    Route::put('blog/update/{id}', [BlogController::class, 'update'])->middleware(['auth'])->name('admin-blog-update');
});



require __DIR__.'/auth.php';
