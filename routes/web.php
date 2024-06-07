<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    $role = Auth::user()->role;
    if ($role === 'admin') {
        return redirect()->route('admin.index');
    } elseif ($role === 'superadmin') {
        return redirect()->route('superadmin.index');
    } else {
        return view('dashboard');
    }
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index'])->name('admin.index');
});

Route::middleware(['auth', 'role:superadmin'])->group(function () {
    Route::get('/superadmin', [AdminController::class, 'superadmin'])->name('superadmin.index');
    Route::get('/superadmin/users', [AdminController::class, 'users'])->name('superadmin.users');
    Route::get('/superadmin/products', [ProductController::class, 'index'])->name('admin/superadmin/products');
    Route::get('/superadmin/products/create', [ProductController::class, 'create'])->name('admin/superadmin/products/create');
    Route::post('/superadmin/products/save', [ProductController::class, 'save'])->name('admin/superadmin/products/save');
    Route::get('/superadmin/products/edit/{id}', [ProductController::class, 'edit'])->name('admin/superadmin/products/edit');
    Route::put('/superadmin/products/edit/{id}', [ProductController::class, 'update'])->name('admin/superadmin/products/update');
    Route::get('/superadmin/products/delete/{id}', [ProductController::class, 'delete'])->name('admin/superadmin/products/delete');
    Route::resource('articles', ArticleController::class);
    Route::post('articles/upload', [ArticleController::class, 'upload'])->name('articles.upload');
});

require __DIR__.'/auth.php';
