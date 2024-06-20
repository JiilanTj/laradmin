<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\ArticleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ItemController;
use App\Http\Controllers\StoreController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/dashboard');
    }
    return view('welcome');
})->middleware('auth');

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
    // Route::get('/superadmin/users', [AdminController::class, 'users'])->name('superadmin.users');
    Route::get('superadmin/users', [UserController::class, 'index'])->name('users.index');
    Route::get('superadmin/admin', [UserController::class, 'admin'])->name('users.admin');
    Route::delete('/users/{id}', [UserController::class, 'destroy'])->name('users.destroy');
    Route::get('/superadmin/products', [ProductController::class, 'index'])->name('admin/superadmin/products');
    Route::get('/superadmin/products/create', [ProductController::class, 'create'])->name('admin/superadmin/products/create');
    Route::post('/superadmin/products/save', [ProductController::class, 'save'])->name('admin/superadmin/products/save');
    Route::get('/superadmin/products/edit/{id}', [ProductController::class, 'edit'])->name('admin/superadmin/products/edit');
    Route::put('/superadmin/products/edit/{id}', [ProductController::class, 'update'])->name('admin/superadmin/products/update');
    Route::get('/superadmin/products/delete/{id}', [ProductController::class, 'delete'])->name('admin/superadmin/products/delete');
    Route::resource('articles', ArticleController::class);
    Route::post('articles/upload', [ArticleController::class, 'upload'])->name('articles.upload');
    Route::get('/superadmin/items', [ItemController::class, 'index'])->name('admin/superadmin/items');
    Route::get('/superadmin/items/create', [ItemController::class, 'create'])->name('admin/superadmin/items/create');
    Route::post('/superadmin/items/save', [ItemController::class, 'save'])->name('admin/superadmin/items/save');
    Route::get('/superadmin/items/edit/{id}', [ItemController::class, 'edit'])->name('admin/superadmin/items/edit');
    Route::put('/superadmin/items/edit/{id}', [ItemController::class, 'update'])->name('admin/superadmin/items/update');
    Route::get('/superadmin/items/delete/{id}', [ItemController::class, 'delete'])->name('admin/superadmin/items/delete');
    Route::get('/superadmin/masterdata/stores', [StoreController::class, 'index'])->name('admin.superadmin.masterdata.store');
    Route::get('/superadmin/masterdata/stores/create', [StoreController::class, 'create'])->name('admin.superadmin.masterdata.store.create');
    Route::post('/superadmin/masterdata/stores/save', [StoreController::class, 'save'])->name('admin.superadmin.masterdata.store.save');
    Route::get('/superadmin/masterdata/stores/edit/{id}', [StoreController::class, 'edit'])->name('admin.superadmin.masterdata.store.edit');
    Route::put('/superadmin/masterdata/stores/edit/{id}', [StoreController::class, 'update'])->name('admin.superadmin.masterdata.store.update');
    Route::get('/superadmin/masterdata/stores/delete/{id}', [StoreController::class, 'delete'])->name('admin.superadmin.masterdata.store.delete');
});

require __DIR__.'/auth.php';
