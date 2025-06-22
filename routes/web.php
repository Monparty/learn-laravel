<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\BlogController;
use App\Http\Controllers\ProductController;

Route::get('/', [BlogController::class, 'index'])->name('index');
Route::get('/detail/{id}', [BlogController::class, 'detail'])->name('detail');
Route::get('/about', [AdminController::class, 'about'])->name('about');

// Route::get('/products', [ProductController::class, 'index'])->name('products.index');
// Route::get('/products/create', [ProductController::class, 'create'])->name('products.create');
// Route::post('/products', [ProductController::class, 'store'])->name('products.store');
// Route::get('/products/{id}', [ProductController::class, 'edit'])->name('products.edit');
// Route::put('/products/{id}', [ProductController::class, 'update'])->name('products.update');
// Route::get('/delete/{id}', [ProductController::class, 'delete'])->name('products.delete');

Route::resource('products', ProductController::class);

Route::middleware(['auth', 'verified'])->group(function () {
    Route::prefix('author')->group(function() {
        // crud
        Route::get('/blog', [AdminController::class, 'blogs'])->name('blog');
        Route::get('/create', [AdminController::class, 'create'])->name('create');
        Route::post('/insert', [AdminController::class, 'insert'])->name('insert');
        Route::get('/delete/{id}', [AdminController::class, 'delete'])->name('delete');
        Route::get('/change/{id}', [AdminController::class, 'change'])->name('change');
        Route::get('/edit/{id}', [AdminController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [AdminController::class, 'update'])->name('update');
    });

    // profile
    Route::get('/dashboard', [ProfileController::class, 'dashboard'])->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';