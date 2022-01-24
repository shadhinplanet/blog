<?php

use App\Http\Controllers\BlogController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\FrontEndController;
use App\Models\Blog;
use App\Models\Category;
use Flasher\Laravel\Facade\Flasher;
use Illuminate\Support\Facades\Route;



// Fronend
Route::get('/', [FrontEndController::class, 'index'])->name('home');

Route::get('/blog/{slug}', [FrontEndController::class, 'singleBlog'])->name('single-blog');
Route::get('/contact', [FrontEndController::class, 'contact'])->name('contact');
Route::post('/contact/store', [FrontEndController::class, 'contactStore'])->name('contact-store');





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


    Route::resource('contact', ContactController::class);

    // Route::get('contacts', [ContactController::class,'index'])->name('admin-contacts');
    // Route::delete('contact/delete/{id}', [ContactController::class,'destoy'])->name('admin-contact-delete');


});



require __DIR__.'/auth.php';
